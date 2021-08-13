<template>
  <div>
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
  name: "CreateCompanyFormExecutives",
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
      },
      formOptions: {
        currExecutive: 0,
      },
    }
  },
  methods: {
    ...mapActions(['updateProgression', 'setCompanyExecutives']),
    validateData() {
      let executives = this.formData.executives;

      executives.forEach(e => {
        e.executive_zipcode = typeof e.executive_zipcode === 'string' ? 0 : e.executive_zipcode
        e.executive_company_rcs_number = typeof e.executive_company_rcs_number === 'string' ? 0 : e.executive_company_rcs_number
        e.executive_company_zipcode = typeof e.executive_company_zipcode === 'string' ? 0 : e.executive_company_zipcode
      })
      this.setCompanyExecutives(executives)
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