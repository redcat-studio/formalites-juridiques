<template>
  <section class="hero">
    <div class="hero-content">
      <h1 class="hero-title">Vos formalités juridiques d’entreprise en <span>quelques clics</span></h1>
      <p class="hero-subtitle">Plutôt que de passer des heures à remplir des documents CERFA, laissez-nous le faire pour
        vous en nous fournissant quelques informations !</p>
      <router-link :to="{name: 'create-company'}" class="button button-primary">Je crée mon entreprise
      </router-link>
    </div>
  </section>
</template>

<script>
export default {
  name: "Hero"
}
</script>

<style scoped>

</style>