<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
    import BreezeInput from '@/Components/Input.vue';
    import BreezeLabel from '@/Components/Label.vue';
    import BreezeTextarea from '@/Components/Input.vue';
    import {
        Head,
        Link,
        useForm
    } from '@inertiajs/inertia-vue3';

    const props = defineProps({
        user: '',
        profile: '',
        states: '',
    });

    const form = useForm({
        profile_picture: null,
        first_name: props.user.first_name,
        last_name: props.user.last_name,
        email: props.user.email,
        state: props.profile.state,
        dob: props.profile.dob,
        next_of_kin: props.profile.next_of_kin,
        address: props.profile.address,
        next_of_kin_address: props.profile.next_of_kin_address,
        terms: false,
    });
    const submit = () => {
        form.post(route('update_profile'), {
            // onSuccess: () => form.reset(),
        });
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
                                <h4>Update Profile</h4>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form @submit.prevent="submit">
                                <div class="card shadow card-body">
                                    <div class="row">
                                        <BreezeValidationErrors class="mb-4 card" />
                                        <div class="mb-3">
                                            <BreezeLabel for="profile-picture" value="Profile Picture" />
                                            <BreezeInput type="file"
                                                @input="form.profile_picture=$event.target.files[0]"
                                                class="form-control" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <BreezeLabel for="first-name" value="First Name" />
                                            <BreezeInput type="text" v-model="form.first_name" required
                                                class="form-control" readonly />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <BreezeLabel for="last-name" value="Last Name" />
                                            <BreezeInput type="text" v-model="form.last_name" required
                                                class="form-control" readonly />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <BreezeLabel for="e-mail" value="E-mail" />
                                            <BreezeInput type="email" v-model="form.email" required class="form-control"
                                                readonly />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <BreezeLabel for="last-name" value="Select State" />
                                            <select v-model="form.state" class="form-control" id="state">
                                                <option selected> {{ profile.state }} </option>
                                                <option v-for="state in states" :key="state.id" :value="state.state">{{ state.state }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <BreezeLabel for="last-name" value="Date of Birth" />
                                            <input type="date" v-model="form.dob" required class="form-control" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <BreezeLabel for="next-of-kin" value="Next of Kin" />
                                            <input type="text" v-model="form.next_of_kin" required
                                                class="form-control" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <BreezeLabel for="address" value="Your Address" />
                                            <textarea v-model="form.address" required id="" class="form-control"
                                                rows="3"></textarea>

                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <BreezeLabel for="next-of-kin-address" value="Next of Kin Address" />
                                            <textarea id="" v-model="form.next_of_kin_address" required
                                                class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>

</template>
