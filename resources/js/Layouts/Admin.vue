<script>
    import {
        Link
    } from '@inertiajs/inertia-vue3';


    export default {
        components: {
            Link
        },

        watch: {
            '$page.props.flash': function (data) {
                if (data.success) {
                    swal.fire('Yes!!', data.success, 'success')
                }

                if (data.error) {
                    swal.fire('Oops!!', data.error, 'error')
                }
            },
        },

        methods: {
            logout() {
                this.$inertia.post(route('logout'));
            }
        },
    };

</script>

<template>
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a :href="route('welcome')" class="d-flex align-items-center mt-2">
                            <img src="/assets/images/logo.jpeg" height="48" alt="">
                            <!-- <h5 class="ml-2">E-Voting</h5> -->
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                            </span>
                            <span class="logo-lg">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>


                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="search" class="icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Search Result">

                                        <button class="btn btn-primary" type="submit"><i
                                                class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-soft-light border-start border-end"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">

                            <!-- <img class="rounded-circle header-profile-user" :src="'/storage/profile/' +$page.props.auth.user.profile.profile_picture"
                                alt="Header Avatar"> -->
                            <span
                                class="d-none d-xl-inline-block ms-1 fw-medium">{{$page.props.auth.user.first_name}}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">

                            <a class="dropdown-item" href="#" @click.prevent="logout()"><i
                                    class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">

                        <li>
                            <a :href="route('admin.dashboard')">
                                <i class="fas fa-home "></i>
                                <span data-key="t-contesstants">Dashboard</span>
                            </a>
                        </li>

                         <li>
                            <a :href="route('admin.voters')">
                                <i class="fas fa-user-check"></i>
                                <span data-key="t-contesstants">Voters</span>
                            </a>
                        </li>

                        <li>
                            <a :href="route('admin.aspirants', 'all')">
                                <i class="fas fa-users"></i>
                                <span data-key="t-contesstants">All Aspirants</span>
                            </a>
                        </li>

                         <li>
                            <a :href="route('admin.aspirants', 'presidential')">
                                <i class="fas fa-users"></i>
                                <span data-key="t-contesstants">Presidential Aspirants</span>
                            </a>
                        </li>

                        <li>
                            <a :href="route('admin.aspirants', 'gubernitorial')">
                                <i class="fas fa-users"></i>
                                <span data-key="t-contesstants">Gubernitorial Aspirants</span>
                            </a>
                        </li>

                         <li>
                            <a :href="route('admin.aspirants', 'pending')">
                                <i class="fas fa-users-cog "></i>
                                <span data-key="t-contesstants">Pending Aspirants</span>
                            </a>
                        </li>

                         <li>
                            <a :href="route('admin.aspirants', 'approved')">
                                <i class="fas fa-users"></i>
                                <span data-key="t-contesstants">Approved Aspirants</span>
                            </a>
                        </li>

                        <li>
                            <a :href="route('admin.aspirants', 'declined')">
                                <i class="fas fa-times"></i>
                                <span data-key="t-contesstants">Declined Aspirants</span>
                            </a>
                        </li>

                         <li>
                            <a :href="route('admin.results', 0)">
                                <i class="fas fa-trophy"></i>
                                <span data-key="t-contesstants">Results</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <slot />
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

</template>
