<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import {
        Head, Link
    } from '@inertiajs/inertia-vue3';

</script>

<template>

    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <a href="#">
                                <h4>Dashboard</h4>
                            </a>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <a :href="route('vote.categories')">
                                    <div class="card card-body bg-success shadow py-5">
                                        <div class="d-flex justify-content-around">
                                            <i class="fa fa-vote-yea fa-3x text-white"></i>
                                            <h3 class="text-white">Vote</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>

                             <div class="col-md-6">
                                <a :href="route('profile')">
                                    <div class="card card-body bg-warning shadow py-5">
                                        <div class="d-flex justify-content-around">
                                            <i class="fa fa-user-alt fa-3x text-white"></i>
                                            <h3 class="text-white">Profile</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                             <!-- <div class="col-md-6">
                                <a :href="route('results', 0)">
                                    <div class="card card-body bg-primary shadow py-5">
                                        <div class="d-flex justify-content-around">
                                            <i class="fa fa-trophy fa-3x text-white"></i>
                                            <h3 class="text-white">Results</h3>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                             <div class="col-md-6">
                                <Link :href="route('logout')" method="POST">
                                    <div class="card card-body bg-danger shadow py-5">
                                        <div class="d-flex justify-content-around">
                                            <i class="fa fa-power-off fa-3x text-white"></i>
                                            <h3 class="text-white">Logout</h3>
                                        </div>
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content -->



        </div>
    </BreezeAuthenticatedLayout>
</template>
