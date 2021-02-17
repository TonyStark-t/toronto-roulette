import Vue from 'vue';
import VueRouter from 'vue-router';

import test from './components/Test.vue';

Vue.use(VueRouter);

const routes = [
    {
        name: 'test',
        path: '/test',
        component: require('./components/Test.vue').default,
        props: true
    },
    {
        name: 'master',
        path: '/master',
        component: require('./components/Master.vue').default,
        props: true
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
});

// export default new VueRouter({
//     mode: 'history',
//     routes:  [
//         {
//             name: 'test',
//             path: '/test',
//             component: test,
//         }
//     ]
// });

export default router;