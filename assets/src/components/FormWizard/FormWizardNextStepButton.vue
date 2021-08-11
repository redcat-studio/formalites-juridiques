<template>
  <div @click="nextStep" class="button button-primary" v-if="currentForm.step < currentFormData.steps.length">
    Étape suivante
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
  name: "FormWizardNextStepButton",
  methods: {
    ...mapActions(['setCurrentFormStep']),
    nextStep() {
      if (this.currentForm.step <= this.currentFormData.steps.length) {
        this.setCurrentFormStep(this.currentForm.step + 1);
      }
    },
  },
  computed: {
   ...mapGetters(['currentForm', 'currentFormData'])
  },
}
</script>