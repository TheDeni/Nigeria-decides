<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import {
        Head,
        useForm,
        Link
    } from '@inertiajs/inertia-vue3'
    import Aspirant from '@/components/Aspirant';

    const props = defineProps({
        states: '',
        aspirants: '',
        type: ''
    });

    const form = useForm({
        state: '',
    });
    const submit = () => {
        form.get(route('dashboard.contestants.state'));
    };

</script>

<template>
    <BreezeAuthenticatedLayout>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <h4>{{ type }} Aspirants</h4>
                                <form @submit.prevent="submit()" class="form-inline d-flex"
                                    v-if="type != 'Presidential'">
                                    <select v-model="form.state" class="form-control mr-3">
                                        <option value="">Select State</option>
                                        <option v-for="state in states" :key="state.id" :value="state.id">
                                            {{ state.state }}
                                        </option>
                                    </select>
                                    <button class="ml-3 btn btn-outline-success">Filter</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <Aspirant :asp="asp" v-for="asp in aspirants" :key="asp.id"></Aspirant>
                    </div>

                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>
