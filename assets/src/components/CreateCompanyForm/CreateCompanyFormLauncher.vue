<template>
  <div class="form-wizard-launcher">
    <h1 class="h1 form-wizard-launcher__title">Je choisis le <span>type de société</span> que je veux créer</h1>
    <p class="form-wizard-launcher__subtitle">Plutôt que de passer des heures à remplir des documents CERFA,
      laissez-nous
      le faire pour vous en nous fournissant quelques informations !</p>
    <div class="form-wizard-launcher__buttons">
      <div v-for="companyType in companyTypes" @click="saveTypeAndLaunch(companyType.id)"
           class="button button-small button-primary">
        {{ companyType.name }}
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
    ...mapGetters(['companyTypes', 'activeStepIndex']),
  },
  methods: {
    ...mapActions(['setCompanyType', 'setActiveStep']),
    saveTypeAndLaunch(companyTypeId) {
      let companyType = this.companyTypes.find(companyType => companyType.id === companyTypeId)

      this.setCompanyType(companyType.name)
      this.setActiveStep(this.activeStepIndex + 1);

      this.$emit('launch-form')
    }
  }
}
</script>

