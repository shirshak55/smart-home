
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    'components': {
        'layout-power': require('./components/layout_about'),
        'layout-about': require('./components/layout_about'),
        'layout-copyright': require('./components/layout_copyright'),
        'layout-header': require('./components/layout_header'),
        'scroll-to-top': require('./components/scroll_to_top'),
        'layout-footer': require('./components/layout_footer')
    }
});
