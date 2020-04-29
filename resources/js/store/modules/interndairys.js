import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  interndairys: null,
  make_dairys:null,
  showalldairy :null
}


// getters
export const getters = {
    interndairys: state => state.interndairys,
    makedairys: state => state.make_dairys,
    showalldairy: state => state.showalldairy,
}

// mutations
export const mutations = {
  [types.FETCH_DAIRY] (state, data) {
    state.interndairys = data
  },
  [types.FETCH_MAKE_DAIRY] (state, data) {
    state.make_dairys = data
  },
  [types.FETCH_ALLDAIRY_SHOW] (state, data) {
    state.showalldairy = data
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

  async makedairys ({ commit }, form) {
    try {
        const { data } = await axios.post(`/api/make_dairys`,form)
        return data;
    } catch (e) {
      console.log(e)
    }
  },
  async fetchalldairy ({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/detaildairy/${id}`)
      commit(types.FETCH_ALLDAIRY_SHOW,  data )
    } catch (e) {
      console.log(e)
    }
  },
 

}
