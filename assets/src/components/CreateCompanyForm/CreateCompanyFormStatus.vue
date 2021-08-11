<template>
  <div>
    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">Fixation du siège</h2>
      <p class="form-wizard__group-subtitle">Le siège sera installé : </p>
      <div class="form-wizard__row">
        <div v-for="type in head_office_location_types"
             :class="{'button button-beige':true, 'active': type.id===formData.head_office_type}"
             @click="setHeadOfficeLocation(type.id)">
          {{ type.value }}
        </div>
      </div>
    </div>

    <div v-if="formData.head_office_type === 1" class="form-wizard__group">
      <div class="form-wizard__row">
        <input v-model="formData.domiciliation_company_name" type="text"
               placeholder="Nom de la société de domiciliation">
        <input v-model="formData.domiciliation_company_siren" type="text"
               placeholder="Numéro SIREN de la société de domiciliation">
      </div>
    </div>

    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">Objet social</h2>
      <textarea class="u-full-width" v-model="formData.company_purpose"
                placeholder="Veuillez décrire l’objet social de la société" rows="3"></textarea>
    </div>

    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">Capital social</h2>
      <div class="form-wizard__row">
        <select class="u-full-width" v-model="formData.social_capital_type">
          <option value="" disabled>Capital fixe ou capital variable ?</option>
          <option value="Capital fixe">Capital fixe</option>
          <option value="Capital variable">Capital variable</option>
          <option value="Capital partiellement libéré">Capital partiellement libéré</option>
        </select>
      </div>

      <div class="form-wizard__row" v-if="formData.social_capital_type === 'Capital fixe'">
        <input v-model="formData.social_capital_amount" type="text" placeholder="Montant du capital social">
      </div>

      <div class="form-wizard__row" v-if="formData.social_capital_type === 'Capital variable'">
        <input v-model="formData.social_capital_min" type="text" placeholder="Capital minimum">
        <input v-model="formData.social_capital_max" type="text" placeholder="Capital maximum">
      </div>

      <div class="form-wizard__row" v-if="formData.social_capital_type === 'Capital partiellement libéré'">
        <input v-model="formData.capital_release_rate" type="text"
               placeholder="Taux de libération du capital à la constitution">
        <input v-model="formData.capital_released_amount" type="text" placeholder="Montant libéré à la constitution">
      </div>
    </div>

    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">Dépôt du capital social</h2>
      <div class="form-wizard__row">
        <input v-model="formData.capital_deposit_date" type="date" placeholder="Date de dépôt du capital social">
      </div>
      <p class="form-wizard__group-inner-subtitle mt-5">Le siège sera installé : </p>
      <div class="form-wizard__row">
        <div v-for="type in capital_deposit_types"
             :class="{'button button-beige':true, 'active': type.value === formData.capital_deposit_type}"
             @click="setCapitalDepositType(type.value)">
          {{ type.value }}
        </div>
      </div>
    </div>
    <div class="form-wizard__group" v-if="formData.capital_deposit_type === 'Dans une banque'">
      <div class="form-wizard__row">
        <input v-model="formData.deposit_bank_name" type="text" placeholder="Nom de la banque">
        <input v-model="formData.deposit_bank_address" type="text" placeholder="Adresse de la banque">
      </div>
      <div class="form-wizard__row">
        <input v-model="formData.deposit_bank_zipcode" type="text" placeholder="Code postal">
        <input v-model="formData.deposit_bank_city" type="text" placeholder="Ville">
      </div>
    </div>

    <div class="form-wizard__group" v-if="formData.capital_deposit_type === 'Dans une étude notariale'">
      <div class="form-wizard__row">
        <input v-model="formData.notary_study_name" type="text" placeholder="Nom de l’étude notariale">
        <input v-model="formData.notary_study_address" type="text" placeholder="Adresse de l’étude notariale">
      </div>
      <div class="form-wizard__row">
        <input v-model="formData.notary_study_zipcode" type="text" placeholder="Code postal">
        <input v-model="formData.notary_study_city" type="text" placeholder="Ville">
      </div>
    </div>

    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">L'exercice social</h2>
      <div class="form-wizard__row">
        <select class="u-full-width" v-model="formData.normal_company_exercice_closure_date">
          <option value="" disabled>Date de clôture d’un exercice social normal</option>
          <option v-for="date in normal_exercice_closure_dates" value="date.value">{{ date.text }}</option>
        </select>
        <select class="u-full-width" v-model="formData.first_company_exercice_closure_date">
          <option value="" disabled>Date de clôture du premier exercice social</option>
          <option v-for="date in first_exercice_closure_dates" value="date.value">{{ date.text }}</option>
        </select>
      </div>
    </div>

    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">Distinctions commerciales</h2>
      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
          <span @click="addAcronym = !addAcronym" :class="{'active': addAcronym === true}"></span>
          Ajouter un sigle ?
        </div>
        <input v-if="addAcronym" v-model="formData.business_acronym" class="u-full-width" type="text"
               placeholder="Sigle">
      </div>
      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
          <span @click="addCommercialName = !addCommercialName"
                :class="{'active': addCommercialName === true}">
          </span>
          Ajouter un nom commercial ?
        </div>
        <input class="u-full-width" type="text" placeholder="Nom commercial"
               v-if="addCommercialName"
               v-model="formData.business_commercial_name"/>
      </div>
      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
          <span @click="addDomainName = !addDomainName"
                :class="{'active': addDomainName === true}">
          </span>
          Ajouter un nom de domaine ?
        </div>
        <input class="u-full-width" type="text" placeholder="Nom de domaine"
               v-if="addDomainName"
               v-model="formData.business_domain_name">
      </div>
      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
          <span @click="addBusinessSign = !addBusinessSign" :class="{'active': addBusinessSign === true}"></span>
          Ajouter une enseigne ?
        </div>
        <input v-if="addBusinessSign" v-model="formData.business_sign" class="u-full-width" type="text"
               placeholder="Enseigne (de l'établissement principal)">
      </div>
    </div>

    <div class="form-wizard__navigation" @click="validateData">
      <FormWizardPreviousStepButton></FormWizardPreviousStepButton>
      <FormWizardNextStepButton></FormWizardNextStepButton>
    </div>
  </div>
</template>

<script>
import FormWizardNextStepButton from '../FormWizard/FormWizardNextStepButton'
import FormWizardPreviousStepButton from '../FormWizard/FormWizardPreviousStepButton'
import {mapActions} from "vuex";

export default {
  name: "CreateCompanyFormStatus",
  components: {
    FormWizardNextStepButton,
    FormWizardPreviousStepButton
  },
  data() {
    return {
      formData: {
        head_office_type: '',
        domiciliation_company_name: '',
        domiciliation_company_siren: '',
        company_purpose: '',
        social_capital_type: '',
        social_capital_amount: 0,
        social_capital_min: '',
        social_capital_max: '',
        capital_release_rate: '',
        capital_released_amount: '',
        capital_deposit_date: '',
        capital_deposit_type: '',
        deposit_bank_name: '',
        deposit_bank_address: '',
        deposit_bank_zipcode: '',
        deposit_bank_city: '',
        notary_study_name: '',
        notary_study_address: '',
        notary_study_zipcode: '',
        notary_study_city: '',
        normal_company_exercice_closure_date: '',
        first_company_exercice_closure_date: '',
        business_acronym: '',
        business_commercial_name: '',
        business_domain_name: '',
        business_sign: '',
      },
      capital_deposit_types: [
        {
          id: 0,
          value: 'Dans une banque'
        },
        {
          id: 1,
          value: 'À la Caisse des Dépôts et Consignation'
        },
        {
          id: 2,
          value: 'Dans une étude notariale'
        },
        {
          id: 3,
          value: 'Dans une banque partenaire'
        },
      ],
      head_office_location_types: [
        {
          id: 0,
          value: 'Dans un local commercial'
        },
        {
          id: 1,
          value: 'Dans une société de domiciliation'
        },
        {
          id: 2,
          value: 'Au domicile du dirigeant'
        },
      ],
      addAcronym: false,
      addCommercialName: false,
      addDomainName: false,
      addBusinessSign: false
    }
  },
  methods: {
    ...mapActions(['setCompanyStatus']),
    setHeadOfficeLocation(id) {
      this.formData.head_office_type = id
    },
    setCapitalDepositType(value) {
      this.formData.capital_deposit_type = value
    },
    validateData() {
      this.submitted = true
      this.setCompanyStatus(this.formData)
    }
  },
  computed: {
    normal_exercice_closure_dates: function () {
      let closureDates = []

      let currentYear = new Date().getFullYear()
      const options = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};

      for (let i = 0; i < 11; i++) {
        closureDates.push({
          text: new Date(currentYear, i + 1, 0).toLocaleDateString('fr-FR', options),
          value: new Date(currentYear, i + 1, 0).toLocaleDateString('fr-FR')
        })
      }

      return closureDates;
    },
    first_exercice_closure_dates: function () {
      let currentYear = new Date().getFullYear()
      let precedentYear = currentYear - 1

      return [
        {
          text: 'En ' + currentYear + ' (exercice court)',
          value: currentYear
        },
        {
          text: 'En ' + precedentYear + ' (exercice long)',
          value: precedentYear
        }
      ]
    },
  }
}
</script>

<style scoped>

</style>