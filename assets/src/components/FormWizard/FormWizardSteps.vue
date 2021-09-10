<template>
  <div class="form-wizard-steps">
    <div class="form-wizard-steps__content">
      <div v-for="step in steps"
           :class="{'form-wizard-steps__step': true,
           'active': activeStepIndex >= step.idx}"
      >
        <div :class="{'form-wizard-steps__step-number': true, 'clickable': step.idx < steps.length }"
            @click="setStep(step.idx)">
          <div class="form-wizard-steps__step-number-inner">{{ step.idx }}</div>
        </div>
        <div class="form-wizard-steps__step-name">{{ step.name }}</div>
      </div>
    </div>
  </div>
</template>

<script>
import {mapActions} from 'vuex'
export default {
  name: "FormWizardSteps",
  props: {
    steps: Array,
    activeStepIndex: Number
  },
  methods: {
    ...mapActions(['setActiveStep']),
    setStep(step) {
      if(step < this.steps.length) {
        this.setActiveStep(step)
      }
    }
  }

}
</script>