<template>
  <div class="form-wizard__group">
    <h2 v-if="title" class="form-wizard__group-title">{{ title }}</h2>
    <p v-if="subtitle" class="form-wizard__group-subtitle">{{ subtitle }}</p>
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: "FormWizardGroup",
  props: {
    title: String,
    subtitle: String
  }
}
</script>

<style scoped>

</style>