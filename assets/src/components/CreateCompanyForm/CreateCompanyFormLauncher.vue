<template>
  <div class="form-wizard-launcher">
    <h1 class="h1 form-wizard-launcher__title">Je choisis le <span>type de société</span> que je veux créer</h1>
    <p class="form-wizard-launcher__subtitle">Plutôt que de passer des heures à remplir des documents CERFA,
      laissez-nous
      le faire pour vous en nous fournissant quelques informations !</p>
    <div class="form-wizard-launcher__buttons">
      <div v-for="companyType in companyTypes" @click="saveTypeAndLaunch(companyType.id)"
           class="button button-small button-with-icon button-primary">
        {{ companyType.name }}
        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
              d="M12.1094 0.109375C18.7988 0.109375 24.2188 5.5293 24.2188 12.2188C24.2188 18.9082 18.7988 24.3281 12.1094 24.3281C5.41992 24.3281 0 18.9082 0 12.2188C0 5.5293 5.41992 0.109375 12.1094 0.109375ZM6.44531 14.3672H12.1094V17.8291C12.1094 18.3516 12.7441 18.6152 13.1104 18.2441L18.6914 12.6338C18.9209 12.4043 18.9209 12.0381 18.6914 11.8086L13.1104 6.19336C12.7393 5.82227 12.1094 6.08594 12.1094 6.6084V10.0703H6.44531C6.12305 10.0703 5.85938 10.334 5.85938 10.6562V13.7812C5.85938 14.1035 6.12305 14.3672 6.44531 14.3672Z"/>
        </svg>
      </div>
    </div>
  </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';

export default {
  name: "CreateCompanyFormLauncher",
  data() {
    return {
      selectedCompanyType: null,
    }
  },
  computed: {
    ...mapGetters(['companyTypes', 'currentForm']),
  },
  methods: {
    ...mapActions(['setCompanyType', 'setCurrentFormStep']),
    saveTypeAndLaunch(companyTypeId) {
      let companyType = this.companyTypes.find(companyType => companyType.id === companyTypeId)
      this.setCompanyType(companyType)
      this.setCurrentFormStep(this.currentForm.step + 1);
      this.$emit('launch-form')
    }
  }
}
</script>

