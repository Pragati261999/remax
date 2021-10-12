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
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div
                            class="collapse navbar-collapse"
                            id="navbarSupportedContent"
                        >
                            <form class="d-flex me-auto search-bar">
                                <div class="input-group bg-white input-bar">
                                    <button class="btn bg-transparent p-0">
                                        <img
                                            src="assets/images/icons/search.png"
                                            alt=""
                                        />
                                    </button>
                                    <input
                                        type="text"
                                        class="form-control border-0 bg-transparent"
                                        aria-label="Search"
                                        aria-describedby="search-bar"
                                    />
                                </div>
                            </form>
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a
                                        class="nav-link active"
                                        aria-current="home"
                                        href="#"
                                        >Home</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        aria-current="properties"
                                        href="#"
                                        >Properties</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        aria-current="blog"
                                        href="#"
                                        >Blog</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div class="right-menu">
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item p-0">
                                    <a
                                        class="nav-link header-icons"
                                        aria-current="favourate"
                                        href="#"
                                        ><img
                                            src="assets/images/icons/bookmark.svg"
                                            alt=""
                                    /></a>
                                </li>
                                <li class="nav-item me-3">
                                    <a
                                        class="nav-link header-icons"
                                        aria-current="favourate"
                                        href="#"
                                        ><img
                                            src="assets/images/icons/alarm.svg"
                                            alt=""
                                    /></a>
                                </li>
                                <li class="nav-item">
                                    <button>
                                        <img
                                            src="assets/images/icons/refer.svg"
                                            alt=""
                                        /><a
                                            href="login.html"
                                            class="text-light"
                                            >Sign in</a
                                        >
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </div>
</template>
