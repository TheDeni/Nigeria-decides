<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import {
        useForm,
        Link
    } from '@inertiajs/inertia-vue3'

    const props = defineProps({
        aspirant: '',
        position: '',
    });

    const form = useForm({
        password: '',
        position_id: props.position.id,
        aspirant_id: props.aspirant.id
    });
    const submit = () => {
        form.get(route('vote'));
    };

</script>

<template>
    <BreezeAuthenticatedLayout>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-12">
                            <a href="#">
                                <h4>Confirm Vote</h4>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="card card-body bg-white shadow py-5 text-center">
                                <img :src="'/storage/aspirant/'+aspirant.aspirant_image" class="mb-3 col-4 mx-auto">
                                <h2 class="text-success">{{ aspirant.name }}</h2>
                                <h4 class="text-success">{{ aspirant.party.name }}</h4>
                                <h4 v-if="aspirant.state_id != 0" class="text-success text-capitalize">
                                    {{ position.name }} ({{ aspirant.state.state }} State) </h4>
                                <h4 v-else class="text-success text-capitalize">{{ position.name }}</h4>

                                <div class="col-md-8 mx-auto mt-5">
                                    <form @submit.prevent="submit()">
                                        <div class="form-group">
                                            <label for="">Account Password</label>
                                            <input v-model="form.password" type="password" required class="form-control">
                                            <p class="text-primary" >Please note you can only vote once for a President and a state</p>
                                        </div>
                                        <button class="btn px-5 btn-success mt-2">Confirm</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>1
        </div>

    </BreezeAuthenticatedLayout>
</template>
