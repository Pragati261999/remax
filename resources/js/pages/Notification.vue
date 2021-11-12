<template>
    <div class="notification">
        <!-- Breakcrumbs -->
        <section class="breadcrumb-section bg-theme-light py-5">
            <div class="container p-0">
                <div class="row py-0">
                    <div class="col-12">
                        <h2 class="theme-title text-start">Account</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"
                                        ><img
                                            src="assets/images/icons/Mask Group.svg"
                                            width="14"
                                            class="img-fluid align-middle pb-1"
                                            alt=""
                                        />
                                        Home</a
                                    >
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#" class="active">Log In</a>
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
            <div class="container-fluid p-0">
                <div class="wrapper p-0">
                    <div class="n-tabs">
                        <div class="notification-tab container">
                            <ul class="list-unstyled m-0">
                                <li class="d-inline-block float-start">
                                    <button class="btn" :class="activeTab=='notification' ? 'active' : ''" @click="activeTab = 'notification'">
                                        <img
                                            src="/../../assets/images/icons/alarm.svg"
                                            alt=""
                                            width="18px"
                                        />
                                        Notifications
                                    </button>
                                </li>
                                <li class="d-inline-block float-start">
                                    <button class="btn" :class="activeTab=='bookmark' ? 'active' : ''" @click="activeTab = 'bookmark'">
                                        <img
                                            src="/../../assets/images/icons/bookmark.svg"
                                            alt=""
                                            width="18px"
                                        />
                                        Bookmarked List
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div v-if="activeTab=='bookmark'">
                    <bookmarks />
                </div>
                <div v-if="activeTab=='notification'">
                    <notifications />
                </div>
            </div>
        </section>

        <!-- Notification -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            activeTab: 'notification',
        };
    },
    methods: {
        active() {
            this.isActive = !this.isActive;
        },
    },
};
</script>
