
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');
import router from "./router";
import App from './views/App'

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
