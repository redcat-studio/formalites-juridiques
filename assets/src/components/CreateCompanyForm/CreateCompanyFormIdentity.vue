<template>
  <div>
    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">Dénomination sociale</h2>
      <input v-model="name" type="text" class="u-full-width" placeholder="Le nom de votre future société">
    </div>
    <div class="form-wizard__group">
      <input v-model="head_office_address" type="text" class="u-full-width" placeholder="Adresse du siège social">
      <div class="form-wizard__row">
        <input v-model="zipcode" type="text" class="u-full-width" placeholder="Code Postal">
        <input v-model="city" type="text" class="u-full-width" placeholder="Ville">
      </div>
      <input v-model="rcs_city" type="text" class="u-full-width" placeholder="La société sera inscrite au RCS de :">
    </div>
    <div class="form-wizard__group">
      <div class="form-wizard__row">
        <input v-model="phone" type="text" placeholder="Numéro de téléphone">
        <input v-model="email" type="text" placeholder="Adresse e-mail">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CreateCompanyFormIdentity",
  data() {
    return {
      name: '',
      head_office_address: '',
      zipcode: '',
      city: '',
      rcs_city: '',
      phone: '',
      email: '',
    }
  }
}
</script>