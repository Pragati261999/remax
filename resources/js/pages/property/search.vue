<template>
  <div>
    <div>
      <!-- Breakcrumbs -->
      <section class="breadcrumb-section bg-theme-light py-5">
        <div class="container p-0">
          <div class="row py-0">
            <div class="col-12">
              <h2 class="theme-title text-start">Properties</h2>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <router-link to="/"
                      ><img
                        src="/assets/images/icons/Mask Group.svg"
                        width="14"
                        class="img-fluid align-middle pb-1"
                        alt=""
                      />
                      Home</router-link
                    >
                  </li>
                  <li class="breadcrumb-item">
                    <router-link to="/">Properties</router-link>
                  </li>
                  <li class="breadcrumb-item">
                    <span class="active">Property search</span>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <!-- Breakcrumbs -->

      <!-- Banner  -->
      <section class="properties bg-theme-light position-relative">
        <div class="container p-0">
          <div class="row">
            <div class="col-12 properties-filter">
              <div class="row">
                <div class="col-12">
                  <div class="col-12">
                    <property-search
                      :form="form"
                      @clicked="getFilteredDataOnClick"
                    ></property-search>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Banner  -->

      <section class="p-0">
        <div class="container">
          <hr class="m-0" />
        </div>
      </section>

      <!-- hr -->

      <!-- Property Listing  -->
      <section class="property bg-theme-light">
        <div class="container p-0">
          <h2 class="theme-title">Houses for Sale/Lease in Toronto</h2>
          <div v-if="!loadingProperties">
            <div v-if="properties.length > 0" class="row">
              <div
                v-for="property in properties"
                :key="property.Ml_num"
                class="col-lg-4 col-md-6 col-sm-12 mt-5"
              >
                <PropCard :property="property" />
              </div>
            </div>
            <div v-else>
              <NoData :text="'No matched property found.'"/>
            </div>
          </div>
          <div v-else class="row">
            <div class="p-5 text-center">
              <loader />
            </div>
          </div>
        </div>
      </section>
      <!-- Property Listing  -->
    </div>
  </div>
</template>

<script>
import PropCard from "../../components/property/cards.vue";
export default {
  components: { PropCard },
  data() {
    return {
      form: {},
      properties: null,
      loadingProperties: true,
    };
  },
  mounted() {
    this.getFilteredDataOnLoad();
  },
  methods: {
    getFilteredDataOnLoad() {
      this.form = this.$route.params.data;
      this.getFilteredData(this.form);
    },
    getFilteredDataOnClick(data) {
      this.getFilteredData(data);
    },

    async getFilteredData(data) {
      const self = this;
      self.loadingProperties = true;
      await axios
        .post("/api/property/search", data)
        .then((res) => {
          self.properties = res.data.data.data;
          self.loadingProperties = false;
        })
        .catch((err) => {
          self.loadingProperties = false;
          console.log(err);
        });
    },
  },
};
</script>
