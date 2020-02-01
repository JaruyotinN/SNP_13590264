import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  userinfos: null,
  show: null,
}


// getters
export const getters = {
    userinfos: state => state.userinfos,
    show: state => state.show,
}

// mutations
export const mutations = {
  [types.FETCH_USERINFO] (state, data) {
    state.userinfos = data
  },
  [types.FETCH_DAIRY_SHOW] (state, data) {
    state.show = data
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

  async show ({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/comevents/${id}`)
      commit(types.FETCH_COMEVENT_SHOW,  data )

    } catch (e) {
      console.log(e)
    }
  },

}
