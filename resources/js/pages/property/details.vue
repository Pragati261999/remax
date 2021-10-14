<template>
    <div>
        <h2>Property Details</h2>
        <div v-if="!loadingProperty">
            <div>
                <carousel :per-page="3" :loop="true" :autoplay="true">
                    <slide v>
                        <img src="" alt="" />
                    </slide>
                </carousel>
            </div>
            {{ property }}
        </div>
        <div v-else>
            <p class="p-5 text-center">
                <i class="fas fa-spinner fa-spin"></i> Loading details...
            </p>
        </div>
    </div>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
export default {
    components: {
        Carousel,
        Slide
    },
    data() {
        return {
            property: [],
            loadingProperty: true
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
                .get(
                    `/api/property/get-details?id=${self.$route.params.ml_num}`
                )
                .then(res => {
                    self.property = res.data.data;
                    self.loadingProperty = false;
                })
                .catch(err => {
                    self.loadingProperty = false;
                    console.log(err);
                });
        }
    }
};
</script>
