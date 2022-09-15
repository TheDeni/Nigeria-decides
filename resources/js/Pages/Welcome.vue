<script setup>
    import {
        Head,
        Link
    } from '@inertiajs/inertia-vue3';
    import BreezeGuestLayouts from '@/Layouts/Home.vue';

    defineProps({
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    })

</script>

<template>
    <BreezeGuestLayouts>

        <Head title="Welcome" />

        <section class="count" style="">
            <div class="row">
                <div class="col-md-6">
                    <div class="count-text text-success">
                        <h1> It's time to make your vote count with full assurance.</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row align-items-center">
                <div class="col-lg-6 ">
                    <h2 class="text-success">How it works</h2>
                    <p>
                        This is a platform that allows users to register and vote for various govermental positions. It
                        also allows aspirants to register for the positions they have interest in.
                        <ul class="how-to">
                            <li>Create an account with your valid details which includes an email, NIN, and phone number
                            </li>
                            <li>Verify your account either by phone number or by the provided email address</li>
                            <li>Login to your dashboard and vote for your preferred candidates</li>
                        </ul>
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="/assets/images/vote_1.jpg" class="detail-img" style="max-height: 400px;" alt="">
                </div>
            </div>
        </section>
        <section class="benefits content">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 mb-5">
                    <img src="/assets/images/security.png" class="img-fluid detail-img" style="max-height: 400px;" alt="">
                </div>
                <div class="col-md-6 text">
                    <h2 class="text-success">Security</h2>
                    <p>All data stored on the platform are highly secured and safe. The voting process is being
                        authenticated using various hashing techniques and verifications to ascertain the authenticity
                        of the users voting </p>
                    <p class="mb-4">Some of the security measures include: </p>
                    <div class="row mt-3">
                        <div class="col-md-4 text-center">
                            <i class="fa fa-user-shield fa-2x mb-4 text-success"></i>
                            <h5 class="text-success">Real users</h5>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="fa fa-envelope-open fa-2x  mb-4 text-success"></i>
                            <h5 class="text-success">Email verification</h5>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="fa fa-phone-alt fa-2x  mb-4 text-success"></i>
                            <h5 class="text-success">Phone verification</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row align-items-center">
                <div class="col-lg-6 text">
                    <h2 class="text-success">Happier and Safer Elections</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto eveniet cum commodi,
                        voluptatibus dolor quo consequuntur magnam veniam placeat quia, id deserunt, repellat ex aliquid
                        et
                        velit! Dignissimos, officia quia.
                        Quam officia consequuntur fuga rerum accusamus quia dolor? Ipsa, tempore iure excepturi cum
                        nobis</p>
                </div>
                <div class="col-md-6">
                    <img src="/assets/images/happy.jpg"  class="img-fluid ml-auto detail-img" alt="">
                </div>
            </div>
        </section>
    </BreezeGuestLayouts>

</template>
