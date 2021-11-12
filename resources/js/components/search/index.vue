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
                <input
                  v-model="form.addr"
                  type="text"
                  class="form-control"
                  aria-label="First name"
                  placeholder="Location"
                />
              </div>
              <div class="input-width">
                <label for="">Property Type</label>
                <!--input
                  v-model="form.propertyType"
                  type="text"
                  class="form-control"
                  aria-label="Last name"
                  list="type_proper"
                  placeholder="Type"
                /-->
                <select class="form-control">
                  <option class="text-theme-light">Select Type</option>
                  <option v-model="form.propertyType" value="Residential">Residential</option>
                  <option v-model="form.propertyType" value="Commercial">Commercial</option>
                  <option v-model="form.propertyType" value="Condo">Condo</option>
                </select>
              </div>
              <div class="input-width">
                <label for="">Pricing</label>
                <input
                  v-model="form.minPrice"
                  type="number"
                  class="form-control"
                  aria-label="Last name"
                  placeholder="Min"
                />
              </div>
              <div class="input-width">
                <label for=""></label>
                <input
                  v-model="form.maxPrice"
                  type="number"
                  class="form-control"
                  aria-label="Last name"
                  placeholder="Max"
                />
              </div>
              <div class="input-width">
                <label for="">Beds</label>
                <input
                  v-model="form.bedRoom"
                  type="number"
                  class="form-control"
                  aria-label="Last name"
                  placeholder="Beds"
                />
              </div>
              <div
                class="col p-0 d-flex align-items-end justify-content-center"
              >
                <button type="button" class="btn btn-theme-color">
                  <img src="/assets/images/icons/menu_bar.svg" alt="" />
                  More
                </button>
              </div>
              <div
                class="col p-0 d-flex align-items-end justify-content-center"
              >
                <button
                  type="button"
                  class="btn btn-theme-color"
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
export default {
  props: {
    form: {
      type: Object,
      default: () => ({}),
    },
  },
  data() {
    return {};
  },
  methods: {
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