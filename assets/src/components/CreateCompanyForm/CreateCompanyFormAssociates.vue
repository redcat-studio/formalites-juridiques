<template>
  <div>
    <div class="form-wizard__incremental">
      <div v-if="companyType === 'SARL' || companyType === 'SAS'" class="form-wizard__incremental-nav">
        <div
            v-for="a in formData.associates" @click="setCurrAssociate(formData.associates.indexOf(a))"
            :class="{'form-wizard__incremental-nav-item': true, active: formData.associates.indexOf(a) === formOptions.currAssociate}"
        >
          {{ formData.associates.indexOf(a) + 1 }}
        </div>
        <div class="form-wizard__incremental-nav-item" @click="addAssociate">+</div>
      </div>

      <div v-for="asso in $v.formData.associates.$each.$iter">
        <FormWizardGroup
            title="L'associé de la société"
            subtitle="L'associé est une personne :"
            :class="{
             'form-wizard__group': true,
             hide: formOptions.currAssociate !== $v.formData.associates.$model.indexOf(asso.$model)
            }"
        >
          <FormWizardControl :showErrors="submitted" :v="asso.associate_type">
            <select v-model="asso.associate_type.$model">
              <option value="Physique">Physique</option>
              <option value="Morale">Morale</option>
            </select>
          </FormWizardControl>

          <div v-if="asso.associate_type.$model === 'Physique'">

            <h2 class="form-wizard__group-title">Associé personne physique</h2>
            <p class="form-wizard__group-inner-subtitle">Informations principales</p>

            <div class="form-wizard__row">

              <FormWizardControl :showErrors="submitted" :v="asso.individual_genre">
                <select v-model="asso.individual_genre.$model">
                  <option value="Genre" disabled>Genre</option>
                  <option value="Masculin">Masculin</option>
                  <option value="Féminin">Féminin</option>
                </select>
              </FormWizardControl>

              <FormWizardControl :showErrors="submitted" :v="asso.individual_firstname">
                <input
                    v-model="asso.individual_firstname.$model"
                    type="text"
                    placeholder="Prénom"
                >
              </FormWizardControl>

              <FormWizardControl :showErrors="submitted" :v="asso.individual_lastname">
                <input
                    v-model="asso.individual_lastname.$model"
                    type="text"
                    placeholder="Nom"
                >
              </FormWizardControl>
            </div>

            <p class="form-wizard__group-inner-subtitle">Date de naissance de l'associé</p>

            <FormWizardControl :showErrors="submitted" :v="asso.individual_birthdate">
              <input
                  v-model="asso.individual_birthdate.$model"
                  type="date"
                  placeholder="Date de naissance"
              >
            </FormWizardControl>

            <p class="form-wizard__group-inner-subtitle">Informations complémentaires</p>
            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="asso.individual_birth_city">
                <input
                    v-model="asso.individual_birth_city.$model"
                    type="text"
                    placeholder="Ville de naissance"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="asso.individual_nationality">
                <input
                    v-model="asso.individual_nationality.$model"
                    type="text"
                    placeholder="Nationalité"
                >
              </FormWizardControl>
            </div>

            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="asso.individual_address">
                <input
                    v-model="asso.individual_address.$model"
                    type="text"
                    placeholder="Adresse"
                >
              </FormWizardControl>

              <FormWizardControl :showErrors="submitted" :v="asso.individual_zipcode">
                <input
                    v-model="asso.individual_zipcode.$model"
                    type="text"
                    placeholder="Code postal"
                >
              </FormWizardControl>

              <FormWizardControl :showErrors="submitted" :v="asso.individual_city">
                <input
                    v-model="asso.individual_city.$model"
                    type="text"
                    placeholder="Ville"
                >
              </FormWizardControl>

            </div>
          </div>

          <div v-if="asso.associate_type.$model === 'Morale'">
            <h2 class="form-wizard__group-title">Associé personne morale</h2>
            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="asso.legal_company_name">
                <input
                    v-model="asso.legal_company_name.$model"
                    type="text"
                    placeholder="Nom de la société"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="asso.legal_company_rcs_number">
                <input
                    v-model="asso.legal_company_rcs_number.$model"
                    type="text"
                    placeholder="Numéro RCS"
                >
              </FormWizardControl>
            </div>

            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="asso.legal_company_headquarters_address">
                <input
                    v-model="asso.legal_company_headquarters_address.$model"
                    type="text"
                    placeholder="Adresse du siège social"
                >
              </FormWizardControl>
            </div>

            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="asso.legal_company_zipcode">
                <input
                    v-model="asso.legal_company_zipcode.$model"
                    type="text"
                    placeholder="Code postal"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="asso.legal_company_city">
                <input
                    v-model="asso.legal_company_city.$model"
                    type="text"
                    placeholder="Ville"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="asso.legal_company_city_of_registry">
                <input
                    v-model="asso.legal_company_city_of_registry.$model"
                    type="text"
                    placeholder="Ville du Greffe"
                >
              </FormWizardControl>
            </div>

            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="asso.legal_company_social_capital">
                <input
                    v-model="asso.legal_company_social_capital.$model"
                    type="text"
                    placeholder="Capital social"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="asso.legal_company_social_form">
                <input
                    v-model="asso.legal_company_social_form.$model"
                    type="text"
                    placeholder="Forme sociale (ex : SARL, ...)"
                >
              </FormWizardControl>
            </div>

            <h2 class="form-wizard__group-title">Représentant de la société</h2>

            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="asso.legal_representative_firstname">
                <input
                    v-model="asso.legal_representative_firstname.$model"
                    type="text"
                    placeholder="Prénom"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="asso.legal_representative_lastname">
                <input
                    v-model="asso.legal_representative_lastname.$model"
                    type="text"
                    placeholder="Nom"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="asso.legal_representative_genre">
                <select v-model="asso.legal_representative_genre.$model">
                  <option value="Genre" disabled>Genre</option>
                  <option value="Masculin">Masculin</option>
                  <option value="Féminin">Féminin</option>
                </select>
              </FormWizardControl>
            </div>
            <FormWizardControl :showErrors="submitted" :v="asso.legal_representative_role">
              <input
                  v-model="asso.legal_representative_role.$model"
                  type="text"
                  placeholder="Qualité (président, gérant...)"
              >
            </FormWizardControl>
          </div>

          <div class="form-wizard__triggerable-field" v-if="asso.associate_type.$model === 'Physique'">
            <div class="form-wizard__triggerable-field-trigger">
              <span
                  @click="asso.individual_is_married_under_community_of_property.$model
                  = !asso.individual_is_married_under_community_of_property.$model"
                  :class="{'active': asso.individual_is_married_under_community_of_property.$model === true}">
              </span>
              Est-ce que l'associé est marié sous la communauté de biens ?
            </div>
          </div>

          <div class="form-wizard__triggerable-field">
            <div class="form-wizard__triggerable-field-trigger">
              <span
                  @click="formOptions.cashContribution = !formOptions.cashContribution"
                  :class="{'active': formOptions.cashContribution === true}">
              </span>
              Cet associé a-t-il a effectué un apport en numéraire ?
            </div>
            <input
                v-if="formOptions.cashContribution"
                v-model="asso.associate_cash_contribution.$model"
                type="text"
                placeholder="Montant de l’apport effectué">
          </div>
          <div class="form-wizard__triggerable-field">
            <div class="form-wizard__triggerable-field-trigger">
              <span
                  @click="formOptions.kindContribution = !formOptions.kindContribution"
                  :class="{'active': formOptions.kindContribution === true}">
              </span>
              Cet associé a-t-il effectué un apport en nature ?
            </div>
            <div class="form-wizard__row"
                 v-if="formOptions.kindContribution"
                 v-for="c in asso.kindContributions.$each.$iter"
            >
              <input
                  v-model="c.nature.$model"
                  type="text"
                  placeholder="Nature de l'apport"
              >
              <input
                  v-model="c.amount.$model"
                  type="text"
                  placeholder="Montant de l'apport"
              >
            </div>
            <div v-if="formOptions.kindContribution" class="form-wizard__inner-buttons">
              <button
                  class="button button-primary button-primary--stroke button-small"
                  @click="addKindContribution">
                Ajouter un autre apport en nature
              </button>
              <button
                  class="button button-primary button-primary--stroke button-small"
                  @click="removeKindContribution"
                  v-if="asso.kindContributions.$model.length > 1">
                Supprimer le dernier apport
              </button>
            </div>
          </div>

        </FormWizardGroup>
      </div>
    </div>

    <button
        v-if="formOptions.currAssociate !== 0"
        @click="removeCurrAssociate"
        class="button button-primary button-small"
    >
      Supprimer cet associé
    </button>

    <div class="form-wizard__navigation">
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
import {mapActions, mapGetters} from 'vuex'
import {required, requiredIf} from 'vuelidate/lib/validators'

export default {
  name: "CreateCompanyFormAssociates",
  components: {
    FormWizardNextStepButton,
    FormWizardPreviousStepButton,
    FormWizardResetButton,
    FormWizardGroup,
    FormWizardControl
  },
  data() {
    return {
      submitted: false,
      formData: {
        associates: [
          {
            associate_type: 'Physique',
            associate_cash_contribution: '',
            kindContributions: [
              {
                nature: '',
                amount: '',
              }
            ],
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
      },
      formOptions: {
        currAssociate: 0,
        cashContribution: false,
        kindContribution: false,
      },
    }
  },
  validations: {
    formData: {
      associates: {
        $each: {
          associate_type: {
            required
          },
          associate_cash_contribution: {},
          kindContributions: {
            $each: {
              nature: {},
              amount: {},
            }
          },
          individual_genre: {
            required: requiredIf(a => {
              return a.associate_type === 'Physique'
            })
          },
          individual_firstname: {
            required: requiredIf(a => {
              return a.associate_type === 'Physique'
            })
          },
          individual_lastname: {
            required: requiredIf(a => {
              return a.associate_type === 'Physique'
            })
          },
          individual_birthdate: {
            required: requiredIf(a => {
              return a.associate_type === 'Physique'
            })
          },
          individual_birth_city: {
            required: requiredIf(a => {
              return a.associate_type === 'Physique'
            })
          },
          individual_nationality: {
            required: requiredIf(a => {
              return a.associate_type === 'Physique'
            })
          },
          individual_address: {
            required: requiredIf(a => {
              return a.associate_type === 'Physique'
            })
          },
          individual_zipcode: {
            required: requiredIf(a => {
              return a.associate_type === 'Physique'
            })
          },
          individual_city: {
            required: requiredIf(a => {
              return a.associate_type === 'Physique'
            })
          },
          individual_is_married_under_community_of_property: {
            required: requiredIf(a => {
              return a.associate_type === 'Physique'
            })
          },
          legal_company_name: {
            required: requiredIf(a => {
              return a.associate_type === 'Morale'
            })
          },
          legal_company_rcs_number: {
            required: requiredIf(a => {
              return a.associate_type === 'Morale'
            })
          },
          legal_company_headquarters_address: {
            required: requiredIf(a => {
              return a.associate_type === 'Morale'
            })
          },
          legal_company_zipcode: {
            required: requiredIf(a => {
              return a.associate_type === 'Morale'
            })
          },
          legal_company_city: {
            required: requiredIf(a => {
              return a.associate_type === 'Morale'
            })
          },
          legal_company_city_of_registry: {
            required: requiredIf(a => {
              return a.associate_type === 'Morale'
            })
          },
          legal_company_social_capital: {
            required: requiredIf(a => {
              return a.associate_type === 'Morale'
            })
          },
          legal_company_social_form: {
            required: requiredIf(a => {
              return a.associate_type === 'Morale'
            })
          },
          legal_representative_firstname: {
            required: requiredIf(a => {
              return a.associate_type === 'Morale'
            })
          },
          legal_representative_lastname: {
            required: requiredIf(a => {
              return a.associate_type === 'Morale'
            })
          },
          legal_representative_genre: {
            required: requiredIf(a => {
              return a.associate_type === 'Morale'
            })
          },
          legal_representative_role: {
            required: requiredIf(a => {
              return a.associate_type === 'Morale'
            })
          },
        },
      },
    }
  },
  methods: {
    ...mapActions(['updateProgression', 'setCompanyAssociates', 'updateCompanyStatus']),
    validateData() {
      this.submitted = true
      this.$v.$touch()

      if (!this.$v.$invalid) {
        let associates = this.formData.associates

        associates.forEach(a => {
          a.legal_company_rcs_number = typeof a.legal_company_rcs_number !== 'number' ? 0 : a.legal_company_rcs_number
          a.legal_company_zipcode = typeof a.legal_company_zipcode !== 'number' ? 0 : a.legal_company_zipcode
          a.legal_company_social_capital = typeof a.legal_company_social_capital !== 'number' ? 0 : a.legal_company_social_capital
          a.individual_zipcode = typeof a.individual_zipcode !== 'number' ? 0 : a.individual_zipcode
        })

        this.setCompanyAssociates(associates)

        if (this.$refs.nextStepButton) {
          this.$refs.nextStepButton.nextStep()
        }
      }
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

    addAssociate() {
      this.submitted = false
      this.formData.associates.push({
        associate_type: 'Physique',
        associate_cash_contribution: '',
        kindContributions: [
          {
            nature: '',
            amount: '',
          }
        ],
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
      })
      this.formOptions.currAssociate = this.formOptions.currAssociate + 1
    },

    setCurrAssociate(idx) {
      this.formOptions.currAssociate = idx
      this.formOptions.cashContribution = false
      this.formOptions.kindContribution = false
    },

    removeCurrAssociate() {
      this.formData.associates.splice(this.formOptions.currAssociate, 1)
      this.formOptions.currAssociate = this.formOptions.currAssociate - 1
    },
  },
  computed: {
    ...mapGetters(['formProgression', 'activeStepIndex', 'companyType'])
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