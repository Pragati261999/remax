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
              <div>
                <div v-if="!loadingMoreProperties">
                  <div
                    v-if="nextPageUrl"
                    class="load-more-button mt-4 text-center"
                  >
                    <button class="btn btn-theme-color px-5" @click="loadMore">
                      Load More
                      <small class="ps-2"
                        ><i class="fas fa-arrow-right"></i
                      ></small>
                    </button>
                  </div>
                </div>
                <div v-else>
                  <div class="mt-5 text-center">
                    <loader
                      :text="'Please wait, Loading More Properties for you...'"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div v-else>
              <NoData :text="'No matched property found.'" />
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
import Loader from "../../components/commonComponents/Loader.vue";
import PropCard from "../../components/property/cards.vue";
export default {
  components: { PropCard, Loader },
  data() {
    return {
      form: {},
      properties: null,
      loadingProperties: true,
      nextPageUrl: null,
      loadingMoreProperties: false,
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
        .post("/api/property/search", null, {
          params: data,
        })
        .then((res) => {
          self.properties = res.data.data.data;
          self.nextPageUrl = res.data.data.next_page_url;
          self.loadingProperties = false;
        })
        .catch((err) => {
          self.loadingProperties = false;
          console.log(err);
        });
    },

    async loadMore() {
      const self = this;
      self.loadingMoreProperties = true;
      await axios
        .post(self.nextPageUrl, null, {
          params: self.form,
        })
        .then(async (res) => {
          await self.updateProperties(res.data.data.data);
          self.nextPageUrl = res.data.data.next_page_url;
          self.loadingMoreProperties = false;
        })
        .catch((err) => {
          self.loadingMoreProperties = false;
          console.log(err);
        });
    },

    async updateProperties(arr) {
      arr.forEach((element) => {
        this.properties.push(element);
      });
    },
  },
};
</script>
