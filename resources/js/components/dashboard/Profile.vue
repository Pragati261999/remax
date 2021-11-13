<template>
    <div>
        <div class="row w-100">
            <div class="col-lg-6 col-md-6 col-sm-12 px-4 notify-col">
                <div class="d-flex justify-content-between">
                    <h3 class="text-color fw-bold">User Profile</h3>
                    <button
                        @click="isEdit = !isEdit"
                        class="
                            text-color text-decoration-underline
                            btn btn-default
                        "
                        data-toggle="tooltip"
                        data-html="true"
                        title="Click here to edit your profile"
                        style="cursor: pointer"
                    >
                        Edit
                        <img
                            class="img-fluid"
                            src="/../../assets/images/icons/edit.png"
                            alt=""
                            style="width: 16px; padding-bottom: 6px"
                        />
                    </button>
                </div>
                <form @submit.prevent="update()">
                    <fieldset class="my-3">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-3 pe-0">
                                <label class="text-color">Name:</label>
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-9">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="Name"
                                    :class="isEdit != true ? 'active' : ''"
                                    placeholder="Name"
                                    v-model="userDetails.name"
                                    @keyup.prevent="errors.name = ''"
                                />
                                <small class="text-danger" v-if="errors.name">{{ errors.name.toString() }}</small>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="my-3">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-3 pe-0">
                                <label class="text-color">Contact:</label>
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-9">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="Contact"
                                    :class="isEdit != true ? 'active' : ''"
                                    placeholder="XXXXXX"
                                    v-model="userDetails.contact"
                                    @keyup.prevent="errors.contact = ''"
                                />
                                <small class="text-danger" v-if="errors.contact">{{ errors.contact.toString() }}</small>
                            </div>
                        </div>
                    </fieldset>
                    <!--fieldset class="my-3">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-3 pe-0">
                                <label class="text-color">Email:</label>
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-9">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="Email Address"
                                    :class="isEdit != true ? 'active' : ''"
                                    placeholder="Email Address"
                                    v-model="userDetails.email"
                                    disabled
                                />
                            </div>
                        </div>
                    </fieldset-->
                    <fieldset class="my-3 float-end" v-if="isEdit != false">
                        <button class="btn btn-theme-color">
                            <i
                                v-if="updating"
                                class="fa fa-spinner fa-spin pl-2"
                                aria-hidden="true"
                            ></i>
                            Update
                        </button>
                    </fieldset>
                    <small
                        :class="success.color"
                        class="text-success"
                        v-if="success.message"
                        >{{ success.message }}</small
                    >
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img
                    src="/../../assets/images/icons/login.png"
                    class="img-responsive img-fluid"
                    alt=""
                    style="transform: rotateY(180deg)"
                />
            </div>
        </div>
    </div>
</template>
<script>
import Loader from "../commonComponents/Loader.vue";
export default {
    computed: {
        userDetails() {
            return this.$store.state.auth_user;
        },
    },
    data() {
        return {
            success: {
                message: "",
                color: "",
            },
            isEdit: false,
            updating: false,
            errors: {
                name: "",
                contact: ""
            }
        };
    },
    methods: {
        update() {
            this.updating = true
            const token = this.$store.state.auth_token;
            axios
                .post("/api/user/update-profile", this.userDetails, {
                    headers: { Authorization: `Bearer ${token}` },
                })
                .then((response) => {
                    this.updating = false
                    this.isEdit = false
                    this.$store.commit("addAuthUser", response.data.data);
                    this.success.message = response.data.message;
                    this.success.color = "text-success";
                    setTimeout(() => {
                        this.success.color = "d-none";
                    }, 1000)
                })
                .catch((error) => {
                    this.updating = false
                    const errorDisplay = error.response.data.errors
                    this.errors.name = errorDisplay.name
                    this.errors.contact = errorDisplay.contact
                    this.success.message = response.data.message;
                    this.success.color = "text-danger";
                    setTimeout(() => {
                        this.success.color = "d-none";
                    }, 1000)
                });
        },
    },
};
</script>
<style scoped>
label {
    padding: 0.375rem 0;
}
input {
    padding: 0.375rem 0.75rem;
}
.active {
    border: 0;
    background-color: transparent;
    padding: 0.375rem 0;
    opacity: 1;
    pointer-events: none;
}
</style>
