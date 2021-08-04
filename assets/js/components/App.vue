<template>
  <div>
    <h2 class="center">Formalités Juridiques</h2>
    {{ message }}
    <ul>
      <li :key="word.id" v-for="word in words">{{ word }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: "A list of words",
      words: []
    };
  },
  mounted() {

  }
};
</script>

<style>
.center {
  text-align: center;
}
</style>