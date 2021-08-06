export default {
  state: {
    company: {
      identity: {
        type: {
          id: null,
          name: null
        }
      },
      associates: {},
      executives: {},
      status: {}
    },
    companyTypes: [
      {
        id: 0,
        name: 'EURL'
      },
      {
        id: 1,
        name: 'SARL'
      },
      {
        id: 2,
        name: 'SASU'
      },
      {
        id: 3,
        name: 'SAS'
      },
    ],
  },
  mutations: {
    SET_COMPANY(state, payload) {
      state.company = payload
    },
    SET_COMPANY_TYPE(state, payload) {
      state.company.identity.type = payload
    },
    SET_COMPANY_IDENTITY(state, payload) {
      state.company.identity = payload
    },
    SET_COMPANY_ASSOCIATES(state, payload) {
      state.company.associates = payload
    },
    SET_COMPANY_EXECUTIVES(state, payload) {
      state.company.executives = payload
    },
    SET_COMPANY_STATUS(state, payload) {
      state.company.status = payload
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
    setCompanyAssociates(context, companyAssociates) {
      context.commit('SET_COMPANY_ASSOCIATES', companyAssociates)
    },
    setCompanyExecutives(context, companyExecutives) {
      context.commit('SET_COMPANY_EXECUTIVES', companyExecutives)
    },
    setCompanyStatus(context, companyStatus) {
      context.commit('SET_COMPANY_STATUS', companyStatus)
    },
  },
  getters: {
    company(state) {
      return state.company
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
    companyExecutives(state) {
      return state.company.executives
    },
    companyStatus(state) {
      return state.company.status
    },
    companyTypes(state) {
      return state.companyTypes
    },
  }
}