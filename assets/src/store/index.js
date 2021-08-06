import Vue from 'vue'
import Vuex from 'vuex'

// Modules
import company from './modules/company.js'
import createCompany from './forms/create-company.js'

Vue.use(Vuex)
const store = new Vuex.Store({
  modules: {
    company,
  },
  state: {
    user: {
      loggedIn: false,
      data: {}
    },
    forms: [
      createCompany,
    ],
    currentForm: {
      id: null,
      name: '',
      step: 0,
    },
    currentFormData: {}
  },
  mutations: {
    SET_USER_DATA(state, payload) {
      state.user.data = payload
    },
    SET_LOGGED_IN(state, payload) {
      state.user.loggedIn = payload
    },
    SET_CURRENT_FORM_BY_NAME(state, payload) {
      state.currentForm.name = payload
    },
    SET_CURRENT_FORM_STEP(state, payload) {
      state.currentForm.step = payload
    },
  },
  actions: {
    setUserData(context, userData) {
      context.commit('SET_USER_DATA', userData)
    },
    setCurrentFormByName(context, name) {
      context.commit('SET_CURRENT_FORM_BY_NAME', name)
    },
    setCurrentFormStep(context, currentFormStep) {
      context.commit('SET_CURRENT_FORM_STEP', currentFormStep)
    },
  },
  getters: {
    user(state) {
      return state.user
    },
    currentForm(state) {
      return state.currentForm
    },
    currentFormData(state) {
      return state.forms.find(form => form.name === state.currentForm.name)
    },
    currentFormStep(state) {
      return state.currentForm.step
    },
    currentFormSteps(state) {
      return state.currentForm.steps
    }
  }
})

export default store