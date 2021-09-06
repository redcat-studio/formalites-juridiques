<template>
  <div>
    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">Dénomination sociale</h2>
      <div class="form-wizard__form-control">
        <input v-model.trim="formData.name" type="text" class="u-full-width"
               placeholder="Le nom de votre future société">
        <div class="error" v-if="submitted && !$v.name.required">La dénomination sociale est obligatoire</div>
      </div>
    </div>
    <div class="form-wizard__group">
      <input v-model="formData.head_office_address" type="text" class="u-full-width"
             placeholder="Adresse du siège social">
      <div class="form-wizard__row">
        <input v-model="formData.zipcode" type="text" class="u-full-width" placeholder="Code Postal">
        <input v-model="formData.city" type="text" class="u-full-width" placeholder="Ville">
      </div>
      <input v-model="formData.rcs_city" type="text" class="u-full-width"
             placeholder="La société sera inscrite au RCS de :">
    </div>
    <div class="form-wizard__group">
      <div class="form-wizard__row">
        <input v-model="formData.phone" type="text" placeholder="Numéro de téléphone">
        <input v-model="formData.email" type="text" placeholder="Adresse e-mail">
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
import {mapActions, mapGetters} from 'vuex'
import {required, minLength} from 'vuelidate/lib/validators'
import FormWizardNextStepButton from '../FormWizard/FormWizardNextStepButton'
import FormWizardPreviousStepButton from '../FormWizard/FormWizardPreviousStepButton'
import FormWizardResetButton from '../FormWizard/FormWizardResetButton'

export default {
  name: "CreateCompanyFormIdentity",
  components: {
    FormWizardNextStepButton,
    FormWizardPreviousStepButton,
    FormWizardResetButton,
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
    name: {
      required,
      minLength: minLength(4)
    }
  },
  computed: {
    ...mapGetters(['formProgression', 'activeStepIndex', 'companyType']),
  },
  methods: {
    ...mapActions(['setCompanyIdentity', 'updateProgression']),
    validateData() {
      this.submitted = true

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

      data.zipcode = typeof this.formData.zipcode === 'string' ? 0 : this.formData.zipcode

      this.setCompanyIdentity(data)
    },
  },
  updated() {
    let progression = {options: {}, data: {type: this.companyType, ...this.formData}}
    this.updateProgression(progression)
  },
  mounted() {
    let progression = this.formProgression[this.activeStepIndex]
    if(progression != null && progression.data != null) {
      this.formData = progression.data
    }
  }
}
</script>