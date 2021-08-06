<template>
  <div class="create-company-form-identity">
    Étape 1 : Identité de l'entreprise
    <br/>{{companyType}}
  </div>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
  name: "CreateCompanyFormIdentity",
  computed: {
    ...mapGetters(['companyType'])
  },
}
</script>