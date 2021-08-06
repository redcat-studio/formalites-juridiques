<template>
  <div class="form-wizard">
    <div v-if="typeof currentForm !== 'undefined'">
      <FormWizardLauncher v-if="!isFormLaunched" @launch-form="launchForm"></FormWizardLauncher>

      <FormWizardSteps
          v-if="currentForm.step > 0 && currentForm.step < currentFormData.steps.length"
          :steps="currentFormData.steps"
          :currentStep="currentForm.step">
      </FormWizardSteps>
      <div :is="currentStepComponent"></div>
      <div style="margin-top: 3rem; display: flex; justify-content: center; align-items: center; column-gap: 1.5rem;">
        <div @click="previousStep" class="button button-primary">
          Étape précédente
        </div>
        <div @click="nextStep" class="button button-primary">
          Étape suivante
        </div>
      </div>
    </div>
    <div v-else>
      Aucun formulaire n'a été lancé
    </div>
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
import FormWizardLauncher from './FormWizardLauncher'
import FormWizardSteps from './FormWizardSteps'
import CreateCompanyFormIdentity from '../CreateCompanyForm/CreateCompanyFormIdentity'
// import CreateCompanyFormAssociates from '../components/CreateCompanyForm/CreateCompanyFormAssociates'
// import CreateCompanyFormExecutives from '../components/CreateCompanyForm/CreateCompanyFormExecutives'
// import CreateCompanyFormStatus from '../components/CreateCompanyForm/CreateCompanyFormStatus'

export default {
  name: "FormWizard",
  components: {
    FormWizardLauncher,
    FormWizardSteps,
    CreateCompanyFormIdentity
    // CreateCompanyFormAssociates
    // CreateCompanyFormExecutives
    // CreateCompanyFormStatus
  },
  data() {
    return {
      isFormLaunched: false,
      isFormFinished: false
    }
  },
  computed: {
    ...mapGetters(['currentForm', 'currentFormData', 'companyType']),
    currentStepComponent: function () {
      let step = this.currentFormData.steps.find(step => step.idx === this.currentForm.step)
      return typeof step !== 'undefined' ? step.component.name : undefined;
    }
  },
  methods: {
    ...mapActions(['setCurrentFormStep', 'setCompanyType']),
    nextStep() {
      // TODO : remove this after tests are over
      if(this.companyType.id === null) {
        this.setCompanyType({id: 0, name: 'EURL'})
      }

      if (this.currentForm.step + 1 <= this.currentFormData.steps.length) {
        this.setCurrentFormStep(this.currentForm.step + 1);
      }
    },
    previousStep() {
      if (this.currentForm.step - 1 >= 0) {
        this.setCurrentFormStep(this.currentForm.step - 1);

        if(this.currentForm.step === 0) {
          this.isFormLaunched = false
        }
      }
    },
    launchForm() {
      this.isFormLaunched = true;
      this.nextStep();
    }
  },
}
</script>

<style scoped>

</style>