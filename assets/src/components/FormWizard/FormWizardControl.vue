<template>
  <div class="form-wizard__form-control">
    <slot></slot>
    <div
      v-if="showErrors"
      class="form-wizard__errors"
    >
      <div v-if="this.v.$params.required && !this.v.required" class="error">
        Ce champ est requis
      </div>

      <div v-if="this.v.$params.minLength && !this.v.minLength" class="error">
        Ce champ doit contenir au moins {{this.v.$params.minLength.min}} caractères
      </div>

      <div v-if="this.v.$params.integer && !this.v.integer" class="error">
        Ce champ ne peut contenir que des chiffres
      </div>

      <div v-if="this.v.$params.email && !this.v.email" class="error">
        Le format de cette adresse e-mail semble invalide
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "FormWizardControl",
  data() {
    return {}
  },
  computed: {
  },
  props: {
    v: Object,
    showErrors: Boolean
  }
}
</script>

<style scoped>

</style>