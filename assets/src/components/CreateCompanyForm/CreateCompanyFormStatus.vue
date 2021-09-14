<template>
  <div>
    <FormWizardGroup
        title="Dénomination sociale"
        subtitle="Le siège sera installé :"
    >
      <div class="form-wizard__row">
        <FormWizardRadio
            :model="$v.formData.head_office_type.$model"
            @input="$v.formData.head_office_type.$model = $event"
            :items="officeTypes"
            prefix="type"
        >
        </FormWizardRadio>
      </div>
    </FormWizardGroup>

    <FormWizardGroup v-if="formData.head_office_type === 'Dans une société de domiciliation'">
      <div class="form-wizard__row">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.domiciliation_company_name">
          <input
              v-model="$v.formData.domiciliation_company_name.$model"
              type="text"
              placeholder="Nom de la société de domiciliation"
          >
        </FormWizardControl>
        <FormWizardControl :showErrors="submitted" :v="$v.formData.domiciliation_company_siren">
          <input
              v-model="$v.formData.domiciliation_company_siren.$model"
              type="text"
              placeholder="Numéro SIREN de la société de domiciliation"
          >
        </FormWizardControl>
      </div>
    </FormWizardGroup>

    <FormWizardGroup title="Objet social">
      <FormWizardControl :showErrors="submitted" :v="$v.formData.company_purpose">
        <textarea
            v-model="$v.formData.company_purpose.$model"
            placeholder="Veuillez décrire l’objet social de la société"
            rows="3">
        </textarea>
      </FormWizardControl>
    </FormWizardGroup>

    <FormWizardGroup title="Capital social">
      <div class="form-wizard__row">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.social_capital_type">
          <select v-model="$v.formData.social_capital_type.$model">
            <option value="" disabled>Capital fixe ou capital variable ?</option>
            <option value="Capital fixe">Capital fixe</option>
            <option value="Capital variable">Capital variable</option>
            <option value="Capital partiellement libéré">Capital partiellement libéré</option>
          </select>
        </FormWizardControl>
      </div>

      <div class="form-wizard__row" v-if="formData.social_capital_type === 'Capital fixe'">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.social_capital_amount">
          <input
              v-model="$v.formData.social_capital_amount.$model"
              type="text"
              placeholder="Montant du capital social"
          >
        </FormWizardControl>
      </div>

      <div class="form-wizard__row" v-if="formData.social_capital_type === 'Capital variable'">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.social_capital_min">
          <input
              v-model="$v.formData.social_capital_min.$model"
              type="number"
              placeholder="Capital minimum"
          >
        </FormWizardControl>
        <FormWizardControl :showErrors="submitted" :v="$v.formData.social_capital_max">
          <input
              v-model="$v.formData.social_capital_max.$model"
              type="number"
              placeholder="Capital maximum"
          >
        </FormWizardControl>
      </div>

      <div class="form-wizard__row" v-if="formData.social_capital_type === 'Capital partiellement libéré'">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.capital_release_rate">
          <input
              v-model="$v.formData.capital_release_rate.$model"
              type="number"
              placeholder="Taux de libération du capital à la constitution"
          >
        </FormWizardControl>
        <FormWizardControl :showErrors="submitted" :v="$v.formData.capital_released_amount">
          <input
              v-model="$v.formData.capital_released_amount.$model"
              type="number"
              placeholder="Montant libéré à la constitution">
        </FormWizardControl>
      </div>
    </FormWizardGroup>

    <FormWizardGroup title="Dépôt du capital social">
      <div class="form-wizard__row">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.capital_deposit_date">
          <input
              v-model="$v.formData.capital_deposit_date.$model"
              type="date"
              placeholder="Date de dépôt du capital social"
          >
        </FormWizardControl>
      </div>

      <p class="form-wizard__group-inner-subtitle">Le capital social sera déposé : </p>
      <FormWizardRadio
          :model="$v.formData.capital_deposit_type.$model"
          @input="$v.formData.capital_deposit_type.$model = $event"
          :items="capital_deposit_types"
          prefix="deposit"
      >
      </FormWizardRadio>
    </FormWizardGroup>

    <FormWizardGroup
        v-if="formData.capital_deposit_type === 'Dans une banque'"
        title="Dépôt du capital social"
    >
      <div class="form-wizard__row">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.deposit_bank_name">
          <input
              v-model="$v.formData.deposit_bank_name.$model"
              type="text"
              placeholder="Nom de la banque"
          >
        </FormWizardControl>
        <FormWizardControl :showErrors="submitted" :v="$v.formData.deposit_bank_address">
          <input
              v-model="$v.formData.deposit_bank_address.$model"
              type="text"
              placeholder="Adresse de la banque"
          >
        </FormWizardControl>
      </div>
      <div class="form-wizard__row">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.deposit_bank_zipcode">
          <input
              v-model="$v.formData.deposit_bank_zipcode.$model"
              type="text"
              placeholder="Code postal"
          >
        </FormWizardControl>
        <FormWizardControl :showErrors="submitted" :v="$v.formData.deposit_bank_city">
          <input
              v-model="$v.formData.deposit_bank_city.$model"
              type="text"
              placeholder="Ville">
        </FormWizardControl>
      </div>
    </FormWizardGroup>


    <FormWizardGroup v-if="formData.capital_deposit_type === 'Dans une étude notariale'">
      <div class="form-wizard__row">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.notary_study_name">
          <input
              v-model="$v.formData.notary_study_name.$model"
              type="text"
              placeholder="Nom de l’étude notariale"
          >
        </FormWizardControl>
        <FormWizardControl :showErrors="submitted" :v="$v.formData.notary_study_address">
          <input
              v-model="$v.formData.notary_study_address.$model"
              type="text"
              placeholder="Adresse de l’étude notariale"
          >
        </FormWizardControl>
      </div>
      <div class="form-wizard__row">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.notary_study_zipcode">
          <input
              v-model="$v.formData.notary_study_zipcode.$model"
              type="text"
              placeholder="Code postal"
          >
        </FormWizardControl>
        <FormWizardControl :showErrors="submitted" :v="$v.formData.notary_study_city">
          <input
              v-model="$v.formData.notary_study_city.$model"
              type="text"
              placeholder="Ville"
          >
        </FormWizardControl>
      </div>
    </FormWizardGroup>

    <FormWizardGroup title="L'exercice social">
      <div class="form-wizard__row">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.normal_company_exercice_closure_date">
          <select v-model="$v.formData.normal_company_exercice_closure_date.$model">
            <option value="" disabled>Date de clôture d’un exercice social normal</option>
            <option v-for="date in normal_exercice_closure_dates" :value="date.value">{{ date.text }}</option>
          </select>
        </FormWizardControl>
        <FormWizardControl :showErrors="submitted" :v="$v.formData.first_company_exercice_closure_data">
          <select v-model="$v.formData.first_company_exercice_closure_data.$model">
            <option value="" disabled>Date de clôture du premier exercice social</option>
            <option v-for="date in first_exercice_closure_dates" :value="date.value">{{ date.text }}</option>
          </select>
        </FormWizardControl>
      </div>
    </FormWizardGroup>

    <FormWizardGroup title="Distinctions commerciales">
      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
          <span @click="formOptions.addAcronym = !formOptions.addAcronym"
                :class="{'active': formOptions.addAcronym === true}"></span>
          Ajouter un sigle ?
        </div>
        <input v-if="formOptions.addAcronym" v-model="$v.formData.business_acronym.$model" type="text"
               placeholder="Sigle">
      </div>
      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
          <span @click="formOptions.addCommercialName = !formOptions.addCommercialName"
                :class="{'active': formOptions.addCommercialName === true}">
          </span>
          Ajouter un nom commercial ?
        </div>
        <input type="text" placeholder="Nom commercial"
               v-if="formOptions.addCommercialName"
               v-model="$v.formData.business_commercial_name.$model"/>
      </div>
      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
          <span @click="formOptions.addDomainName = !formOptions.addDomainName"
                :class="{'active': formOptions.addDomainName === true}">
          </span>
          Ajouter un nom de domaine ?
        </div>
        <input type="text" placeholder="Nom de domaine"
               v-if="formOptions.addDomainName"
               v-model="$v.formData.business_domain_name.$model">
      </div>
      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
          <span @click="formOptions.addBusinessSign = !formOptions.addBusinessSign"
                :class="{'active': formOptions.addBusinessSign === true}"></span>
          Ajouter une enseigne ?
        </div>
        <input v-if="formOptions.addBusinessSign" v-model="$v.formData.business_sign.$model" type="text"
               placeholder="Enseigne (de l'établissement principal)">
      </div>
    </FormWizardGroup>

    <FormWizardGroup title="Choix fiscaux" subtitle="La société est assujettie à :">
      <p class="form-wizard__group-inner-subtitle">L'impôt sur</p>
      <div class="form-wizard__inner-buttons">
        <div v-for="income_tax in income_taxes"
             :class="{'button button-small': true,
             'button-primary button-primary--stroke': formData.subject_to_what_income_tax !== income_tax.value,
             'button-primary': formData.subject_to_what_income_tax === income_tax.value}"
             @click="setIncomeTaxType(income_tax.value)">
          {{ income_tax.value }}
        </div>
      </div>
      <p class="form-wizard__group-inner-subtitle">L'impôt</p>
      <div class="form-wizard__inner-buttons">
        <div v-for="real_tax in real_taxes"
             :class="{'button button-small': true,
             'button-primary button-primary--stroke': formData.subject_to_what_real_tax !== real_tax.value,
             'button-primary': formData.subject_to_what_real_tax === real_tax.value}"
             @click="setRealTaxType(real_tax.value)">
          {{ real_tax.value }}
        </div>
      </div>
      <p class="form-wizard__group-inner-subtitle">Régime de la TVA</p>
      <div class="form-wizard__inner-buttons">
        <div v-for="vat in vat_systems"
             :class="{'button button-small': true,
             'button-primary button-primary--stroke': formData.vat_system !== vat.value,
             'button-primary': formData.vat_system === vat.value}"
             @click="setVatSystem(vat.value)">
          {{ vat.value }}
        </div>
      </div>
    </FormWizardGroup>

    <div class="form-wizard__navigation" @click="validateData">
      <FormWizardPreviousStepButton></FormWizardPreviousStepButton>
      <div @click="validateData">
        <FormWizardNextStepButton ref="nextStepButton"></FormWizardNextStepButton>
      </div>
      <FormWizardResetButton></FormWizardResetButton>
    </div>
  </div>
</template>

<script>
import FormWizardNextStepButton from '../FormWizard/FormWizardNextStepButton'
import FormWizardPreviousStepButton from '../FormWizard/FormWizardPreviousStepButton'
import FormWizardResetButton from '../FormWizard/FormWizardResetButton'
import FormWizardGroup from '../FormWizard/FormWizardGroup'
import FormWizardControl from '../FormWizard/FormWizardControl'
import FormWizardRadio from '../FormWizard/FormWizardRadio'
import {mapActions, mapGetters} from "vuex";
import {required, requiredIf, integer} from 'vuelidate/lib/validators'

export default {
  name: "CreateCompanyFormStatus",
  components: {
    FormWizardNextStepButton,
    FormWizardPreviousStepButton,
    FormWizardResetButton,
    FormWizardGroup,
    FormWizardControl,
    FormWizardRadio,
  },
  data() {
    return {
      formData: {
        head_office_type: '',
        domiciliation_company_name: '',
        domiciliation_company_siren: '',
        company_purpose: '',
        social_capital_type: '',
        social_capital_amount: '',
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
        first_company_exercice_closure_data: '',
        business_acronym: '',
        business_commercial_name: '',
        business_domain_name: '',
        business_sign: '',
        subject_to_what_income_tax: '',
        subject_to_what_real_tax: '',
        vat_system: ''
      },
      submitted: false,
      formOptions: {
        addAcronym: false,
        addCommercialName: false,
        addDomainName: false,
        addBusinessSign: false
      },
      capital_deposit_types: [
        {id: 0, value: 'Dans une banque'},
        {id: 1, value: 'À la Caisse des Dépôts et Consignation'},
        {id: 2, value: 'Dans une étude notariale'},
        {id: 3, value: 'Dans une banque partenaire'},
      ],
      officeTypes: [
        {id: 0, value: 'Dans un local commercial'},
        {id: 1, value: 'Dans une société de domiciliation'},
        {id: 2, value: 'Au domicile du dirigeant'},
      ],
      income_taxes: [
        {id: 0, value: 'Les sociétés'},
        {id: 1, value: 'Le revenu'}
      ],
      real_taxes: [
        {id: 0, value: 'Réel simplifié'},
        {id: 1, value: 'Réel normal'}
      ],
      vat_systems: [
        {id: 0, value: 'Réel simplifié'},
        {id: 1, value: 'Réel normal'},
        {id: 2, value: 'Mini réel'},
        {id: 3, value: 'Franchise en base'},
        {id: 4, value: 'Déclaration trimestrielle si la TVA estimée < 4000€ / an (plafond)'},
        {id: 5, value: 'Assujettissement à la TVA en cas d\'opération imposable sur option'},
      ],
      vatSystemSelected: false,
      incomeTaxSelected: false,
      realTaxesSelected: false,
      capitalDepositTypeSelected: false
    }
  },
  validations: {
    formData: {
      head_office_type: {
        required,
      },
      domiciliation_company_name: {
        required: requiredIf(data => {
          return data.head_office_type === 'Dans une société de domiciliation'
        }),
      },
      domiciliation_company_siren: {
        required: requiredIf(data => {
          return data.head_office_type === 'Dans une société de domiciliation'
        }),
        integer
      },
      company_purpose: {
        required,
      },
      social_capital_type: {
        required
      },
      social_capital_amount: {},
      social_capital_min: {},
      social_capital_max: {},
      capital_release_rate: {},
      capital_released_amount: {},
      capital_deposit_date: {
        required,
      },
      capital_deposit_type: {
        required,
      },
      deposit_bank_name: {
        required: requiredIf(data => {
          return data.capital_deposit_type === 'Dans une banque'
        })
      },
      deposit_bank_address: {
        required: requiredIf(data => {
          return data.capital_deposit_type === 'Dans une banque'
        })
      },
      deposit_bank_zipcode: {
        required: requiredIf(data => {
          return data.capital_deposit_type === 'Dans une banque'
        })
      },
      deposit_bank_city: {
        required: requiredIf(data => {
          return data.capital_deposit_type === 'Dans une banque'
        })
      },
      notary_study_name: {
        required: requiredIf(data => {
          return data.capital_deposit_type === 'Dans une étude notariale'
        })
      },
      notary_study_address: {
        required: requiredIf(data => {
          return data.capital_deposit_type === 'Dans une étude notariale'
        })
      },
      notary_study_zipcode: {
        required: requiredIf(data => {
          return data.capital_deposit_type === 'Dans une étude notariale'
        })
      },
      notary_study_city: {
        required: requiredIf(data => {
          return data.capital_deposit_type === 'Dans une étude notariale'
        })
      },
      normal_company_exercice_closure_date: {
        required
      },
      first_company_exercice_closure_data: {
        required
      },
      business_acronym: {},
      business_commercial_name: {},
      business_domain_name: {},
      business_sign: {},
      subject_to_what_income_tax: {},
      subject_to_what_real_tax: {},
      vat_system: {}
    },
  },
  methods: {
    ...mapActions(['setCompanyStatus', 'updateProgression']),
    validateData() {
      this.submitted = true
      this.$v.$touch();

      if (!this.$v.$invalid) {
        let data = this.formData

        data.social_capital_amount = typeof data.social_capital_amount !== 'number' ? 0 : data.social_capital_amount
        data.social_capital_min = typeof data.social_capital_min !== 'number' ? 0 : data.social_capital_min
        data.social_capital_max = typeof data.social_capital_max !== 'number' ? 0 : data.social_capital_max
        data.capital_release_rate = typeof data.capital_release_rate !== 'number' ? 0 : data.capital_release_rate
        data.capital_released_amount = typeof data.capital_released_amount !== 'number' ? 0 : data.capital_released_amount
        data.deposit_bank_zipcode = typeof data.deposit_bank_zipcode !== 'number' ? 0 : data.deposit_bank_zipcode
        data.notary_study_zipcode = typeof data.notary_study_zipcode !== 'number' ? 0 : data.notary_study_zipcode

        this.setCompanyStatus(data)
        if (this.$refs.nextStepButton) {
          this.$refs.nextStepButton.nextStep()
        }
      }

    },
    setIncomeTaxType(incomeTaxType) {
      this.formData.subject_to_what_income_tax = incomeTaxType
    },
    setRealTaxType(realTaxType) {
      this.formData.subject_to_what_real_tax = realTaxType
    },
    setVatSystem(vatSystem) {
      this.formData.vat_system = vatSystem
    },
  },
  computed: {
    ...mapGetters(['companyStatus', 'formProgression', 'activeStepIndex']),
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
          value: currentYear.toString()
        },
        {
          text: 'En ' + precedentYear + ' (exercice long)',
          value: precedentYear.toString()
        }
      ]
    },
  },
  updated() {
    let progression = {options: this.formOptions, data: this.formData}
    this.updateProgression(progression)
  },
  mounted() {
    let progression = this.formProgression[this.activeStepIndex]

    if (progression && progression.data != null && progression.options != null) {
      this.formData = progression.data
      this.formOptions = progression.options
    }
  }
}
</script>