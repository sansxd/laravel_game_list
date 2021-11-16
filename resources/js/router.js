/*
    Imports Vue and Router to extend with the routes.
*/
import Vue from 'vue';
import Router from 'vue-router';

/*
    Extends Vue to use Vue Router
*/
Vue.use(Router);

/*
    Makes a new Router that we will use to run all of the routes
    for the app.
*/
export default new Router({
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
            props: true,
            component: Vue.component(
                'EditGame',
                require('./components/EditGame.vue').default
            )
        },
    ]
});