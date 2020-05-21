import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  comevents: null,
  show: null,
  user_joins: null,
  student_joins:null,
  showstudent_join :null,
  stuconfirm : null,
  showdetailreview : null,
  internstepconfirm : null,
  nointern:null,
  comjob:null,
  staffs:null,
  showstaff : null,
  getcomevent : null,
}


// getters
export const getters = {
    comevents: state => state.comevents,
    show: state => state.show,
    userjoins: state => state.user_joins,
    joinreqs: state => state.joinreqs,
    studentjoins: state => state.student_joins,
    showstudent_join: state => state.showstudent_join,
    internstepconfirm: state => state.internstepconfirm,
    stuconfirm : state => state.stuconfirm,
    comjob : state => state.comjob,
    staffs: state => state.staffs,
    showstaff : state => state.showstaff,
    getcomevent : state => state.getcomevent,
    ongoing (state) {
      if (state.stuconfirm) {
        return state.stuconfirm.filter((stuconfirm) => {
          return stuconfirm.student.intern_id <= 5
        })
      }
    },
    needreview (state) {
      if (state.stuconfirm) {
        return state.stuconfirm.filter((stuconfirm) => {
          return stuconfirm.student.intern_id == 6 || stuconfirm.student.intern_id == 7
        })
      }
    },
    finishintern (state) {
      if (state.stuconfirm) {
        return state.stuconfirm.filter((stuconfirm) => {
          return stuconfirm.student.intern_id == 8
        })
      }
    },
    showdetailreview : state => state.showdetailreview,
    
}

// mutations
export const mutations = {
  [types.FETCH_COMEVENT] (state, data) {
    state.comevents = data
  },
  [types.FETCH_COMEVENT_SHOW] (state, data) {
    state.show = data
  },
  [types.FETCH_USER_JOIN] (state, data) {
    state.user_joins = data
  },
  [types.FETCH_JOINREQS] (state, data) {
    state.userjoins = data
  },
  [types.FETCH_STUDENT_JOIN] (state, data) {
    state.student_joins = data
  },
  [types.FETCH_SHOWSTUDENT_JOIN] (state, data) {
    state.showstudent_join = data
  },
  [types.FETCH_STUCONFIRM] (state, data) {
    state.stuconfirm = data
  },
  [types.FETCH_SHOWDETAILREVIEW] (state, data) {
    state.showdetailreview = data
  },
  [types.FETCH_INTERNCONFIRM] (state, data) {
    state.internstepconfirm = data
  },
  [types.FETCH_COMJOB] (state, data) {
    state.comjob = data
  },
  [types.FETCH_STAFFS] (state, data) {
    state.staffs = data
  },
  [types.FETCH_SHOWSTAFFS] (state, data) {
    state.showstaff = data
  },
  [types.FETCH_GETCOMEVENT] (state, data) {
    state.getcomevent = data
  },

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
  async fetchinternconfirm ({ commit }) {
    try {
      const { data } = await axios.get(`/api/internconfirm`)
      commit(types.FETCH_INTERNCONFIRM,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async fetchstudentjoin ({ commit }) {
    try {
      const { data } = await axios.get(`/api/getstudent`)
      commit(types.FETCH_STUDENT_JOIN,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async fetchcomjob ({ commit }) {
    try {
      const { data } = await axios.get(`/api/getjoptype`)
      commit(types.FETCH_COMJOB,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async fetchgetcomevent ({ commit }) {
    try {
      const { data } = await axios.get(`/api/getcomevent`)
      commit(types.FETCH_GETCOMEVENT,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async fetchstaffs ({ commit }) {
    try {
      const { data } = await axios.get(`/api/comstaff`)
      commit(types.FETCH_STAFFS,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async fetchstuconfirm ({ commit }) {
    try {
      const { data } = await axios.get(`/api/studentconfirm`)
      commit(types.FETCH_STUCONFIRM,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async showjoin ({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/getstudent/${id}`)
      commit(types.FETCH_SHOWSTUDENT_JOIN,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async showstaff ({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/comstaff/${id}`)
      commit(types.FETCH_SHOWSTAFFS,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async showdetailreview ({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/detailreview/${id}`)
      commit(types.FETCH_SHOWDETAILREVIEW,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async userjoin ({ commit }) {
    try {
      const { data } = await axios.get(`/api/comevent/join`)
      commit(types.FETCH_USER_JOIN,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async joinreq ({ commit }) {
    try {
      const { data } = await axios.get(`/api/comevent/joinreq`)
      commit(types.FETCH_JOINREQS,  data )
    } catch (e) {
      console.log(e)
    }
  },
  async show ({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/comevents/${id}`)
      commit(types.FETCH_COMEVENT_SHOW,  data )
      console.log("hello")
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
  async del ({ commit }, id) {
    try {
      await axios.delete(`/api/comevents/${id}`)
    } catch (e) {
      console.log(e)
    }
  }
}
