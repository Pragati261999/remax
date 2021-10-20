require("./bootstrap");

window.Vue = require("vue").default;

import router from "./router";
import App from "./layouts/App.vue";

Vue.component(
    "loader",
    require("./components/commonComponents/Loader.vue").default
);

Vue.component(
    "NoData",
    require("./components/commonComponents/NoData.vue").default
);

Vue.component(
    "add-header",
    require("./components/commonComponents/Header.vue").default
);

Vue.component(
    "add-footer",
    require("./components/commonComponents/Footer.vue").default
);

Vue.component(
    "property-search",
    require("./components/search/index.vue").default
);

Vue.component(
    "property-listing",
    require("./components/PropertyListing.vue").default
);

Vue.component("faq", require("./components/Faq.vue").default);

const app = new Vue({
    router,
    el: "#app",
    render: h => h(App)
});
