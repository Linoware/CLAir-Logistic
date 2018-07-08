require('./bootstrap')
import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuex from 'vuex'

import router from './router'
import StoreData from './store'
import App from './App.vue'
import {initialize} from './helpers/general'
import globals from './globals'
import Popper from 'popper.js'
import BootstrapVue from 'bootstrap-vue'
import Notifications from 'vue-notification'
import Toasted from 'vue-toasted'
import VueFroala from 'vue-froala-wysiwyg'
import VeeValidate from 'vee-validate'
import VueBootstrapTable from 'vue-bootstrap-table2'

require('froala-editor/js/froala_editor.pkgd.min')
require('froala-editor/css/froala_editor.pkgd.min.css')
require('font-awesome/css/font-awesome.css')
require('froala-editor/css/froala_style.min.css')

// Required to enable animations on dropdowns/tooltips/popovers
Popper.Defaults.modifiers.computeStyle.gpuAcceleration = false

Vue.config.productionTip = false


Vue.use(Vuex)
Vue.use(VueRouter)
Vue.use(BootstrapVue)
Vue.use(Notifications)
Vue.use(Toasted)
Vue.use(VueFroala)
Vue.use(VeeValidate, {fieldsBagName: 'formFields'})
Vue.use(VueBootstrapTable)

// Global RTL flag
Vue.mixin({
  data: globals
})

const store = new Vuex.Store(StoreData)

initialize(store, router)

const app = new Vue({
    el: '#app',
    router,
    store,
	template: '<App/>',
    components: {
        App
    },
    created(){
    	window.beforeunload = this.handler()
    },
    methods:{
    	handler(){
    		return 'hello'
    	}
    }
});