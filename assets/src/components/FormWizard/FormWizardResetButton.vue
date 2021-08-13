<template>
  <div @click="resetCurrentForm" class="button button-primary">
    Réinitialiser le formulaire
  </div>
</template>

<script>
import {mapActions} from 'vuex'

export default {
  name: "FormWizardResetButton",
  methods: {
    ...mapActions(['resetCurrentForm']),
  },
}
</script>