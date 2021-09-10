<template>
  <div class="form-wizard-launcher">
    <h1 class="h1 form-wizard-launcher__title">Vous avez terminé</h1>
    <p class="form-wizard-launcher__subtitle">
      Il ne reste plus qu’à envoyer le résultat. Nous vous recontacterons dans quelques heures pour faire un point avec
      vous.
    </p>
    <div class="form-wizard__navigation">
      <FormWizardPreviousStepButton></FormWizardPreviousStepButton>
      <div @click="sendData" class="button button-primary">
        Envoyer les données
      </div>
    </div>
  </div>

</template>

<script>
import {mapGetters} from 'vuex'
import FormWizardNextStepButton from "../FormWizard/FormWizardNextStepButton";
import FormWizardPreviousStepButton from "../FormWizard/FormWizardPreviousStepButton";
import FormWizardResetButton from "../FormWizard/FormWizardResetButton";

export default {
  name: "CreateCompanyFormEnd",
  components: {
    FormWizardNextStepButton,
    FormWizardPreviousStepButton,
    FormWizardResetButton
  },
  methods: {
    sendData() {
      let dataToSend = this.company

      // dataToSend.executives = dataToSend.associates.executives
      // dataToSend.associates.executives = undefined

      if (dataToSend.associates.associates != null) {
        dataToSend.associates = dataToSend.associates.associates
      }

      if (dataToSend.executives.executives != null) {
        dataToSend.executives = dataToSend.executives.executives
      }

      this.$axios.post('/api/company/add', dataToSend).then((res) => {
        console.log(res)
        window.location.href = 'http://127.0.0.1:8000/payment';
      }).catch(err => {
        console.log(err)
      })
    }
  },
  computed: {
    ...mapGetters(['company', 'companyExecutives'])
  }
}
</script>