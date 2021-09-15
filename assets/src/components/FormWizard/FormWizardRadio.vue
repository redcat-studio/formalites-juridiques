<template>
  <div class="form-wizard__radio">
    <div class="form-wizard__radio-item" v-for="item in items">
      <input
          type="radio"
          v-model="inputValue"
          :id="`${prefix}-${item.id}`"
          :value="item.value"
      >
      <label
          :for="`${prefix}-${item.id}`"
          :class="{
          'button button-primary ':true,
          'active': item.value === inputValue
        }"
      >
        {{ item.value }}
      </label>
    </div>
  </div>

</template>

<script>
export default {
  name: "FormWizardRadio",
  props: {
    items: Array,
    model: String,
    prefix: String
  },
  computed: {
    inputValue: {
      get() {
        return this.model
      },
      set(val) {
        this.$emit('input', val)
      }
    }
  }
}
</script>

<style scoped>

</style>
