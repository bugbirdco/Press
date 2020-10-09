import Vue from 'vue'

// SETUP

import './components';

import { BootstrapVue } from 'bootstrap-vue'
Vue.use(BootstrapVue);

import {library} from '@fortawesome/fontawesome-svg-core'
import {fas} from '@fortawesome/free-solid-svg-icons'
import {far} from '@fortawesome/free-regular-svg-icons'
import {FontAwesomeIcon, FontAwesomeLayers, FontAwesomeLayersText} from '@fortawesome/vue-fontawesome'
library.add(fas);
library.add(far);
Vue.component('fa-icon', FontAwesomeIcon);
Vue.component('fa-layer', FontAwesomeLayers);
Vue.component('fa-text', FontAwesomeLayersText);

import './validator'

// RUN!

window.addEventListener('DOMContentLoaded', () => {
    window.$app.ready = true;
});

window.$app = new Vue({
    el: '#app',
    // router,
    // store,
    data() {
        return {
            ...window.$setup.data,
            ready: false,
        }
    },
    ...window.$setup.constructor
});
