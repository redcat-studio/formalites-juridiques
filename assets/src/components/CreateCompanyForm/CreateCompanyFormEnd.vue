<template>
  <div>
    c'est bon j'ai fini<br/>
    <button class="button button-primary" @click="sendData">Envoyer la sauce</button>
    <div class="form-wizard__navigation">
      <FormWizardPreviousStepButton></FormWizardPreviousStepButton>
      <FormWizardNextStepButton></FormWizardNextStepButton>
      <FormWizardResetButton></FormWizardResetButton>
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

      console.log('dataToSend')
      console.log(this.company)
      dataToSend.associates = dataToSend.associates.associates
      dataToSend.executives = dataToSend.executives.executives

      this.$axios.post('/api/company/add', dataToSend).then((res) => {
        console.log('jcrois ça marche')
        console.log(res)
      }).catch(err => {
        console.log('ça marche pas du tout c super')
        console.log(err)
      })
    }
  },
  computed: {
    ...mapGetters(['company', 'companyExecutives'])
  }
}
</script>