import Vue from 'vue';
import App from './src/App';

/**
 * Import modules
 */
import router from './src/router'

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
    render: h => h(App)
});