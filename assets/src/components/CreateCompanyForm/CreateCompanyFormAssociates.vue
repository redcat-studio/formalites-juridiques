<template>
  <div>
    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">L'associé de la société</h2>
      <p class="form-wizard__group-subtitle">L'associé est une personne :</p>
      <select v-model="currAssociate.associate_type" class="u-full-width">
        <option value="Physique">Physique</option>
        <option value="Morale">Morale</option>
      </select>
    </div>

    <div class="form-wizard__group" v-if="currAssociate.associate_type === 'Physique'">
      <h2 class="form-wizard__group-title">Associé personne physique</h2>
      <p class="form-wizard__group-inner-subtitle">Informations principales </p>
      <div class="form-wizard__row">
        <select v-model="currAssociate.individual_genre" class="u-full-width">
          <option value="Genre" disabled>Genre</option>
          <option value="Masculin">Masculin</option>
          <option value="Féminin">Féminin</option>
        </select>
        <input v-model="currAssociate.individual_firstname" type="text" class="u-full-width" placeholder="Prénom">
        <input v-model="currAssociate.individual_lastname" type="text" class="u-full-width" placeholder="Nom">
      </div>

      <p class="form-wizard__group-inner-subtitle">Date de naissance de l'associé</p>
      <input v-model="currAssociate.individual_birthdate" type="date" class="u-full-width"
             placeholder="Date de naissance">

      <p class="form-wizard__group-inner-subtitle">Informations complémentaires</p>
      <div class="form-wizard__row">
        <input v-model="currAssociate.individual_birth_city" type="text" class="u-full-width"
               placeholder="Ville de naissance">
        <input v-model="currAssociate.individual_nationality" type="text" class="u-full-width"
               placeholder="Nationalité">
      </div>

      <div class="form-wizard__row">
        <input v-model="currAssociate.individual_address" type="text" class="u-full-width" placeholder="Adresse">
        <input v-model="currAssociate.individual_zipcode" type="text" class="u-full-width" placeholder="Code postal">
        <input v-model="currAssociate.individual_city" type="text" class="u-full-width" placeholder="Ville">
      </div>

      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
          <span
              @click="currAssociate.individual_is_married_under_community_of_property = !currAssociate.individual_is_married_under_community_of_property"
              :class="{'active': currAssociate.individual_is_married_under_community_of_property === true}">
          </span>
          Est-ce que l'associé est marié sous la communauté de biens ?
        </div>
      </div>

      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
          <span @click="addCommercialName = !addCommercialName"
                :class="{'active': addCommercialName === true}"></span>
          Cet associé a-t-il a effectué un apport en numéraire ?
        </div>
        <input v-if="addCommercialName" v-model="currAssociate.individual_did_contributed_cash"
               class="u-full-width" type="text"
               placeholder="Montant de l'apport effectué">
      </div>

      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
        <span @click="addDomainName = !addDomainName"
              :class="{'active': addDomainName === true}"></span>
          Ajouter un nom de domaine ?
        </div>
        <input class="u-full-width" type="text"
               v-if="addDomainName"
               v-model="currAssociate.business_domain_name"
               placeholder="Nom de domaine">
      </div>

      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
          <span @click="addBusinessSign = !addBusinessSign" :class="{'active': addBusinessSign === true}"></span>
          Ajouter une enseigne ?
        </div>
        <input v-if="addBusinessSign" v-model="currAssociate.business_sign" class="u-full-width" type="text"
               placeholder="Enseigne (de l'établissement principal)">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CreateCompanyFormAssociates",
  data() {
    return {
      formData: {
        executives: [],
        associates: []
      },
      currAssociate: {
        associate_type: 'Physique',
        individual_genre: 'Genre',
        individual_firstname: '',
        individual_lastname: '',
        individual_birthdate: '',
        individual_birth_city: '',
        individual_nationality: '',
        individual_address: '',
        individual_zipcode: '',
        individual_city: '',
        individual_is_married_under_community_of_property: false,
        individual_did_contributed_cash: false,
        individual_did_contributed_in_kind: [],
        legal_company_name: '',
        legal_company_rcs_number: 0,
        legal_company_headquarters_address: '',
        legal_company_zipcode: 0,
        legal_company_city: '',
        legal_company_city_of_registry: '',
        legal_company_social_capital: 0,
        legal_company_social_form: '',
        legal_representative_firstname: '',
        legal_representative_lastname: '',
        legal_representative_genre: '',
        legal_representative_role: '',
        subject_to_what_income_tax: '',
        subject_to_what_real_tax: '',
        vat_system: ''
      },
      currExecutive: {
        executive_title: '',
        executive_firstname: '',
        executive_lastname: '',
        executive_birthdate: '',
        executive_birth_city: '',
        executive_nationality: '',
        executive_address: '',
        executive_zipcode: '',
        executive_city: '',
        executive_mother_firstname_and_maiden_name: '',
        executive_father_name: '',
        executive_email: '',
        executive_company_name: '',
        executive_company_rcs_number: '',
        executive_company_headquarters_address: '',
        executive_company_zipcode: '',
        executive_company_city: '',
        executive_company_rcs: '',
        executive_company_representative_name: '',
      },
      isMarried: false,
      addCommercialName: false,
      addDomainName: false,
      addBusinessSign: false,
    }
  }
}
</script>

<style scoped>

</style>