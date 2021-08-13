import Vue from 'vue';
import App from './src/App';
import Vuelidate from 'vuelidate'
import axios from 'axios'

/**
 * Import modules
 */
import router from './src/router'
import store from './src/store'

Vue.use(Vuelidate)
Vue.prototype.$axios = axios

// Helper methods
Vue.prototype.$scrollToTop = () => {
  window.scrollTo(0, 0);
}

/**
 * Import styles
 */
import './css/app.scss';

/**
 * Create a fresh Vue Application instance
 */
new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
});