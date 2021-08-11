<template>
  <div @click="previousStep" class="button button-primary" v-if="currentForm.step > 1">
    Étape précédente
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
  name: "FormWizardPreviousStepButton",
  methods: {
    ...mapActions(['setCurrentFormStep']),
    previousStep() {
      if (this.currentForm.step - 1 >= 0) {
        this.setCurrentFormStep(this.currentForm.step - 1);
      }
    },
  },
  computed: {
   ...mapGetters(['currentForm', 'currentFormData'])
  },
}
</script>