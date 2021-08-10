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
    company: {
      identity: {
        name: '',
        head_office_address: '',
        zipcode: '',
        city: '',
        rcs_city: '',
        phone: '',
        email: '',
      },
      status: {
        head_office_type: '',
        domiciliation_company_name: '',
        domiciliation_company_siren: '',
        company_purpose: '',
        social_capital_type: '',
        social_capital_amount: 0,
        social_capital_min: '',
        social_capital_max: '',
        capital_release_rate: '',
        capital_released_amount: '',
        capital_deposit_date: '',
        capital_deposit_type: '',
        deposit_bank_name: '',
        deposit_bank_address: '',
        deposit_bank_zipcode: '',
        deposit_bank_city: '',
        notary_study_name: '',
        notary_study_address: '',
        notary_study_zipcode: '',
        notary_study_city: '',
        normal_company_exercice_closure_date: '',
        first_company_exercice_closure_data: '',
        business_acronym: '',
        business_commercial_name: '',
        business_domain_name: '',
        business_sign: '',
      },
      executives: [
        {
          executive_title: '',
          executive_firstname: '',
          executive_lastname: '',
          executive_birthdate: '',
          executive_birth_city: '',
          executive_nationality: '',
          executive_address: '',
          executive_zipcode: '',
          executive_city: '',
          executive_mother_firstname_and_maiden_name: '',
          executive_father_name: '',
          executive_email: '',
          executive_company_name: '',
          executive_company_rcs_number: '',
          executive_company_headquarters_address: '',
          executive_company_zipcode: '',
          executive_company_city: '',
          executive_company_rcs: '',
          executive_company_representative_name: '',
        }
      ],
      associates: [
        {
          associate_type: '',
          individual_genre: '',
          individual_firstname: '',
          individual_lastname: '',
          individual_birthdate: '',
          individual_birth_city: '',
          individual_nationality: '',
          individual_address: '',
          individual_zipcode: '',
          individual_city: '',
          individual_is_married_under_community_of_property: false,
          individual_did_contributed_cash: false,
          individual_did_contributed_in_kind: [
            true,
            ['', ''], // Nature puis montant de la contribution en nature
            ['', '']
          ],
          legal_company_name: '',
          legal_company_rcs_number: 0,
          legal_company_headquarters_address: '',
          legal_company_zipcode: 0,
          legal_company_city: '',
          legal_company_city_of_registry: '',
          legal_company_social_capital: 0,
          legal_company_social_form: '',
          legal_representative_firstname: '',
          legal_representative_lastname: '',
          legal_representative_genre: '',
          legal_representative_role: '',
          subject_to_what_income_tax: '',
          subject_to_what_real_tax: '',
          vat_system: ''
        }
      ]
    }
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