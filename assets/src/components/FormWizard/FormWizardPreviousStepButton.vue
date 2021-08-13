<template>
  <div @click="previousStep" class="button button-primary" v-if="activeStepIndex > 1">
    Étape précédente
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
  name: "FormWizardPreviousStepButton",
  methods: {
    ...mapActions(['setActiveStep']),
    previousStep() {
      if (this.activeStepIndex - 1 >= 0) {
        this.setActiveStep(this.activeStepIndex - 1);
        this.$scrollToTop()
      }
    },
  },
  computed: {
   ...mapGetters(['activeStepIndex'])
  },
}
</script>