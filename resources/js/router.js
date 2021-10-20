import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import PropertyDetails from "./pages/property/details.vue";
import PropertySearch from "./pages/property/search.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    // linkExactActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/property/view/:ml_num",
            name: "view-details",
            component: PropertyDetails
        },
        {
            path: "/property/search/",
            name: "search-property",
            component: PropertySearch,
            props: true
        }
    ]
});

export default router;
