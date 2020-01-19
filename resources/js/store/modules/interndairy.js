import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  interndairys: null,
  show: null,
  
}


// getters
export const getters = {
    interndairys: state => state.interndairys,
    show: state => state.show,
    
}

// mutations
export const mutations = {
  [types.FETCH_INTERNDAIRY] (state, data) {
    state.interndairys = data
  },
  [types.FETCH_INTERNDAIRY_SHOW] (state, data) {
    state.show = data
  },
}

// actions
export const actions = {
  async fetch ({ commit }) {
    try {
      const { data } = await axios.get(`/api/interndairys`)
      commit(types.FETCH_INTERNDAIRY,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async show ({ commit }, id) {
    try {
        const { data } = await axios.get(`/api/interndairys/${id}`)
      commit(types.FETCH_INTERNDAIRY_SHOW,  data )

    } catch (e) {
      console.log(e)
    }
  },
  async makedairy ({ commit }, form) {
    try {
        const { data } = await axios.post(`/api/make_dairy`,form)
        return data;
    } catch (e) {
      console.log(e)
    }
  },

}
