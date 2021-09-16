<template>
  <div>
    <div class="form-wizard__incremental">
      <h2 class="form-wizard__group-title">Dirigeants</h2>
      <div class="form-wizard__incremental-nav">
        <div
            v-for="exec in formData.executives" @click="setCurrExecutive(formData.executives.indexOf(exec))"
            :class="{'form-wizard__incremental-nav-item': true, active: formData.executives.indexOf(exec) === formOptions.currExecutive}"
        >
          {{ formData.executives.indexOf(exec) + 1 }}
        </div>
        <div class="form-wizard__incremental-nav-item" @click="addExecutive">+</div>
      </div>
      <div v-for="exec in $v.formData.executives.$each.$iter">
        <FormWizardGroup
            :class="{
            'form-wizard__group': true,
            'hide': formOptions.currExecutive !== $v.formData.executives.$model.indexOf(exec.$model)
          }"
        >
          <h2 class="form-wizard__group-title">Le dirigeant de la société</h2>
          <p class="form-wizard__group-subtitle">Le dirigeant est une personne :</p>

          <FormWizardControl :showErrors="submitted" :v="exec.executive_type">
            <select v-model="exec.executive_type.$model">
              <option value="Physique">Physique</option>
              <option value="Morale">Morale</option>
            </select>
          </FormWizardControl>
          <div v-if="exec.executive_type.$model === 'Physique'">
            <div v-if="companyType === 'SASU' || companyType === 'SAS'">
              <p class="form-wizard__group-inner-subtitle">Titre du dirigeant</p>
              <div class="form-wizard__row">
                <FormWizardRadio
                    :model="exec.executive_title.$model"
                    @input="exec.executive_title.$model = $event"
                    :items="executiveTitles"
                    prefix="exec"
                >
                </FormWizardRadio>
              </div>
            </div>

            <p class="form-wizard__group-inner-subtitle">Identité du dirigeant</p>
            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="exec.executive_firstname">
                <input
                    v-model="exec.executive_firstname.$model"
                    type="text"
                    placeholder="Prénom"
                    title="Prénom du dirigeant"
                    aria-label="Prénom du dirigeant"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="exec.executive_lastname">
                <input
                    v-model="exec.executive_lastname.$model"
                    type="text"
                    placeholder="Nom"
                    title="Nom du dirigeant"
                    aria-label="Nom du dirigeant"
                >
              </FormWizardControl>
            </div>
            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="exec.executive_birthdate">
                <input
                    v-model="exec.executive_birthdate.$model"
                    type="date"
                    placeholder="Date de naissance"
                    title="Date de naissance du dirigeant"
                    aria-label="Date de naissance du dirigeant"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="exec.executive_birth_city">
                <input
                    v-model="exec.executive_birth_city.$model"
                    type="text"
                    placeholder="Ville de naissance"
                    title="Ville de naissance du dirigeant"
                    aria-label="Ville de naissance du dirigeant"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="exec.executive_nationality">
                <input
                    v-model="exec.executive_nationality.$model"
                    type="text"
                    placeholder="Nationalité"
                    title="Nationalité du dirigeant"
                    aria-label="Nationalité du dirigeant"
                >
              </FormWizardControl>
            </div>
            <p class="form-wizard__group-inner-subtitle">Informations complémentaires</p>
            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="exec.executive_address">
                <input
                    v-model="exec.executive_address.$model"
                    type="text"
                    placeholder="Adresse"
                    title="Adresse du dirigeant"
                    aria-label="Adresse du dirigeant"
                >
              </FormWizardControl>

              <FormWizardControl :showErrors="submitted" :v="exec.executive_zipcode">
                <input
                    v-model="exec.executive_zipcode.$model"
                    type="text"
                    placeholder="Code postal"
                    title="Code postal du dirigeant"
                    aria-label="Code postal du dirigeant"
                >
              </FormWizardControl>

              <FormWizardControl :showErrors="submitted" :v="exec.executive_city">
                <input
                    v-model="exec.executive_city.$model"
                    type="text"
                    placeholder="Ville"
                    title="Ville du dirigeant"
                    aria-label="Ville du dirigeant"
                >
              </FormWizardControl>
            </div>
            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="exec.executive_mother_firstname_and_maiden_name">
                <input
                    v-model="exec.executive_mother_firstname_and_maiden_name.$model"
                    type="text"
                    placeholder="Prénom et nom de jeune fille de la mère"
                    title="Prénom et nom de jeune fille de la mère du dirigeant"
                    aria-label="Prénom et nom de jeune fille de la mère du dirigeant"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="exec.executive_father_name">
                <input
                    v-model="exec.executive_father_name.$model"
                    type="text"
                    placeholder="Prénom et nom du père"
                    title="Prénom et nom du père du dirigeant"
                    aria-label="Prénom et nom du père du dirigeant"
                >
              </FormWizardControl>
            </div>
            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="exec.executive_email">
                <input
                    v-model="exec.executive_email.$model"
                    type="text"
                    placeholder="Adresse e-mail du gérant"
                    title="Adresse e-mail du gérant"
                    aria-label="Adresse e-mail du gérant"
                >
              </FormWizardControl>
            </div>
          </div>
          <div v-else>
            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="exec.executive_company_name">
                <input
                    v-model="exec.executive_company_name.$model"
                    type="text"
                    placeholder="Nom de la société"
                    title="Nom de la société dirigeante"
                    aria-label="Nom de la société dirigeante"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="exec.executive_company_rcs_number">
                <input
                    v-model="exec.executive_company_rcs_number.$model"
                    type="text"
                    placeholder="Numéro RCS"
                    title="Numéro RCS de la société dirigeante"
                    aria-label="Numéro RCS de la société dirigeante"
                >
              </FormWizardControl>
            </div>
            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="exec.executive_company_headquarters_address">
                <input
                    v-model="exec.executive_company_headquarters_address.$model"
                    type="text"
                    placeholder="Adresse du siège social"
                    title="Adresse du siège social de la société dirigeante"
                    aria-label="Adresse du siège social de la société dirigeante"
                >

              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="exec.executive_company_zipcode">
                <input
                    v-model="exec.executive_company_zipcode.$model"
                    type="text"
                    placeholder="Code postal"
                    title="Code postal de la société dirigeante"
                    aria-label="Code postal de la société dirigeante"
                >
              </FormWizardControl>
              <FormWizardControl :showErrors="submitted" :v="exec.executive_company_city">
                <input
                    v-model="exec.executive_company_city.$model"
                    type="text"
                    placeholder="Ville"
                    title="Ville de la société dirigeante"
                    aria-label="Ville de la société dirigeante"
                >
              </FormWizardControl>
            </div>
            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="exec.executive_company_rcs">
                <input
                    v-model="exec.executive_company_rcs.$model"
                    type="text"
                    placeholder="Immatriculée au Registre du Commerce et des Sociétés du"
                    title="Ville du Registre du Commerce et des Sociétés où la société dirigeante est immatriculée"
                    aria-label="Ville du Registre du Commerce et des Sociétés où la société dirigeante est immatriculée"
                >
              </FormWizardControl>
            </div>
            <div class="form-wizard__row">
              <FormWizardControl :showErrors="submitted" :v="exec.executive_company_representative_name">
                <input
                    v-model="exec.executive_company_representative_name.$model"
                    type="text"
                    placeholder="Représentant légal de la société"
                    title="Représentant légal de la société dirigeante"
                    aria-label="Représentant légal de la société dirigeante"
                >
              </FormWizardControl>
            </div>


          </div>
          <button
              v-if="formOptions.currExecutive !== 0"
              @click="removeCurrExecutive"
              class="button button-primary "
          >
            Supprimer ce dirigeant
          </button>
        </FormWizardGroup>
      </div>
    </div>

    <div class="form-wizard__navigation">
      <FormWizardPreviousStepButton></FormWizardPreviousStepButton>
      <FormWizardNextStepButton @click.native="validateData" ref="nextStepButton"></FormWizardNextStepButton>
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
import {mapGetters, mapActions} from 'vuex'
import {required, email, integer, requiredIf} from 'vuelidate/lib/validators'

export default {
  name: "CreateCompanyFormExecutives",
  components: {
    FormWizardNextStepButton,
    FormWizardPreviousStepButton,
    FormWizardResetButton,
    FormWizardGroup,
    FormWizardControl,
    FormWizardRadio
  },
  data() {
    return {
      submitted: false,
      formData: {
        executives: [
          {
            executive_type: 'Physique',
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
      },
      formOptions: {
        currExecutive: 0,
      },
      executiveTitles: [
        {
          id: 0,
          value: 'Président'
        },
        {
          id: 1,
          value: 'Directeur Général'
        }
      ],
    }
  },
  validations: {
    formData: {
      executives: {
        $each: {
          executive_type: {
            required
          },
          executive_title: {},
          executive_firstname: {
            required: requiredIf(e => {
              return e.executive_type === 'Physique'
            })
          },
          executive_lastname: {
            required: requiredIf(e => {
              return e.executive_type === 'Physique'
            })
          },
          executive_birthdate: {
            required: requiredIf(e => {
              return e.executive_type === 'Physique'
            })
          },
          executive_birth_city: {
            required: requiredIf(e => {
              return e.executive_type === 'Physique'
            })
          },
          executive_nationality: {
            required: requiredIf(e => {
              return e.executive_type === 'Physique'
            })
          },
          executive_address: {
            required: requiredIf(e => {
              return e.executive_type === 'Physique'
            })
          },
          executive_zipcode: {
            required: requiredIf(e => {
              return e.executive_type === 'Physique'
            }),
            integer,
          },
          executive_city: {
            required: requiredIf(e => {
              return e.executive_type === 'Physique'
            })
          },
          executive_mother_firstname_and_maiden_name: {
            required: requiredIf(e => {
              return e.executive_type === 'Physique'
            })
          },
          executive_father_name: {
            required: requiredIf(e => {
              return e.executive_type === 'Physique'
            })
          },
          executive_email: {
            required: requiredIf(e => {
              return e.executive_type === 'Physique'
            }),
            email
          },
          executive_company_name: {
            required: requiredIf(e => {
              return e.executive_type === 'Morale'
            })
          },
          executive_company_rcs_number: {
            required: requiredIf(e => {
              return e.executive_type === 'Morale'
            })
          },
          executive_company_headquarters_address: {
            required: requiredIf(e => {
              return e.executive_type === 'Morale'
            })
          },
          executive_company_zipcode: {
            required: requiredIf(e => {
              return e.executive_type === 'Morale'
            }),
            integer
          },
          executive_company_city: {
            required: requiredIf(e => {
              return e.executive_type === 'Morale'
            })
          },
          executive_company_rcs: {
            required: requiredIf(e => {
              return e.executive_type === 'Morale'
            })
          },
          executive_company_representative_name: {
            required: requiredIf(e => {
              return e.executive_type === 'Morale'
            })
          },
        }
      }
    }
  },
  methods: {
    ...mapActions(['updateProgression', 'setCompanyExecutives']),
    validateData() {
      this.submitted = true
      this.$v.$touch()

      if (!this.$v.$invalid) {
        let executives = this.formData.executives

        executives.forEach(e => {
          e.legal_company_rcs_number = typeof e.legal_company_rcs_number !== 'number' ? 0 : e.legal_company_rcs_number
          e.executive_company_rcs_number = typeof e.executive_company_rcs_number !== 'number' ? 0 : e.executive_company_rcs_number
          e.executive_company_zipcode = typeof e.executive_company_zipcode !== 'number' ? 0 : e.executive_company_zipcode
        })

        this.setCompanyExecutives(executives)

        if (this.$refs.nextStepButton) {
          this.$refs.nextStepButton.nextStep()
        }
      }
    },
    addExecutive() {
      this.submitted = false
      this.formData.executives.push({
        executive_type: 'Physique',
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
  }
  ,
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
