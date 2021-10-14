import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import PropertyDetails from "./pages/property/details.vue";

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
            path: "/public/",
            name: "home",
            component: Home
        },
        {
            path: "/property/:ml_num",
            name: "view-details",
            component: PropertyDetails
        }
    ]
});

export default router;
