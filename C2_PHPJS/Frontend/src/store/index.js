import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import router from './../router'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    loggedIn: false,
    loginError:false,
    token: '',
  },
  mutations: {
    setToken(state, val) {
      state.token = val
      state.loggedIn = true
    },
    logout(state) {
      state.token = ''
      state.loggedIn = false
    },
    loginError(state) {
      state.loginError = true
    }
  },
  actions: {
    login({commit}, data) {
      axios.post('/login', data)
            .then(res => {
                console.log(res)
                this.error = false;
                commit('setToken', res.data.token);
                router.go(-1);
            }).catch(() => {
                commit('loginError');
            });
    },
    logout({commit}) {
      axios.post('/logout')
        .then(() => {
          commit('logout');
          router.push({name:'login'})
        })
    }
  },
  modules: {
  }
})
