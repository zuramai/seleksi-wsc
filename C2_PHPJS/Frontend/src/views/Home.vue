<template>
  <div class="home">
    <div class="container">
      <header>
        <div class="row">
          <div class="col-6">
            <h1>Event Booking Platform</h1>
          </div>
          <div class="col-6">
            <button class='btn btn-primary login-btn'>Login</button>
          </div>
        </div>
      </header>
      <div class="events">
        <router-link :to="{name: 'event.show', params: {organizerSlug: event.organizer.slug, eventSlug: event.slug}}" class='event-link' v-for="event in events" :key="event.id">
          <div class="event">
            <h3>{{event.name}}</h3>
            <div class="details">
              <p>{{event.organizer.name}}, {{Date(event.date)}}, 2019</p>
            </div>
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'Home',
  mounted() {
    this.getData();
  },
  data: () => ({
    events: []
  }),
  methods: {
    getData() {
      this.$axios.get("/events")
        .then(res => {
          this.events = res.data.events;
        });
    }
  }
}
</script>
