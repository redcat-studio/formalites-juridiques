<template>
  <div>
    <FormWizardGroup title="Dénomination sociale">
      <FormWizardControl :showErrors="submitted" :v="$v.formData.name">
        <input
            v-model.trim="$v.formData.name.$model"
            type="text"
            title="Le nom de votre future société"
            aria-label="Le nom de votre future société"
            placeholder="Le nom de votre future société"
        >
      </FormWizardControl>
    </FormWizardGroup>

    <FormWizardGroup>
      <FormWizardControl :showErrors="submitted" :v="$v.formData.head_office_address">
        <input
            v-model.trim="$v.formData.head_office_address.$model"
            type="text"
            title="Adresse du siège social"
            aria-label="Adresse du siège social"
            placeholder="Adresse du siège social"
        >
      </FormWizardControl>

      <div class="form-wizard__row">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.zipcode">
          <input
              v-model.trim="$v.formData.zipcode.$model"
              type="text"
              title="Code Postal du siège social"
              aria-label="Code Postal du siège social"
              placeholder="Code Postal"
          >
        </FormWizardControl>
        <FormWizardControl :showErrors="submitted" :v="$v.formData.city">
          <input
              v-model.trim="$v.formData.city.$model"
              type="text"
              title="Ville du siège social"
              aria-label="Ville du siège social"
              placeholder="Ville"
          >
        </FormWizardControl>
      </div>
      <FormWizardControl :showErrors="submitted" :v="$v.formData.rcs_city">
        <input
            v-model.trim="$v.formData.rcs_city.$model"
            type="text"
            title="La société sera inscrite au RCS de :"
            aria-label="La société sera inscrite au RCS de :"
            placeholder="La société sera inscrite au RCS de :"
        >
      </FormWizardControl>
    </FormWizardGroup>

    <FormWizardGroup>
      <div class="form-wizard__row">
        <FormWizardControl :showErrors="submitted" :v="$v.formData.phone">
          <input
              v-model.trim="$v.formData.phone.$model"
              type="text"
              title="Numéro de téléphone"
              aria-label="Numéro de téléphone"
              placeholder="Numéro de téléphone"
          >
        </FormWizardControl>
        <FormWizardControl :showErrors="submitted" :v="$v.formData.email">
          <input
              v-model="$v.formData.email.$model"
              type="text"
              title="Adresse e-mail"
              aria-label="Adresse e-mail"
              placeholder="Adresse e-mail"
          >
        </FormWizardControl>
      </div>
    </FormWizardGroup>
    <div class="form-wizard__navigation">
      <FormWizardPreviousStepButton></FormWizardPreviousStepButton>
      <FormWizardNextStepButton @click.native="validateData" ref="nextStepButton"></FormWizardNextStepButton>
      <FormWizardResetButton></FormWizardResetButton>
    </div>
  </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex'
import {required, minLength, integer, email} from 'vuelidate/lib/validators'
import FormWizardNextStepButton from '../FormWizard/FormWizardNextStepButton'
import FormWizardPreviousStepButton from '../FormWizard/FormWizardPreviousStepButton'
import FormWizardResetButton from '../FormWizard/FormWizardResetButton'
import FormWizardGroup from '../FormWizard/FormWizardGroup'
import FormWizardControl from '../FormWizard/FormWizardControl'

export default {
  name: "CreateCompanyFormIdentity",
  components: {
    FormWizardNextStepButton,
    FormWizardPreviousStepButton,
    FormWizardResetButton,
    FormWizardGroup,
    FormWizardControl
  },
  data() {
    return {
      formData: {
        name: '',
        head_office_address: '',
        zipcode: '',
        city: '',
        rcs_city: '',
        phone: '',
        email: '',
      },
      submitted: false,
    }
  },
  validations: {
    formData: {
      name: {
        required,
        minLength: minLength(4)
      },
      head_office_address: {
        required,
      },
      zipcode: {
        required,
        integer,
      },
      city: {
        required,
      },
      rcs_city: {
        required,
      },
      phone: {
        required,
        integer
      },
      email: {
        required,
        email
      },
    },
  },
  computed: {
    ...mapGetters(['formProgression', 'activeStepIndex', 'companyType']),
  },
  methods: {
    ...mapActions(['setCompanyIdentity', 'updateProgression']),
    validateData() {
      this.submitted = true
      this.$v.$touch()

      if (!this.$v.$invalid) {
        let data = {
          type: this.companyType,
          name: this.formData.name,
          head_office_address: this.formData.head_office_address,
          zipcode: this.formData.zipcode,
          city: this.formData.city,
          rcs_city: this.formData.rcs_city,
          phone: this.formData.phone,
          email: this.formData.email,
        }

        this.setCompanyIdentity(data)
        this.$refs.nextStepButton.nextStep()
      }
    },
  },
  updated() {
    let progression = {options: {}, data: {type: this.companyType, ...this.formData}}
    this.updateProgression(progression)
  },
  mounted() {
    let progression = this.formProgression[this.activeStepIndex]
    if (progression != null && progression.data != null) {
      this.formData = progression.data
    }
  }
}
</script>