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
        <div
            :class="{
            'form-wizard__group': true,
            'hide': formOptions.currExecutive !== $v.formData.executives.$model.indexOf(exec.$model)
          }"
        >
          <h2 class="form-wizard__group-title">Le dirigeant de la société</h2>
          <p class="form-wizard__group-subtitle">Le dirigeant est une personne :</p>

          <div class="form-wizard__form-control">
            <select v-model="exec.executive_type.$model">
              <option value="Physique">Physique</option>
              <option value="Morale">Morale</option>
            </select>
          </div>
          <div v-if="exec.executive_type.$model === 'Physique'">
            <div v-if="companyType === 'SASU' || companyType === 'SAS'">
              <p class="form-wizard__group-inner-subtitle">Titre du dirigeant</p>
              <div class="form-wizard__row">
                <div class="form-wizard__radio form-wizard__form-control" v-for="title in executiveTitles">
                  <input
                      v-model="exec.executive_title.$model"
                      :id="`exec-${$v.formData.executives.$model.indexOf(exec.$model)}-${title.id}`"
                      name="executive_title"
                      type="radio"
                      :value="title.value"
                  >
                  <label
                      :for="`exec-${$v.formData.executives.$model.indexOf(exec.$model)}-${title.id}`"
                      :class="{
                    'button button-primary button-primary--stroke':true,
                    'active': title.value===exec.executive_title.$model
                  }"
                  >
                    {{ title.value }}
                  </label>
                </div>
              </div>
            </div>

            <p class="form-wizard__group-inner-subtitle">Identité du dirigeant</p>
            <div class="form-wizard__row">
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_firstname.$model"
                    type="text"
                    placeholder="Prénom"
                >
                <div class="error" v-if="submitted && !exec.executive_firstname.required">
                  Ce champ est obligatoire
                </div>
              </div>
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_lastname.$model"
                    type="text"
                    placeholder="Nom"
                >
                <div class="error" v-if="submitted && !exec.executive_lastname.required">
                  Ce champ est obligatoire
                </div>
              </div>
            </div>
            <div class="form-wizard__row">
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_birthdate.$model"
                    type="date"
                    placeholder="Date de naissance"
                >
                <div class="error" v-if="submitted && !exec.executive_birthdate.required">
                  Ce champ est obligatoire
                </div>
              </div>
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_birth_city.$model"
                    type="text"
                    placeholder="Ville de naissance"
                >
                <div class="error" v-if="submitted && !exec.executive_birth_city.required">
                  Ce champ est obligatoire
                </div>
              </div>
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_nationality.$model"
                    type="text"
                    placeholder="Nationalité"
                >
                <div class="error" v-if="submitted && !exec.executive_nationality.required">
                  Ce champ est obligatoire
                </div>
              </div>
            </div>
            <p class="form-wizard__group-inner-subtitle">Informations complémentaires</p>
            <div class="form-wizard__row">
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_address.$model"
                    type="text"
                    placeholder="Adresse"
                >
                <div class="error" v-if="submitted && !exec.executive_address.required">
                  Ce champ est obligatoire
                </div>
              </div>
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_zipcode.$model"
                    type="text"
                    placeholder="Code postal"
                >
                <div class="error" v-if="submitted && !exec.executive_zipcode.required">
                  Ce champ est obligatoire
                </div>
                <div class="error" v-if="submitted && !exec.executive_zipcode.integer">
                  Ce champ ne peut contenir que des chiffres
                </div>
              </div>
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_city.$model"
                    type="text"
                    placeholder="Ville"
                >
                <div class="error" v-if="submitted && !exec.executive_city.required">
                  Ce champ est obligatoire
                </div>
              </div>
            </div>
            <div class="form-wizard__row">
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_mother_firstname_and_maiden_name.$model"
                    type="text"
                    placeholder="Prénom et nom de jeune fille de la mère"
                >
                <div class="error" v-if="submitted && !exec.executive_mother_firstname_and_maiden_name.required">
                  Ce champ est obligatoire
                </div>
              </div>
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_father_name.$model"
                    type="text"
                    placeholder="Prénom et nom du père"
                >
                <div class="error" v-if="submitted && !exec.executive_father_name.required">
                  Ce champ est obligatoire
                </div>
              </div>
            </div>
            <div class="form-wizard__row">
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_email.$model"
                    type="text"
                    placeholder="Adresse e-mail du gérant"
                >
                <div class="error" v-if="submitted && !exec.executive_email.required">
                  Ce champ est obligatoire
                </div>
                <div class="error" v-if="submitted && !exec.executive_email.email">
                  Cette adresse e-mail est invalide
                </div>
              </div>
            </div>
          </div>
          <div v-else>
            <div class="form-wizard__row">
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_company_name.$model"
                    type="text"
                    placeholder="Nom de la société"
                >
                <div class="error" v-if="submitted && !exec.executive_company_name.required">
                  Ce champ est obligatoire
                </div>
              </div>
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_company_rcs_number.$model"
                    type="text"
                    placeholder="Numéro RCS"
                >
                <div class="error" v-if="submitted && !exec.executive_company_rcs_number.required">
                  Ce champ est obligatoire
                </div>
              </div>
            </div>
            <div class="form-wizard__row">
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_company_headquarters_address.$model"
                    type="text"
                    placeholder="Adresse du siège social"
                >
                <div class="error" v-if="submitted && !exec.executive_company_headquarters_address.required">
                  Ce champ est obligatoire
                </div>
              </div>

              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_company_zipcode.$model"
                    type="text"
                    placeholder="Code Postal"
                >
                <div class="error" v-if="submitted && !exec.executive_company_zipcode.required">
                  Ce champ est obligatoire
                </div>
              </div>
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_company_city.$model"
                    type="text"
                    placeholder="Ville"
                >
                <div class="error" v-if="submitted && !exec.executive_company_city.required">
                  Ce champ est obligatoire
                </div>
              </div>
            </div>
            <div class="form-wizard__row">
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_company_rcs.$model"
                    type="text"
                    placeholder="Immatriculée au Registre du Commerce et des Sociétés du"
                >
                <div class="error" v-if="submitted && !exec.executive_company_rcs.required">
                  Ce champ est obligatoire
                </div>
              </div>
            </div>
            <div class="form-wizard__row">
              <div class="form-wizard__form-control">
                <input
                    v-model="exec.executive_company_representative_name.$model"
                    type="text"
                    placeholder="Représentant légal de la société"
                >
                <div class="error" v-if="submitted && !exec.executive_company_representative_name.required">
                  Ce champ est obligatoire
                </div>
              </div>
            </div>


          </div>
          <button
              v-if="formOptions.currExecutive !== 0"
              @click="removeCurrExecutive"
              class="button button-primary button-small"
          >
            Supprimer ce dirigeant
          </button>
        </div>
      </div>
    </div>

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
import {mapGetters, mapActions} from 'vuex'
import {required, email, integer, requiredIf} from 'vuelidate/lib/validators'

export default {
  name: "CreateCompanyFormExecutives",
  components: {
    FormWizardNextStepButton,
    FormWizardPreviousStepButton,
    FormWizardResetButton
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
          executive_title: {
            required: requiredIf(e => {
              return e.executive_type === 'Physique'
            })
          },
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

      console.log(this.$v.$invalid)
      console.log(this.$v.formData.executives.$each)

      if (!this.$v.$invalid) {
        let executives = this.formData.executives
        this.setCompanyExecutives(executives)

        if (this.$refs.nextStepButton) {
          // this.$refs.nextStepButton.nextStep()
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