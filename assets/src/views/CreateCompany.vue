<template>
  <div class="view-create-company">
    <div class="container">
      <CreateCompanyForm></CreateCompanyForm>
    </div>
  </div>
</template>

<script>
import CreateCompanyForm from '../components/CreateCompanyForm';

export default {
  name: "CreateCompany",
  components: {
    CreateCompanyForm
  }
}
</script>

<style scoped>

</style>