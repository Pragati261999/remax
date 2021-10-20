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
            <PropCard :property="property"/>
          </div>
        </div>
        <div v-else class="row">
          <div class="p-5 text-center">
            <loader />
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Loader from './commonComponents/Loader.vue';
import PropCard from './property/cards.vue';
export default {
  components: { Loader, PropCard },
  data() {
    return {
      properties: [],
      loadingProperties: true,
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
