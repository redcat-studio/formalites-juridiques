import Vue from 'vue';
import App from './src/App';

/**
 * Import modules
 */
import router from './src/router'
import store from './src/store'

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