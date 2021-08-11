<template>
  <div>
    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">Dénomination sociale</h2>
      <div class="form-wizard__form-control">
        <input v-model.trim="$v.name.$model" type="text" class="u-full-width"
               placeholder="Le nom de votre future société">
        <div class="error" v-if="submitted && !$v.name.required">La dénomination sociale est obligatoire</div>
      </div>
    </div>
    <div class="form-wizard__group">
      <input v-model="head_office_address" type="text" class="u-full-width"
             placeholder="Adresse du siège social">
      <div class="form-wizard__row">
        <input v-model="zipcode" type="text" class="u-full-width" placeholder="Code Postal">
        <input v-model="city" type="text" class="u-full-width" placeholder="Ville">
      </div>
      <input v-model="rcs_city" type="text" class="u-full-width"
             placeholder="La société sera inscrite au RCS de :">
    </div>
    <div class="form-wizard__group">
      <div class="form-wizard__row">
        <input v-model="phone" type="text" placeholder="Numéro de téléphone">
        <input v-model="email" type="text" placeholder="Adresse e-mail">
      </div>
    </div>
    <div class="form-wizard__navigation" @click="validateData">
      <FormWizardPreviousStepButton></FormWizardPreviousStepButton>
      <FormWizardNextStepButton></FormWizardNextStepButton>
    </div>
  </div>
</template>

<script>
import {mapActions} from 'vuex'
import {required, minLength} from 'vuelidate/lib/validators'
import FormWizardNextStepButton from '../FormWizard/FormWizardNextStepButton'
import FormWizardPreviousStepButton from '../FormWizard/FormWizardPreviousStepButton'

export default {
  name: "CreateCompanyFormIdentity",
  components: {
    FormWizardNextStepButton,
    FormWizardPreviousStepButton
  },
  data() {
    return {
      name: '',
      head_office_address: '',
      zipcode: '',
      city: '',
      rcs_city: '',
      phone: '',
      email: '',
      submitted: false,
    }
  },
  validations: {
    name: {
      required,
      minLength: minLength(4)
    }
  },
  methods: {
    ...mapActions(['setCompanyIdentity']),
    validateData() {
      this.submitted = true
      this.setCompanyIdentity({
        name: this.name,
        head_office_address: this.head_office_address,
        zipcode: this.zipcode,
        city: this.city,
        rcs_city: this.rcs_city,
        phone: this.phone,
        email: this.email,
      })

    }
  },
}
</script>