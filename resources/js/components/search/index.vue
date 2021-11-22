<template>
    <div>
        <div class="wrapper">
            <div class="tabs">
                <div class="tab">
                    <input
                        type="radio"
                        name="css-tabs"
                        id="forSale"
                        class="tab-switch"
                        value="Sale"
                        :checked="form.listedFor == 'Sale'"
                        v-model="form.listedFor"
                    />
                    <label for="forSale" class="tab-label">Buy</label>
                </div>
                <div class="tab">
                    <input
                        type="radio"
                        name="css-tabs"
                        id="for_lease"
                        class="tab-switch"
                        value="Lease"
                        :checked="form.listedFor == 'Lease'"
                        v-model="form.listedFor"
                    />
                    <label for="for_lease" class="tab-label">Rent</label>
                </div>
                <div class="tab">
                    <div class="tab-content d-block">
                        <div class="row g-3">
                            <div class="input-width">
                                <label for="">Location/MLS#</label>
                                <!-- <input
                                    v-model="form.addr"
                                    type="text"
                                    class="form-control"
                                    aria-label="First name"
                                    placeholder="Location"
                                /> -->
                                <vue-google-autocomplete
                                    ref="address"
                                    id="map"
                                    classname="form-control"
                                    placeholder="Location/MLS"
                                    v-on:placechanged="getAddressData"
                                    @keyup="getAddressInputData"
                                    types="(cities)"
                                    country="ca"
                                >
                                </vue-google-autocomplete>
                            </div>
                            <div class="input-width">
                                <label for="">Property Type</label>
                                <select
                                    v-model="form.propertyType"
                                    class="form-control"
                                >
                                    <option value="" disabled selected>
                                        Select Property Type
                                    </option>
                                    <option value="Residential">
                                        Residential
                                    </option>
                                    <option value="Commercial">
                                        Commercial
                                    </option>
                                    <option value="Condo">Condo</option>
                                </select>
                            </div>
                            <div class="input-width">
                                <label for="">Pricing ($)</label>
                                <input
                                    v-model="form.minPrice"
                                    type="number"
                                    class="form-control"
                                    aria-label="Last name"
                                    placeholder="Min"
                                    list="minPrices"
                                    min="1"
                                />
                                <datalist id="minPrices">
                                    <option value="0"></option>
                                    <option value="500"></option>
                                    <option value="1000"></option>
                                    <option value="5000"></option>
                                    <option value="10000"></option>
                                    <option value="20000"></option>
                                    <option value="50000"></option>
                                    <option value="100000"></option>
                                    <option value="500000"></option>
                                </datalist>
                            </div>
                            <div class="input-width">
                                <label for=""></label>
                                <input
                                    v-model="form.maxPrice"
                                    type="number"
                                    class="form-control"
                                    aria-label="Last name"
                                    placeholder="Max"
                                    min="1"
                                    list="maxPrices"
                                />
                                <datalist id="maxPrices">
                                    <option value="5000"></option>
                                    <option value="10000"></option>
                                    <option value="20000"></option>
                                    <option value="50000"></option>
                                    <option value="100000"></option>
                                    <option value="500000"></option>
                                    <option value="1000000"></option>
                                    <option value="5000000"></option>
                                    <option value="10000000"></option>
                                </datalist>
                            </div>
                            <div class="input-width">
                                <label for="">Beds</label>
                                <select
                                    v-model="form.bedRoom"
                                    class="form-control"
                                >
                                    <option value="0">Any</option>
                                    <option value="1">1+</option>
                                    <option value="2">2+</option>
                                    <option value="3">3+</option>
                                    <option value="4">4+</option>
                                    <option value="5">5+</option>
                                </select>
                            </div>
                            <div
                                class="
                                    col
                                    justify-content-center
                                    d-flex
                                    align-items-end
                                "
                            >
                                <button
                                    type="button"
                                    class="
                                        btn btn-theme-color
                                        input-full-wth
                                        w-100
                                    "
                                    @click="more = !more"
                                >
                                    <img
                                        src="/assets/images/icons/menu_bar.svg"
                                        alt=""
                                    />
                                    More
                                </button>
                            </div>
                            <div v-if="more" class="row g-3">
                                <div class="input-width">
                                    <label for="">Baths</label>
                                    <select
                                        v-model="form.bath"
                                        class="form-control"
                                    >
                                        <option value="0">Any</option>
                                        <option value="1">1+</option>
                                        <option value="2">2+</option>
                                        <option value="3">3+</option>
                                        <option value="4">4+</option>
                                        <option value="5">5+</option>
                                    </select>
                                </div>
                                <div class="input-width">
                                    <label for="">Square Feet</label>
                                    <select
                                        v-model="form.sqft"
                                        class="form-control"
                                    >
                                        <option value="0">Any</option>
                                        <option value="500">500+</option>
                                        <option value="1000">1000+</option>
                                        <option value="1500">1500+</option>
                                        <option value="2000">2000+</option>
                                        <option value="2500">2500+</option>
                                        <option value="5000">5000+</option>
                                        <option value="10000">10000+</option>
                                        <option value="20000">20000+</option>
                                        <option value="25000">25000+</option>
                                        <option value="50000">50000+</option>
                                        <option value="100000">100000+</option>
                                    </select>
                                </div>
                                <div class="input-width">
                                    <label for="">Listed Since</label>
                                    <input
                                        v-model="form.addedFrom"
                                        type="date"
                                        class="form-control"
                                    />
                                </div>
                                <div class="input-width">
                                    <label for="">Keywords</label>
                                    <input
                                        v-model="form.key"
                                        class="form-control"
                                        type="text"
                                    />
                                </div>
                                <div class="input-width">
                                    <label for=""> </label>
                                    <label class="form-control">
                                        <input
                                            v-model="form.openHouse"
                                            type="checkbox"
                                            value="true"
                                        />
                                        Open Houses Only</label
                                    >
                                </div>
                            </div>
                            <div
                                class="
                                    col
                                    justify-content-center
                                    d-flex
                                    align-items-end
                                "
                            >
                                <button
                                    type="button"
                                    class="
                                        btn btn-theme-color
                                        input-full-wth
                                        w-100
                                    "
                                    @click="searchProperty"
                                >
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import VueGoogleAutocomplete from "vue-google-autocomplete";
export default {
    components: { VueGoogleAutocomplete },
    props: {
        form: {
            type: Object,
            default: () => ({}),
        },
    },
    data() {
        return {
            more: false,
        };
    },
    methods: {
        getAddressData(addressData, placeResultData, id) {
            this.form.addr = addressData.locality;
            console.log(this.form.addr);
        },
        getAddressInputData() {
            this.form.addr = event.target.value;
        },

        searchProperty() {
            const self = this;
            if (self.$route.name !== "search-property") {
                self.$router.push({
                    name: "search-property",
                    params: {
                        data: self.form,
                    },
                });
            } else {
                this.$emit("clicked", self.form);
            }
        },
    },
};
</script>

<style scoped>
.tab-content {
    opacity: 1;
}
select:checked {
    color: #5c5c5c;
}
</style>
