<template>
  <div class="view-form-wizard">
    <div class="container">
      <FormWizard></FormWizard>
    </div>
  </div>
</template>

<script>
import FormWizard from '../components/FormWizard/FormWizard';

export default {
  name: "FormWizardView",
  components: {
    FormWizard
  }
}
</script>