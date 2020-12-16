<template>
  <div class="home">
    <div class="container">
      <header>
        <div class="row">
          <div class="col-6">
            <h1>{{event.name}}</h1>
          </div>
          <div class="col-6">
            <button class='btn btn-primary login-btn'>Register for this event</button>
          </div>
        </div>
      </header>
      <div class="event-detail">
        <div class="channels">
            <div class="channel-wrapper" v-for="channel in event.channels" :key="channel.id">
                <div class="channel">
                    {{channel.name}}
                </div>
                <div class="rooms">
                    <div class="room" v-for="room in channel.rooms" :key="room.id">
                        {{room.name}}
                    </div>
                </div>
                <div class="timeline">
                    <div class="sessions">
                        <div class="session-room" v-for="room in channel.rooms" :key="room.id">
                            <div class="session" 
                                :data-start="`${new Date(session.start).getHours()}:${new Date(session.start).getMinutes()}`" 
                                :data-end="`${new Date(session.end).getHours()}:${new Date(session.end).getMinutes()}`"
                                v-for="session in room.sessions" :key="session.id" :style="{left: `${getSessionOffset(session)}%`, width: `${getSessionWidth(getSessionMinutes(session))}`}"
                                @click="showSessionDetail(session)">
                                {{session.title}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="timestamps">
                <div class="timestamp" v-for="(n,index) in hour.max+1-hour.min" :key="n" :style="{width: `${getHourWidth}%`}">
                    {{hour.min+index}}
                </div>
            </div>
        </div>
      </div>
      <session-detail :session="sessionDetail" v-if="sessionDetailShow"/>
    </div>
  </div>
</template>

<script>
import SessionDetail from "@/components/SessionDetail.vue";

export default {
  name: 'Home',
  components: {
    SessionDetail
  },
  mounted() {
    this.getData();
  },
  data: () => ({
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
    showSessionDetail(session) {
      this.sessionDetail = session;
      this.sessionDetailShow = true;
    },
    getHourRange() {
        this.event.channels.forEach((channel) => {
            channel.rooms.forEach((room) => {
                room.sessions.forEach((session) => {
                    let start = new Date(session.start)
                    let end = new Date(session.end);
                    if(!this.hour.min) this.hour.min = start.getHours();
                    if(start.getHours() < this.hour.min) this.hour.min = start.getHours();
                    if(end.getHours() > this.hour.max) this.hour.max = end.getHours();
                });
            })
        })
    },
    getSessionOffset(session) {
        let start = new Date(session.start)
        let firstMinutes = this.hour.min * 60;
        let startMinutes = start.getHours() * 60 + start.getMinutes();
        let rangeInMinutes = (this.hour.max - this.hour.min) * 60;

        return (startMinutes - firstMinutes) / rangeInMinutes * 100;
    },
    getSessionMinutes(session) {
        let start = new Date(session.start)
        let end = new Date(session.end);

        let startMinutes = start.getMinutes();
        let endMinutes = end.getMinutes();
        let startHour = start.getHours();
        let endHours = end.getHours();

        let totalMinutes = (endHours*60) - (startHour*60);
        if(startMinutes>0) totalMinutes -= startMinutes;
        if(endMinutes>0) totalMinutes+=endMinutes;

        return totalMinutes;
    },
    getSessionWidth(minutes) {
      let range = this.hour.max - this.hour.min;
      let rangeInMinutes = range * 60;
      let width = (minutes / rangeInMinutes) * 100;
      console.log(minutes,width)
      return width;
    }
  },
  computed: {
      getHourWidth() {
          let range = this.hour.max - this.hour.min;
          return 100 / range;
      }
  }
}
</script>
