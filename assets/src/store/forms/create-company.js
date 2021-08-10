import CreateCompanyFormLauncher from "../../components/CreateCompanyForm/CreateCompanyFormLauncher";
import CreateCompanyFormIdentity from "../../components/CreateCompanyForm/CreateCompanyFormIdentity";
import CreateCompanyFormStatus from "../../components/CreateCompanyForm/CreateCompanyFormStatus";
import CreateCompanyFormAssociates from "../../components/CreateCompanyForm/CreateCompanyFormAssociates";

export default {
  id: 0,
  name: 'create-company',
  launcher: CreateCompanyFormLauncher,
  steps: [
    {
      idx: 1,
      name: 'Identité',
      component: CreateCompanyFormIdentity
    },
    {
      idx: 2,
      name: 'Éléments statutaires',
      component: CreateCompanyFormStatus
    },
    {
      idx: 3,
      name: 'Associés',
      component: CreateCompanyFormAssociates
    },
  ],
}