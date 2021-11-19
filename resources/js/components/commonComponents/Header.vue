<template>
    <div>
        <header :class="$route.path == '/' ? 'home-header' : ''">
            <div class="container p-0">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid p-0">
                        <router-link class="navbar-brand me-5" to="/">
                            <h2>Remax</h2>
                        </router-link>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon header-icons"><img src="/assets/images/icons/menu_bar.svg" alt="" /></span>
                        </button>
                        <div
                            class="collapse navbar-collapse right-menu"
                            id="navbarSupportedContent"
                        >
                            <form class="d-flex me-auto search-bar">
                                <div class="input-group bg-white input-bar">
                                    <button class="btn bg-transparent p-0">
                                        <img
                                            src="/assets/images/icons/search.png"
                                            alt=""
                                        />
                                    </button>
                                    <input
                                        type="text"
                                        class="
                                            form-control
                                            border-0
                                            bg-transparent
                                        "
                                        aria-label="Search"
                                        aria-describedby="search-bar"
                                    />
                                </div>
                            </form>
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <router-link
                                        class="nav-link active"
                                        aria-current="home"
                                        to="/"
                                        >Home</router-link
                                    >
                                </li>
                                <li class="nav-item">
                                    <router-link
                                        class="nav-link"
                                        aria-current="properties"
                                        :to="{ name: 'search-property' }"
                                        >Properties</router-link
                                    >
                                </li>
                                <li class="nav-item">
                                    <router-link
                                        class="nav-link"
                                        aria-current="blog"
                                        to="/blog"
                                        >Blog</router-link
                                    >
                                </li>
                                <li class="nav-item p-0">
                                    <router-link
                                        class="
                                            nav-link
                                            t
                                            header-icons
                                            text-decoration-none
                                        "
                                        aria-current="favourate"
                                        to="/dashboard/bookmarks"
                                        ><img
                                            src="/assets/images/icons/bookmark.svg"
                                            alt=""
                                    /></router-link>
                                </li>
                                <li class="nav-item me-3">
                                    <router-link
                                        class="
                                            nav-link
                                            t
                                            header-icons
                                            text-decoration-none
                                        "
                                        aria-current="favourate"
                                        to="/dashboard/notifications"
                                        ><img
                                            src="/assets/images/icons/alarm.svg"
                                            alt=""
                                    /></router-link>
                                </li>
                                <li class="nav-item">
                                    <div v-if="!$store.state.auth_token">
                                        <router-link
                                            to="/login"
                                            class="text-light"
                                            ><button>
                                                <img
                                                    src="/assets/images/icons/refer.svg"
                                                    alt=""
                                                />Sign in
                                            </button></router-link
                                        >
                                    </div>
                                    <div v-else>
                                        <div class="dropdown">
                                            <button
                                                class="
                                                    btn btn-theme
                                                    dropdown-toggle
                                                "
                                                type="button"
                                                id="userDDBtn"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            >
                                                <i class="fa fa-user"></i>
                                            </button>
                                            <div
                                                class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="userDDBtn"
                                            >
                                                <div class="dropdown-header">
                                                    Hi, {{ user.name }}
                                                </div>
                                                <div
                                                    class="dropdown-divider"
                                                ></div>
                                                <router-link
                                                    to="/dashboard/my-account"
                                                    role="button"
                                                    aria-hidden="true"
                                                    class="dropdown-item"
                                                    >Dashboard</router-link
                                                >
                                                <span
                                                    @click="logout"
                                                    role="button"
                                                    aria-hidden="true"
                                                    class="dropdown-item"
                                                    >Logout</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </div>
</template>

<script>
export default {
    computed: {
        user() {
            return this.$store.state.auth_user;
        },
    },
    methods: {
        logout() {
            this.$store.commit("removeAuthToken");
            this.$store.commit("removeAuthUser");
            this.$store.commit("removeBookMark");
            this.$router.push("/");
        },
    },
};
</script>

<style scoped>
.dropdown-menu-right {
    right: 0;
}
.navbar-toggler-icon {
    padding-top: 1.5px;
}
</style>
