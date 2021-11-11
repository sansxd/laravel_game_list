/*
    Imports Vue and VueRouter to extend with the routes.
*/
import Vue from 'vue';
import VueRouter from 'vue-router';

/*
    Extends Vue to use Vue Router
*/
Vue.use(VueRouter);

/*
    Makes a new VueRouter that we will use to run all of the routes
    for the app.
*/
export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'inicio',
            component: Vue.component(
                'AllGame',
                require('./components/AllGame.vue').default
            )
        },
        {
            path: '/create',
            name: 'create',
            component: Vue.component(
                'Create',
                require('./components/CreateGame.vue').default
            )
        },
        {
            path: '/edit/:id',
            name: 'edit',
            component: Vue.component(
                'EditGame',
                require('./components/EditGame.vue').default
            )
        },
    ]
});