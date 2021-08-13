<template>
  <div @click="nextStep" class="button button-primary" v-if="activeStepIndex < activeFormConfig.steps.length">
    Étape suivante
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
  name: "FormWizardNextStepButton",
  methods: {
    ...mapActions(['setActiveStep']),
    nextStep() {
      if (this.activeStepIndex <= this.activeFormConfig.steps.length) {
        this.setActiveStep(this.activeStepIndex + 1);
        this.$scrollToTop()
      }
    },
  },
  computed: {
   ...mapGetters(['activeFormConfig', 'activeStepIndex'])
  },
}
</script>