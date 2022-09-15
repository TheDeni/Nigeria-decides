<script setup>
    import Admin from '@/Layouts/Admin.vue';
    import {
        Link,
        useForm,
    } from '@inertiajs/inertia-vue3'

    const props = defineProps({
        'category': '',
        'aspirants': '',
        'states' : '',
    });

    const form = useForm({
        state: '',
    });

</script>

<template>
    <Admin>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <h4>{{ category }} Results</h4>

                                <form  class="form-inline d-flex"
                                    v-if="type != 'Presidential'">
                                    <select v-model="form.state" class="form-control mr-3">
                                        <option value="">Select State</option>
                                        <option v-for="state in states" :key="state.id" :value="state.id">
                                            {{ state.state }}
                                        </option>
                                    </select>
                                    <a :href="route('admin.results', form.state)" class="ml-3 btn btn-outline-success">Filter</a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-body shadow py-5 ">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Party</th>
                                        <th>Votes</th>
                                    </thead>
                                    <tbody>
                                        <tr v-for="asp in aspirants" :key="asp.id">
                                            <td>
                                                <img :src="'/storage/aspirant/'+asp.aspirant_image" class="img-fluid"
                                                    style="width: 100px;">
                                            </td>
                                            <td>{{ asp.name }}</td>
                                            <td>{{ asp.party.name }}</td>
                                            <td>{{ asp.total_vote }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </Admin>
</template>
