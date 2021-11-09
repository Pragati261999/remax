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
                            <li class="breadcrumb-item"><a href="#"><img src="assets/images/icons/Mask Group.svg" width="14" class="img-fluid align-middle pb-1" alt=""> Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="active">Log In</a></li>
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
                        <img src="assets/images/icons/login.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-6 px-5">
                        <form action="">
                            <input type="text" class="form-control mb-4" placeholder="Enter your email address*">
                            <input type="text" class="form-control mb-4" placeholder="Password*">
                            <button type="submit" class="btn btn-theme-color w-100 py-2">Log In</button>
                        </form>
                        <router-link to="#" class="text-dark fw-light my-2 text-center fp">Forget Password</router-link>
                        <h4 class="theme-title">DON'T HAVE AN ACCOUNT?</h4>
                        <p class="text-center">
                            Add items to your wishlistget personalised recommendations
                            check out more quickly track your orders register
                        </p>
                        <button type="submit" class="btn btn-theme-color w-100 py-2"><router-link to="/sign-up" class="text-light">Create Account</router-link></button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login -->
    </div>
</template>