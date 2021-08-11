<template>
  <div class="form-wizard">
    <div v-if="typeof currentForm !== 'undefined'">
      <div :is="currentFormData.launcher" v-if="!isFormLaunched" @launch-form="launchForm"></div>

      <FormWizardSteps
          v-if="currentForm.step > 0 && currentForm.step <= currentFormData.steps.length"
          :steps="currentFormData.steps"
          :currentStep="currentForm.step">
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
// import CreateCompanyFormExecutives from '../CreateCompanyForm/CreateCompanyFormExecutives'
import CreateCompanyFormStatus from '../CreateCompanyForm/CreateCompanyFormStatus'

export default {
  name: "FormWizard",
  components: {
    FormWizardSteps,
    CreateCompanyFormIdentity,
    CreateCompanyFormAssociates,
    // CreateCompanyFormExecutives,
    CreateCompanyFormStatus,
  },
  data() {
    return {
      isFormFinished: false,
    }
  },
  computed: {
    ...mapGetters(['currentForm', 'currentFormData', 'companyType', 'isFormLaunched', 'forms']),
    currentStepComponent: function () {
      let step;
      if(typeof this.currentFormData !== 'undefined') {
        step = this.currentFormData.steps.find(step => step.idx === this.currentForm.step)
      }
      return typeof step !== 'undefined' ? step.component.name : undefined;
    }
  },
  methods: {
    ...mapActions(['setCurrentFormStep', 'setCompanyType', 'setIsFormLaunched', 'loadForm']),
    launchForm() {
      this.setIsFormLaunched(true);
    },
    loadFormData() {
      let formToLoad = this.forms.find(form => form.name === this.$route.name)
      if(typeof formToLoad !== 'undefined') {
        this.loadForm(formToLoad.name)
      } else {
        console.log('Couldn\' load form')
      }
    }
  },
  created() {
    this.loadFormData()
  },
  watch: {
    $route: function() {
      this.loadFormData()
    }
  }
}
</script>