<script setup>
    import BreezeGuestLayout from '@/Layouts/Guest.vue';
    import {
        Head,
        Link,
    } from '@inertiajs/inertia-vue3';

</script>

<template>

    <Head title="Success" />
    <BreezeGuestLayout>
        <div class="col-md-4 mx-auto mt-5">
            <div class="card card-body shadow text-center">
                <h3>Congratulations!!</h3>
                <p>Your aspirant request has been submitted successfully, you will be notified through the email
                    provided about further progress.</p>
                <a :href="route('welcome')" class="btn btn-success">Home</a>
            </div>
        </div>
    </BreezeGuestLayout>



</template>
