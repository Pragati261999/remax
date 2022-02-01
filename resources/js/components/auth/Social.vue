<template>
    <div>
        <h6 class="text-dark text-center divider">OR</h6>
        <h6 class="text-center text-secondary my-3">Start with</h6>
        <ul class="list-unstyled text-center">
            <li class="social-icon">
                <img
                    src="assets/images/icons/socials/fb.png"
                    alt="facebook"
                    class="img-fluid"
                    style="background-color: #4867aa"
                    @click="AuthProvider('facebook')"
                />
            </li>
            <li class="social-icon">
                <img
                    src="assets/images/icons/socials/google.png"
                    alt="google"
                    class="img-fluid"
                    style="background-color: #dc4e41"
                />
            </li>
            <li class="social-icon">
                <img
                    src="assets/images/icons/socials/linkedIn.png"
                    alt="linkedIn"
                    class="img-fluid"
                    style="background-color: #1675b9"
                />
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },
    methods: {
        async AuthProvider(provider) {
            var self = this;

            // await axios
            //     .post(`/api/sociallogin/${provider}`)
            //     .then((res) => {
            //         console.log(res);
            //     })
            //     .catch((err) => {
            //         console.log(err);
            //     });

            // this.$auth
            //     .authenticate(provider)
            //     .then((response) => {
            //         self.SocialLogin(provider, response);
            //     })
            //     .catch((err) => {
            //         console.log({ err: err });
            //     });
        },

        // SocialLogin(provider, response) {
        //     this.$http
        //         .post("/sociallogin/" + provider, response)
        //         .then((response) => {
        //             console.log(response.data);
        //         })
        //         .catch((err) => {
        //             console.log({ err: err });
        //         });
        // },
    },
};
</script>

<style scoped>
.divider {
    position: relative;
}
.divider:after {
    content: "";
    width: 100px;
    background: #9f9f9f;
    height: 1px;
    position: absolute;
    top: 8px;
    left: calc(50% + 15px);
}
.divider:before {
    content: "";
    width: 100px;
    background: #9f9f9f;
    height: 1px;
    position: absolute;
    top: 8px;
    right: calc(50% + 15px);
}
.social-icon {
    text-align: center;
    display: inline-block;
}
.social-icon img {
    border-radius: 6px;
    padding: 6px;
    height: 30px;
    display: inline-block;
    margin: 0px 5px;
}
</style>
