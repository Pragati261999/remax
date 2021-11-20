<template>
    <div class="card">
        <div class="card-img position-relative">
            <router-link
                :to="{
                    name: 'view-details',
                    params: { ml_num: property.Ml_num },
                }"
            >
                <img
                    v-if="property.images.length > 0"
                    v-lazy="{
                        src: property.images[0].image,
                    }"
                    class="card-img-top"
                    alt="Property image not found"
                />
                <img
                    v-else
                    src="/assets/images/cards/e18b5e8d0dd16ff8b5f0a909ee27e764.jpeg"
                    class="card-img-top"
                    alt="Not Found"
                />
            </router-link>
            <div class="star">
                <ShareNetwork
                    network="facebook"
                    url="https://news.vuejs.org/issues/180"
                    title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
                    description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
                    quote="The hot reload is so fast it\'s near instant. - Evan You"
                    hashtags="vuejs,vite"
                >
                    Share on Facebook
                </ShareNetwork>

                <ShareNetwork
                    network="Email"
                    url="https://news.vuejs.org/issues/180"
                    title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
                    description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
                    quote="The hot reload is so fast it\'s near instant. - Evan You"
                    hashtags="vuejs,vite"
                >
                    Share on Email
                </ShareNetwork>

                <img src="/assets/images/icons/share.png" alt="" />
            </div>
            <div class="badge">
                <p class="text-color">{{ property.S_r }}</p>
            </div>
        </div>
        <div class="card-body pb-0">
            <div class="card-header">
                <div class="row">
                    <div class="col-10 d-flex align-items-center">
                        <h6 class="mb-0 card-title">${{ property.Lp_dol }}</h6>
                    </div>
                    <div class="col-2">
                        <small
                            @click="markFavourite(property.Ml_num)"
                            role="button"
                            class="font-weight-bold"
                        >
                            <span
                                v-if="
                                    $store.state.favourite.indexOf(
                                        property.Ml_num
                                    ) > -1
                                "
                            >
                                <img
                                    src="/assets/images/icons/bookmark_blue_saved.png"
                                    alt="Save"
                                    class="bookmark-image"
                                />
                            </span>
                            <span v-else>
                                <img
                                    src="/assets/images/icons/bookmark_blue.png"
                                    alt="Save"
                                    class="bookmark-image"
                                />
                            </span>
                        </small>
                    </div>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-8">
                    <p class="mb-0">
                        {{ property.Addr }}
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row ps-3 pe-3 pb-2">
                <div class="col-6 p-0">
                    <ul class="list-unstyled">
                        <li class="float-start">
                            <small class="ps-3 card-title fw-normal"
                                >MLS {{ property.Ml_num }}</small
                            >
                        </li>
                    </ul>
                </div>
                <div class="col-6 p-0">
                    <ul class="list-unstyled">
                        <li class="float-end">
                            <small class="pe-3"
                                ><img
                                    src="/assets/images/icons/bathTab.png"
                                    alt=""
                                    width="16px"
                                />
                                <span class="count card-title">
                                    {{
                                        property.Bath_tot
                                            ? parseInt(property.Bath_tot)
                                            : "0"
                                    }}</span
                                >
                            </small>
                        </li>
                        <li class="float-end">
                            <small class="pe-3"
                                ><img
                                    src="/assets/images/icons/bed.png"
                                    alt=""
                                    width="16px"
                                />
                                <span class="count card-title">
                                    {{ getTotalRooms }}</span
                                >
                            </small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import swal from "sweetalert";
export default {
    props: {
        property: {
            type: Object,
            default: () => ({}),
        },
    },
    data() {
        return {};
    },

    computed: {
        getTotalRooms() {
            let count = 0;
            if (this.property) {
                if (
                    this.property.Rm1_wth !== null &&
                    this.property.Rm1_wth > 0
                ) {
                    count++;
                }
                if (
                    this.property.Rm2_wth !== null &&
                    this.property.Rm2_wth > 0
                ) {
                    count++;
                }
                if (
                    this.property.Rm3_wth !== null &&
                    this.property.Rm3_wth > 0
                ) {
                    count++;
                }
                if (
                    this.property.Rm4_wth !== null &&
                    this.property.Rm4_wth > 0
                ) {
                    count++;
                }
                if (
                    this.property.Rm5_wth !== null &&
                    this.property.Rm5_wth > 0
                ) {
                    count++;
                }
                if (
                    this.property.Rm6_wth !== null &&
                    this.property.Rm6_wth > 0
                ) {
                    count++;
                }
                if (
                    this.property.Rm7_wth !== null &&
                    this.property.Rm7_wth > 0
                ) {
                    count++;
                }
                if (
                    this.property.Rm8_wth !== null &&
                    this.property.Rm8_wth > 0
                ) {
                    count++;
                }
                if (
                    this.property.Rm9_wth !== null &&
                    this.property.Rm9_wth > 0
                ) {
                    count++;
                }
                if (
                    this.property.Rm10_wth !== null &&
                    this.property.Rm10_wt > 0
                ) {
                    count++;
                }
                if (
                    this.property.Rm11_wth !== null &&
                    this.property.Rm11_wt > 0
                ) {
                    count++;
                }
                if (
                    this.property.Rm12_wth !== null &&
                    this.property.Rm12_wt > 0
                ) {
                    count++;
                }
            }

            return count;
            // parseInt(property.Rms);
        },
    },
    methods: {
        markFavourite(ml_num) {
            // check user is logged in
            const self = this;
            if (this.$store.state.auth_token) {
                const token = this.$store.state.auth_token;
                axios
                    .post(
                        "/api/user/property/manage/favourite-property",
                        {
                            ml_num,
                        },
                        {
                            headers: { Authorization: `Bearer ${token}` },
                        }
                    )
                    .then((res) => {
                        const d = res.data.data;
                        if (d.action == "added") {
                            self.$store.commit("addFavourite", d.ml_num);
                        } else {
                            self.$store.commit("removeFavourite", d.ml_num);
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            } else {
                swal({
                    text: "You are not logged in",
                    icon: "warning",
                    buttons: ["Close", "Go to login"],
                }).then((res) => {
                    if (res) {
                        self.$router.push("/login");
                    }
                });
            }
        },
    },
};
</script>

<style scoped>
.bookmark-image {
    height: 20px !important;
}
.share-btn > a {
    border: 1px solid #ccc;
    padding: 5px;
    font-size: 12px;
    font-family: Verdana, Arial;
}
.share-btn > a:hover {
    cursor: pointer;
}
</style>
