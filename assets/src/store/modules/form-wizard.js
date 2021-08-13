import createCompany from "../forms/create-company";
import editCompany from "../forms/edit-company";

export default {
  state: {
    activeForm: {
      slug: null,
      isLoaded: false,
      activeStepIndex: 0,
      isLaunched: false,
      progression: {},
    },
    activeFormConfig: {
      slug: null,
      steps: [],
      launcher: undefined
    },
    forms: [
      createCompany,
      editCompany,
    ],
  },
  mutations: {
    SET_ACTIVE_FORM(state, payload) {
      state.activeForm = payload
    },
    SET_ACTIVE_FORM_SLUG(state, payload) {
      state.activeForm.slug = payload
    },
    SET_ACTIVE_FORM_CONFIG(state, payload) {
      state.activeFormConfig = payload
    },
    SET_IS_LAUNCHED(state, payload) {
      state.activeForm.isLaunched = payload
    },
    SET_IS_LOADED(state, payload) {
      state.activeForm.isLoaded = payload
    },
    SET_ACTIVE_STEP(state, payload) {
      state.activeForm.activeStepIndex = payload
    },
    UPDATE_PROGRESSION(state, payload) {
      state.activeForm.progression[state.activeForm.activeStepIndex] = payload
    },
  },
  actions: {
    loadForm(context, slug) {

      /*
        Get saved data from localStorage if it exists
       */
      let storedData = localStorage.getItem('lastActiveForm')
      let isStoreDataValid = false

      if (storedData !== null) {
        let data = JSON.parse(localStorage.getItem('lastActiveForm'))

        // If localStorage form is the form we want to load
        if (data.slug === slug) {
          context.commit('SET_ACTIVE_FORM', data)
          isStoreDataValid = true
        }
      }

      if (!isStoreDataValid) {
        context.commit('SET_ACTIVE_FORM_SLUG', slug)
      }

      /*
       Set form config
       */
      context.commit('SET_ACTIVE_FORM_CONFIG', context.state.forms.find(form => form.slug === slug))
    },
    storeForm(context) {
      localStorage.setItem('lastActiveForm', JSON.stringify(context.state.activeForm))
    },
    setActiveStep(context, currentFormStep) {
      context.commit('SET_ACTIVE_STEP', currentFormStep)
      context.dispatch('storeForm')
    },
    setIsLaunched(context, isFormLaunched) {
      context.commit('SET_IS_LAUNCHED', isFormLaunched)
      context.dispatch('storeForm')
    },
    resetActiveForm(context) {
      context.commit('SET_IS_LAUNCHED', false)
      context.commit('SET_ACTIVE_STEP', 0)
    },

    updateProgression(context, progression) {
      context.commit('UPDATE_PROGRESSION', progression)
    }
  },
  getters: {
    activeForm(state) {
      return state.activeForm
    },
    activeFormConfig(state) {
      return state.activeFormConfig
    },
    activeStepIndex(state) {
      return state.activeForm.activeStepIndex
    },
    activeFormSteps(state) {
      return state.activeFormConfig.steps
    },
    isFormLaunched(state) {
      return state.activeForm.isLaunched
    },
    forms(state) {
      return state.forms
    },
    formProgression(state) {
      return state.activeForm.progression
    },
  }
}