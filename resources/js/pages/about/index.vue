<template>
    <div>
        <!-- Breakcrumbs -->
        <section class="breadcrumb-section bg-theme-light py-5">
            <div class="container p-0">
                <div class="row py-0">
                    <div class="col-12">
                        <h2 class="theme-title text-start">About Us</h2>
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
                                    <router-link to="/about-us"
                                        >About Us</router-link
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
                <div class="col-12 py-4">
                    <div class="outer border p-4 pt-0">
                        <div class="row flex-column-reverse flex-lg-row">
                            <div class="col-md-7 pt-4">
                                <div class="page-title">
                                    <h3 class="text-color fw-bold">
                                        The Leading Real Estate Rental
                                        Marketplace.
                                    </h3>
                                    <p class="about-text">
                                        RE/MAX Millennium was founded with the
                                        vision of pursuing the New Era of Real
                                        Estate; the Digital Era. We believe real
                                        estate has and always will be a business
                                        where personal relationships matter. We
                                        aim to provide clients and agents with
                                        more exposure, brand value, innovation
                                        and quality service. Our team is
                                        committed to providing the highest level
                                        of representation and top-notch customer
                                        service for our clients with an in-depth
                                        understanding of the ever-evolving
                                        marketplace which sets us apart from the
                                        rest.
                                    </p>
                                    <p class="about-text">
                                        Hear from us, how we make a difference.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-5 pt-4">
                                <div class="row">
                                    <div class="ol-12 align-center">
                                        <img
                                            v-lazy="{
                                                src: './assets/images/banners/About/about-banner-right.png',
                                            }"
                                            class="img-fluid"
                                            alt="About Us"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

.about-text {
    color: #434343;
    font-weight: 500;
}
</style>
