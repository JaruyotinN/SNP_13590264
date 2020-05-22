import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  province: null,
  authprovince : null,
}


// getters
export const getters = {
    province: state => state.province,
    authprovince: state => state.authprovince,
}

// mutations
export const mutations = {
  [types.FETCH_PROVINCE] (state, data) {
    state.province = data
  },
  [types.FETCH_AUTHPROVINCE] (state, data) {
    state.authprovince = data
  },
 
}

// actions
export const actions = {
  async fetch ({ commit }) {
    try {
      const { data } = await axios.get(`/api/province`)
      commit(types.FETCH_PROVINCE,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async fetchauth ({ commit }) {
    try {
      const { data } = await axios.get(`/api/authprovince`)
      commit(types.FETCH_AUTHPROVINCE,  data )
    } catch (e) {
      console.log(e)
    }
  },
 
 

}
