import { createWebHashHistory, createRouter } from 'vue-router';
import AppHome from './views/AppHome.vue';
import LoginView from './views/LoginView.vue';
import singleUserView from './views/singleUserView.vue';
import singleBookView from './views/singleBookView.vue';

const router = createRouter({

    history: createWebHashHistory(),

    routes: [
        {
            path: '/',
            name: 'login',
            component: LoginView,
        },
        {
            path: '/home',
            name: 'home',
            component: AppHome,
        },
        {
            path: '/casa-editrice/:slug',
            name: 'singleUser',
            component: singleUserView,
        },
        {
            path: '/libro/:slug',
            name: 'singleBook',
            component: singleBookView,
        },
    ]
});

export { router }
