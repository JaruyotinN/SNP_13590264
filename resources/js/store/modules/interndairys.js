import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  interndairys: null,
  show: null,
  make_dairys:null,
}


// getters
export const getters = {
    interndairys: state => state.interndairys,
    show: state => state.show,
    makedairys: state => state.make_dairys,
}

// mutations
export const mutations = {
  [types.FETCH_DAIRY] (state, data) {
    state.interndairys = data
  },
  [types.FETCH_DAIRY_SHOW] (state, data) {
    state.show = data
  }, 
  [types.FETCH_MAKE_DAIRY] (state, data) {
    state.make_dairys = data
  },
}

// actions
export const actions = {
  async fetch ({ commit }) {
    try {
      const { data } = await axios.get(`/api/interndairys`)
      commit(types.FETCH_DAIRY,  data )
    } catch (e) {
      console.log(e)
    }
  },

  async show ({ commit }, id) {
    try {
        const { data } = await axios.get(`/api/interndairy/${id}`)
      commit(types.FETCH_DAIRY_SHOW,  data )

    } catch (e) {
      console.log(e)
    }
  },

  async makedairys ({ commit }, form) {
    try {
        const { data } = await axios.post(`/api/make_dairys`,form)
        return data;
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

}
