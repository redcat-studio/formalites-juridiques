<template>
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="three columns">
          <div class="footer__brand">
            <img class="footer__logo" :src="require('@img/logo-red-test.png')" alt="Logo de Formalités Juridiques">
            <p>
              <strong>7h-20h du lundi au samedi</strong><br/>
              Créez votre société en ligne ou par téléphone en 5 minutes !
            </p>
          </div>

        </div>
        <div class="three columns">
          <h3 class="footer__title">Contact</h3>
          <div class="footer__contact-item">
            <strong>Téléphone</strong>
            06 06 06 06 06
          </div>
          <div class="footer__contact-item">
            <strong>Adresse e-mail</strong>
            formalites-juridiques@outlook.com
          </div>
        </div>
        <div class="three columns">
          <h3 class="footer__title">Informations</h3>
          <ul class="footer__list">
            <li>
              <router-link to="/">Mentions Légales</router-link>
            </li>
            <li>
              <router-link to="/">Conditions Générales d'Utilisation</router-link>
            </li>
            <li>
              <router-link to="/">Charte de protection des données personnelles</router-link>
            </li>
          </ul>
        </div>
        <div class="three columns">
          <h3 class="footer__title">Liens rapides</h3>
          <ul class="footer__list">
            <li>
              <router-link to="/">Accueil</router-link>
            </li>
            <li>
              <router-link to="/">Contact</router-link>
            </li>
            <li>
              <router-link to="/">Notre équipe</router-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      © 2021 Formalités Juridiques | Redcat Studio
    </div>
  </div>
</template>

<script>
export default {
  name: "Footer"
}
</script>
