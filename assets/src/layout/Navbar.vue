<template>
  <header class="navbar">
    <div class="container">
      <div class="navbar-brand">
        <img class="navbar-logo" src="../../img/logo-black.png" alt="Logo"/>
        <div :class="{'navbar-toggler': true, 'active': isNavOpen}" @click="isNavOpen = !isNavOpen">
          <div></div>
          <div></div>
          <div></div>
        </div></div>
      <nav :class="{'navbar-nav': true, 'active': isNavOpen}">
        <router-link :to="{name: 'home'}" class="navbar-link">Accueil</router-link>
        <router-link :to="{name: 'home'}" class="navbar-link">Services</router-link>
        <router-link :to="{name: 'home'}" class="navbar-link">Contact</router-link>
<!--        <router-link :to="{name: 'edit-company'}" class="navbar-link">Modifier mon entreprise</router-link>-->
        <router-link :to="{name: 'create-company'}" class="navbar-link button button-primary">Je crée mon entreprise</router-link>
      </nav>
    </div>
  </header>
</template>

<script>
export default {
  name: "Navbar",
  data() {
    return {
      isNavOpen: false,
    }
  },
  methods: {
    toggleNav() {

    }
  }
}
</script>

<style scoped>

</style>