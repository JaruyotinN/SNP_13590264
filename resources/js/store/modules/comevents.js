import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  comevents: null,
  show: null,
  user_joins: null,
  make_events:null,
  student_joins:null,
  showstudent_join :null,
}


// getters
export const getters = {
    comevents: state => state.comevents,
    show: state => state.show,
    userjoins: state => state.user_joins,
    joinreqs: state => state.joinreqs,
    makeevent: state => state.make_events,
    studentjoins: state => state.student_joins,
    showstudent_join: state => state.showstudent_join,
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
  [types.FETCH_JOINREQS] (state, data) {
    state.userjoins = data
  },
  [types.FETCH_MAKE_EVENT] (state, data) {
    state.make_events = data
  },
  [types.FETCH_STUDENT_JOIN] (state, data) {
    state.student_joins = data
  },
  [types.FETCH_SHOWSTUDENT_JOIN] (state, data) {
    state.showstudent_join = data
  },
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
  async fetchstudentjoin ({ commit }) {
    try {
      const { data } = await axios.get(`/api/getstudent`)
      commit(types.FETCH_STUDENT_JOIN,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async showjoin ({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/getstudent/${id}`)
      commit(types.FETCH_SHOWSTUDENT_JOIN,  data )

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
  async joinreq ({ commit }) {
    try {
      const { data } = await axios.get(`/api/comevent/joinreq`)
      commit(types.FETCH_JOINREQS,  data )
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
  async update ({ commit }, form) {
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
