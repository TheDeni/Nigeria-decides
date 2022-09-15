<script setup>
    import BreezeGuestLayouts from '@/Layouts/Home.vue';
    import BreezeInput from '@/Components/Input.vue';
    import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
    import {
        Head,
        Link,
        useForm
    } from '@inertiajs/inertia-vue3';

    const form = useForm({
        name: '',
        email: '',
        position_id: '',
        aspirant_image: '',
        party_id: '',
        state_id: '',
        bio: '',
    });
    const props = defineProps({
        states: '',
        parties: '',
    });

    const submit = () => {
        form.post(route('aspirant'), {
            onSuccess: () => form.reset(),
        });
    };

</script>
<template>
    <BreezeGuestLayouts>
        <div class="row mt-5">
            <div class="col-md-5 mx-auto">
                <h4 class="text-center shadow card card-body">Aspirant Registration</h4>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-5 mx-auto">
                <div class="aspire">
                    <div class="card shadow">
                        <div class="card-body py-5">
                            <form @submit.prevent="submit">
                                <BreezeValidationErrors class="mb-4" />
                                <div class="form-group ">
                                    <BreezeInput type="text" v-model="form.name" required autocomplete="name"
                                        class="form-control" placeholder="Full Name" />
                                </div>
                                <div class="form-group ">
                                    <BreezeInput type="text" v-model="form.email" required class="form-control"
                                        placeholder="Email" />
                                </div>
                                <div class="form-group">
                                    <select v-model="form.position_id" required autocomplete="position_id"
                                        class="form-control">
                                        <option disabled selected value="">Select Positions </option>
                                        <option value="president">President</option>
                                        <option value="gubernitorial">Gubernitorial</option>
                                    </select>
                                </div>


                                <div class="form-group" v-if="form.position_id == 'gubernitorial'">
                                    <select v-model="form.state_id" required autocomplete="state_id"
                                        class="form-control" value="state">
                                        <option disabled selected value=""> Select Your State</option>
                                        <option v-for="s in states" :value="s.id" :key="s.id"> {{s.state}} </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <BreezeInput type="file" @input="form.aspirant_image=$event.target.files[0]"
                                        class="form-control" />
                                </div>
                                <div class="form-group ">
                                    <select v-model="form.party_id" required autocomplete="party_id"
                                        class="form-control" value="state">
                                        <option disabled selected value=""> Select your Party </option>
                                        <option v-for="pa in parties" :value="pa.id" :key="pa.id">
                                            {{pa.name + pa.image}}</option>
                                    </select>
                                </div>

                                <div class="form-group">
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
    </BreezeGuestLayouts>
</template>
