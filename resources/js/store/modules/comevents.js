import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  comevents: null,
  show: null,
  user_joins: null,
  make_events:null,
}


// getters
export const getters = {
    comevents: state => state.comevents,
    show: state => state.show,
    userjoins: state => state.user_joins,
    makeevent: state => state.make_events,
}

// mutations
export const mutations = {
  [types.FETCH_COMEVENT] (state, data) {
    state.comevents = data
  },
  [types.FETCH_COMEVENT_SHOW] (state, data) {
    state.show = data
  },
  [types.FETCH_USER_JOIN] (state, data) {
    state.user_joins = data
  },
  [types.FETCH_MAKE_EVENT] (state, data) {
    state.make_events = data
  }
}

// actions
export const actions = {
  async fetch ({ commit }) {
    try {
      const { data } = await axios.get(`/api/comevents`)
      commit(types.FETCH_COMEVENT,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async userjoin ({ commit }) {
    try {
      const { data } = await axios.get(`/api/comevent/join`)
      commit(types.FETCH_USER_JOIN,  data )
    } catch (e) {
      console.log(e)
    }
  },
  
  async makeevent ({ commit }, form) {
    try {
        const { data } = await axios.post(`/api/make_event`,form)
        return data;
    } catch (e) {
      console.log(e)
    }
  },
  async show ({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/comevents/${id}`)
      commit(types.FETCH_COMEVENT_SHOW,  data )

    } catch (e) {
      console.log(e)
    }
  },
  async join ({ commit }, form) {
    try {
        const { data } = await axios.post(`/api/comevent_join`,form)
        return data;
    } catch (e) {
      console.log(e)
    }
  },

  async del ({ commit }, id) {
    try {
      await axios.delete(`/api/comevents/${id}`)
    } catch (e) {
      console.log(e)
    }
  }
}
