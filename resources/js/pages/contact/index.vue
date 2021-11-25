<template>
    <div>
        <!-- Breakcrumbs -->
        <section class="breadcrumb-section bg-theme-light py-5">
            <div class="container p-0">
                <div class="row py-0">
                    <div class="col-12">
                        <h2 class="theme-title text-start">Contact Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item ps-0">
                                    <router-link to="/"
                                        ><img
                                            src="/assets/images/icons/Mask Group.svg"
                                            width="14"
                                            class="img-fluid align-middle pb-1"
                                            alt=""
                                        />
                                        Home</router-link
                                    >
                                </li>
                                <li class="breadcrumb-item">
                                    <router-link to="/contact-us"
                                        >Contact Us</router-link
                                    >
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breakcrumbs -->
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5 py-4">
                    <h2 class="text-color mt-5">Contact US</h2>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
p {
    line-height: 28px;
    font-size: 18px;
    letter-spacing: 0.5px;
    margin: 0;
    padding: 0;
    color: #6c757d !important;
    font-weight: 300 !important;
}
p strong {
    font-weight: 600 !important;
    letter-spacing: 2px;
}
ol li {
    padding-left: 20px;
    margin-bottom: 10px;
}
</style>
