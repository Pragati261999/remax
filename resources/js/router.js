import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import PropertyDetails from "./pages/property/details.vue";
import PropertySearch from "./pages/property/search.vue";
import Login from "./pages/Login.vue";
import Signup from "./pages/Signup.vue";

// User component
import Dashboard from "./pages/user/Dashboard.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    // linkExactActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/property/view/:ml_num",
            name: "view-details",
            component: PropertyDetails,
        },
        {
            path: "/property/search/",
            name: "search-property",
            component: PropertySearch,
            props: true,
        },
        {
            path: "/login",
            name: "login",
            component: Login,
        },
        {
            path: "/sign-up",
            name: "sign-up",
            component: Signup,
        },
        {
            path: "/dashboard",
            name: "dashboard",
            component: Dashboard,
        },
    ],
});

router.beforeEach((to, from, next) => {
    if (!to.meta.middleware) {
        return next();
    }
    const middleware = to.meta.middleware;

    const context = {
        to,
        from,
        next,
        store,
    };
    return middleware[0]({
        ...context,
    });
});

export default router;
