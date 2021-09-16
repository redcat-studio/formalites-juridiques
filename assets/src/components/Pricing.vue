<template>
  <div class="page pricing">
    <div class="pricing__header">
      <h1 class="pricing__title">
        {{ title }}
      </h1>
    </div>
    <div class="pricing__content">
      <div class="pricing__sidebar">
        <div class="pricing__secondary-title">{{ title }}</div>
        <div class="pricing__price">{{ price }}</div>
        <router-link :to="{name: 'create-company'}" class="button button-primary">
          Commencer
        </router-link>
      </div>
      <main class="pricing__main">
        <ul class="pricing__list">
          <li v-for="service in services">
            + {{ service }}
          </li>
        </ul>
        <p class="pricing__annotation">
          <slot name="annotation"></slot>
        </p>
        <router-link :to="{name: 'create-company'}" class="button button-primary">
          Je crée mon entreprise
        </router-link>
      </main>
    </div>

  </div>
</template>

<script>
export default {
  name: "Pricing",
  props: {
    title: String,
    price: String,
    services: Array,
    annotation: String,
  }
}
</script>
