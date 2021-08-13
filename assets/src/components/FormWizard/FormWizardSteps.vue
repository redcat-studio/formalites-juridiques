<template>
  <div class="form-wizard-steps">
    <div class="form-wizard-steps__content">
      <div v-for="step in steps" :class="{'form-wizard-steps__step': true, active: activeStepIndex >= step.idx}" >
        <div class="form-wizard-steps__step-number">
          <div class="form-wizard-steps__step-number-inner">
            {{ step.idx }}
          </div>
        </div>
        <div class="form-wizard-steps__step-name">{{ step.name }}</div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "FormWizardSteps",
  props: {
    steps: Array,
    activeStepIndex: Number
  },

}
</script>