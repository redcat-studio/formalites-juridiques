import CreateCompanyFormLauncher from "../../components/CreateCompanyForm/CreateCompanyFormLauncher";
import CreateCompanyFormIdentity from "../../components/CreateCompanyForm/CreateCompanyFormIdentity";
import CreateCompanyFormStatus from "../../components/CreateCompanyForm/CreateCompanyFormStatus";
import CreateCompanyFormAssociates from "../../components/CreateCompanyForm/CreateCompanyFormAssociates";
import CreateCompanyFormExecutives from "../../components/CreateCompanyForm/CreateCompanyFormExecutives";
import CreateCompanyFormEnd from "../../components/CreateCompanyForm/CreateCompanyFormEnd";

export default {
  slug: 'create-company',
  launcher: CreateCompanyFormLauncher,
  dataContainer: 'company',
  steps: [
    {
      idx: 1,
      name: 'Identité',
      slug: 'identity',
      component: CreateCompanyFormIdentity
    },
    {
      idx: 2,
      name: 'Statut',
      slug: 'status',
      component: CreateCompanyFormStatus
    },
    {
      idx: 3,
      name: 'Associés',
      slug: 'associates',
      component: CreateCompanyFormAssociates
    },
    {
      idx: 4,
      name: 'Dirigeants',
      slug: 'executives',
      component: CreateCompanyFormExecutives
    },
    {
      idx: 5,
      name: 'Fin',
      slug: 'end',
      component: CreateCompanyFormEnd
    },
  ],
}