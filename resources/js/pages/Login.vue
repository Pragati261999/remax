<template>
    <div>
        <!-- Breakcrumbs -->
        <section class="breadcrumb-section bg-theme-light py-4">
            <div class="container p-0">
                <div class="row py-0">
                    <div class="col-12">
                        <h2 class="theme-title text-start">Account</h2>
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
                                    <router-link to="/login" class="active">Log In</router-link>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breakcrumbs -->

        <!-- Login -->

        <section class="login bg-theme bg-theme-light pt-4">
            <div class="container p-0">
                <div class="row py-3">
                    <div class="col-6">
                        <img
                            src="assets/images/icons/login.png"
                            alt=""
                            class="img-fluid"
                        />
                    </div>
                    <div class="col-6 px-5">
                        <form @submit.prevent="login()">
                            <fieldset class="mb-4">
                                <input
                                    type="text"
                                    @keyup.prevent="errors.email = ''"
                                    class="form-control"
                                    v-model="userData.email"
                                    placeholder="Email Address*"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.email"
                                    >{{ errors.email.toString() }}</small
                                >
                            </fieldset>
                            <fieldset class="mb-4">
                                <input
                                    type="password"
                                    @keyup.prevent="errors.password = ''"
                                    class="form-control"
                                    v-model="userData.password"
                                    placeholder="Create Password*"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.password"
                                    >{{ errors.password.toString() }}</small
                                >
                            </fieldset>
                            <small
                                :class="success.color"
                                class="text-success"
                                v-if="success.message"
                                >{{ success.message }}</small
                            >
                            <button
                                type="submit"
                                class="btn btn-theme-color w-100 py-2"
                            >
                                Log In
                            </button>
                        </form>
                        <router-link
                            to="#"
                            class="text-dark fw-light my-2 text-center fp"
                            >Forget Password</router-link
                        >
                        <h4 class="theme-title">DON'T HAVE AN ACCOUNT?</h4>
                        <p class="text-center">
                            Add items to your wishlistget personalised
                            recommendations check out more quickly track your
                            orders register
                        </p>
                        <button
                            type="submit"
                            class="btn btn-theme-color w-100 py-2"
                        >
                            <router-link to="/sign-up" class="text-light"
                                >Create Account</router-link
                            >
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login -->
    </div>
</template>
<script>
// create-user
export default {
    data() {
        return {
            success: {
                message: "",
                color: "",
            },
            userData: {
                email: "",
                password: "",
            },
            errors: {
                email: "",
                password: "",
            },
        };
    },
    mounted() {
        this.authCheck();
    },
    methods: {
        authCheck() {
            if (this.$store.state.auth_token) {
                this.$router.push("/dashboard/my-account");
            }
        },
        async login() {
            const user = this.userData;
            await axios
                .post("/api/user/login", user)
                .then((response) => {
                    this.success.message = response.data.message;
                    const f = response.data.data.favourites;

                    f.forEach((fv) => {
                        this.$store.commit("addFavourite", fv.ml_num);
                    });

                    this.success.color = "text-success";
                    const token = response.data.data.token;
                    const user = response.data.data.user;
                    this.$store.commit("addAuthToken", token);
                    this.$store.commit("addAuthUser", user);
                    this.$router.push("/dashboard/my-account");
                })
                .catch((err) => {
                    const errorData = err.response.data;
                    this.errors.email = errorData.error.email;
                    this.errors.password = errorData.error.password;
                    if (errorData.success == false) {
                        this.success.message = errorData.message;
                        this.success.color = "text-danger";
                    }
                });
        },
    },
};
</script>
