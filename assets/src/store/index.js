import Vue from 'vue'
import Vuex from 'vuex'

// Modules
import company from './modules/company.js'
import createCompany from './forms/create-company.js'
import editCompany from './forms/edit-company.js'

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
      editCompany,
    ],
    currentForm: {
      id: null,
      name: undefined,
      step: 0,
      isLaunched: false,
    },
    currentFormData: {
      id: undefined,
      name: undefined,
      steps: [],
    },
  },
  mutations: {
    SET_USER_DATA(state, payload) {
      state.user.data = payload
    },
    SET_LOGGED_IN(state, payload) {
      state.user.loggedIn = payload
    },
    SET_CURRENT_FORM_NAME(state, payload) {
      state.currentForm.name = payload
    },
    SET_CURRENT_FORM_STEP(state, payload) {
      state.currentForm.step = payload
    },
    SET_CURRENT_FORM_DATA(state, payload) {
      state.currentFormData = payload
    },
    SET_IS_FORM_LAUNCHED(state, payload) {
      state.currentForm.isLaunched = payload
    },
    SET_CURRENT_FORM_IN_STORAGE(state) {
      localStorage.setItem('store', JSON.stringify({
        currentForm: state.currentForm
      }))
    }
  },
  actions: {
    setUserData(context, userData) {
      context.commit('SET_USER_DATA', userData)
    },
    setCurrentFormName(context, name) {
      context.commit('SET_CURRENT_FORM_NAME', name)
    },
    loadForm(context, name) {
      context.commit('SET_CURRENT_FORM_NAME', name)

      if (localStorage.getItem('store')) {
        let storeFormData = JSON.parse(localStorage.getItem('store'))

        if (typeof storeFormData.currentForm !== 'undefined' && storeFormData.currentForm.name === name) {
          this.replaceState(
            Object.assign(context.state, JSON.parse(localStorage.getItem('store')))
          );
        } else {
          let currentForm = {
            step: 0,
            isLaunched: false,
            name: name
          }
          localStorage.setItem('store', JSON.stringify(currentForm))
          context.state.currentForm = currentForm
        }
      }

      context.commit('SET_CURRENT_FORM_DATA', context.state.forms.find(form => form.name === name))
    },
    setCurrentFormStep(context, currentFormStep) {
      context.commit('SET_CURRENT_FORM_STEP', currentFormStep)
      context.commit('SET_CURRENT_FORM_IN_STORAGE')
    },
    setIsFormLaunched(context, isFormLaunched) {
      context.commit('SET_IS_FORM_LAUNCHED', isFormLaunched)
      context.commit('SET_CURRENT_FORM_IN_STORAGE')
    },
    setCurrentFormInStorage(context) {
      context.commit('SET_CURRENT_FORM_IN_STORAGE', context.state.currentForm)
    }
  },
  getters: {
    user(state) {
      return state.user
    },
    currentForm(state) {
      return state.currentForm
    },
    currentFormData(state) {
      return state.currentFormData
    },
    currentFormStep(state) {
      return state.currentForm.step
    },
    currentFormSteps(state) {
      return state.currentForm.steps
    },
    isFormLaunched(state) {
      return state.currentForm.isLaunched
    },
    forms(state) {
      return state.forms
    }
  },
})
export default store