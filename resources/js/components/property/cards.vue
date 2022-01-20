<template>
    <div class="card">
        <ShareProp :mid="property.Ml_num" :property="property" />
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
                    src="/assets/images/cards/photo-coming-soon.png"
                    class="card-img-top"
                    alt="Not Found"
                />
            </router-link>
            <div
                role="button"
                data-toggle="modal"
                :data-target="`#shareModal${property.Ml_num}`"
                class="star"
            >
                <img src="/assets/images/icons/share.png" alt="" />
            </div>
            <div class="badge">
                <p class="text-color">{{ property.S_r }}</p>
            </div>
        </div>

        <div class="card-body pb-0">
            <div class="card-header">
                <div class="d-flex">
                    <router-link
                        :to="{
                            name: 'view-details',
                            params: { ml_num: property.Ml_num },
                        }"
                        class="d-flex flex-grow-1 align-items-center"
                    >
                        <div>
                            <h6 class="mb-0 card-title">
                                ${{ property.Lp_dol }}
                            </h6>
                        </div>
                    </router-link>
                    <div class="text-right pl-2">
                        <!-- Make fav -->
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
            <router-link
                :to="{
                    name: 'view-details',
                    params: { ml_num: property.Ml_num },
                }"
            >
                <div class="row pt-2">
                    <div class="col-8">
                        <p class="mb-0">
                            {{ property.Addr || "N/A" }}
                        </p>
                    </div>
                </div>
            </router-link>
        </div>
        <router-link
            :to="{
                name: 'view-details',
                params: { ml_num: property.Ml_num },
            }"
        >
            <div class="card-footer">
                <div class="row ps-3 pe-3 pb-2">
                    <div class="col-8 p-0">
                        <ul class="list-unstyled">
                            <li class="float-start">
                                <small class="ps-3 card-title fw-normal"
                                    >MLS® {{ property.Ml_num }}</small
                                >
                                <small
                                    class="
                                        d-block
                                        ps-3
                                        card-title
                                        fw-normal
                                        single-line
                                    "
                                >
                                    {{ property.Rltr }}
                                </small>
                            </li>
                        </ul>
                    </div>
                    <div class="col-4 p-0">
                        <ul class="list-unstyled pt-2">
                            <li v-if="property.Bath_tot" class="float-end">
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
                            <li v-if="property.Br" class="float-end">
                                <small class="pe-3"
                                    ><img
                                        src="/assets/images/icons/bed.png"
                                        alt=""
                                        width="16px"
                                    />
                                    <span class="count card-title">
                                        {{ property.Br }}</span
                                    >
                                    <span
                                        v-if="property.Br_plus"
                                        class="count card-title"
                                    >
                                        +
                                        {{ property.Br_plus }}</span
                                    >
                                </small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </router-link>
    </div>
</template>

<script>
import swal from "sweetalert";
import ShareProp from "./ShareProperty.vue";
export default {
    props: {
        property: {
            type: Object,
            default: () => ({}),
        },
    },
    components: {
        ShareProp,
    },
    data() {
        return {};
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
