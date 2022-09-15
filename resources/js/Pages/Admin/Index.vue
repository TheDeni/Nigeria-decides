<template>
    <AdminLayout>
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
                            <div class="col-md-4">
                                <a :href="route('vote.categories')">
                                    <div class="card card-body bg-success shadow py-5">
                                        <div class="d-flex justify-content-around">
                                            <i class="fa fa-vote-yea fa-3x text-white"></i>
                                            <div class="text-center">
                                                <h3 class="text-white">Voters</h3>
                                                <h4 class="text-white">{{ voters.length }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a :href="route('admin.aspirants', 'approved')">
                                    <div class="card card-body bg-warning shadow py-5">
                                        <div class="d-flex justify-content-around">
                                            <i class="fa fa-user-alt fa-3x text-white"></i>
                                            <div class="text-center">
                                                <h3 class="text-white">Approved Aspirants</h3>
                                                <h4 class="text-white">{{ approved_aspirants.length }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a :href="route('admin.aspirants', 'pending')">
                                    <div class="card card-body bg-primary shadow py-5">
                                        <div class="d-flex justify-content-around">
                                            <i class="fa fa-trophy fa-3x text-white"></i>
                                            <div class="text-center">
                                                <h3 class="text-white">Pending Aspirants</h3>
                                                <h4 class="text-white">{{ pending_aspirants.length }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                             <div class="col-md-4">
                                <a :href="route('admin.aspirants', 'pending')">
                                    <div class="card card-body bg-info shadow py-5">
                                        <div class="d-flex justify-content-around">
                                            <i class="fa fa-trophy fa-3x text-white"></i>
                                            <div class="text-center">
                                                <h3 class="text-white">Presidential Aspirants</h3>
                                                <h4 class="text-white">{{ presidential.length }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                             <div class="col-md-4">
                                <a :href="route('admin.aspirants', 'pending')">
                                    <div class="card card-body bg-gradient bg-success shadow py-5">
                                        <div class="d-flex justify-content-around">
                                            <i class="fa fa-trophy fa-3x text-white"></i>
                                            <div class="text-center">
                                                <h3 class="text-white">Gubernitorial Aspirants</h3>
                                                <h4 class="text-white">{{ gubernitorial.length }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <Link :href="route('logout')" method="POST">
                                <div class="card card-body bg-danger shadow py-5">
                                    <div class="d-flex justify-content-around">
                                        <i class="fa fa-power-off fa-3x text-white"></i>
                                        <div class="text-center">
                                                <h3 class="text-white">Logout</h3>
                                                <h4 class="text-white">.</h4>
                                            </div>
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
    </AdminLayout>
</template>

<script>
    import AdminLayout from '@/Layouts/Admin.vue';
    import {
        Link
    } from '@inertiajs/inertia-vue3';


    export default {
        components: {
            AdminLayout,
            Link
        },

        props: {
            voters: '',
            pending_aspirants: '',
            approved_aspirants: '',
            presidential: '',
            gubernitorial: '',
        }
    };

</script>

<style lang="scss" scoped>

</style>
