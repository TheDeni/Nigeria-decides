<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import {
        Head,
        Link,
    } from '@inertiajs/inertia-vue3';
    defineProps({
        user: '',
        profile: '',
    });

</script>

<template>
    <BreezeAuthenticatedLayout>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-body">
                                <div class="mb-3">
                                    <img style="width:100px;height:100px"
                                        :src="'/storage/profile/' + profile.profile_picture" alt=""
                                        class="rounded-circle">
                                    <Link :href="route('edit_profile', profile)"><i class="fa fa-camera"
                                        aria-hidden="true">Add your
                                        Photo</i></Link>
                                </div>


                                <div class="profile row">
                                    <div class="col-md-4  ">
                                        <p>First Name</p>
                                        <h5>{{user.first_name}}</h5>
                                    </div>
                                    <div class="col-md-4 ">
                                        <p>Last Name</p>
                                        <h5>{{user.last_name}}</h5>
                                    </div>
                                    <div class="col-md-4 ">
                                        <p>Email</p>
                                        <h5>{{user.email}}</h5>
                                    </div>
                                    <div class="col-md-4 ">
                                        <p>State</p>
                                        <h5>{{profile.state}}</h5>
                                    </div>
                                    <div class="col-md-4 ">
                                        <p> Address</p>
                                        <h5>{{profile.address}}</h5>
                                    </div>
                                    <div class="col-md-4 ">
                                        <p>DOB</p>
                                        <h5>{{profile.dob}}</h5>
                                    </div>
                                    <div class="col-md-4 ">
                                        <p>Next of Kin</p>
                                        <h5>{{profile.next_of_kin}}</h5>
                                    </div>
                                    <div class="col-md-4 ">
                                        <p>Address of Next of Kin</p>
                                        <h5>{{profile.next_of_kin_address}}</h5>
                                    </div>


                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-3">
                                        <a class="btn btn-success" :href="route('edit_profile', profile)"> Edit
                                            Profile</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<style scoped>
    p {
        margin-bottom: 0px;

    }

    h5 {
        margin-bottom: 20px;
    }

</style>
