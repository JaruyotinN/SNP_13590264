import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  province: null,
   
}


// getters
export const getters = {
    province: state => state.province,
    
}

// mutations
export const mutations = {
  [types.FETCH_PROVINCE] (state, data) {
    state.province = data
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
 
 

}
