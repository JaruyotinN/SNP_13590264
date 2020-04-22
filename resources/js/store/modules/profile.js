import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  userinfos: null,
  show: null,
  courses: null,
}


// getters
export const getters = {
    userinfos: state => state.userinfos,
    show: state => state.show,
    courses: state => state.courses,
}

// mutations
export const mutations = {
  [types.FETCH_USERINFO] (state, data) {
    state.userinfos = data
  },
  [types.FETCH_USERSHOW] (state, data) {
    state.show = data
  },
  [types.FETCH_COURSES] (state, data) {
    state.courses = data
  },
}

// actions
export const actions = {
  async fetch ({ commit }) {
    try {
      const { data } = await axios.get(`/api/userinfo`)
      commit(types.FETCH_USERINFO,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async fetchcourses ({ commit }) {
    try {
      const { data } = await axios.get(`/api/courses`)
      commit(types.FETCH_COURSES,  data )
    } catch (e) {
      console.log(e)
    }
  },

  async show ({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/userinfo/${id}`)
      commit(types.FETCH_USERSHOW,  data )

    } catch (e) {
      console.log(e)
    }
  },

}
