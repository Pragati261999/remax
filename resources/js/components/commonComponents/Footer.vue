<template>
    <div>
        <section class="footer">
            <div class="container p-0">
                <div class="row">
                    <div class="col-4">
                        <h3 class="text-color fw-bold">Remax</h3>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.
                        </p>
                        <ul class="list-unstyled">
                            <li class="social-icons">
                                <img
                                    src="/assets/images/icons/twitter.png"
                                    class="img-fluid m-auto"
                                    alt=""
                                />
                            </li>
                            <li class="social-icons">
                                <img
                                    src="/assets/images/icons/google.png"
                                    class="img-fluid m-auto"
                                    alt=""
                                />
                            </li>
                            <li class="social-icons">
                                <img
                                    src="/assets/images/icons/facebook-logo.png"
                                    class="img-fluid m-auto"
                                    alt=""
                                />
                            </li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <ul class="list-unstyled">
                            <li class="text-secondary fw-bold">About</li>
                            <li><a href="">Why choose us</a></li>
                            <li><a href="">Review</a></li>
                            <li><a href="">Customers</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Career</a></li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <ul class="list-unstyled">
                            <li class="text-secondary fw-bold">About</li>
                            <li><a href="">Why choose us</a></li>
                            <li><a href="">Review</a></li>
                            <li><a href="">Customers</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Career</a></li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <p class="text-secondary fw-bold">Newsletter</p>
                        <p>
                            Subscribe our newletter to got updates about our
                            services
                        </p>
                        <form @submit.prevent="subscribe">
                            <input
                                v-model="form.email"
                                type="text"
                                class="form-control mb-3"
                                placeholder="Enter your email address"
                            />
                            <button
                                :disabled="sSubscribeEmail"
                                type="submit"
                                class="btn btn-theme-color w-100"
                            >
                                <i
                                    v-if="sSubscribeEmail"
                                    class="fa fa-spinner fa-spin pl-2"
                                    aria-hidden="true"
                                ></i>
                                Subscribe
                            </button>
                            <span v-html="rSubscribeEmail"></span>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-0 footer">
            <div class="container">
                <hr class="m-0" />
            </div>
        </section>

        <!-- bottom footer -->
        <section class="sub-footer footer py-5">
            <div class="container p-0">
                <h6 class="text-center text-secondary fw-light">
                    Copyright ©2021 All rights reserved |
                    <span class="text-darker fw-lighter-items">Remax</span>
                </h6>
            </div>
        </section>
        <!-- bottom footer -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: { email: "" },
            sSubscribeEmail: false,
            rSubscribeEmail: "",
        };
    },
    methods: {
        async subscribe() {
            const self = this;

            self.sSubscribeEmail = true;
            self.rSubscribeEmail =
                "<span class='text-muted'>Subscribing...</span>";

            await axios
                .post("/api/newsletter/subscribe", self.form)
                .then((res) => {
                    self.sSubscribeEmail = false;
                    self.rSubscribeEmail =
                        "<span class='text-success'>" +
                        res.data.message +
                        "</span>";
                    self.form.email = "";
                })
                .catch((err) => {
                    self.sSubscribeEmail = false;
                    self.rSubscribeEmail =
                        "<span class='text-danger'>" +
                        err.response.data.error.email.toString() +
                        "</span>";
                });
        },
    },
};
</script>
