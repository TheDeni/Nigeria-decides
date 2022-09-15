<template>
    <admin-layout>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <a href="#">
                                <h4 class="text-capitalize">{{ aspirant.name }}</h4>
                            </a>
                        </div>

                        <div class="col-8 mx-auto">
                        <img :src="'/storage/aspirant/'+aspirant.aspirant_image" class="img-fluid col-md-4">
                            <div class="card card-body">
                                <form @submit.prevent="submit">
                                    <BreezeValidationErrors class="mb-4" />
                                    <div class="form-group mb-3 ">
                                        <label for="">Name</label>
                                        <input type="text" v-model="form.name" required
                                            class="form-control" placeholder="Full Name" />
                                    </div>
                                    <div class="form-group mb-3 ">
                                        <label for="">Email</label>
                                        <input type="text" v-model="form.email" required class="form-control"
                                            placeholder="Email" />
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Image</label>
                                        <input type="file" @input="form.aspirant_image=$event.target.files[0]"
                                            class="form-control" />
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">About</label>
                                        <textarea type="text" v-model="form.bio" required autocomplete="bio"
                                            class="form-control" placeholder="Bio"></textarea>
                                    </div>

                                    <button class="btn btn-success">Submit</button>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </admin-layout>
</template>

<script setup>
    import AdminLayout from '@/Layouts/Admin.vue';
    import {
        useForm
    } from '@inertiajs/inertia-vue3';

    const props = defineProps({
        states: '',
        aspirant: '',
    });

    const form = useForm({
        name: props.aspirant.name,
        email: props.aspirant.email,
        aspirant_image: '',
        bio: props.aspirant.bio,
    })

     const submit = () => {
        form.post(route('admin.aspirant.update', props.aspirant ));
    };

</script>

<style lang="scss" scoped>

</style>
