import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  allstudent: null,
  majors:null,
  alldairy:null,
  alluniversity:null,
  authalluniversity:null
}


// getters
export const getters = {
    allstudent: state => state.allstudent,
    majors: state => state.majors,
    alldairy : state => state.alldairy,
    alluniversity : state => state.alluniversity,
    authalluniversity : state => state.authalluniversity
    
    
}

// mutations
export const mutations = {
  [types.FETCH_ALLSTUDENT] (state, data) {
    state.allstudent = data
  },
  [types.FETCH_MAJORS] (state, data) {
    state.majors = data
  },
  [types.FETCH_ALLDAIRY] (state, data) {
    state.alldairy = data
  },
  [types.FETCH_ALLUNIVERSITY] (state, data) {
    state.alluniversity = data
  },
  [types.FETCH_AUTHALLUNIVERSITY] (state, data) {
    state.authalluniversity = data
  },
  
}

// actions
export const actions = {
  async fetchallstudent ({ commit }) {
    try {
      const { data } = await axios.get(`/api/allstudent`)
      commit(types.FETCH_ALLSTUDENT,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async fetchmajor ({ commit }) {
    try {
      const { data } = await axios.get(`/api/facultys`)
      commit(types.FETCH_MAJORS,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async fetchalldairy ({ commit }) {
    try {
      const { data } = await axios.get(`/api/alldairy`)
      commit(types.FETCH_ALLDAIRY,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async fetchalluni ({ commit }) {
    try {
      const { data } = await axios.get(`/api/getfaculty`)
      commit(types.FETCH_ALLUNIVERSITY,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async fetchauthuni ({ commit }) {
    try {
      const { data } = await axios.get(`/api/alluniversity`)
      commit(types.FETCH_AUTHALLUNIVERSITY,  data )
    } catch (e) {
      console.log(e)
    }
  },
}
