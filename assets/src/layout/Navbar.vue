<template>
  <header class="navbar">
    <div class="container">
      <div class="navbar-brand">Formalités Juridiques</div>
      <nav class="navbar-nav">
        <router-link :to="{name: 'home'}" class="navbar-link">Accueil</router-link>
        <router-link :to="{name: 'home'}" class="navbar-link">Services</router-link>
        <router-link :to="{name: 'home'}" class="navbar-link">Contact</router-link>
        <router-link :to="{name: 'edit-company'}" class="navbar-link">Modifier mon entreprise</router-link>
        <router-link :to="{name: 'create-company'}" class="navbar-link button button-small button-primary">Je crée mon entreprise</router-link>
      </nav>
    </div>
  </header>
</template>

<script>
export default {
  name: "Navbar"
}
</script>

<style scoped>

</style>