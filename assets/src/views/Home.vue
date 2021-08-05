<template>
  <div class="page home">
    <Hero></Hero>
    <HowItWorks></HowItWorks>
  </div>
</template>

<script>
import Hero from '../components/Home/Hero'
import HowItWorks from '../components/Home/HowItWorks'
export default {
  name: "Home",
  components: {
    Hero,
    HowItWorks
  }
}
</script>

<style scoped>

</style>