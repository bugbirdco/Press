import Vue from 'vue'

import { ValidationProvider, ValidationObserver, extend } from 'vee-validate';
import { required, alpha } from 'vee-validate/dist/rules';

Vue.component('validation-provider', ValidationProvider);
Vue.component('validation-observer', ValidationObserver);

extend('required', required);
extend('alpha', alpha);
