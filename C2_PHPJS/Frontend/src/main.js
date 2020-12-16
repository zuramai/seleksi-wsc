import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import "./assets/scss/style.scss"
import axios from 'axios';

Vue.config.productionTip = false
axios.defaults.baseURL = "http://localhost:8000/api/v1";
Vue.prototype.$axios = axios;


Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
