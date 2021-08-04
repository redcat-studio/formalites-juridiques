<template>
  <header class="navbar">
    <div class="navbar-brand">Formalités Juridiques</div>
    <nav class="navbar-nav">
      <router-link :to="{name: 'home'}" class="navbar-link">Accueil</router-link>
    </nav>
  </header>
</template>

<script>
export default {
  name: "Navbar"
}
</script>

<style scoped>

</style>