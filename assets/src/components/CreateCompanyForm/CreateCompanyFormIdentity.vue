<template>
  <div>
    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">Dénomination sociale</h2>
      <input v-model="formData.name" type="text" class="u-full-width" placeholder="Le nom de votre future société">
    </div>
    <div class="form-wizard__group">
      <input v-model="formData.head_office_address" type="text" class="u-full-width" placeholder="Adresse du siège social">
      <div class="form-wizard__row">
        <input v-model="formData.zipcode" type="text" class="u-full-width" placeholder="Code Postal">
        <input v-model="formData.city" type="text" class="u-full-width" placeholder="Ville">
      </div>
      <input v-model="formData.rcs_city" type="text" class="u-full-width" placeholder="La société sera inscrite au RCS de :">
    </div>
    <div class="form-wizard__group">
      <div class="form-wizard__row">
        <input v-model="formData.phone" type="text" placeholder="Numéro de téléphone">
        <input v-model="formData.email" type="text" placeholder="Adresse e-mail">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CreateCompanyFormIdentity",
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
    }
  }
}
</script>