import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import PropertyDetails from "./pages/property/details.vue";
import PropertySearch from "./pages/property/search.vue";
import Login from "./pages/Login.vue";
import Signup from "./pages/Signup.vue";
import UserDashboard from "./pages/user/Dashboard.vue";
import NotFound from "./pages/notFound/404.vue";

import Blogs from "./pages/Blog.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    // linkExactActiveClass: "active",
    routes: [
        {
            path: "*",
            name: "404",
            component: NotFound,
        },
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
            path: "/blog",
            name: "blog",
            component: Blogs,
        },
        {
            path: "/dashboard/my-account",
            name: "my-account",
            component: UserDashboard,
        },
        {
            path: "/dashboard/bookmarks",
            name: "bookmarks",
            component: UserDashboard,
        },
        {
            path: "/dashboard/notifications",
            name: "notifications",
            component: UserDashboard,
        },
        {
            path: "/dashboard/recent-visited",
            name: "recent-visited",
            component: UserDashboard,
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
