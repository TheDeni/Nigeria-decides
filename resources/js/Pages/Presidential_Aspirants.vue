<script setup>
    import BreezeGuestLayout from '@/Layouts/Home.vue';
    import Aspirant from '@/components/Aspirant';

    import {
        Head,
        Link
    } from '@inertiajs/inertia-vue3';

    const props = defineProps({
        aspirants: '',
    });

</script>

<template>
    <BreezeGuestLayout>

        <div class="container my-4">

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card card-body shadow">
                        <h4 class="title">Presidential Candidates</h4>
                    </div>
                </div>

                <Aspirant :asp="asp" v-for="asp in aspirants" :key="asp.id"></Aspirant>
            </div>
        </div>
    </BreezeGuestLayout>
</template>
