import Vue from 'vue'
import Vuex from 'vuex'

// Modules
import company from './modules/company.js'
import formWizard from './modules/form-wizard.js'

Vue.use(Vuex)
const store = new Vuex.Store({
  modules: {
    company,
    formWizard
  },
  state: {},
  mutations: {},
  actions: {},
  getters: {},
  methods: {}
})
export default store