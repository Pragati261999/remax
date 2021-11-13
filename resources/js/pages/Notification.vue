<template>
    <div>
        <!-- Breakcrumbs -->
        <section class="breadcrumb-section bg-theme-light py-5">
            <div class="container p-0">
                <div class="row py-0">
                    <div class="col-12">
                        <h2 class="theme-title text-start">Account</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <router-link to="/"
                                        ><img
                                            src="/./assets/images/icons/Mask Group.svg"
                                            width="14"
                                            class="img-fluid align-middle pb-1"
                                            alt=""
                                        />
                                        Home</router-link
                                    >
                                </li>
                                <li class="breadcrumb-item">
                                    <router-link to="/dashboard">Dashboard</router-link>
                                </li>
                                <li class="breadcrumb-item">
                                    <router-link to="/dashboard/notifications" class="active text-capitalize">{{ activeTab }}</router-link>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breakcrumbs -->

        <!-- Notification -->
        <section class="notify px-0 pt-0 bg-theme-light">
            <div class="container-fluid p-0 pb-5">
                <div class="wrapper p-0">
                    <div class="n-tabs">
                        <div class="notification-tab container">
                        <!--To run tabs -->
                        <span class="d-none">{{ routeChanges }}</span>
                        <!--To run tabs -->
                            <ul class="list-unstyled m-0">
                                <li class="d-inline-block float-start">
                                    <button class="btn" :class="activeTab=='notifications' ? 'active' : ''" @click="activeTab = 'notifications'">
                                        <img
                                            src="/../../assets/images/icons/alarm.svg"
                                            alt=""
                                            width="18px"
                                        />
                                        Notifications
                                    </button>
                                </li>
                                <li class="d-inline-block float-start">
                                    <button class="btn" :class="activeTab=='bookmarks' ? 'active' : ''" @click="activeTab = 'bookmarks'">
                                        <img
                                            src="/../../assets/images/icons/bookmark.svg"
                                            alt=""
                                            width="18px"
                                        />
                                        Bookmarked List
                                    </button>
                                </li>
                                <li class="d-inline-block float-start">
                                    <button class="btn" :class="activeTab=='recent visited' ? 'active' : ''" @click="activeTab = 'recent visited'">
                                        <img
                                            src="/../../assets/images/icons/clock.svg"
                                            alt=""
                                            width="18px"
                                        />
                                        Recent Visited
                                    </button>
                                </li>
                                <li class="d-inline-block float-start">
                                    <button class="btn" :class="activeTab=='my account' ? 'active' : ''" @click="activeTab = 'my account'">
                                        <img
                                            src="/../../assets/images/icons/ac.svg"
                                            alt=""
                                            width="18px"
                                        />
                                        My Account
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div v-if="activeTab=='bookmarks'">
                    <bookmarks />
                </div>
                <div v-if="activeTab=='notifications'">
                    <notifications />
                </div>
                <div v-if="activeTab=='recent visited'">
                    <h2>Recent Visits</h2>
                </div>
                <div v-if="activeTab=='my account'">
                    <h2>My Account</h2>
                </div>
            </div>
        </section>

        <!-- Notification -->
    </div>
</template>
<script>
export default {
    computed: {
        routeChanges() {
            this.routerChange(this.$route.name)
        },
    },
    data() {
        return {
            activeTab: 'notifications',
        };
    },
    mounted() {
        this.isAuthorized()
    },
    methods: {
        isAuthorized() {
            if (!this.$store.state.auth_token) {
                this.$router.push("/login");
            }
        },
        routerChange(routername) {
            if(routername == 'notifications') {
                console.log(routername)
                return this.activeTab = 'notifications'
            } else if (routername == 'bookmarks') {
                return this.activeTab = 'bookmarks'
            } else if (routername == 'my-account') {
                return this.activeTab = 'my account'
            }
        },
    },
};
</script>
