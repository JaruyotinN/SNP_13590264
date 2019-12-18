import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  comevents: null,
  show: null,
}

// getters
export const getters = {
    comevents: state => state.comevents,
    show: state => state.show


}

// mutations
export const mutations = {
  [types.FETCH_COMEVENT] (state, data) {
    state.comevents = data
  },
  [types.FETCH_COMEVENT_SHOW] (state, data) {
    state.show = data
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
  async show ({ commit }, id) {
    try {
        const { data } = await axios.get(`/api/comevents/${id}`)
      commit(types.FETCH_COMEVENT_SHOW,  data )

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
