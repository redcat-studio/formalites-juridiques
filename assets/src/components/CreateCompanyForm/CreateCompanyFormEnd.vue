<template>
  <div>
    c'est bon j'ai fini<br/>
    <button class="button button-primary" @click="sendData">Valide</button>
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
      if(dataToSend.associates.associates != null) {
        dataToSend.associates = dataToSend.associates.associates
      }
      if(dataToSend.executives.executives != null) {
        dataToSend.executives = dataToSend.executives.executives
      }

      this.$axios.post('/api/company/add', dataToSend).then((res) => {
        console.log(res)
         window.location.href ='http://127.0.0.1:8000/payment';
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