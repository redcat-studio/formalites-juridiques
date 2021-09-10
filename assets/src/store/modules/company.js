export default {
  state: {
    company: {
      identity: {
        type: '',
        name: '',
        head_office_address: '',
        zipcode: '',
        city: '',
        rcs_city: '',
        phone: '',
        email: '',
      },
      status: {
        head_office_type: '',
        domiciliation_company_name: '',
        domiciliation_company_siren: '',
        company_purpose: '',
        social_capital_type: '',
        social_capital_amount: 0,
        social_capital_min: '',
        social_capital_max: '',
        capital_release_rate: '',
        capital_released_amount: '',
        capital_deposit_date: '',
        capital_deposit_type: '',
        deposit_bank_name: '',
        deposit_bank_address: '',
        deposit_bank_zipcode: '',
        deposit_bank_city: '',
        notary_study_name: '',
        notary_study_address: '',
        notary_study_zipcode: '',
        notary_study_city: '',
        normal_company_exercice_closure_date: '',
        first_company_exercice_closure_data: '',
        business_acronym: '',
        business_commercial_name: '',
        business_domain_name: '',
        business_sign: '',
      },
      executives: [
        {
          executive_title: '',
          executive_firstname: '',
          executive_lastname: '',
          executive_birthdate: '',
          executive_birth_city: '',
          executive_nationality: '',
          executive_address: '',
          executive_zipcode: '',
          executive_city: '',
          executive_mother_firstname_and_maiden_name: '',
          executive_father_name: '',
          executive_email: '',
          executive_company_name: '',
          executive_company_rcs_number: '',
          executive_company_headquarters_address: '',
          executive_company_zipcode: '',
          executive_company_city: '',
          executive_company_rcs: '',
          executive_company_representative_name: '',
        }
      ],
      associates: [
        {
          associate_type: '',
          individual_genre: '',
          individual_firstname: '',
          individual_lastname: '',
          individual_birthdate: '',
          individual_birth_city: '',
          individual_nationality: '',
          individual_address: '',
          individual_zipcode: '',
          individual_city: '',
          individual_is_married_under_community_of_property: false,
          individual_did_contributed_cash: false,
          individual_did_contributed_in_kind: [
            true,
            ['', ''], // Nature puis montant de la contribution en nature
            ['', '']
          ],
          legal_company_name: '',
          legal_company_rcs_number: 0,
          legal_company_headquarters_address: '',
          legal_company_zipcode: 0,
          legal_company_city: '',
          legal_company_city_of_registry: '',
          legal_company_social_capital: 0,
          legal_company_social_form: '',
          legal_representative_firstname: '',
          legal_representative_lastname: '',
          legal_representative_genre: '',
          legal_representative_role: '',
          subject_to_what_income_tax: '',
          subject_to_what_real_tax: '',
          vat_system: ''
        }
      ]
    },
  },
  mutations: {
    SET_COMPANY(state, payload) {
      state.company = payload
    },
    SET_COMPANY_TYPE(state, payload) {
      state.company.identity.type = payload
    },
    SET_COMPANY_IDENTITY(state, payload) {
      payload.type = state.company.identity.type
      state.company.identity = payload
    },
    SET_COMPANY_STATUS(state, payload) {
      state.company.status = payload
    },
    UPDATE_COMPANY_STATUS(state, payload) {
      state.company.status = Object.assign(payload, state.company.status)
    },
    SET_COMPANY_ASSOCIATES(state, payload) {
      state.company.associates = payload
    },
    SET_COMPANY_EXECUTIVES(state, payload) {
      state.company.executives = payload
    },
  },
  actions: {
    setCompany(context, company) {
      context.commit('SET_COMPANY', company)
    },
    setCompanyType(context, companyType) {
      context.commit('SET_COMPANY_TYPE', companyType)
    },
    setCompanyIdentity(context, companyIdentity) {
      context.commit('SET_COMPANY_IDENTITY', companyIdentity)
    },
    setCompanyStatus(context, companyStatus) {
      context.commit('SET_COMPANY_STATUS', companyStatus)
    },
    updateCompanyStatus(context, companyStatus) {
      context.commit('UPDATE_COMPANY_STATUS', companyStatus)
    },
    setCompanyAssociates(context, companyAssociates) {
      context.commit('SET_COMPANY_ASSOCIATES', companyAssociates)
    },
    setCompanyExecutives(context, companyExecutives) {
      context.commit('SET_COMPANY_EXECUTIVES', companyExecutives)
    },
  },
  getters: {
    company(state, getters, rootState) {
      return rootState.company.company
    },
    companyType(state) {
      return state.company.identity.type
    },
    companyIdentity(state) {
      return state.company.identity
    },
    companyAssociates(state) {
      return state.company.associates
    },
    companyExecutives(state, getters, rootState) {
      return rootState.company.company.executives
    },
    companyStatus(state) {
      return state.company.status
    },
    companyTypes(state, getters, rootState) {
      return rootState.formWizard.activeFormConfig.companyTypes
    },
  }
}