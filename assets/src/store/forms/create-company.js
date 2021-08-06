import CreateCompanyFormIdentity from "../../components/CreateCompanyForm/CreateCompanyFormIdentity";

export default {
  id: 0,
  name: 'create-company',
  steps: [
    {
      idx: 1,
      name: 'Identité',
      component: CreateCompanyFormIdentity
    },
    {
      idx: 2,
      name: 'Éléments statutaires',
      component: null
    },
    {
      idx: 3,
      name: 'Associés',
      component: null
    },
  ],
}