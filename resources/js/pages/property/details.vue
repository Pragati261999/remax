<template>
  <div>
    <div v-if="!loadingProperty">
      <div v-if="property">
        <!-- Breakcrumbs -->
        <section class="breadcrumb-section bg-theme-light py-5">
          <div class="container p-0">
            <div class="row py-0">
              <div class="col-12">
                <h2 class="theme-title text-start">Property Details</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <router-link to="/"
                        ><img
                          src="assets/images/icons/Mask Group.svg"
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
                      <span class="active">Property details</span>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <!-- Breakcrumbs -->

        <!-- slider -->
        <div>
          <Carousel
            :per-page="4"
            :autoplay="true"
            :centerMode="true"
            :paginationEnabled="false"
            :loop="true"
          >
            <Slide
              v-for="img in property.images"
              :key="img.property_ml_num + '_' + img.id"
            >
              <div class="carousel-outer border bg-light text-center">
                <img :src="img.image" alt="Not Found" class="crouse-image" />
              </div>
            </Slide>
          </Carousel>
        </div>
        <!-- slider -->

        <!-- Details -->
        <section class="bg-theme-light">
          <div class="container p-0">
            <div class="row">
              <div class="col-6">
                <div class="row property">
                  <div class="col-6">
                    <h4 class="text-color fw-bold">{{ property.Addr }}</h4>
                    <h6 class="text-color fw-light">{{ property.Rltr }}</h6>
                  </div>
                  <div class="col-6 pt-0 text-end">
                    <h4 class="text-color fw-bold mb-1">
                      ${{ property.Lp_dol }}
                    </h4>
                    <!-- <small class="text-color fw-bold mb-2"
                      >EST, 7625/month</small
                    > -->
                    <div class="badge">
                      <p class="text-color me-5">For {{ property.S_r }}</p>
                    </div>
                  </div>
                  <div class="col-12 py-1">
                    <ul class="list-unstyled">
                      <li class="float-start">
                        <small class="pe-3"
                          ><img
                            src="assets/images/icons/bathTab.png"
                            alt="BathRoom"
                            width="24px"
                          />
                          <span class="count card-title">
                            {{ property.Bath_tot }}</span
                          >
                        </small>
                      </li>
                      <li class="float-start">
                        <small class="pe-3"
                          ><img
                            src="assets/images/icons/bedDark.png"
                            alt="Washroom"
                            width="24px"
                          />
                          <span class="count card-title">{{
                            property.Rms
                          }}</span>
                        </small>
                      </li>
                      <li class="float-start">
                        <small class="pe-3 card-title"
                          >MLS {{ property.Ml_num }}</small
                        >
                      </li>
                    </ul>
                  </div>
                  <div class="col-12 py-3">
                    <ul class="list-unstyled">
                      <li class="float-start">
                        <input
                          type="button"
                          name="css-tabs"
                          id="tab-1"
                          class="tab-switch"
                        />
                        <label for="tab-1" class="tab-label"
                          ><img
                            src="assets/images/icons/bookmark.png"
                            alt=""
                            width="18px"
                          />
                          Bookmark</label
                        >
                      </li>
                      <li class="float-start">
                        <input
                          type="button"
                          name="css-tabs"
                          id="tab-1"
                          class="tab-switch"
                        />
                        <label for="tab-1" class="tab-label"
                          ><img
                            src="assets/images/icons/share.png"
                            alt=""
                            width="18px"
                          />
                          Share</label
                        >
                      </li>
                      <li class="float-start">
                        <input
                          type="button"
                          name="css-tabs"
                          id="tab-1"
                          class="tab-switch"
                        />
                        <label for="tab-1" class="tab-label"
                          ><img
                            src="assets/images/icons/book_showing.png"
                            alt=""
                            width="18px"
                          />
                          Book Showing</label
                        >
                      </li>
                    </ul>
                  </div>
                </div>
                <hr />
                <p class="text-color me-5">{{ property.Ad_text }}</p>
                <p class="text-color me-5">{{ property.Extras }}</p>
              </div>
              <div class="col-6 d-flex justify-content-center p-0">
                <div class="row details">
                  <div class="col-12 d-flex p-0">
                    <ul class="row list-unstyled w-100">
                      <li class="col-6 py-2">
                        <h6 class="text-dark fw-bold">Property Type</h6>
                        <small>{{ property.property_type }}</small>
                      </li>
                      <li class="col-6 py-2">
                        <h6 class="text-dark fw-bold">Listed for</h6>
                        <small>{{ property.S_r }}</small>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Details -->

        <!-- hr -->

        <section class="p-0">
          <div class="container">
            <hr class="m-0" />
          </div>
        </section>

        <section>
          <div class="container">
            <div class="row">
              <div v-for="(value, key) in property" :key="key" class="col-sm-6">
                <div
                  v-if="key != 'images' && value != null && value != ''"
                  class="border p-2"
                >
                  {{ key + " : " + value }}
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- hr -->
      </div>
      <div v-else>
        <p class="p-5 text-center">Oops! no data found.</p>
      </div>
    </div>
    <div v-else>
      <p class="p-5 text-center">Please wait! Loading details...</p>
    </div>
  </div>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
export default {
  components: {
    Carousel,
    Slide,
  },
  data() {
    return {
      property: null,
      loadingProperty: true,
    };
  },
  mounted() {
    this.getAllData();
  },
  methods: {
    async getAllData() {
      const self = this;
      self.loadingProperty = true;
      await axios
        .get(`/api/property/get-details?id=${self.$route.params.ml_num}`)
        .then((res) => {
          self.property = res.data.data[0];
          self.loadingProperty = false;
        })
        .catch((err) => {
          self.loadingProperty = false;
          console.log(err);
        });
    },
  },
};
</script>

<style scoped>
.badge {
  background-color: #9ffdd4;
  padding: 4px;
  width: 4.5rem;
  height: 1.8rem;
  line-height: 1.3rem;
  border-radius: 4px;
  display: block;
  margin-left: auto;
}
.details {
  background-color: rgba(215, 219, 218, 1);
  background-color: rgba(215, 219, 218, 1);
  width: 100%;
  padding: 40px;
  border-radius: 0px 0px 0px 74px;
}
.crouse-image {
  height: 300px;
}
</style>
