<template>
  <div class="home">
    <div class="container">
      <header>
        <div class="row">
          <div class="col-6">
            <h1>{{event.name}}</h1>
          </div>
        </div>
      </header>
      <div class="event-registration">
          <div class="tickets">
            <div class="row">
              <div class="ticket" for="normal" v-for="ticket in event.tickets" :key="ticket.id">
                  <input type="checkbox" name="" class='checkbox col-3' id="normal" v-model="tickets" :value="{id: ticket.id, cost: ticket.cost}">
                  <div class="ticket-name col-6">
                    {{ticket.name}}
                  </div>
                  <div class="ticket-price col-3 text-right">
                    {{ticket.cost}},-
                  </div>
              </div>
            </div>
          </div>
          <div class="additional">
            <h3>Select additional workshops you want to book</h3>
            <div class="workshops">
              <template v-for="channel in event.channels">
                <template v-for="room in channel.rooms">
                  <template v-for="session in room.sessions">
                        <div class="workshop" :v-if="session.type=='workshop'" :key="session.id">
                          <input type="checkbox" name="workshop" :value="{id:session.id,cost:session.cost}" :id="`workshop-${session.id}`" v-model="workshops">
                          <label :for="`workshop-${session.id}`">{{session.title}}</label>
                        </div>
                  </template>
                </template>
              </template>
            </div>
          </div>
          <div class="summary">
            <table class="table">
              <tr>
                <td>Event Ticket</td>
                <td id="event-cost">{{ticketTotalPrice}},-</td>
              </tr>
              <tr >
                <td>Additional workshops</td>
                <td id="additional-cost">{{workshopTotalPrice}},-</td>
              </tr>
              <hr>
              <tr>
                <td>Total</td>
                <td id="total-cost">{{ workshopTotalPrice + ticketTotalPrice }},-</td>
              </tr>
              <tr>
                <button class='btn btn-primary float-right' id="purchase" @click="purchase">Purchase</button>
              </tr>
            </table>
          </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Home',
  components: {
  },
  mounted() {
    this.getData();
  },
  data: () => ({
    workshops: [],
    tickets: [],
    event: {
        name: "Event Name"
    },
    sessionDetail: {},
    sessionDetailShow:false,
    hour: {
        min: 0,
        max: 0,
    }
  }),
  methods: {
    getData() {
        this.$axios.get(`/organizers/${this.$route.params.organizerSlug}/events/${this.$route.params.eventSlug}`)
            .then(res => {
                this.event = res.data;
                this.getHourRange()
                console.log(this.getHourWidth)
            });
    },
    purchase() {
      this.$router.go(-1)
    }
  },
  computed: {
      getHourWidth() {
          let range = this.hour.max - this.hour.min;
          return 100 / range;
      },
      ticketTotalPrice() {
        let total = 0;
        this.tickets.forEach((ticket) => total += parseInt(ticket.cost));
        return total;
      },
      workshopTotalPrice() {
        let total = 0;
        console.log(this.workshops)
        this.workshops.forEach((w) => total += !w.cost ? 0 : parseInt(w.cost));
        return total;
      }
  }
}
</script>
