import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import Mixins from "./mixins";

import '~/plugins'
import '~/components'

Vue.mixin(Mixins);
Vue.config.productionTip = false
/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
