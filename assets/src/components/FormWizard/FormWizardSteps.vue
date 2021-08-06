<template>
  <div class="form-wizard-steps">
    <div :class="{'form-wizard-steps__step': true, active: currentStep === step.idx}" v-for="step in steps">
      <div class="form-wizard-steps__step-number">
        <div class="form-wizard-steps__step-number-inner">
          {{ step.idx }}
        </div>
      </div>
      <div class="form-wizard-steps__step-name">{{ step.name }}</div>
    </div>
  </div>
</template>

<script>

export default {
  name: "FormWizardSteps",
  props: {
    steps: Array,
    currentStep: Number
  },
}
</script>

<style scoped>

</style>