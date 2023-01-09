/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/global.scss';

// start the Stimulus application
//import './bootstrap';

// Vue integration
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';  
import { createI18n } from 'vue-i18n';
import store from './vue/utils/Store';
import en from './locales/en.json';
import he from './locales/he.json';
import Main from './vue/controllers/Main';

//import { registerVueControllerComponents } from '@symfony/ux-vue';
//registerVueControllerComponents(require.context('./vue/controllers', true, /\.vue$/, 'lazy'));

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: () => import('./vue/controllers/Dashboard/Main'), meta: { requiresAuth: true } },
        { path: '/sign-in', name: 'Login', component: () => import('./vue/controllers/Auth/Login'), meta: { requiresAuth: false } },
    ],
});

router.beforeEach(async (to, from, next) => {
    if (to.meta.requiresAuth && !store.getters.isAuthenticated) {
        next({ name: 'Login' });
    } else {
        next();
    }
});

const i18n = createI18n({
    legacy: false,
    globalInjection: true,
    locale: 'he',
    fallbackLocale: 'he',
    messages: { en, he }
});

const app = createApp(Main)
    .provide('router', router)
    .provide('store', store)
    .use(router)
    .use(i18n)
    .mount('#app');