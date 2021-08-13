import Vue from 'vue'
import Vuex from 'vuex'

// Modules
import formWizard from './modules/form-wizard.js'
import company from "./modules/company";

Vue.use(Vuex)
const store = new Vuex.Store({
  modules: {
    formWizard,
    company
  },
  state: {},
  mutations: {},
  actions: {},
  getters: {},
  methods: {}
})
export default store