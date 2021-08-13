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
      this.$axios.post('/api/company/add', this.company).then((res) => {
        console.log('jcrois ça marche')
        console.log(res)
      })
    }
  },
  computed: {
    ...mapGetters(['company'])
  }
}
</script>