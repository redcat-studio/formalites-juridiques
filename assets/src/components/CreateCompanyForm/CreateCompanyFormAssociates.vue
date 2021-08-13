<template>
  <div>
    <div v-for="associate in formData.associates">
      <div class="form-wizard__group">
        <h2 class="form-wizard__group-title">L'associé de la société</h2>
        <p class="form-wizard__group-subtitle">L'associé est une personne :</p>
        <select v-model="associate.associate_type" class="u-full-width">
          <option value="Physique">Physique</option>
          <option value="Morale">Morale</option>
        </select>
      </div>

      <div class="form-wizard__group" v-if="associate.associate_type === 'Physique'">
        <h2 class="form-wizard__group-title">Associé personne physique</h2>
        <p class="form-wizard__group-inner-subtitle">Informations principales </p>
        <div class="form-wizard__row">
          <select v-model="associate.individual_genre" class="u-full-width">
            <option value="Genre" disabled>Genre</option>
            <option value="Masculin">Masculin</option>
            <option value="Féminin">Féminin</option>
          </select>
          <input v-model="associate.individual_firstname" type="text" class="u-full-width" placeholder="Prénom">
          <input v-model="associate.individual_lastname" type="text" class="u-full-width" placeholder="Nom">
        </div>

        <p class="form-wizard__group-inner-subtitle">Date de naissance de l'associé</p>
        <input v-model="associate.individual_birthdate" type="date" class="u-full-width"
               placeholder="Date de naissance">

        <p class="form-wizard__group-inner-subtitle">Informations complémentaires</p>
        <div class="form-wizard__row">
          <input v-model="associate.individual_birth_city" type="text" class="u-full-width"
                 placeholder="Ville de naissance">
          <input v-model="associate.individual_nationality" type="text" class="u-full-width"
                 placeholder="Nationalité">
        </div>

        <div class="form-wizard__row">
          <input v-model="associate.individual_address" type="text" class="u-full-width" placeholder="Adresse">
          <input v-model="associate.individual_zipcode" type="text" class="u-full-width" placeholder="Code postal">
          <input v-model="associate.individual_city" type="text" class="u-full-width" placeholder="Ville">
        </div>
      </div>

      <div v-if="associate.associate_type === 'Morale'">
        <div class="form-wizard__group">
          <h2 class="form-wizard__group-title">Associé personne morale</h2>
          <div class="form-wizard__row">
            <input v-model="associate.legal_company_name" type="text" class="u-full-width"
                   placeholder="Nom de la société"/>
            <input v-model="associate.legal_company_rcs_number" type="text" class="u-full-width"
                   placeholder="Numéro RCS">
          </div>

          <div class="form-wizard__row">
            <input v-model="associate.legal_company_headquarters_address"
                   type="text" class="u-full-width" placeholder="Adresse du siège social">
          </div>

          <div class="form-wizard__row">
            <input v-model="associate.legal_company_zipcode" type="text" class="u-full-width"
                   placeholder="Code postal"/>
            <input v-model="associate.legal_company_city" type="text" class="u-full-width"
                   placeholder="Ville">
            <input v-model="associate.legal_company_city_of_registry" type="text" class="u-full-width"
                   placeholder="Ville du Greffe">
          </div>
        </div>

        <div class="form-wizard__group">
          <div class="form-wizard__row">
            <input v-model="associate.legal_company_social_capital" type="text" class="u-full-width"
                   placeholder="Capital social"/>
            <input v-model="associate.legal_company_social_form" type="text" class="u-full-width"
                   placeholder="Forme sociale (ex : SARL, ...)">
          </div>
        </div>

        <div class="form-wizard__group">
          <h2 class="form-wizard__group-title">Représentant de la société</h2>

          <div class="form-wizard__row">
            <input v-model="associate.legal_representative_firstname" type="text" class="u-full-width"
                   placeholder="Prénom"/>
            <input v-model="associate.legal_representative_lastname" type="text" class="u-full-width"
                   placeholder="Nom">
            <select v-model="associate.legal_representative_genre" class="u-full-width">
              <option value="Genre" disabled>Genre</option>
              <option value="Masculin">Masculin</option>
              <option value="Féminin">Féminin</option>
            </select>
          </div>
          <input v-model="associate.legal_representative_role" type="text" class="u-full-width"
                 placeholder="Qualité (président, gérant...)">
        </div>
      </div>

      <div class="form-wizard__group">
      <div class="form-wizard__triggerable-field" v-if="associate.associate_type === 'Physique'">
        <div class="form-wizard__triggerable-field-trigger">
          <span
              @click="associate.individual_is_married_under_community_of_property = !associate.individual_is_married_under_community_of_property"
              :class="{'active': associate.individual_is_married_under_community_of_property === true}">
          </span>
          Est-ce que l'associé est marié sous la communauté de biens ?
        </div>
      </div>

      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
          <span @click="formOptions.cashContribution = !formOptions.cashContribution"
                :class="{'active': formOptions.cashContribution === true}"></span>
          Cet associé a-t-il a effectué un apport en numéraire ?
        </div>
        <input v-if="formOptions.cashContribution" v-model="associate.associate_cash_contribution"
               class="u-full-width" type="text"
               placeholder="Montant de l’apport effectué">
      </div>

      <div class="form-wizard__triggerable-field">
        <div class="form-wizard__triggerable-field-trigger">
        <span
            @click="formOptions.kindContribution = !formOptions.kindContribution"
            :class="{'active': formOptions.kindContribution === true}"></span>
          Cet associé a-t-il effectué un apport en nature ?
        </div>
        <div class="form-wizard__row"
             v-if="formOptions.kindContribution"
             v-for="contribution in associate.kindContributions">
          <input v-model="contribution.nature"
                 class="u-full-width" type="text"
                 placeholder="Nature de l'apport">
          <input v-model="contribution.amount"
                 class="u-full-width" type="text"
                 placeholder="Montant de l'apport">
        </div>
        <div v-if="formOptions.kindContribution" class="form-wizard__inner-buttons">
          <button class="button button-primary button-small" @click="addKindContribution">Ajouter un autre apport en
            nature
          </button>
          <button class="button button-primary button-small" @click="removeKindContribution"
                  v-if="associate.kindContributions.length > 1">Supprimer le dernier apport
          </button>
        </div>

      </div>
    </div>
    </div>

    <div class="form-wizard__incremental">
      <h2 class="form-wizard__group-title">Dirigeants</h2>
      <div class="form-wizard__incremental-nav">
        <div
            :class="{'form-wizard__incremental-nav-item': true, active: formData.executives.indexOf(exec) === formOptions.currExecutive}"
            v-for="exec in formData.executives" @click="setCurrExecutive(formData.executives.indexOf(exec))">
          {{ formData.executives.indexOf(exec) + 1 }}
        </div>
        <div class="form-wizard__incremental-nav-item" @click="addExecutive">+</div>
      </div>
      <div class="form-wizard__group">
        <div v-for="exec in formData.executives">
          <div v-if="formOptions.currExecutive === formData.executives.indexOf(exec)">
            <p class="form-wizard__group-inner-subtitle">Informations principales</p>
            <div class="form-wizard__row">
              <input v-model="exec.executive_firstname" type="text" class="u-full-width" placeholder="Prénom"/>
              <input v-model="exec.executive_lastname" type="text" class="u-full-width" placeholder="Nom"/>
            </div>
            <div class="form-wizard__row">
              <input v-model="exec.executive_birthdate" type="date" class="u-full-width"
                     placeholder="Date de naissance"/>
              <input v-model="exec.executive_birth_city" type="text" class="u-full-width"
                     placeholder="Ville de naissance"/>
              <input v-model="exec.executive_nationality" type="text" class="u-full-width" placeholder="Nationalité"/>
            </div>
            <p class="form-wizard__group-inner-subtitle">Informations complémentaires</p>
            <div class="form-wizard__row">
              <input v-model="exec.executive_address" type="text" class="u-full-width" placeholder="Adresse"/>
              <input v-model="exec.executive_zipcode" type="text" class="u-full-width" placeholder="Code postal"/>
              <input v-model="exec.executive_city" type="text" class="u-full-width" placeholder="Ville"/>
            </div>
            <div class="form-wizard__row">
              <input v-model="exec.executive_mother_firstname_and_maiden_name" type="text" class="u-full-width"
                     placeholder="Prénom et nom de jeune fille de la mère">
              <input v-model="exec.executive_father_name" type="text" class="u-full-width"
                     placeholder="Prénom et nom du père">
            </div>
            <div class="form-wizard__row">
              <input v-model="exec.executive_email" type="text" class="u-full-width"
                     placeholder="Adresse e-mail du gérant">
            </div>
            <button class="button button-primary button-small" v-if="formOptions.currExecutive !== 0" @click="removeCurrExecutive">
              Supprimer ce dirigeant
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">Choix fiscaux</h2>
      <p class="form-wizard__group-subtitle form-wizard__group-subtitle--big">La société est assujettie à :</p>
      <p class="form-wizard__group-inner-subtitle">L'impôt sur</p>
      <div class="form-wizard__inner-buttons">
        <div v-for="income_tax in income_taxes"
             :class="{'button button-small': true,
             'button-beige': formData.subject_to_what_income_tax !== income_tax.value,
             'button-primary': formData.subject_to_what_income_tax === income_tax.value}"
             @click="setIncomeTaxType(income_tax.value)">
          {{ income_tax.value }}
        </div>
      </div>
      <p class="form-wizard__group-inner-subtitle">L'impôt</p>
      <div class="form-wizard__inner-buttons">
        <div v-for="real_tax in real_taxes"
             :class="{'button button-small': true,
             'button-beige': formData.subject_to_what_real_tax !== real_tax.value,
             'button-primary': formData.subject_to_what_real_tax === real_tax.value}"
             @click="setRealTaxType(real_tax.value)">
          {{ real_tax.value }}
        </div>
      </div>
      <p class="form-wizard__group-inner-subtitle">Régime de la TVA</p>
      <div class="form-wizard__inner-buttons">
        <div v-for="vat in vat_systems"
             :class="{'button button-small': true,
             'button-beige': formData.vat_system !== vat.value,
             'button-primary': formData.vat_system === vat.value}"
             @click="setVatSystem(vat.value)">
          {{ vat.value }}
        </div>
      </div>
    </div>

    <div class="form-wizard__navigation">
      <FormWizardPreviousStepButton></FormWizardPreviousStepButton>
      <div @click="validateData">
        <FormWizardNextStepButton></FormWizardNextStepButton>
      </div>
      <FormWizardResetButton></FormWizardResetButton>
    </div>

  </div>
</template>

<script>
import FormWizardNextStepButton from '../FormWizard/FormWizardNextStepButton'
import FormWizardPreviousStepButton from '../FormWizard/FormWizardPreviousStepButton'
import FormWizardResetButton from '../FormWizard/FormWizardResetButton'
import {mapGetters, mapActions} from 'vuex'

export default {
  name: "CreateCompanyFormAssociates",
  components: {
    FormWizardNextStepButton,
    FormWizardPreviousStepButton,
    FormWizardResetButton
  },
  data() {
    return {
      formData: {
        executives: [
          {
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
          }
        ],
        associates: [
          {
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
            associate_cash_contribution: '',
            kindContributions: [
              {
                nature: '',
                amount: '',
              }
            ],
            legal_company_name: '',
            legal_company_rcs_number: '',
            legal_company_headquarters_address: '',
            legal_company_zipcode: '',
            legal_company_city: '',
            legal_company_city_of_registry: '',
            legal_company_social_capital: '',
            legal_company_social_form: '',
            legal_representative_firstname: '',
            legal_representative_lastname: '',
            legal_representative_genre: 'Genre',
            legal_representative_role: '',
          },
        ],
        subject_to_what_income_tax: '',
        subject_to_what_real_tax: '',
        vat_system: ''
      },
      formOptions: {
        currExecutive: 0,
        currAssociate: 0,
        cashContribution: false,
        kindContribution: false,
      },
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
      ]

    }
  },
  methods: {
    ...mapActions(['updateProgression', 'setCompanyAssociates', 'setCompanyExecutives', 'updateCompanyStatus']),
    validateData() {
      console.log('clicked')
      let associates = this.formData.associates;
      let executives = this.formData.executives;

      associates.forEach(a => {
        a.individual_zipcode =  typeof a.individual_zipcode === 'string' ? 0 : a.individual_zipcode
        a.legal_company_rcs_number =  typeof a.legal_company_rcs_number === 'string' ? 0 : a.legal_company_rcs_number
        a.legal_company_zipcode =  typeof a.legal_company_zipcode === 'string' ? 0 : a.legal_company_zipcode
        a.legal_company_social_capital =  typeof a.legal_company_social_capital === 'string' ? 0 : a.legal_company_social_capital
        a.kindContributions.forEach(c => {
          c.amount = typeof c.amount === 'string' ? 0 : c.amount
        })
      })

      executives.forEach(e => {
        e.executive_zipcode = typeof e.executive_zipcode === 'string' ? 0 : e.executive_zipcode
        e.executive_company_rcs_number = typeof e.executive_company_rcs_number === 'string' ? 0 : e.executive_company_rcs_number
        e.executive_company_zipcode = typeof e.executive_company_zipcode === 'string' ? 0 : e.executive_company_zipcode
      })

      this.setCompanyAssociates(associates)
      this.setCompanyExecutives(executives)
      this.updateCompanyStatus({
        subject_to_what_income_tax: this.formData.subject_to_what_income_tax,
        subject_to_what_real_tax: this.formData.subject_to_what_real_tax,
        vat_system: this.formData.vat_system,
      })
    },
    addKindContribution() {
      this.formData.associates[this.formOptions.currAssociate].kindContributions.push({
        nature: '',
        amount: '',
      })
    },
    removeKindContribution() {
      if (this.formData.associates[this.formOptions.currAssociate].kindContributions.length > 1) {
        this.formData.associates[this.formOptions.currAssociate].kindContributions.pop()
      }
    },
    addExecutive() {
      this.formData.executives.push({
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
      })
      this.formOptions.currExecutive = this.formOptions.currExecutive + 1
    },
    setCurrExecutive(idx) {
      this.formOptions.currExecutive = idx
    },
    removeCurrExecutive() {
      this.formData.executives.splice(this.formOptions.currExecutive, 1)
      this.formOptions.currExecutive = this.formOptions.currExecutive - 1
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
    ...mapGetters(['formProgression', 'activeStepIndex'])
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