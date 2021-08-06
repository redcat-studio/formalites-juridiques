<template>
  <div>
    <div class="form-wizard__group">
      <h2 class="form-wizard__group-title">Fixation du siège</h2>
      <p class="form-wizard__group-subtitle">Le siège sera installé : </p>
      <div class="form-wizard__row">
        <div v-for="type in head_office_location_types"
             :class="{'button button-beige':true, 'active': type.id===head_office_type}"
             @click="setHeadOfficeLocation(type.id)">
          {{type.value}}
        </div>
      </div>
    </div>
    <div v-if="head_office_type === 1" class="form-wizard__group">
      <div class="form-wizard__row">
        <input type="text" placeholder="Nom de la société de domiciliation">
        <input type="text" placeholder="Numéro SIREN de la société de domiciliation">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CreateCompanyFormStatus",
  data() {
    return {
      head_office_type: null,
      head_office_location_types: [
        {
          id: 0,
          value: 'Dans un local commercial'
        },
        {
          id: 1,
          value: 'Dans une société de domiciliation'
        },
        {
          id: 2,
          value: 'Au domicile du dirigeant'
        },
      ]

    }
  },
  methods: {
    setHeadOfficeLocation(id) {
      this.head_office_type = id
    }
  }
}
</script>

<style scoped>

</style>