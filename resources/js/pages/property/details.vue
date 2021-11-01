<template>
    <div>
        <div v-if="!loadingProperty">
            <div v-if="property">
                <!-- Breakcrumbs -->
                <section class="breadcrumb-section bg-theme-light py-5">
                    <div class="container p-0">
                        <div class="row py-0">
                            <div class="col-12">
                                <h2 class="theme-title text-start">
                                    Property Details
                                </h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
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
                                            <router-link to="/"
                                                >Properties</router-link
                                            >
                                        </li>
                                        <li class="breadcrumb-item">
                                            <span class="active"
                                                >Property details</span
                                            >
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Breakcrumbs -->

                <!-- slider -->
                <div v-if="property.images">
                    <Carousel
                        :per-page="4"
                        :autoplay="true"
                        :centerMode="true"
                        :paginationEnabled="false"
                    >
                        <Slide
                            v-for="img in property.images"
                            :key="img.property_ml_num + '_' + img.id"
                        >
                            <div
                                class="carousel-outer border bg-light text-center craousel-image-outer"
                            >
                                <img
                                    :src="img.image"
                                    alt="Not Found"
                                    class="crouse-image"
                                />
                            </div>
                        </Slide>
                    </Carousel>
                </div>
                <!-- slider -->

                <!-- Details -->
                <section class="bg-theme-light">
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row property">
                                    <div class="col-6">
                                        <h4 class="text-color fw-bold">
                                            {{ property.Addr }}
                                        </h4>
                                        <h6 class="text-color fw-light">
                                            {{ property.Rltr }}
                                        </h6>
                                    </div>
                                    <div class="col-6 pt-0 text-end">
                                        <h4 class="text-color fw-bold mb-1">
                                            ${{ property.Lp_dol }}
                                        </h4>
                                        <!-- <small class="text-color fw-bold mb-2"
                      >EST, 7625/month</small
                    > -->
                                        <div class="badge">
                                            <p class="text-color">
                                                For {{ property.S_r }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 py-1">
                                        <ul class="list-unstyled">
                                            <li class="float-start">
                                                <small class="pe-3"
                                                    ><img
                                                        src="/assets/images/icons/bathTab.png"
                                                        alt="BathRoom"
                                                        width="24px"
                                                    />
                                                    <span
                                                        class="count card-title"
                                                    >
                                                        {{
                                                            property.Bath_tot
                                                        }}</span
                                                    >
                                                </small>
                                            </li>
                                            <li class="float-start">
                                                <small class="pe-3"
                                                    ><img
                                                        src="/assets/images/icons/bed.png"
                                                        alt="Washroom"
                                                        width="24px"
                                                    />
                                                    <span
                                                        class="count card-title"
                                                        >{{
                                                            property.Rms
                                                        }}</span
                                                    >
                                                </small>
                                            </li>
                                            <li class="float-start">
                                                <small class="pe-3 card-title"
                                                    >MLS
                                                    {{ property.Ml_num }}</small
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 py-3">
                                        <ul class="list-unstyled">
                                            <li class="float-start">
                                                <input
                                                    type="button"
                                                    name="css-tabs"
                                                    id="tab-1"
                                                    class="tab-switch"
                                                />
                                                <label
                                                    for="tab-1"
                                                    class="tab-label"
                                                    ><img
                                                        src="/assets/images/icons/bookmark.png"
                                                        alt=""
                                                        width="18px"
                                                        class=" me-2"
                                                    />
                                                    Bookmark</label
                                                >
                                            </li>
                                            <li class="float-start">
                                                <input
                                                    type="button"
                                                    name="css-tabs"
                                                    id="tab-1"
                                                    class="tab-switch"
                                                />
                                                <label
                                                    for="tab-1"
                                                    class="tab-label"
                                                    ><img
                                                        src="/assets/images/icons/share.png"
                                                        alt=""
                                                        width="18px"
                                                        class="me-2"
                                                    />
                                                    Share</label
                                                >
                                            </li>
                                            <li class="float-start">
                                                <input
                                                    type="button"
                                                    name="css-tabs"
                                                    id="tab-1"
                                                    class="tab-switch"
                                                />
                                                <label
                                                    for="tab-1"
                                                    class="tab-label"
                                                    ><img
                                                        src="/assets/images/icons/book_showing.png"
                                                        alt=""
                                                        width="18px"
                                                        class="me-2"
                                                    />

                                                    Book Showing</label
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr />
                                <span class="text-color me-5">{{
                                    property.Ad_text
                                }}</span>
                                <br />
                                <span class="text-color me-5">{{
                                    property.Extras
                                }}</span>
                            </div>
                            <div
                                class="col-md-6 d-flex justify-content-center p-0"
                            >
                                <div class="row details">
                                    <div class="col-12 d-flex p-0">
                                        <ul class="row list-unstyled w-100">
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="text-dark fw-bold mb-0"
                                                >
                                                    Property Type
                                                </h6>
                                                <small>
                                                    {{
                                                        property.property_type.replace(
                                                            "Property",
                                                            " Property"
                                                        )
                                                    }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="text-dark fw-bold mb-0"
                                                >
                                                    Walk Score
                                                </h6>
                                                <small>
                                                    {{ property.Sqft || "N/A" }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="text-dark fw-bold mb-0"
                                                >
                                                    Style
                                                </h6>
                                                <small>
                                                    {{
                                                        property.Style || "N/A"
                                                    }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="text-dark fw-bold mb-0"
                                                >
                                                    Added
                                                </h6>
                                                <small>
                                                    {{
                                                        property.Timestamp_sql ||
                                                            property.Idx_dt
                                                    }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="text-dark fw-bold mb-0"
                                                >
                                                    Size
                                                </h6>
                                                <small>
                                                    {{
                                                        property.Tot_area ||
                                                            "N/A"
                                                    }}
                                                </small>
                                            </li>

                                            <li class="col-6 py-2">
                                                <h6
                                                    class="text-dark fw-bold mb-0"
                                                >
                                                    Lot Size
                                                </h6>
                                                <small>
                                                    {{
                                                        property.Lotsz_code ||
                                                            "N/A"
                                                    }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="text-dark fw-bold mb-0"
                                                >
                                                    Last Checked
                                                </h6>
                                                <small>
                                                    Now (Today)
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="text-dark fw-bold mb-0"
                                                >
                                                    Age
                                                </h6>
                                                <small>
                                                    {{
                                                        property.Yr_built ||
                                                            "N/A"
                                                    }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="text-dark fw-bold mb-0"
                                                >
                                                    MLS
                                                </h6>
                                                <small>
                                                    #
                                                    {{
                                                        property.Ml_num || "NA"
                                                    }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="text-dark fw-bold mb-0"
                                                >
                                                    Taxes
                                                </h6>
                                                <small>
                                                    {{ property.Yr || "N/A" }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="text-dark fw-bold mb-0"
                                                >
                                                    Listed by
                                                </h6>
                                                <small>
                                                    Remax Real Estate
                                                </small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Details -->

                <!-- Banner middle -->
                <div
                    v-if="property.images"
                    class="container-fluid pb-5 bg-theme"
                >
                    <div class="row">
                        <div class="col-md-6 ps-0 mt-5">
                            <img
                                :src="property.images[0].image"
                                alt="Not Found"
                                class="middle-banner-image"
                            />
                        </div>
                        <div
                            class="col-md-6 mt-5 text-white mid-content ps-md-5 pe-sm-2"
                        >
                            <h3 class="text-white">Home Value</h3>
                            <span class="text-muted"
                                >Price estimate and comparrables near 114 High
                                park Avenue The approximate value of a 4 bedroom
                                house in the area is</span
                            >
                            <h3 class="mt-2">${{ property.Lp_dol }}</h3>
                            <div>
                                <table class="table mt-5 table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="p-3 text-white">
                                                <img
                                                    src="/assets/images/icons/calender-ico.png"
                                                    alt=""
                                                />
                                            </td>
                                            <td class="p-3 text-white">
                                                <h5>
                                                    Schedule a tour immediately.
                                                </h5>
                                                <span class="text-muted"
                                                    >Homes like this sell on
                                                    avarage in 6 days. There in
                                                    an 73% chance that this home
                                                    will be sold within one week
                                                    of listing</span
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 text-white">
                                                <img
                                                    src="/assets/images/icons/share-market.png"
                                                    alt=""
                                                />
                                            </td>
                                            <td class="p-3 text-white">
                                                <h5>Expect to bid higher.</h5>
                                                <span class="text-muted"
                                                    >6 out of 10 homes like this
                                                    one have sold over
                                                    asking</span
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 text-white">
                                                <img
                                                    src="/assets/images/icons/dolor.png"
                                                    alt=""
                                                />
                                            </td>
                                            <td class="p-3 text-white">
                                                <h5>
                                                    you're unlikely to get a
                                                    deal.
                                                </h5>
                                                <span class="text-muted"
                                                    >Only 3 in 100 homes like
                                                    this sell bellow 93% of
                                                    asking</span
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="p-0">
                    <div class="container">
                        <hr class="m-0" />
                    </div>
                </section>

                <section class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <table class="table table-bordered border mb-2">
                                <tr>
                                    <th colspan="2" class="p-3 text-center">
                                        Property
                                    </th>
                                </tr>
                                <tr>
                                    <th class="p-3">Property Type</th>
                                    <td class="p-3">property_type</td>
                                </tr>
                                <tr>
                                    <th class="p-3">MLS#</th>
                                    <td class="p-3">Ml_num</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Status</th>
                                    <td class="p-3">Status</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Parcel of Tied Land</th>
                                    <td class="p-3">Potl</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Total Parking Spaces</th>
                                    <td class="p-3">Tot_park_spcs</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Link</th>
                                    <td class="p-3">Link_yn</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Link Comment</th>
                                    <td class="p-3">Link_Comment</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Water Features1</th>
                                    <td class="p-3">Water_feat1</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Water Features2</th>
                                    <td class="p-3">Water_feat2</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Water Features3</th>
                                    <td class="p-3">Water_feat3</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Water Features4</th>
                                    <td class="p-3">Water_feat4</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Water Features5</th>
                                    <td class="p-3">Water_feat5</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Shoreline1</th>
                                    <td class="p-3">Shoreline1</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Shoreline2</th>
                                    <td class="p-3">Shoreline2</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Shoreline Allowance</th>
                                    <td class="p-3">Shore_allow</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Shoreline Exposure</th>
                                    <td class="p-3">Shoreline_exp</td>
                                </tr>
                                <tr>
                                    <th class="p-3">SAlternative Power1</th>
                                    <td class="p-3">Alt_power1</td>
                                </tr>
                                <tr>
                                    <th class="p-3">SAlternative Power2</th>
                                    <td class="p-3">Alt_power2</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Retirement</th>
                                    <td class="p-3">Retirement</td>
                                </tr>
                                <tr>
                                    <th class="p-3">List Brokerage</th>
                                    <td class="p-3">Rltr</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 1 Desc 1</th>
                                    <td class="p-3">Rm1_dc1_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 1 Desc 2</th>
                                    <td class="p-3">Rm1_dc2_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 1 Desc 3</th>
                                    <td class="p-3">Rm1_dc3_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 1 Length</th>
                                    <td class="p-3">Rm1_len</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 1</th>
                                    <td class="p-3">Rm1_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 1 Width</th>
                                    <td class="p-3">Rm1_wth</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 10 Desc 1</th>
                                    <td class="p-3">Rm10_dc1_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 10 Desc 2</th>
                                    <td class="p-3">Rm10_dc2_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 10 Desc 3</th>
                                    <td class="p-3">Rm10_dc3_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 10 Length</th>
                                    <td class="p-3">Rm10_len</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 10</th>
                                    <td class="p-3">Rm10_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 10 Width</th>
                                    <td class="p-3">Rm10_wth</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 11 Desc 1</th>
                                    <td class="p-3">Rm11_dc1_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 11 Desc 2</th>
                                    <td class="p-3">Rm11_dc2_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 11 Desc 3</th>
                                    <td class="p-3">Rm11_dc3_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 11 Length</th>
                                    <td class="p-3">Rm11_len</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 11 Width</th>
                                    <td class="p-3">Rm11_wth</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 12 Desc 1</th>
                                    <td class="p-3">Rm12_dc1_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 12 Desc 2</th>
                                    <td class="p-3">Rm12_dc2_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 12 Desc 3</th>
                                    <td class="p-3">Rm12_dc3_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 12 Length</th>
                                    <td class="p-3">Rm12_len</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 12</th>
                                    <td class="p-3">Rm12_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 12 Width</th>
                                    <td class="p-3">Rm12_wth</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 2 Desc 1</th>
                                    <td class="p-3">Rm2_dc1_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 2 Desc 2</th>
                                    <td class="p-3">Rm2_dc2_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 2 Desc 3</th>
                                    <td class="p-3">Rm2_dc3_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 2 Length</th>
                                    <td class="p-3">Rm2_len</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 2</th>
                                    <td class="p-3">Rm2_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 2 Width</th>
                                    <td class="p-3">Rm2_wth</td>
                                </tr>
                                <tr>
                                    <td class="p-3">Room 3 Desc 1</td>
                                    <th class="p-3">Rm3_dc1_out</th>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 3 Desc 2</th>
                                    <td class="p-3">Rm3_dc2_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 3 Desc 3</th>
                                    <td class="p-3">Rm3_dc3_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 3 Length</th>
                                    <td class="p-3">Rm3_len</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 3</th>
                                    <td class="p-3">Rm3_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 3 Width</th>
                                    <td class="p-3">Rm3_wth</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 4 Desc 1</th>
                                    <td class="p-3">Rm4_dc1_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Heat Type</th>
                                    <td class="p-3">Heating</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Hydro Included</th>
                                    <td class="p-3">Hydro_inc</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Lot Irregularities</th>
                                    <td class="p-3">Irreg</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Kitchens Plus</th>
                                    <td class="p-3">Kit_plus</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Laundry Access</th>
                                    <td class="p-3">Laundry</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Laundry Level</th>
                                    <td class="p-3">Laundry_lev</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Legal Description</th>
                                    <td class="p-3">Legal_desc</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Level 1</th>
                                    <td class="p-3">Level1</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Level 10</th>
                                    <td class="p-3">Level10</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Level 11</th>
                                    <td class="p-3">Level11</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Level 12</th>
                                    <td class="p-3">Level12</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Level 2</th>
                                    <td class="p-3">Level2</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Level 3</th>
                                    <td class="p-3">Level3</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Level 4</th>
                                    <td class="p-3">Level4</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Level 5</th>
                                    <td class="p-3">Level5</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Level 6</th>
                                    <td class="p-3">Level6</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Level 7</th>
                                    <td class="p-3">Level7</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Level 8</th>
                                    <td class="p-3">Level8</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Level 9</th>
                                    <td class="p-3">Level9</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Lot Size Code</th>
                                    <td class="p-3">Lotsz_code</td>
                                </tr>
                                <tr>
                                    <th class="p-3">List Price</th>
                                    <td class="p-3">Lp_dol</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Leased Terms</th>
                                    <td class="p-3">Lse_terms</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Map Column #</th>
                                    <td class="p-3">Mmap_col</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Map #</th>
                                    <td class="p-3">Mmap_page</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Map Row</th>
                                    <td class="p-3">Mmap_row</td>
                                </tr>
                                <tr>
                                    <td class="p-3">Acreage</td>
                                    <th class="p-3">Acres</th>
                                </tr>
                                <tr>
                                    <th class="p-3">Remarks For Clients</th>
                                    <td class="p-3">Ad_text</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Addl Monthly Fees</th>
                                    <td class="p-3">Addl_mo_fee</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Address</th>
                                    <td class="p-3">Addr</td>
                                </tr>
                                <tr>
                                    <th class="p-3">All Inclusive</th>
                                    <td class="p-3">All_inc</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Apt/Unit</th>
                                    <td class="p-3">Apt_num</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Assessment Year</th>
                                    <td class="p-3">Ass_year</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Washrooms</th>
                                    <td class="p-3">Bath_tot</td>
                                </tr>
                                <tr>
                                    <th class="p-3">PortionPropertyLease1</th>
                                    <td class="p-3">
                                        Portion_property_lease1_out
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-3">PortionPropertyLease2</th>
                                    <td class="p-3">
                                        Portion_property_lease2_out
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-3">PortionPropertyLease3</th>
                                    <td class="p-3">
                                        Portion_property_lease3_out
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-3">PortionPropertyLease4</th>
                                    <td class="p-3">
                                        Portion_property_lease4_out
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-3">
                                        PortionPropertyLeaseSrch
                                    </th>
                                    <td class="p-3">
                                        Portion_property_lease_srch
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-3">Portion Lease Comments</th>
                                    <td class="p-3">Portion_lease_comments</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Assignment</th>
                                    <td class="p-3">Assignment</td>
                                </tr>
                                <tr>
                                    <th class="p-3">FractionalOwnership</th>
                                    <td class="p-3">Fractional_ownership</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 4 Desc 3</th>
                                    <td class="p-3">Rm4_dc3_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 4 Desc 2</th>
                                    <td class="p-3">Rm4_dc2_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 4 Length</th>
                                    <td class="p-3">Rm4_len</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 4</th>
                                    <td class="p-3">Rm4_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 4 Width</th>
                                    <td class="p-3">Rm4_wth</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 5 Desc 1</th>
                                    <td class="p-3">Rm5_dc1_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 5 Desc 2</th>
                                    <td class="p-3">Rm5_dc2_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 5 Desc 3</th>
                                    <td class="p-3">Rm5_dc3_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 5 Length</th>
                                    <td class="p-3">Rm5_len</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 5</th>
                                    <td class="p-3">Rm5_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 5 Width</th>
                                    <td class="p-3">Rm5_wth</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 6 Desc 1</th>
                                    <td class="p-3">Rm6_dc1_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 6 Desc 2</th>
                                    <td class="p-3">Rm6_dc2_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 6 Desc 3</th>
                                    <td class="p-3">Rm6_dc3_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 6 Length</th>
                                    <td class="p-3">Rm6_len</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 6</th>
                                    <td class="p-3">Rm6_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 6 Width</th>
                                    <td class="p-3">Rm6_wth</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 7 Desc 1</th>
                                    <td class="p-3">Rm7_dc1_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 7 Desc 2</th>
                                    <td class="p-3">Rm7_dc2_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 7 Length</th>
                                    <td class="p-3">Rm7_len</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 7</th>
                                    <td class="p-3">Rm7_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 7 Width</th>
                                    <td class="p-3">Rm7_wth</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 8 Desc 1</th>
                                    <td class="p-3">Rm8_dc1_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 8 Desc 2</th>
                                    <td class="p-3">Rm8_dc2_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 8 Desc 3</th>
                                    <td class="p-3">Rm8_dc3_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 8 Length</th>
                                    <td class="p-3">Rm8_out</td>
                                </tr>
                                <tr>
                                    <th class="p-3">Room 8</th>
                                    <td class="p-3">Rm8_wth</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                                <tr>
                                    <th class="p-3">ddddd</th>
                                    <td class="p-3">ddddd</td>
                                </tr>
                            </table>

                            <table class="table table-bordered border mt-4">
                                <tr>
                                    <th colspan="2" class="p-3 text-center">
                                        Inside
                                    </th>
                                </tr>
                                <tr>
                                    <th class="p-3 border-left">ok</th>
                                    <td class="p-3">ok</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-4">
                            <table class="table table-bordered border">
                                <tr>
                                    <th colspan="2" class="p-3 text-center">
                                        Building
                                    </th>
                                </tr>
                                <tr>
                                    <th class="p-3 border-left">ok</th>
                                    <td class="p-3">ok</td>
                                </tr>
                            </table>

                            <table class="table table-bordered border">
                                <tr>
                                    <th colspan="2" class="p-3 text-center">
                                        Parking
                                    </th>
                                </tr>
                                <tr>
                                    <th class="p-3 border-left">ok</th>
                                    <td class="p-3">ok</td>
                                </tr>
                            </table>

                            <table class="table table-bordered border">
                                <tr>
                                    <th colspan="2" class="p-3 text-center">
                                        Highlights
                                    </th>
                                </tr>
                                <tr>
                                    <th class="p-3 border-left">ok</th>
                                    <td class="p-3">ok</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-4">
                            <table class="table table-bordered border">
                                <tr>
                                    <th colspan="2" class="p-3 text-center">
                                        Land
                                    </th>
                                </tr>
                                <tr>
                                    <th class="p-3 border-left">ok</th>
                                    <td class="p-3">ok</td>
                                </tr>
                            </table>

                            <table class="table table-bordered border">
                                <tr>
                                    <th colspan="2" class="p-3 text-center">
                                        Condo
                                    </th>
                                </tr>
                                <tr>
                                    <th class="p-3 border-left">ok</th>
                                    <td class="p-3">ok</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="p-0">
                    <div class="container">
                        <hr class="m-0" />
                    </div>
                </section>

                <!-- Details -->
                <section>
                    <div class="container">
                        <div class="row">
                            <div
                                v-for="(value, key) in property"
                                :key="key"
                                class="col-sm-6"
                            >
                                <div
                                    v-if="
                                        key != 'images' &&
                                            value != null &&
                                            value != ''
                                    "
                                    class="border p-2"
                                >
                                    {{ key + " : " + value }}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- hr -->
            </div>
            <div v-else>
                <p class="p-5 text-center">Oops! no data found.</p>
            </div>
        </div>
        <div v-else>
            <section>
                <div class="text-center">
                    <loader :text="'Please wait... Loading details'" />
                </div>
            </section>
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
            property: null,
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
                    self.property = res.data.data[0];
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

<style scoped>
.badge {
    background-color: #9ffdd4;
    padding: 4px 10px;
    width: auto;
    height: 1.8rem;
    line-height: 1.3rem;
    border-radius: 4px;
    display: inline-block;
    margin-left: auto;
}
.details {
    background-color: rgba(215, 219, 218, 1);
    background-color: rgba(215, 219, 218, 1);
    width: 100%;
    padding: 40px;
    border-radius: 0px 0px 0px 74px;
}
.craousel-image-outer {
    object-fit: cover;
}
.crouse-image {
    height: 350px;
    width: 100%;
}
.middle-banner-image {
    width: 100%;
    max-height: 500px;
    border-radius: 0px 212px 0px 0px;
    object-fit: cover;
}
.mid-content {
    max-width: 620px;
}
</style>
