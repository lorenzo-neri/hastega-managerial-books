import { createWebHashHistory, createRouter } from 'vue-router';
import AppHome from './views/AppHome.vue';

const router = createRouter({

    history: createWebHashHistory(),

    routes: [
        {
            path: '/',
            name: 'home',
            component: AppHome,
        },
    ]
});

export { router }
