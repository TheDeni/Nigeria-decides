<script setup>
    import BreezeGuestLayout from '@/Layouts/Home.vue';
    import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
    import Aspirant from '@/components/Aspirant';
    import {
        Head,
        Link,
        useForm
    } from '@inertiajs/inertia-vue3';
    const props = defineProps({
        aspirants: '',
        states: '',
    });
    const form = useForm({
        state: '',
    });
    const submit = () => {
        form.get(route('aspirants.state'));
    };
</script>

<template>
    <BreezeGuestLayout>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card card-body shadow  ">
                        <div class="d-flex justify-content-between">
                            <h4 class="">Gubernetorial Candidates</h4>
                            <form @submit.prevent="submit()" class="form-inline">
                                <select v-model="form.state" class="form-control mr-3">
                                    <option value="">Select State</option>
                                    <option v-for="state in states" :key="state.id" :value="state.id">{{ state.state }}
                                    </option>
                                </select>
                                <button class="btn btn-outline-success">Filter</button>
                            </form>
                        </div>
                    </div>
                </div>
                <Aspirant :asp="asp" v-for="asp in aspirants" :key="asp.id"></Aspirant>
            </div>
        </div>
    </BreezeGuestLayout>
</template>
