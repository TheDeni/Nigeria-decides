<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import {
        Head,
        Link
    } from '@inertiajs/inertia-vue3'

</script>

<template>
    <BreezeAuthenticatedLayout>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-12">
                            <a href="#">
                                <h4>Select Category</h4>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a :href="route('dashboard.contestants', 'Presidential')">
                                <div class="card card-body bg-success shadow py-5">
                                    <div class="d-flex justify-content-around">
                                        <h3 class="text-white">Presidential Candidates</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a :href="route('dashboard.contestants', 'Gubernitorial')">
                                <div class="card card-body bg-primary shadow py-5">
                                    <div class="d-flex justify-content-around">
                                        <h3 class="text-white">Gubernitorial Candidates</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>
