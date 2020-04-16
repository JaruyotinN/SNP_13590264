import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  jobs:null,
  types:null,
}


// getters
export const getters = {
    jobs: state => state.jobs,
    types: state => state.types,
}

// mutations
export const mutations = {

  [types.FETCH_JOB] (state, data) {
    state.jobs = data
  },
  [types.FETCH_TYPE] (state, data) {
    state.types = data
  },
}

// actions
export const actions = {
  async fetchjob ({ commit }) {
    try {
      const { data } = await axios.get(`/api/jobs`)
      commit(types.FETCH_JOB,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async fetchtype ({ commit }) {
    try {
      const { data } = await axios.get(`/api/types`)
      commit(types.FETCH_TYPE,  data )
    } catch (e) {
      console.log(e)
    }
  },

}
