/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/global.scss';

// start the Stimulus application
import './bootstrap';

// Vue integration
import { provide } from 'vue';
import * as VueRouter from 'vue-router'; 
import { createI18n } from 'vue-i18n';
import { registerVueControllerComponents } from '@symfony/ux-vue';
import en from './locales/en.json';
import he from './locales/he.json';

registerVueControllerComponents(require.context('./vue/controllers', true, /\.vue$/, 'lazy'));

document.addEventListener('vue:before-mount', (event) => {
    const {
        componentName, // The Vue component's name
        component, // The resolved Vue component
        props, // The props that will be injected to the component
        app, // The Vue application instance
    } = event.detail;

    /*const router = VueRouter.createRouter({
        history: VueRouter.createWebHashHistory(),
        routes: [
            { path: '/', component: Main },
            { path: '/login', component: Login },
        ],
    });

    app.use(router);*/

    const i18n = createI18n({
        legacy: false,
        globalInjection: true,
        locale: 'he',
        fallbackLocale: 'he',
        messages: {
            en,
            he
        }
    });

    app.use(i18n);
});