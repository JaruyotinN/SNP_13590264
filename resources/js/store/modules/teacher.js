import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  allstudent: null,
  facultys:null,
}


// getters
export const getters = {
    allstudent: state => state.allstudent,
    facultys: state => state.facultys,
    
}

// mutations
export const mutations = {
  [types.FETCH_ALLSTUDENT] (state, data) {
    state.allstudent = data
  },
  [types.FETCH_FACULTY] (state, data) {
    state.facultys = data
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
  async fetchfaculty ({ commit }) {
    try {
      const { data } = await axios.get(`/api/facultys`)
      commit(types.FETCH_FACULTY,  data )
    } catch (e) {
      console.log(e)
    }
  },
}
