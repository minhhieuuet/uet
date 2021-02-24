import Login from '@/pages/LoginPage.vue';
import Register from '@/pages/RegisterPage.vue';

import AdminDashboardLayout from '@/pages/admin/Layout/DashboardLayout.vue'
import AdminDashboard from '@/pages/admin/Dashboard.vue';
import AdminStudent from '@/pages/admin/Student.vue';
import AdminStore from '@/pages/admin/Store.vue';


import UserDashboardLayout from '@/pages/user/Layout/DashboardLayout.vue'
import File from '@/pages/user/File.vue';
import User from '@/pages/user/User.vue';
import Progress from '@/pages/user/Progress.vue';

import NotFound from '@/pages/errors/404.vue';

export default {
    mode: 'history',
    routes: [{
            path: '/login',
            name: 'Login',
            component: Login
        },
        {
            path: '/',
            component: UserDashboardLayout,
            redirect: '/',
            children: [
                {
                    path: '/',
                    name: 'File',
                    component: File,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/file',
                    name: 'File',
                    component: File,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/user',
                    name: 'User',
                    component: User,
                },
                {
                    path: '/progress',
                    name: 'Progress',
                    component: Progress,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '*',
                    name: '404',
                    component: NotFound,
                    meta: {
                        requiresAuth: true
                    }
                }
            ]
        }
    ]
}