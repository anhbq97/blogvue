require('./bootstrap');
import './jquery';

import { createApp } from 'vue';
import App from './vue/app';
import router from './vue/router/index.vue';
import lazyPlugin from 'vue3-lazy';

// Make sure to _use_ the router instance to make the
// whole app router-aware.

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core';

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

/* import specific icons */
import { faUserSecret } from '@fortawesome/free-solid-svg-icons';

/* add icons to the library */
library.add(faUserSecret);


const app = createApp(App);

app.use(lazyPlugin, {
    loading: 'loading.png',
    error: 'error.png'
});
app.component('font-awesome-icon', FontAwesomeIcon);
app.use(router);
app.mount('#app');