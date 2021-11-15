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
                                                    class="
                                                        img-fluid
                                                        align-middle
                                                        pb-1
                                                    "
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
                                class="
                                    carousel-outer
                                    border
                                    bg-light
                                    text-center
                                    craousel-image-outer
                                "
                            >
                                <img
                                    v-lazy="{
                                        src: img.image,
                                    }"
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
                                                            parseInt(property.Bath_tot)
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
                                                            parseInt(property.Rms)
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
                                                        class="me-2"
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
                                                        src="/assets/images/icons/shareLight.png"
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
                                class="
                                    col-md-6
                                    d-flex
                                    justify-content-center
                                    p-0
                                "
                            >
                                <div class="row details">
                                    <div class="col-12 d-flex p-0">
                                        <ul class="row list-unstyled w-100">
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
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
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Walk Score
                                                </h6>
                                                <small>
                                                    {{ property.Sqft || "N/A" }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
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
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
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
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
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
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
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
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Last Checked
                                                </h6>
                                                <small> Now (Today) </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
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
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
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
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Taxes
                                                </h6>
                                                <small>
                                                    {{ property.Yr || "N/A" }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
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
                            class="
                                col-md-6
                                mt-5
                                text-white
                                mid-content
                                ps-md-5
                                pe-sm-2
                            "
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
                                            <td class="p-2 text-white">
                                                <img
                                                    src="/assets/images/icons/calender-ico.png"
                                                    alt=""
                                                />
                                            </td>
                                            <td class="p-2 text-white">
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
                                            <td class="p-2 text-white">
                                                <img
                                                    src="/assets/images/icons/share-market.png"
                                                    alt=""
                                                />
                                            </td>
                                            <td class="p-2 text-white">
                                                <h5>Expect to bid higher.</h5>
                                                <span class="text-muted"
                                                    >6 out of 10 homes like this
                                                    one have sold over
                                                    asking</span
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-white">
                                                <img
                                                    src="/assets/images/icons/dolor.png"
                                                    alt=""
                                                />
                                            </td>
                                            <td class="p-2 text-white">
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
                        <div
                            class="col-sm-4 col-lg-4 col-md-4 table-responsive"
                        >
                            <table class="table table-bordered border mb-2">
                                <tr>
                                    <th colspan="2" class="p-2 text-center">
                                        Property
                                    </th>
                                </tr>
                                <tr v-if="property.property_type">
                                    <th class="p-2">Property Type</th>
                                    <td class="p-2">
                                        {{ property.property_type }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_feat1">
                                    <th class="p-2">Water Features 1</th>
                                    <td class="p-2">
                                        {{ property.Water_feat1 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_feat2">
                                    <th class="p-2">Water Features 2</th>
                                    <td class="p-2">
                                        {{ property.Water_feat2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_feat3">
                                    <th class="p-2">Water Features 3</th>
                                    <td class="p-2">
                                        {{ property.Water_feat3 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_feat4">
                                    <th class="p-2">Water Features 4</th>
                                    <td class="p-2">
                                        {{ property.Water_feat4 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_feat5">
                                    <th class="p-2">Water Features 5</th>
                                    <td class="p-2">
                                        {{ property.Water_feat5 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shoreline1">
                                    <th class="p-2">Shoreline 1</th>
                                    <td class="p-2">
                                        {{ property.Shoreline1 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shoreline2">
                                    <th class="p-2">Shoreline 2</th>
                                    <td class="p-2">
                                        {{ property.Shoreline2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shore_allow">
                                    <th class="p-2">Shoreline Allowance</th>
                                    <td class="p-2">
                                        {{ property.Shore_allow }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shoreline_exp">
                                    <th class="p-2">Shoreline Exposure</th>
                                    <td class="p-2">
                                        {{ property.Shoreline_exp }}
                                    </td>
                                </tr>
                                <tr v-if="property.Alt_power1">
                                    <th class="p-2">Alternative Power1</th>
                                    <td class="p-2">
                                        {{ property.Alt_power1 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Alt_power2">
                                    <th class="p-2">Alternative Power2</th>
                                    <td class="p-2">
                                        {{ property.Alt_power2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Retirement">
                                    <th class="p-2">Retirement</th>
                                    <td class="p-2">
                                        {{ property.Retirement }}
                                    </td>
                                </tr>
                                <tr v-if="property.Legal_desc">
                                    <th class="p-2">Legal Description</th>
                                    <td class="p-2">
                                        {{ property.Legal_desc }}
                                    </td>
                                </tr>
                                <tr v-if="property.Level1">
                                    <th class="p-2">Level 1</th>
                                    <td class="p-2">{{ property.Level1 }}</td>
                                </tr>
                                <tr v-if="property.Level10">
                                    <th class="p-2">Level 10</th>
                                    <td class="p-2">{{ property.Level10 }}</td>
                                </tr>
                                <tr v-if="property.Level11">
                                    <th class="p-2">Level 11</th>
                                    <td class="p-2">{{ property.Level11 }}</td>
                                </tr>
                                <tr v-if="property.Level12">
                                    <th class="p-2">Level 12</th>
                                    <td class="p-2">{{ property.Level12 }}</td>
                                </tr>
                                <tr v-if="property.Level2">
                                    <th class="p-2">Level 2</th>
                                    <td class="p-2">{{ property.Level2 }}</td>
                                </tr>
                                <tr v-if="property.Level3">
                                    <th class="p-2">Level 3</th>
                                    <td class="p-2">{{ property.Level3 }}</td>
                                </tr>
                                <tr v-if="property.Level4">
                                    <th class="p-2">Level 4</th>
                                    <td class="p-2">{{ property.Level4 }}</td>
                                </tr>
                                <tr v-if="property.Level5">
                                    <th class="p-2">Level 5</th>
                                    <td class="p-2">{{ property.Level5 }}</td>
                                </tr>
                                <tr v-if="property.Level6">
                                    <th class="p-2">Level 6</th>
                                    <td class="p-2">{{ property.Level6 }}</td>
                                </tr>
                                <tr v-if="property.Level7">
                                    <th class="p-2">Level 7</th>
                                    <td class="p-2">{{ property.Level7 }}</td>
                                </tr>
                                <tr v-if="property.Level8">
                                    <th class="p-2">Level 8</th>
                                    <td class="p-2">{{ property.Level8 }}</td>
                                </tr>
                                <tr v-if="property.Level9">
                                    <th class="p-2">Level 9</th>
                                    <td class="p-2">{{ property.Level9 }}</td>
                                </tr>
                                <tr v-if="property.Lotsz_code">
                                    <th class="p-2">Lot Size Code</th>
                                    <td class="p-2">
                                        {{ property.Lotsz_code }}
                                    </td>
                                </tr>
                                <tr v-if="property.Lse_terms">
                                    <th class="p-2">Leased Terms</th>
                                    <td class="p-2">
                                        {{ property.Lse_terms }}
                                    </td>
                                </tr>
                                <tr v-if="property.Mmap_col">
                                    <th class="p-2">Map Column #</th>
                                    <td class="p-2">{{ property.Mmap_col }}</td>
                                </tr>
                                <tr v-if="property.Mmap_page">
                                    <th class="p-2">Map #</th>
                                    <td class="p-2">
                                        {{ property.Mmap_page }}
                                    </td>
                                </tr>
                                <tr v-if="property.Mmap_row">
                                    <th class="p-2">Map Row</th>
                                    <td class="p-2">{{ property.Mmap_row }}</td>
                                </tr>
                                <tr v-if="property.Acreage">
                                    <th class="p-2">Acres</th>
                                    <td class="p-2">{{ property.Acreage }}</td>
                                </tr>
                                <tr v-if="property.Addl_mo_fee">
                                    <th class="p-2">Add Monthly Fees</th>
                                    <td class="p-2">
                                        {{ property.Addl_mo_fee }}
                                    </td>
                                </tr>
                                <tr v-if="property.All_inc">
                                    <th class="p-2">All Inclusive</th>
                                    <td class="p-2">{{ property.All_inc }}</td>
                                </tr>
                                <tr v-if="property.Apt_num">
                                    <th class="p-2">Apt/Unit</th>
                                    <td class="p-2">{{ property.Apt_num }}</td>
                                </tr>
                                <tr v-if="property.Ass_year">
                                    <th class="p-2">Assessment Year</th>
                                    <td class="p-2">{{ property.Ass_year }}</td>
                                </tr>
                                <tr v-if="property.Portion_property_lease1_out">
                                    <th class="p-2">PortionPropertyLease1</th>
                                    <td class="p-2">
                                        {{
                                            property.Portion_property_lease1_out
                                        }}
                                    </td>
                                </tr>
                                <tr v-if="property.Portion_property_lease2_out">
                                    <th class="p-2">PortionPropertyLease2</th>
                                    <td class="p-2">
                                        {{
                                            property.Portion_property_lease2_out
                                        }}
                                    </td>
                                </tr>
                                <tr v-if="property.Portion_property_lease3_out">
                                    <th class="p-2">PortionPropertyLease3</th>
                                    <td class="p-2">
                                        {{
                                            property.Portion_property_lease3_out
                                        }}
                                    </td>
                                </tr>
                                <tr v-if="property.Portion_property_lease4_out">
                                    <th class="p-2">PortionPropertyLease4</th>
                                    <td class="p-2">
                                        {{
                                            property.Portion_property_lease4_out
                                        }}
                                    </td>
                                </tr>
                                <tr v-if="property.Portion_property_lease_srch">
                                    <th class="p-2">
                                        PortionPropertyLeaseSrch
                                    </th>
                                    <td class="p-2">
                                        {{
                                            property.Portion_property_lease_srch
                                        }}
                                    </td>
                                </tr>
                                <tr v-if="property.Portion_lease_comments">
                                    <th class="p-2">Portion Lease Comments</th>
                                    <td class="p-2">
                                        {{ property.Portion_lease_comments }}
                                    </td>
                                </tr>
                                <tr v-if="property.Assignment">
                                    <th class="p-2">Assignment</th>
                                    <td class="p-2">
                                        {{ property.Assignment }}
                                    </td>
                                </tr>
                                <tr v-if="property.Fractional_ownership">
                                    <th class="p-2">FractionalOwnership</th>
                                    <td class="p-2">
                                        {{ property.Fractional_ownership }}
                                    </td>
                                </tr>
                                <tr v-if="property.Sewer">
                                    <th class="p-2">Sewers</th>
                                    <td class="p-2">{{ property.Sewer }}</td>
                                </tr>
                                <tr v-if="property.Spec_des1_out">
                                    <th class="p-2">Special Designation 1</th>
                                    <td class="p-2">
                                        {{ property.Spec_des1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Spec_des2_out">
                                    <th class="p-2">Special Designation 2</th>
                                    <td class="p-2">
                                        {{ property.Spec_des2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Spec_des3_out">
                                    <th class="p-2">Special Designation 3</th>
                                    <td class="p-2">
                                        {{ property.Spec_des3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Spec_des4_out">
                                    <th class="p-2">Special Designation 4</th>
                                    <td class="p-2">
                                        {{ property.Spec_des4_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Spec_des5_out">
                                    <th class="p-2">Special Designation 5</th>
                                    <td class="p-2">
                                        {{ property.Spec_des5_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Sqft">
                                    <th class="p-2">Approx Square Footage</th>
                                    <td class="p-2">{{ property.Sqft }}</td>
                                </tr>
                                <tr v-if="property.Style">
                                    <th class="p-2">Style</th>
                                    <td class="p-2">{{ property.Style }}</td>
                                </tr>
                                <tr v-if="property.Taxes">
                                    <th class="p-2">Taxes</th>
                                    <td class="p-2">{{ property.Taxes }}</td>
                                </tr>
                                <tr v-if="property.Tour_url">
                                    <th class="p-2">Virtual Tour URL</th>
                                    <td class="p-2">{{ property.Tour_url }}</td>
                                </tr>
                                <tr v-if="property.Community_code">
                                    <th class="p-2">Community Code</th>
                                    <td class="p-2">
                                        {{ property.Community_code }}
                                    </td>
                                </tr>
                                <tr v-if="property.Area_code">
                                    <th class="p-2">Area Code</th>
                                    <td class="p-2">
                                        {{ property.Area_code }}
                                    </td>
                                </tr>
                                <tr v-if="property.Tv">
                                    <th class="p-2">Assessment</th>
                                    <td class="p-2">{{ property.Tv }}</td>
                                </tr>
                                <tr v-if="property.Type_own_srch">
                                    <th class="p-2">Type</th>
                                    <td class="p-2">
                                        {{ property.Type_own_srch }}
                                    </td>
                                </tr>
                                <tr v-if="property.Type_own1_out">
                                    <th class="p-2">Type 1</th>
                                    <td class="p-2">
                                        {{ property.Type_own1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Uffi">
                                    <th class="p-2">UFFI</th>
                                    <td class="p-2">{{ property.Uffi }}</td>
                                </tr>
                                <tr v-if="property.Util_cable">
                                    <th class="p-2">Utilities-Cable</th>
                                    <td class="p-2">
                                        {{ property.Util_cable }}
                                    </td>
                                </tr>
                                <tr v-if="property.Util_tel">
                                    <th class="p-2">Utilities-Telephone</th>
                                    <td class="p-2">{{ property.Util_tel }}</td>
                                </tr>
                                <tr v-if="property.Vend_pis">
                                    <th class="p-2">
                                        Seller Property Info Statement
                                    </th>
                                    <td class="p-2">{{ property.Vend_pis }}</td>
                                </tr>
                                <tr v-if="property.Vtour_updt">
                                    <th class="p-2">
                                        Virtual Tour Upload Date
                                    </th>
                                    <td class="p-2">
                                        {{ property.Vtour_updt }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water">
                                    <th class="p-2">Water</th>
                                    <td class="p-2">{{ property.Water }}</td>
                                </tr>
                                <tr v-if="property.Water_inc">
                                    <th class="p-2">Water Included</th>
                                    <td class="p-2">
                                        {{ property.Water_inc }}
                                    </td>
                                </tr>
                                <tr v-if="property.Waterfront">
                                    <th class="p-2">Waterfront</th>
                                    <td class="p-2">
                                        {{ property.Waterfront }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wtr_suptyp">
                                    <th class="p-2">Water Supply Types</th>
                                    <td class="p-2">
                                        {{ property.Wtr_suptyp }}
                                    </td>
                                </tr>
                                <tr v-if="property.Yr">
                                    <th class="p-2">Tax Year</th>
                                    <td class="p-2">{{ property.Yr }}</td>
                                </tr>
                                <tr v-if="property.Yr_built">
                                    <th class="p-2">Approx Age</th>
                                    <td class="p-2">{{ property.Yr_built }}</td>
                                </tr>
                                <tr v-if="property.Zip">
                                    <th class="p-2">Postal Code</th>
                                    <td class="p-2">{{ property.Zip }}</td>
                                </tr>
                                <tr v-if="property.Zoning">
                                    <th class="p-2">Zoning</th>
                                    <td class="p-2">{{ property.Zoning }}</td>
                                </tr>
                                <tr v-if="property.Br">
                                    <th class="p-2">Bedrooms</th>
                                    <td class="p-2">{{ property.Br }}</td>
                                </tr>
                                <tr v-if="property.Br_plus">
                                    <th class="p-2">Bedrooms +</th>
                                    <td class="p-2">{{ property.Br_plus }}</td>
                                </tr>
                                <tr v-if="property.Bsmt1_out">
                                    <th class="p-2">Basement1</th>
                                    <td class="p-2">
                                        {{ property.Bsmt1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Bsmt2_out">
                                    <th class="p-2">Basement2</th>
                                    <td class="p-2">
                                        {{ property.Bsmt2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Cable">
                                    <th class="p-2">Cable TV Included</th>
                                    <td class="p-2">{{ property.Cable }}</td>
                                </tr>
                                <tr v-if="property.Cac_inc">
                                    <th class="p-2">CAC Included</th>
                                    <td class="p-2">{{ property.Cac_inc }}</td>
                                </tr>
                                <tr v-if="property.Central_vac">
                                    <th class="p-2">Central Vac</th>
                                    <td class="p-2">
                                        {{ property.Central_vac }}
                                    </td>
                                </tr>
                                <tr v-if="property.Comel_inc">
                                    <th class="p-2">
                                        Common Elements Included
                                    </th>
                                    <td class="p-2">
                                        {{ property.Comel_inc }}
                                    </td>
                                </tr>
                                <tr v-if="property.Comp_pts">
                                    <th class="p-2">Fronting On (NSEW)</th>
                                    <td class="p-2">{{ property.Comp_pts }}</td>
                                </tr>
                                <tr v-if="property.Constr1_out">
                                    <th class="p-2">Exterior1</th>
                                    <td class="p-2">
                                        {{ property.Constr1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Constr2_out">
                                    <th class="p-2">Exterior2</th>
                                    <td class="p-2">
                                        {{ property.Constr2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.County">
                                    <th class="p-2">Province</th>
                                    <td class="p-2">{{ property.County }}</td>
                                </tr>
                                <tr v-if="property.Cross_st">
                                    <th class="p-2">
                                        Directions/Cross Streets
                                    </th>
                                    <td class="p-2">{{ property.Cross_st }}</td>
                                </tr>
                                <tr v-if="property.Heat_inc">
                                    <th class="p-2">Heat Included</th>
                                    <td class="p-2">{{ property.Heat_inc }}</td>
                                </tr>
                                <tr v-if="property.Spec_des6_out">
                                    <th class="p-2">Special Designation 6</th>
                                    <td class="p-2">
                                        {{ property.Spec_des6_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_body">
                                    <th class="p-2">Water Body Name</th>
                                    <td class="p-2">
                                        {{ property.Water_body }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_type">
                                    <th class="p-2">Water Body Type</th>
                                    <td class="p-2">
                                        {{ property.Water_type }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_front">
                                    <th class="p-2">Water Frontage</th>
                                    <td class="p-2">
                                        {{ property.Water_front }}
                                    </td>
                                </tr>
                                <tr v-if="property.Access_prop1">
                                    <th class="p-2">Access To Property1</th>
                                    <td class="p-2">
                                        {{ property.Access_prop1 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Easement_rest1">
                                    <th class="p-2">Easements Restrictions1</th>
                                    <td class="p-2">
                                        {{ property.Easement_rest1 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Easement_rest2">
                                    <th class="p-2">Easements Restrictions2</th>
                                    <td class="p-2">
                                        {{ property.Easement_rest2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Easement_rest3">
                                    <th class="p-2">Easements Restrictions3</th>
                                    <td class="p-2">
                                        {{ property.Easement_rest3 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Easement_rest4">
                                    <th class="p-2">Easements Restrictions4</th>
                                    <td class="p-2">
                                        {{ property.Easement_rest4 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rural_svc1">
                                    <th class="p-2">Rural Services1</th>
                                    <td class="p-2">
                                        {{ property.Rural_svc1 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rural_svc2">
                                    <th class="p-2">Rural Services2</th>
                                    <td class="p-2">
                                        {{ property.Rural_svc2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rural_svc3">
                                    <th class="p-2">Rural Services3</th>
                                    <td class="p-2">
                                        {{ property.Rural_svc3 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rural_svc4">
                                    <th class="p-2">Rural Services4</th>
                                    <td class="p-2">
                                        {{ property.Rural_svc4 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rural_svc5">
                                    <th class="p-2">Rural Services5</th>
                                    <td class="p-2">
                                        {{ property.Rural_svc5 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_acc_bldg1">
                                    <th class="p-2">
                                        Waterfront Accessory Bldgs1
                                    </th>
                                    <td class="p-2">
                                        {{ property.Water_acc_bldg1 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_acc_bldg2">
                                    <th class="p-2">
                                        Waterfront Accessory Bldgs2
                                    </th>
                                    <td class="p-2">
                                        {{ property.Water_acc_bldg2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_del_feat1">
                                    <th class="p-2">
                                        Water Delivery Features1
                                    </th>
                                    <td class="p-2">
                                        {{ property.Water_del_feat1 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_del_feat2">
                                    <th class="p-2">
                                        Water Delivery Features2
                                    </th>
                                    <td class="p-2">
                                        {{ property.Water_del_feat2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Sewage1">
                                    <th class="p-2">Sewage1</th>
                                    <td class="p-2">{{ property.Sewage1 }}</td>
                                </tr>
                                <tr v-if="property.Sewage2">
                                    <th class="p-2">Sewage2</th>
                                    <td class="p-2">{{ property.Sewage2 }}</td>
                                </tr>
                                <tr v-if="property.Depth">
                                    <th class="p-2">Lot Depth</th>
                                    <td class="p-2">{{ property.Depth }}</td>
                                </tr>
                                <tr v-if="property.Disp_addr">
                                    <th class="p-2">
                                        Display Address On Internet
                                    </th>
                                    <td class="p-2">
                                        {{ property.Disp_addr }}
                                    </td>
                                </tr>
                                <tr v-if="property.Drive">
                                    <th class="p-2">Drive</th>
                                    <td class="p-2">{{ property.Drive }}</td>
                                </tr>
                                <tr v-if="property.Elec">
                                    <th class="p-2">Utilities-Hydro</th>
                                    <td class="p-2">{{ property.Elec }}</td>
                                </tr>
                                <tr v-if="property.Elevator">
                                    <th class="p-2">Elevator</th>
                                    <td class="p-2">{{ property.Elevator }}</td>
                                </tr>
                                <tr v-if="property.Extras">
                                    <th class="p-2">Extras</th>
                                    <td class="p-2">{{ property.Extras }}</td>
                                </tr>
                                <tr v-if="property.Farm_agri">
                                    <th class="p-2">Farm/Agriculture</th>
                                    <td class="p-2">
                                        {{ property.Farm_agri }}
                                    </td>
                                </tr>
                                <tr v-if="property.Occ">
                                    <th class="p-2">Possession Remarks</th>
                                    <td class="p-2">{{ property.Occ }}</td>
                                </tr>
                                <tr v-if="property.A_c">
                                    <th class="p-2">Air Conditioning</th>
                                    <td class="p-2">{{ property.A_c }}</td>
                                </tr>
                                <tr v-if="property.Access_prop2">
                                    <th class="p-2">Access To Property2</th>
                                    <td class="p-2">
                                        {{ property.Access_prop2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Oth_struc1_out">
                                    <th class="p-2">Other Structures1</th>
                                    <td class="p-2">
                                        {{ property.Oth_struc1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Oth_struc2_out">
                                    <th class="p-2">Other Structures2</th>
                                    <td class="p-2">
                                        {{ property.Oth_struc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Outof_area">
                                    <th class="p-2">
                                        Out of Area Municipality
                                    </th>
                                    <td class="p-2">
                                        {{ property.Outof_area }}
                                    </td>
                                </tr>
                                <tr v-if="property.Parcel_id">
                                    <th class="p-2">PIN#</th>
                                    <td class="p-2">
                                        {{ property.Parcel_id }}
                                    </td>
                                </tr>
                                <tr v-if="property.Pool">
                                    <th class="p-2">Pool</th>
                                    <td class="p-2">{{ property.Pool }}</td>
                                </tr>
                                <tr v-if="property.Prop_feat1_out">
                                    <th class="p-2">Property Features 1</th>
                                    <td class="p-2">
                                        {{ property.Prop_feat1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Prop_feat2_out">
                                    <th class="p-2">Property Features 2</th>
                                    <td class="p-2">
                                        {{ property.Prop_feat2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Prop_feat3_out">
                                    <th class="p-2">Property Features 3</th>
                                    <td class="p-2">
                                        {{ property.Prop_feat3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Prop_feat4_out">
                                    <th class="p-2">Property Features 4</th>
                                    <td class="p-2">
                                        {{ property.Prop_feat4_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Prop_feat5_out">
                                    <th class="p-2">Property Features 5</th>
                                    <td class="p-2">
                                        {{ property.Prop_feat5_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Prop_feat6_out">
                                    <th class="p-2">Property Features 6</th>
                                    <td class="p-2">
                                        {{ property.Prop_feat6_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Pvt_ent">
                                    <th class="p-2">Private Entrance</th>
                                    <td class="p-2">{{ property.Pvt_ent }}</td>
                                </tr>
                                <tr v-if="property.Municipality_district">
                                    <th class="p-2">Municipality District</th>
                                    <td class="p-2">
                                        {{ property.Municipality_district }}
                                    </td>
                                </tr>
                                <tr v-if="property.Municipality">
                                    <th class="p-2">Municipality</th>
                                    <td class="p-2">
                                        {{ property.Municipality }}
                                    </td>
                                </tr>
                                <tr v-if="property.Pix_updt">
                                    <th class="p-2">Pix updated date</th>
                                    <td class="p-2">{{ property.Pix_updt }}</td>
                                </tr>
                                <tr v-if="property.Timestamp_sql">
                                    <th class="p-2">Updated timestamp</th>
                                    <td class="p-2">
                                        {{ property.Timestamp_sql }}
                                    </td>
                                </tr>
                                <tr v-if="property.Municipality_code">
                                    <th class="p-2">Municipality Code</th>
                                    <td class="p-2">
                                        {{ property.Municipality_code }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div
                            class="col-sm-4 col-lg-4 col-md-4 table-responsive"
                        >
                            <table class="table table-bordered border">
                                <tr>
                                    <th colspan="2" class="p-2 text-center">
                                        Building
                                    </th>
                                </tr>
                                <tr v-if="property.Insur_bldg">
                                    <th class="p-2">
                                        Building Insurance Included
                                    </th>
                                    <td class="p-2">
                                        {{ property.Insur_bldg }}
                                    </td>
                                </tr>
                                <tr v-if="property.Bldg_amen1_out">
                                    <th class="p-2">Building Amenities 1</th>
                                    <td class="p-2">
                                        {{ property.Bldg_amen1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Bldg_amen2_out">
                                    <th class="p-2">Building Amenities 2</th>
                                    <td class="p-2">
                                        {{ property.Bldg_amen2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Bldg_amen3_out">
                                    <th class="p-2">Building Amenities 3</th>
                                    <td class="p-2">
                                        {{ property.Bldg_amen3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Bldg_amen4_out">
                                    <th class="p-2">Building Amenities 4</th>
                                    <td class="p-2">
                                        {{ property.Bldg_amen4_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Bldg_amen5_out">
                                    <th class="p-2">Building Amenities 5</th>
                                    <td class="p-2">
                                        {{ property.Bldg_amen5_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Bldg_amen6_out">
                                    <th class="p-2">Building Amenities 6</th>
                                    <td class="p-2">
                                        {{ property.Bldg_amen6_out }}
                                    </td>
                                </tr>
                            </table>

                            <table class="table table-bordered border">
                                <tr>
                                    <th colspan="2" class="p-2 text-center">
                                        Rooms
                                    </th>
                                </tr>
                                <tr v-if="property.Rms">
                                    <th class="p-2">Rooms</th>
                                    <td class="p-2">{{ property.Rms }}</td>
                                </tr>
                                <tr v-if="property.Rooms_plus">
                                    <th class="p-2">Rooms +</th>
                                    <td class="p-2">
                                        {{ property.Rooms_plus }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm1_dc1_out">
                                    <th class="p-2">Room 1 Desc 1</th>
                                    <td class="p-2">
                                        {{ property.Rm1_dc1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm1_dc2_out">
                                    <th class="p-2">Room 1 Desc 2</th>
                                    <td class="p-2">
                                        {{ property.Rm1_dc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm1_dc3_out">
                                    <th class="p-2">Room 1 Desc 3</th>
                                    <td class="p-2">
                                        {{ property.Rm1_dc3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm1_len">
                                    <th class="p-2">Room 1 Length</th>
                                    <td class="p-2">{{ property.Rm1_len }}</td>
                                </tr>
                                <tr v-if="property.Rm1_out">
                                    <th class="p-2">Room 1</th>
                                    <td class="p-2">{{ property.Rm1_out }}</td>
                                </tr>
                                <tr v-if="property.Rm1_wth">
                                    <th class="p-2">Room 1 Width</th>
                                    <td class="p-2">{{ property.Rm1_wth }}</td>
                                </tr>
                                <tr v-if="property.Rm10_dc1_out">
                                    <th class="p-2">Room 10 Desc 1</th>
                                    <td class="p-2">
                                        {{ property.Rm10_dc1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm10_dc2_out">
                                    <th class="p-2">Room 10 Desc 2</th>
                                    <td class="p-2">
                                        {{ property.Rm10_dc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm10_dc3_out">
                                    <th class="p-2">Room 10 Desc 3</th>
                                    <td class="p-2">
                                        {{ property.Rm10_dc3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm10_len">
                                    <th class="p-2">Room 10 Length</th>
                                    <td class="p-2">{{ property.Rm10_len }}</td>
                                </tr>
                                <tr v-if="property.Rm10_out">
                                    <th class="p-2">Room 10</th>
                                    <td class="p-2">{{ property.Rm10_out }}</td>
                                </tr>
                                <tr v-if="property.Rm10_wth">
                                    <th class="p-2">Room 10 Width</th>
                                    <td class="p-2">{{ property.Rm10_wth }}</td>
                                </tr>
                                <tr v-if="property.Rm11_dc1_out">
                                    <th class="p-2">Room 11 Desc 1</th>
                                    <td class="p-2">
                                        {{ property.Rm11_dc1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm11_dc2_out">
                                    <th class="p-2">Room 11 Desc 2</th>
                                    <td class="p-2">
                                        {{ property.Rm11_dc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm11_dc3_out">
                                    <th class="p-2">Room 11 Desc 3</th>
                                    <td class="p-2">
                                        {{ property.Rm11_dc3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm11_len">
                                    <th class="p-2">Room 11 Length</th>
                                    <td class="p-2">{{ property.Rm11_len }}</td>
                                </tr>
                                <tr v-if="property.Rm11_wth">
                                    <th class="p-2">Room 11 Width</th>
                                    <td class="p-2">{{ property.Rm11_wth }}</td>
                                </tr>
                                <tr v-if="property.Rm12_dc1_out">
                                    <th class="p-2">Room 12 Desc 1</th>
                                    <td class="p-2">
                                        {{ property.Rm12_dc1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm12_dc2_out">
                                    <th class="p-2">Room 12 Desc 2</th>
                                    <td class="p-2">
                                        {{ property.Rm12_dc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm12_dc3_out">
                                    <th class="p-2">Room 12 Desc 3</th>
                                    <td class="p-2">
                                        {{ property.Rm12_dc3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm12_len">
                                    <th class="p-2">Room 12 Length</th>
                                    <td class="p-2">{{ property.Rm12_len }}</td>
                                </tr>
                                <tr v-if="property.Rm12_out">
                                    <th class="p-2">Room 12</th>
                                    <td class="p-2">{{ property.Rm12_out }}</td>
                                </tr>
                                <tr v-if="property.Rm12_wth">
                                    <th class="p-2">Room 12 Width</th>
                                    <td class="p-2">{{ property.Rm12_wth }}</td>
                                </tr>
                                <tr v-if="property.Rm2_dc1_out">
                                    <th class="p-2">Room 2 Desc 1</th>
                                    <td class="p-2">
                                        {{ property.Rm2_dc1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm2_dc2_out">
                                    <th class="p-2">Room 2 Desc 2</th>
                                    <td class="p-2">
                                        {{ property.Rm2_dc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm2_dc3_out">
                                    <th class="p-2">Room 2 Desc 3</th>
                                    <td class="p-2">
                                        {{ property.Rm2_dc3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm2_len">
                                    <th class="p-2">Room 2 Length</th>
                                    <td class="p-2">{{ property.Rm2_len }}</td>
                                </tr>
                                <tr v-if="property.Rm2_out">
                                    <th class="p-2">Room 2</th>
                                    <td class="p-2">{{ property.Rm2_out }}</td>
                                </tr>
                                <tr v-if="property.Rm2_wth">
                                    <th class="p-2">Room 2 Width</th>
                                    <td class="p-2">{{ property.Rm2_wth }}</td>
                                </tr>
                                <tr v-if="property.Room">
                                    <th class="p-2">Rm3_dc1_out</th>
                                    <td class="p-2">
                                        {{ property.Room }} 3 Desc 1
                                    </td>
                                </tr>
                                <tr v-if="property.Rm3_dc2_out">
                                    <th class="p-2">Room 3 Desc 2</th>
                                    <td class="p-2">
                                        {{ property.Rm3_dc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm3_dc3_out">
                                    <th class="p-2">Room 3 Desc 3</th>
                                    <td class="p-2">
                                        {{ property.Rm3_dc3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm3_len">
                                    <th class="p-2">Room 3 Length</th>
                                    <td class="p-2">{{ property.Rm3_len }}</td>
                                </tr>
                                <tr v-if="property.Rm3_out">
                                    <th class="p-2">Room 3</th>
                                    <td class="p-2">{{ property.Rm3_out }}</td>
                                </tr>
                                <tr v-if="property.Rm3_wth">
                                    <th class="p-2">Room 3 Width</th>
                                    <td class="p-2">{{ property.Rm3_wth }}</td>
                                </tr>
                                <tr v-if="property.Rm4_dc1_out">
                                    <th class="p-2">Room 4 Desc 1</th>
                                    <td class="p-2">
                                        {{ property.Rm4_dc1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm4_dc3_out">
                                    <th class="p-2">Room 4 Desc 3</th>
                                    <td class="p-2">
                                        {{ property.Rm4_dc3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm4_dc2_out">
                                    <th class="p-2">Room 4 Desc 2</th>
                                    <td class="p-2">
                                        {{ property.Rm4_dc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm4_len">
                                    <th class="p-2">Room 4 Length</th>
                                    <td class="p-2">{{ property.Rm4_len }}</td>
                                </tr>
                                <tr v-if="property.Rm4_out">
                                    <th class="p-2">Room 4</th>
                                    <td class="p-2">{{ property.Rm4_out }}</td>
                                </tr>
                                <tr v-if="property.Rm4_wth">
                                    <th class="p-2">Room 4 Width</th>
                                    <td class="p-2">{{ property.Rm4_wth }}</td>
                                </tr>
                                <tr v-if="property.Rm5_dc1_out">
                                    <th class="p-2">Room 5 Desc 1</th>
                                    <td class="p-2">
                                        {{ property.Rm5_dc1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm5_dc2_out">
                                    <th class="p-2">Room 5 Desc 2</th>
                                    <td class="p-2">
                                        {{ property.Rm5_dc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm5_dc3_out">
                                    <th class="p-2">Room 5 Desc 3</th>
                                    <td class="p-2">
                                        {{ property.Rm5_dc3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm5_len">
                                    <th class="p-2">Room 5 Length</th>
                                    <td class="p-2">{{ property.Rm5_len }}</td>
                                </tr>
                                <tr v-if="property.Rm5_out">
                                    <th class="p-2">Room 5</th>
                                    <td class="p-2">{{ property.Rm5_out }}</td>
                                </tr>
                                <tr v-if="property.Rm5_wth">
                                    <th class="p-2">Room 5 Width</th>
                                    <td class="p-2">{{ property.Rm5_wth }}</td>
                                </tr>
                                <tr v-if="property.Rm6_dc1_out">
                                    <th class="p-2">Room 6 Desc 1</th>
                                    <td class="p-2">
                                        {{ property.Rm6_dc1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm6_dc2_out">
                                    <th class="p-2">Room 6 Desc 2</th>
                                    <td class="p-2">
                                        {{ property.Rm6_dc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm6_dc3_out">
                                    <th class="p-2">Room 6 Desc 3</th>
                                    <td class="p-2">
                                        {{ property.Rm6_dc3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm6_len">
                                    <th class="p-2">Room 6 Length</th>
                                    <td class="p-2">{{ property.Rm6_len }}</td>
                                </tr>
                                <tr v-if="property.Rm6_out">
                                    <th class="p-2">Room 6</th>
                                    <td class="p-2">{{ property.Rm6_out }}</td>
                                </tr>
                                <tr v-if="property.Rm6_wth">
                                    <th class="p-2">Room 6 Width</th>
                                    <td class="p-2">{{ property.Rm6_wth }}</td>
                                </tr>
                                <tr v-if="property.Rm7_dc1_out">
                                    <th class="p-2">Room 7 Desc 1</th>
                                    <td class="p-2">
                                        {{ property.Rm7_dc1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm7_dc2_out">
                                    <th class="p-2">Room 7 Desc 2</th>
                                    <td class="p-2">
                                        {{ property.Rm7_dc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm7_len">
                                    <th class="p-2">Room 7 Length</th>
                                    <td class="p-2">{{ property.Rm7_len }}</td>
                                </tr>
                                <tr v-if="property.Rm7_out">
                                    <th class="p-2">Room 7</th>
                                    <td class="p-2">{{ property.Rm7_out }}</td>
                                </tr>
                                <tr v-if="property.Rm7_wth">
                                    <th class="p-2">Room 7 Width</th>
                                    <td class="p-2">{{ property.Rm7_wth }}</td>
                                </tr>
                                <tr v-if="property.Rm8_dc1_out">
                                    <th class="p-2">Room 8 Desc 1</th>
                                    <td class="p-2">
                                        {{ property.Rm8_dc1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm8_dc2_out">
                                    <th class="p-2">Room 8 Desc 2</th>
                                    <td class="p-2">
                                        {{ property.Rm8_dc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm8_dc3_out">
                                    <th class="p-2">Room 8 Desc 3</th>
                                    <td class="p-2">
                                        {{ property.Rm8_dc3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm8_len">
                                    <th class="p-2">Room 8 Length</th>
                                    <td class="p-2">{{ property.Rm8_len }}</td>
                                </tr>
                                <tr v-if="property.Rm8_out">
                                    <th class="p-2">Room 8</th>
                                    <td class="p-2">{{ property.Rm8_out }}</td>
                                </tr>
                                <tr v-if="property.Rm8_wth">
                                    <th class="p-2">Room 8 Width</th>
                                    <td class="p-2">{{ property.Rm8_wth }}</td>
                                </tr>
                                <tr v-if="property.Rm9_dc1_out">
                                    <th class="p-2">Room 9 Desc 1</th>
                                    <td class="p-2">
                                        {{ property.Rm9_dc1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm9_dc2_out">
                                    <th class="p-2">Room 9 Desc 2</th>
                                    <td class="p-2">
                                        {{ property.Rm9_dc2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm9_dc3_out">
                                    <th class="p-2">Room 9 Desc 3</th>
                                    <td class="p-2">
                                        {{ property.Rm9_dc3_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rm9_len">
                                    <th class="p-2">Room 9 Length</th>
                                    <td class="p-2">{{ property.Rm9_len }}</td>
                                </tr>
                                <tr v-if="property.Rm9_out">
                                    <th class="p-2">Room 9</th>
                                    <td class="p-2">{{ property.Rm9_out }}</td>
                                </tr>
                                <tr v-if="property.Rm9_wth">
                                    <th class="p-2">Room 9 Width</th>
                                    <td class="p-2">{{ property.Rm9_wth }}</td>
                                </tr>
                                <tr v-if="property.Den_fr">
                                    <th class="p-2">Family Room</th>
                                    <td class="p-2">{{ property.Den_fr }}</td>
                                </tr>
                                <tr v-if="property.Rm11_out">
                                    <th class="p-2">Room 11</th>
                                    <td class="p-2">{{ property.Rm11_out }}</td>
                                </tr>
                                <tr v-if="property.Rm7_dc3_out">
                                    <th class="p-2">Room 7 Desc 3</th>
                                    <td class="p-2">
                                        {{ property.Rm7_dc3_out }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div
                            class="col-sm-4 col-lg-4 col-md-4 table-responsive"
                        >
                            <table class="table table-bordered border">
                                <tr>
                                    <th colspan="2" class="p-2 text-center">
                                        Washrooms
                                    </th>
                                </tr>
                                <tr v-if="property.Bath_tot">
                                    <th class="p-2">Washrooms</th>
                                    <td class="p-2">{{ property.Bath_tot }}</td>
                                </tr>
                                <tr v-if="property.Wcloset_p1">
                                    <th class="p-2">Washrooms Type 1 # Pcs</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_p1 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_p2">
                                    <th class="p-2">Washrooms Type 2 # Pcs</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_p2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_p3">
                                    <th class="p-2">Washrooms Type 3 # Pcs</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_p3 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_p4">
                                    <th class="p-2">Washrooms Type 4 # Pcs</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_p4 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_p5">
                                    <th class="p-2">Washrooms Type 5 # Pcs</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_p5 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_t1lvl">
                                    <th class="p-2">Washrooms Type 1 Level</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_t1lvl }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_t2">
                                    <th class="p-2">Washrooms Type 2</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_t2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_t2lvl">
                                    <th class="p-2">Washrooms Type 2 Level</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_t2lvl }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_t3">
                                    <th class="p-2">Washrooms Type 3</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_t3 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_t3lvl">
                                    <th class="p-2">Washrooms Type 3 Level</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_t3lvl }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_t4">
                                    <th class="p-2">Washrooms Type 4</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_t4 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_t4lvl">
                                    <th class="p-2">Washrooms Type 4 Level</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_t4lvl }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_t5">
                                    <th class="p-2">Washrooms Type 5</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_t5 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_t5lvl">
                                    <th class="p-2">Washrooms Type 5 Level</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_t5lvl }}
                                    </td>
                                </tr>
                                <tr v-if="property.Wcloset_t1">
                                    <th class="p-2">Washrooms Type 1</th>
                                    <td class="p-2">
                                        {{ property.Wcloset_t1 }}
                                    </td>
                                </tr>
                            </table>
                            <table
                                class="table table-bordered border"
                                v-if="property.Potl"
                            >
                                <tr>
                                    <th colspan="2" class="p-2 text-center">
                                        Land
                                    </th>
                                </tr>
                                <tr v-if="property.Potl">
                                    <th class="p-2">Parcel of Tied Land</th>
                                    <td class="p-2">{{ property.Potl }}</td>
                                </tr>
                            </table>

                            <table class="table table-bordered border">
                                <tr>
                                    <th colspan="2" class="p-2 text-center">
                                        Condo
                                    </th>
                                </tr>
                                <tr v-if="property.Cond_txinc">
                                    <th class="p-2">Condo Taxes Included</th>
                                    <td class="p-2">
                                        {{ property.Cond_txinc }}
                                    </td>
                                </tr>
                                <tr v-if="property.Condo_corp">
                                    <th class="p-2">Condo Registry Office</th>
                                    <td class="p-2">
                                        {{ property.Condo_corp }}
                                    </td>
                                </tr>
                                <tr v-if="property.Condo_exp">
                                    <th class="p-2">Exposure</th>
                                    <td class="p-2">
                                        {{ property.Condo_exp }}
                                    </td>
                                </tr>
                                <tr v-if="property.Corp_num">
                                    <th class="p-2">Condo Corp#</th>
                                    <td class="p-2">{{ property.Corp_num }}</td>
                                </tr>
                            </table>

                            <table class="table table-bordered border mt-4">
                                <tr>
                                    <th colspan="2" class="p-2 text-center">
                                        Inside
                                    </th>
                                </tr>
                                <tr v-if="property.Heating">
                                    <th class="p-2">Heat Type</th>
                                    <td class="p-2">{{ property.Heating }}</td>
                                </tr>
                                <tr v-if="property.Hydro_inc">
                                    <th class="p-2">Hydro Included</th>
                                    <td class="p-2">
                                        {{ property.Hydro_inc }}
                                    </td>
                                </tr>
                                <tr v-if="property.Irreg">
                                    <th class="p-2">Lot Irregularities</th>
                                    <td class="p-2">{{ property.Irreg }}</td>
                                </tr>
                                <tr v-if="property.Kit_plus">
                                    <th class="p-2">Kitchens Plus</th>
                                    <td class="p-2">{{ property.Kit_plus }}</td>
                                </tr>
                                <tr v-if="property.Laundry">
                                    <th class="p-2">Laundry Access</th>
                                    <td class="p-2">{{ property.Laundry }}</td>
                                </tr>
                                <tr v-if="property.Laundry_lev">
                                    <th class="p-2">Laundry Level</th>
                                    <td class="p-2">
                                        {{ property.Laundry_lev }}
                                    </td>
                                </tr>
                                <tr v-if="property.Fpl_num">
                                    <th class="p-2">Fireplace/Stove</th>
                                    <td class="p-2">{{ property.Fpl_num }}</td>
                                </tr>
                                <tr v-if="property.Front_ft">
                                    <th class="p-2">Lot Front</th>
                                    <td class="p-2">{{ property.Front_ft }}</td>
                                </tr>
                                <tr v-if="property.Fuel">
                                    <th class="p-2">Heat Source</th>
                                    <td class="p-2">{{ property.Fuel }}</td>
                                </tr>
                                <tr v-if="property.Furnished">
                                    <th class="p-2">Furnished</th>
                                    <td class="p-2">
                                        {{ property.Furnished }}
                                    </td>
                                </tr>
                                <tr v-if="property.Gar_spaces">
                                    <th class="p-2">Garage Spaces</th>
                                    <td class="p-2">
                                        {{ property.Gar_spaces }}
                                    </td>
                                </tr>
                                <tr v-if="property.Gar_type">
                                    <th class="p-2">Garage Type</th>
                                    <td class="p-2">{{ property.Gar_type }}</td>
                                </tr>
                                <tr v-if="property.Gas">
                                    <th class="p-2">Utilities-Gas</th>
                                    <td class="p-2">{{ property.Gas }}</td>
                                </tr>
                                <tr v-if="property.Num_kit">
                                    <th class="p-2">Kitchens</th>
                                    <td class="p-2">{{ property.Num_kit }}</td>
                                </tr>
                            </table>

                            <table class="table table-bordered border">
                                <tr>
                                    <th colspan="2" class="p-2 text-center">
                                        Parking
                                    </th>
                                </tr>
                                <tr v-if="property.Park_chgs">
                                    <th class="p-2">Park Cost/Mo</th>
                                    <td class="p-2">
                                        {{ property.Park_chgs }}
                                    </td>
                                </tr>
                                <tr v-if="property.Park_spcs">
                                    <th class="p-2">Parking Spaces</th>
                                    <td class="p-2">
                                        {{ property.Park_spcs }}
                                    </td>
                                </tr>
                                <tr v-if="property.Tot_park_spcs">
                                    <th class="p-2">Total Parking Spaces</th>
                                    <td class="p-2">
                                        {{ property.Tot_park_spcs }}
                                    </td>
                                </tr>
                                <tr v-if="property.Park_desig">
                                    <th class="p-2">Parking Type</th>
                                    <td class="p-2">
                                        {{ property.Park_desig }}
                                    </td>
                                </tr>
                                <tr v-if="property.Park_desig_2">
                                    <th class="p-2">Parking Type2</th>
                                    <td class="p-2">
                                        {{ property.Park_desig_2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Park_fac">
                                    <th class="p-2">Parking/Drive</th>
                                    <td class="p-2">{{ property.Park_fac }}</td>
                                </tr>
                                <tr v-if="property.Park_lgl_desc1">
                                    <th class="p-2">
                                        Parking Legal Description
                                    </th>
                                    <td class="p-2">
                                        {{ property.Park_lgl_desc1 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Park_lgl_desc2">
                                    <th class="p-2">
                                        Parking Legal Description2
                                    </th>
                                    <td class="p-2">
                                        {{ property.Park_lgl_desc2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Park_spc1">
                                    <th class="p-2">Parking Spot #1</th>
                                    <td class="p-2">
                                        {{ property.Park_spc1 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Park_spc2">
                                    <th class="p-2">Parking Spot #2</th>
                                    <td class="p-2">
                                        {{ property.Park_spc2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Prkg_inc">
                                    <th class="p-2">Parking Included</th>
                                    <td class="p-2">{{ property.Prkg_inc }}</td>
                                </tr>
                                <tr v-if="property.Trlr_pk_spt">
                                    <th class="p-2"># Trailer Parking Spots</th>
                                    <td class="p-2">
                                        {{ property.Trlr_pk_spt }}
                                    </td>
                                </tr>
                            </table>

                            <table class="table table-bordered border">
                                <tr>
                                    <th colspan="2" class="p-2 text-center">
                                        Highlights
                                    </th>
                                </tr>
                                <tr v-if="property.Area">
                                    <th class="p-2">Area</th>
                                    <td class="p-2">{{ property.Area }}</td>
                                </tr>
                                <tr v-if="property.Community">
                                    <th class="p-2">Community</th>
                                    <td class="p-2">
                                        {{ property.Community }}
                                    </td>
                                </tr>
                                <tr v-if="property.Idx_dt">
                                    <th class="p-2">IDX updated date</th>
                                    <td class="p-2">{{ property.Idx_dt }}</td>
                                </tr>
                                <tr v-if="property.Exp_actest">
                                    <th class="p-2">
                                        Expenses Actual/Estimated
                                    </th>
                                    <td class="p-2">
                                        {{ property.Exp_actest }}
                                    </td>
                                </tr>
                                <tr v-if="property.Fin_stmnt">
                                    <th class="p-2">Financial Statement</th>
                                    <td class="p-2">
                                        {{ property.Fin_stmnt }}
                                    </td>
                                </tr>
                                <tr v-if="property.Franchise">
                                    <th class="p-2">Franchise</th>
                                    <td class="p-2">
                                        {{ property.Franchise }}
                                    </td>
                                </tr>
                                <tr v-if="property.Freestandg">
                                    <th class="p-2">Freestandg</th>
                                    <td class="p-2">
                                        {{ property.Freestandg }}
                                    </td>
                                </tr>
                                <tr v-if="property.Gross_inc">
                                    <th class="p-2">Gross_inc</th>
                                    <td class="p-2">
                                        {{ property.Gross_inc }}
                                    </td>
                                </tr>
                                <tr v-if="property.Heat_exp">
                                    <th class="p-2">Heat_exp</th>
                                    <td class="p-2">{{ property.Heat_exp }}</td>
                                </tr>
                                <tr v-if="property.Hours_open">
                                    <th class="p-2">Hours_open</th>
                                    <td class="p-2">
                                        {{ property.Hours_open }}
                                    </td>
                                </tr>
                                <tr v-if="property.Hydro_exp">
                                    <th class="p-2">Hydro_exp</th>
                                    <td class="p-2">
                                        {{ property.Hydro_exp }}
                                    </td>
                                </tr>
                                <tr v-if="property.Ind_area">
                                    <th class="p-2">Ind_area</th>
                                    <td class="p-2">{{ property.Ind_area }}</td>
                                </tr>
                                <tr v-if="property.Ind_areacd">
                                    <th class="p-2">Ind_areacd</th>
                                    <td class="p-2">
                                        {{ property.Ind_areacd }}
                                    </td>
                                </tr>
                                <tr v-if="property.Insur">
                                    <th class="p-2">Insur</th>
                                    <td class="p-2">{{ property.Insur }}</td>
                                </tr>
                                <tr v-if="property.Inventory">
                                    <th class="p-2">Inventory</th>
                                    <td class="p-2">
                                        {{ property.Inventory }}
                                    </td>
                                </tr>
                                <tr v-if="property.Llbo">
                                    <th class="p-2">Llbo</th>
                                    <td class="p-2">{{ property.Llbo }}</td>
                                </tr>
                                <tr v-if="property.Lot_code">
                                    <th class="p-2">Lot_code</th>
                                    <td class="p-2">{{ property.Lot_code }}</td>
                                </tr>
                                <tr v-if="property.Lp_code">
                                    <th class="p-2">Lp_code</th>
                                    <td class="p-2">{{ property.Lp_code }}</td>
                                </tr>
                                <tr v-if="property.Maint">
                                    <th class="p-2">Maint</th>
                                    <td class="p-2">{{ property.Maint }}</td>
                                </tr>
                                <tr v-if="property.Mgmt">
                                    <th class="p-2">Mgmt</th>
                                    <td class="p-2">{{ property.Mgmt }}</td>
                                </tr>
                                <tr v-if="property.Minrenttrm">
                                    <th class="p-2">Minrenttrm</th>
                                    <td class="p-2">
                                        {{ property.Minrenttrm }}
                                    </td>
                                </tr>
                                <tr v-if="property.Net_inc">
                                    <th class="p-2">Net_inc</th>
                                    <td class="p-2">{{ property.Net_inc }}</td>
                                </tr>
                                <tr v-if="property.Oa_area">
                                    <th class="p-2">Oa_area</th>
                                    <td class="p-2">{{ property.Oa_area }}</td>
                                </tr>
                                <tr v-if="property.Occupancy">
                                    <th class="p-2">Occupancy</th>
                                    <td class="p-2">
                                        {{ property.Occupancy }}
                                    </td>
                                </tr>
                                <tr v-if="property.Off_areacd">
                                    <th class="p-2">Off_areacd</th>
                                    <td class="p-2">
                                        {{ property.Off_areacd }}
                                    </td>
                                </tr>
                                <tr v-if="property.Oper_exp">
                                    <th class="p-2">Oper_exp</th>
                                    <td class="p-2">{{ property.Oper_exp }}</td>
                                </tr>
                                <tr v-if="property.Other">
                                    <th class="p-2">Other</th>
                                    <td class="p-2">{{ property.Other }}</td>
                                </tr>
                                <tr v-if="property.Out_storg">
                                    <th class="p-2">Out_storg</th>
                                    <td class="p-2">
                                        {{ property.Out_storg }}
                                    </td>
                                </tr>
                                <tr v-if="property.Perc_bldg">
                                    <th class="p-2">Perc_bldg</th>
                                    <td class="p-2">
                                        {{ property.Perc_bldg }}
                                    </td>
                                </tr>
                                <tr v-if="property.Amps">
                                    <th class="p-2">Amps</th>
                                    <td class="p-2">{{ property.Amps }}</td>
                                </tr>
                                <tr v-if="property.Area_infl1_out">
                                    <th class="p-2">Area_infl1_out</th>
                                    <td class="p-2">
                                        {{ property.Area_infl1_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Area_infl2_out">
                                    <th class="p-2">Area_infl2_out</th>
                                    <td class="p-2">
                                        {{ property.Area_infl2_out }}
                                    </td>
                                </tr>
                                <tr v-if="property.Bay_size1">
                                    <th class="p-2">Bay_size1</th>
                                    <td class="p-2">
                                        {{ property.Bay_size1 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Bay_size1_in">
                                    <th class="p-2">Bay_size1_in</th>
                                    <td class="p-2">
                                        {{ property.Bay_size1_in }}
                                    </td>
                                </tr>
                                <tr v-if="property.Bay_size2">
                                    <th class="p-2">Bay_size2</th>
                                    <td class="p-2">
                                        {{ property.Bay_size2 }}
                                    </td>
                                </tr>
                                <tr v-if="property.Bay_size2_in">
                                    <th class="p-2">Bay_size2_in</th>
                                    <td class="p-2">
                                        {{ property.Bay_size2_in }}
                                    </td>
                                </tr>
                                <tr v-if="property.Bus_type">
                                    <th class="p-2">Bus_type</th>
                                    <td class="p-2">{{ property.Bus_type }}</td>
                                </tr>
                                <tr v-if="property.Ceil_ht">
                                    <th class="p-2">Ceil_ht</th>
                                    <td class="p-2">{{ property.Ceil_ht }}</td>
                                </tr>
                                <tr v-if="property.Ceil_ht_in">
                                    <th class="p-2">Ceil_ht_in</th>
                                    <td class="p-2">
                                        {{ property.Ceil_ht_in }}
                                    </td>
                                </tr>
                                <tr v-if="property.Chattels">
                                    <th class="p-2">Chattels</th>
                                    <td class="p-2">{{ property.Chattels }}</td>
                                </tr>
                                <tr v-if="property.Com_chgs">
                                    <th class="p-2">Com_chgs</th>
                                    <td class="p-2">{{ property.Com_chgs }}</td>
                                </tr>
                                <tr v-if="property.Com_cn_fee">
                                    <th class="p-2">Com_cn_fee</th>
                                    <td class="p-2">
                                        {{ property.Com_cn_fee }}
                                    </td>
                                </tr>
                                <tr v-if="property.Crane">
                                    <th class="p-2">Crane</th>
                                    <td class="p-2">{{ property.Crane }}</td>
                                </tr>
                                <tr v-if="property.Days_open">
                                    <th class="p-2">Days_open</th>
                                    <td class="p-2">
                                        {{ property.Days_open }}
                                    </td>
                                </tr>
                                <tr v-if="property.Dba">
                                    <th class="p-2">Dba</th>
                                    <td class="p-2">{{ property.Dba }}</td>
                                </tr>
                                <tr v-if="property.Employees">
                                    <th class="p-2">Employees</th>
                                    <td class="p-2">
                                        {{ property.Employees }}
                                    </td>
                                </tr>
                                <tr v-if="property.Seats">
                                    <th class="p-2">Seats</th>
                                    <td class="p-2">{{ property.Seats }}</td>
                                </tr>
                                <tr v-if="property.Shpdrsdlhtft">
                                    <th class="p-2">
                                        Drive-In Level Shipping Doors Height
                                        Feet
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsdlhtft }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsdlhtin">
                                    <th class="p-2">
                                        Drive-In Level Shipping Doors Height
                                        Inches
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsdlhtin }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsdlnu">
                                    <th class="p-2">
                                        Drive-In Level Shipping Doors
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsdlnu }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsdlwdft">
                                    <th class="p-2">
                                        Drive-In Level Shipping Doors Width Feet
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsdlwdft }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsdlwdin">
                                    <th class="p-2">
                                        Drive-In Level Shipping Doors Width
                                        Inches
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsdlwdin }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsdmhtft">
                                    <th class="p-2">
                                        Double Man Shipping Doors Height Feet
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsdmhtft }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsdmhtin">
                                    <th class="p-2">
                                        Double Man Shipping Doors Height Inches
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsdmhtin }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsdmnu">
                                    <th class="p-2">
                                        Double Man Shipping Doors #
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsdmnu }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsdmwdft">
                                    <th class="p-2">
                                        Double Man Shipping Doors Width Feet
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsdmwdft }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsdmwdin">
                                    <th class="p-2">
                                        Double Man Shipping Doors Width Inches
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsdmwdin }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsglhtft">
                                    <th class="p-2">
                                        Grade Level Shipping Doors Height Feet
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsglhtft }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsglhtin">
                                    <th class="p-2">
                                        Grade Level Shipping Doors Height Inches
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsglhtin }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsglnu">
                                    <th class="p-2">
                                        Grade Level Shipping Doors #
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsglnu }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsglwdft">
                                    <th class="p-2">
                                        Grade Level Shipping Doors Width Feet
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsglwdft }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrsglwdin">
                                    <th class="p-2">
                                        Grade Level Shipping Doors Width Inches
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrsglwdin }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrstlhtft">
                                    <th class="p-2">
                                        Truck Level Shipping Doors Height Feet
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrstlhtft }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrstlhtin">
                                    <th class="p-2">
                                        Truck Level Shipping Doors Height Inches
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrstlhtin }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrstlnu">
                                    <th class="p-2">
                                        Truck Level Shipping Doors #
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrstlnu }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrstlwdft">
                                    <th class="p-2">
                                        Truck Level Shipping Doors Width Feet
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrstlwdft }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shpdrstlwdin">
                                    <th class="p-2">
                                        Truck Level Shipping Doors Width Inches
                                    </th>
                                    <td class="p-2">
                                        {{ property.Shpdrstlwdin }}
                                    </td>
                                </tr>
                                <tr v-if="property.Soil_test">
                                    <th class="p-2">Soil_test</th>
                                    <td class="p-2">
                                        {{ property.Soil_test }}
                                    </td>
                                </tr>
                                <tr v-if="property.Sprinklers">
                                    <th class="p-2">Sprinklers</th>
                                    <td class="p-2">
                                        {{ property.Sprinklers }}
                                    </td>
                                </tr>
                                <tr v-if="property.Survey">
                                    <th class="p-2">Survey</th>
                                    <td class="p-2">{{ property.Survey }}</td>
                                </tr>
                                <tr v-if="property.Taxes_exp">
                                    <th class="p-2">Maximum Rental Term</th>
                                    <td class="p-2">
                                        {{ property.Taxes_exp }}
                                    </td>
                                </tr>
                                <tr v-if="property.Terms">
                                    <th class="p-2">Terms</th>
                                    <td class="p-2">{{ property.Terms }}</td>
                                </tr>
                                <tr v-if="property.Tot_area">
                                    <th class="p-2">Total Area</th>
                                    <td class="p-2">{{ property.Tot_area }}</td>
                                </tr>
                                <tr v-if="property.Tot_areacd">
                                    <th class="p-2">Tot_areacd</th>
                                    <td class="p-2">
                                        {{ property.Tot_areacd }}
                                    </td>
                                </tr>
                                <tr v-if="property.Type_taxes">
                                    <th class="p-2">Type Taxes</th>
                                    <td class="p-2">
                                        {{ property.Type_taxes }}
                                    </td>
                                </tr>
                                <tr v-if="property.Utilities">
                                    <th class="p-2">Utilities</th>
                                    <td class="p-2">
                                        {{ property.Utilities }}
                                    </td>
                                </tr>
                                <tr v-if="property.Vac_perc">
                                    <th class="p-2">Vacancy Allowance</th>
                                    <td class="p-2">{{ property.Vac_perc }}</td>
                                </tr>
                                <tr v-if="property.Volts">
                                    <th class="p-2">Volts</th>
                                    <td class="p-2">{{ property.Volts }}</td>
                                </tr>
                                <tr v-if="property.Water_exp">
                                    <th class="p-2">Water Expense</th>
                                    <td class="p-2">
                                        {{ property.Water_exp }}
                                    </td>
                                </tr>
                                <tr v-if="property.Yr_exp">
                                    <th class="p-2">Year Expenses</th>
                                    <td class="p-2">{{ property.Yr_exp }}</td>
                                </tr>
                                <tr v-if="property.Perc_rent">
                                    <th class="p-2">Percentage Rent</th>
                                    <td class="p-2">
                                        {{ property.Perc_rent }}
                                    </td>
                                </tr>
                                <tr v-if="property.Prop_type">
                                    <th class="p-2">Category</th>
                                    <td class="p-2">
                                        {{ property.Prop_type }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rail">
                                    <th class="p-2">Rail</th>
                                    <td class="p-2">{{ property.Rail }}</td>
                                </tr>
                                <tr v-if="property.Retail_a">
                                    <th class="p-2">Retail Area</th>
                                    <td class="p-2">{{ property.Retail_a }}</td>
                                </tr>
                                <tr v-if="property.Retail_ac">
                                    <th class="p-2">Retail Area Code</th>
                                    <td class="p-2">
                                        {{ property.Retail_ac }}
                                    </td>
                                </tr>
                                <tr v-if="property.Ens_lndry">
                                    <th class="p-2">Ensuite Laundry</th>
                                    <td class="p-2">
                                        {{ property.Ens_lndry }}
                                    </td>
                                </tr>
                                <tr v-if="property.Gar">
                                    <th class="p-2">Garage/Park Spaces</th>
                                    <td class="p-2">{{ property.Gar }}</td>
                                </tr>
                                <tr v-if="property.Sewage_srch">
                                    <th class="p-2">Sewage Search</th>
                                    <td class="p-2">
                                        {{ property.Sewage_srch }}
                                    </td>
                                </tr>
                                <tr v-if="property.Locker_lev_unit">
                                    <th class="p-2">Locker Level</th>
                                    <td class="p-2">
                                        {{ property.Locker_lev_unit }}
                                    </td>
                                </tr>
                                <tr v-if="property.Locker_unit">
                                    <th class="p-2">Locker Unit</th>
                                    <td class="p-2">
                                        {{ property.Locker_unit }}
                                    </td>
                                </tr>
                                <tr v-if="property.Access_prop_srch">
                                    <th class="p-2">
                                        Access To Property Search
                                    </th>
                                    <td class="p-2">
                                        {{ property.Access_prop_srch }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_feat_srch">
                                    <th class="p-2">Water Features Search</th>
                                    <td class="p-2">
                                        {{ property.Water_feat_srch }}
                                    </td>
                                </tr>
                                <tr v-if="property.Shoreline_srch">
                                    <th class="p-2">Shoreline Search</th>
                                    <td class="p-2">
                                        {{ property.Shoreline_srch }}
                                    </td>
                                </tr>
                                <tr v-if="property.Pets">
                                    <th class="p-2">Pets Permitted</th>
                                    <td class="p-2">{{ property.Pets }}</td>
                                </tr>
                                <tr v-if="property.Patio_ter">
                                    <th class="p-2">Balcony</th>
                                    <td class="p-2">
                                        {{ property.Patio_ter }}
                                    </td>
                                </tr>
                                <tr v-if="property.Lease_term">
                                    <th class="p-2">Lease Term</th>
                                    <td class="p-2">
                                        {{ property.Lease_term }}
                                    </td>
                                </tr>
                                <tr v-if="property.Locker">
                                    <th class="p-2">Locker</th>
                                    <td class="p-2">{{ property.Locker }}</td>
                                </tr>
                                <tr v-if="property.Locker_num">
                                    <th class="p-2">Locker #</th>
                                    <td class="p-2">
                                        {{ property.Locker_num }}
                                    </td>
                                </tr>
                                <tr v-if="property.Alt_power_srch">
                                    <th class="p-2">
                                        Alternative Power Search
                                    </th>
                                    <td class="p-2">
                                        {{ property.Alt_power_srch }}
                                    </td>
                                </tr>
                                <tr v-if="property.Easement_rest_srch">
                                    <th class="p-2">
                                        Easements Restrictions Search
                                    </th>
                                    <td class="p-2">
                                        {{ property.Easement_rest_srch }}
                                    </td>
                                </tr>
                                <tr v-if="property.Rural_svc_srch">
                                    <th class="p-2">Rural Services Search</th>
                                    <td class="p-2">
                                        {{ property.Rural_svc_srch }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_acc_bldg_srch">
                                    <th class="p-2">
                                        Waterfront Accessory Bldgs Search
                                    </th>
                                    <td class="p-2">
                                        {{ property.Water_acc_bldg_srch }}
                                    </td>
                                </tr>
                                <tr v-if="property.Water_del_feat_srch">
                                    <th class="p-2">
                                        Water Delivery Features Search
                                    </th>
                                    <td class="p-2">
                                        {{ property.Water_del_feat_srch }}
                                    </td>
                                </tr>
                                <tr v-if="property.Stories">
                                    <th class="p-2">Level</th>
                                    <td class="p-2">{{ property.Stories }}</td>
                                </tr>
                                <tr v-if="property.Unit_num">
                                    <th class="p-2">Unit #</th>
                                    <td class="p-2">{{ property.Unit_num }}</td>
                                </tr>
                                <tr v-if="property.Share_perc">
                                    <th class="p-2"># Shares %</th>
                                    <td class="p-2">
                                        {{ property.Share_perc }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </section>

                <div class="container-fluid p-0 mb-0">
                    <div class="row m-0">
                        <div class="container mb-4">
                            <h4 class="text-color fw-bold">Neighbourhood</h4>
                            <span class="text-color"
                                >Schhol, amenities, travel times, and market
                                trends near 114 High Park Avenue</span
                            >
                        </div>
                    </div>
                    <iframe
                        :src="
                            'https://maps.google.com/maps?q=' +
                            property.Addr.replace(' ', '+') +
                            '&output=embed'
                        "
                        style="border: 0; width: 100%; height: 600px"
                        allowfullscreen=""
                        loading="lazy"
                    ></iframe>
                </div>

                <!-- Banner middle -->
                <div
                    v-if="property.images"
                    class="container-fluid pb-5 bg-theme"
                >
                    <div class="row">
                        <div
                            class="
                                col-md-6
                                mt-5
                                text-white
                                d-flex
                                justify-content-center
                                align-items-center
                            "
                        >
                            <div class="row">
                                <h4 class="text-white fw-bold">Book Showing</h4>
                                <div class="col-9">
                                    <form @submit.prevent="saveLaed">
                                        <fieldset class="my-3">
                                            <input
                                                v-model="lead.name"
                                                type="text"
                                                aria-label="Full name"
                                                placeholder="Full name"
                                                class="form-control"
                                            />
                                            <small
                                                v-if="leadError.name"
                                                class="text-danger"
                                            >
                                                {{
                                                    leadError.name.toString()
                                                }}</small
                                            >
                                        </fieldset>
                                        <fieldset class="my-3">
                                            <input
                                                v-model="lead.email"
                                                type="text"
                                                aria-label="Email"
                                                placeholder="Email"
                                                class="form-control"
                                            />
                                            <small
                                                v-if="leadError.email"
                                                class="text-danger"
                                                >{{
                                                    leadError.email.toString()
                                                }}</small
                                            >
                                        </fieldset>
                                        <fieldset class="my-3">
                                            <input
                                                v-model="lead.contact"
                                                type="text"
                                                aria-label="Phone Number"
                                                placeholder="Phone Number"
                                                class="form-control"
                                            />
                                            <small
                                                v-if="leadError.contact"
                                                class="text-danger"
                                                >{{
                                                    leadError.contact.toString()
                                                }}</small
                                            >
                                        </fieldset>
                                        <fieldset class="my-3">
                                            <textarea
                                                v-model="lead.remark"
                                                rows="3"
                                                col="3"
                                                type="text"
                                                aria-label="I would like more information abour the property"
                                                placeholder="I would like more information abour the property"
                                                class="form-control"
                                            ></textarea>
                                            <small
                                                v-if="leadError.remark"
                                                class="text-danger"
                                                >{{
                                                    leadError.remark.toString()
                                                }}</small
                                            >
                                        </fieldset>
                                        <fieldset class="my-3">
                                            <button
                                                :disabled="sLead"
                                                class="btn btn-light text-color"
                                                style="border-radius: 14px 14px"
                                            >
                                                <i
                                                    v-if="sLead"
                                                    class="
                                                        fa fa-spinner fa-spin
                                                        pl-2
                                                    "
                                                    aria-hidden="true"
                                                ></i>
                                                Submit
                                            </button>
                                        </fieldset>
                                        <small v-html="rLead"></small>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pe-0 mt-5 right-image">
                            <img
                                :src="property.images[0].image"
                                alt="Not Found"
                                class="middle-banner-image"
                            />
                        </div>
                    </div>
                </div>
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
        Slide,
    },
    data() {
        return {
            lead: {
                user_id: null,
                ml_num: null,
                name: "",
                email: "",
                contact: "",
                remark: "",
            },
            sLead: false,
            rLead: "",
            leadError: {},
            property: null,
            loadingProperty: true,
        };
    },
    mounted() {
        this.getAllData();
        this.updateIfLoggedIN();
    },
    methods: {
        async saveLaed() {
            let url = `/api/lead/new-guest`;
            // Check a user is logged in or not.
            if (this.$store.state.auth_user) {
                url = `/api/user/save-lead`;
                this.lead.user_id = this.$store.state.auth_user.id;
            }
            const self = this;

            self.sLead = true;
            self.rLead = "<span class='text-muted'>Sending...</span>";
            self.leadError = {};

            await axios
                .post(url, self.lead)
                .then((res) => {
                    self.lead = {};
                    self.sLead = false;
                    self.rLead =
                        "<span class='text-success'>" +
                        res.data.message +
                        "</span>";
                    self.leadError = {};
                })
                .catch((err) => {
                    console.log(err.response);
                    self.sLead = false;
                    self.rLead =
                        "<span class='text-danger'>" +
                        err.response.data.message +
                        "</span>";
                    self.leadError = err.response.data.error;
                });
        },

        updateIfLoggedIN() {
            this.lead.ml_num = this.$route.params.ml_num;
            if (this.$store.state.auth_user) {
                (this.lead.name = this.$store.state.auth_user.name),
                    (this.lead.email = this.$store.state.auth_user.email),
                    (this.lead.contact = this.$store.state.auth_user.contact);
            }
        },
        async getAllData() {
            const self = this;
            self.loadingProperty = true;
            await axios
                .get(
                    `/api/property/get-details?id=${self.$route.params.ml_num}`
                )
                .then((res) => {
                    self.property = res.data.data[0];

                    // Update remark field
                    self.lead.remark =
                        "I would like more information regarding." +
                        self.property.Addr +
                        " At " +
                        self.property.Rltr;
                    self.loadingProperty = false;
                })
                .catch((err) => {
                    self.loadingProperty = false;
                    console.log(err);
                });
        },
    },
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
.right-image img {
    width: 100%;
    max-height: 500px;
    border-radius: 212px 0px 0px 0px;
    -o-object-fit: cover;
    object-fit: cover;
}
.mid-content {
    max-width: 620px;
}
</style>
