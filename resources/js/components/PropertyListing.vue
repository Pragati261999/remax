<template>
    <div>
        <section class="property bg-theme-light">
            <div class="container p-0">
                <h2 class="theme-title">Featured Properties in Toronto</h2>
                <div v-if="!loadingProperties" class="row">
                    <div
                        v-for="property in properties"
                        :key="property.Ml_num"
                        class="col-lg-4 col-md-6 col-sm-12 mt-5"
                    >
                        <div class="card">
                            <div class="card-img position-relative">
                                <router-link
                                    :to="{
                                        name: 'view-details',
                                        params: { ml_num: property.Ml_num }
                                    }"
                                >
                                    <img
                                        v-if="property.images.length > 0"
                                        :src="property.images[0].image"
                                        class="card-img-top"
                                        alt="Property image not found"
                                    />
                                    <img
                                        v-else
                                        src="assets/images/cards/e18b5e8d0dd16ff8b5f0a909ee27e764.jpeg"
                                        class="card-img-top"
                                        alt="Not Found"
                                    />
                                </router-link>
                                <div class="star">
                                    <img
                                        src="assets/images/icons/star.png"
                                        alt=""
                                    />
                                </div>
                                <div class="badge">
                                    <p class="text-color me-5">For sale</p>
                                </div>
                            </div>
                            <div class="card-body pb-0">
                                <div class="card-header">
                                    <div class="row">
                                        <div
                                            class="col-10 d-flex align-items-center"
                                        >
                                            <h6 class="mb-0 card-title">
                                                ${{ property.Lp_dol }}
                                            </h6>
                                        </div>
                                        <div class="col-2">
                                            <small class="font-weight-bold">
                                                <img
                                                    src="assets/images/icons/bookmark_blue.png"
                                                    alt=""
                                                />
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
                                                <small
                                                    class="ps-3 card-title fw-normal"
                                                    >MLS
                                                    {{ property.Ml_num }}</small
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-6 p-0">
                                        <ul class="list-unstyled">
                                            <li class="float-end">
                                                <small class="pe-3"
                                                    ><img
                                                        src="assets/images/icons/bathTab.png"
                                                        alt=""
                                                        width="16px"
                                                    />
                                                    <span
                                                        class="count card-title"
                                                    >
                                                        {{ property.Rms }}</span
                                                    >
                                                </small>
                                            </li>
                                            <li class="float-end">
                                                <small class="pe-3"
                                                    ><img
                                                        src="assets/images/icons/bed.png"
                                                        alt=""
                                                        width="16px"
                                                    />
                                                    <span
                                                        class="count card-title"
                                                    >
                                                        {{
                                                            property.Bath_tot
                                                        }}</span
                                                    >
                                                </small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="row">
                    <div class="p-5 text-center">
                        <h6>Loading properties...</h6>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            properties: [],
            loadingProperties: true
        };
    },
    mounted() {
        this.getAllData();
    },
    methods: {
        async getAllData() {
            const self = this;
            self.loadingProperties = true;
            await axios
                .get("api/property/properties")
                .then(res => {
                    self.properties = res.data.data.data;
                    self.loadingProperties = false;
                })
                .catch(err => {
                    self.loadingProperties = false;
                    console.log(err);
                });
        }
    }
};
</script>
