<template>
  <div class="form-wizard">
    <div v-if="activeForm != null">
      <div :is="activeFormConfig.launcher" v-if="!isFormLaunched" @launch-form="launchForm"></div>

      <FormWizardSteps
          v-if="activeStepIndex > 0 && activeStepIndex <= activeFormConfig.steps.length"
          :steps="activeFormConfig.steps"
          :activeStepIndex="activeStepIndex">
      </FormWizardSteps>

      <div :is="currentStepComponent"></div>
    </div>
    <div v-else>
      Aucun formulaire n'a été lancé
    </div>
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
import FormWizardSteps from './FormWizardSteps'
import CreateCompanyFormIdentity from '../CreateCompanyForm/CreateCompanyFormIdentity'
import CreateCompanyFormAssociates from '../CreateCompanyForm/CreateCompanyFormAssociates'
import CreateCompanyFormExecutives from '../CreateCompanyForm/CreateCompanyFormExecutives'
import CreateCompanyFormStatus from '../CreateCompanyForm/CreateCompanyFormStatus'
import CreateCompanyFormEnd from '../CreateCompanyForm/CreateCompanyFormEnd'

export default {
  name: "FormWizard",
  components: {
    FormWizardSteps,
    CreateCompanyFormIdentity,
    CreateCompanyFormAssociates,
    CreateCompanyFormExecutives,
    CreateCompanyFormStatus,
    CreateCompanyFormEnd
  },
  data() {
    return {
      isFormFinished: false,
    }
  },
  computed: {
    ...mapGetters(['activeForm', 'activeStepIndex', 'activeFormConfig', 'forms', 'isFormLaunched']),
    currentStepComponent: function () {
      let step;
      if (this.activeFormConfig.steps.length > 0) {
        step = this.activeFormConfig.steps.find(step => step.idx === this.activeStepIndex)
      }
      return step != null ? step.component.name : null;
    }
  },
  methods: {
    ...mapActions(['setActiveStep', 'setIsLaunched', 'loadForm', 'storeForm']),

    launchForm() {
      this.setIsLaunched(true);
    },

    loadFormData() {
      // Check if queried form exists in store
      let formToLoad = this.forms.find(form => form.slug === this.$route.name)

      // If it exists, we load it
      if (formToLoad != null) {
        this.loadForm(formToLoad.slug)
      } else {
        console.log('Couldn\' load form : the form ' + this.$route.name + ' does not exist')
      }
    },
  },
  created() {
    // Load queried form data on component creation
    this.loadFormData()

    // Before page refresh or browser close, store active form data
    window.addEventListener('beforeunload', () => {
      this.storeForm()
    })
  },
  watch: {
    // If route changes, load the form corresponding to the new route
    $route: function () {
      this.loadFormData()
    }
  },
}
</script>