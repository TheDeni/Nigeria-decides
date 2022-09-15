<script setup>
    import BreezeButton from '@/Components/Button.vue';
    import BreezeGuestLayout from '@/Layouts/Home.vue';
    import BreezeInput from '@/Components/Input.vue';
    import BreezeLabel from '@/Components/Label.vue';
    import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
    import {
        Head,
        Link,
        useForm
    } from '@inertiajs/inertia-vue3';

    const form = useForm({
        first_name: '',
        last_name: '',
        email: '',
        nin: '989387827',
        password: '',
        phone: '',
        state: '',
        dob: '',
        password_confirmation: '',
        terms: false,
    });

    defineProps({
        states: ''
    });

    const submit = () => {
        form.post(route('register'), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    };

</script>

<template>


    <Head title="Register" />
    <BreezeGuestLayout>
        <div class="col-md-5 mx-auto my-5">
            <div class="card card-body shadow">
                <h3>Hello !</h3>
                <h6 class="mb-5">Create an account to start voting </h6>
                <form @submit.prevent="submit">
                    <BreezeValidationErrors class="mb-4" />
                    <div class="form-group">
                        <label for="">First name</label>
                        <BreezeInput type="text" v-model="form.first_name" required placeholder="First Name" />
                    </div>
                    <div class="form-group">
                        <label for="">Last name</label>
                        <BreezeInput type="text" v-model="form.last_name" required placeholder="Last Name" />
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input class="form-control" type="text" v-model="form.phone" required placeholder="Phone" />
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <BreezeInput type="email" v-model="form.email" required placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <label for="">NIN</label>
                        <input type="number" class="form-control" v-model="form.nin" readonly  required placeholder="NIN" />
                    </div>
                     <div class="form-group">
                        <label for="">Date of Birth</label>
                        <BreezeInput type="date" v-model="form.dob" required placeholder="Date of birth" />
                    </div>
                     <div class="form-group">
                        <select v-model="form.state" class="form-control">
                            <option value="" disabled>Select State</option>
                            <option  v-for="state in states" :key="state.id" >{{ state.state }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <BreezeInput type="password" v-model="form.password" required placeholder="Password" />
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <BreezeInput type="password" v-model="form.password_confirmation" required
                            placeholder="Password" />
                    </div>

                    <button class="btn btn-success btn-block"> Submit </button>
                </form>
                <p class="text-center mt-3">Already have an account?
                    <Link :href="route('login')">Login</Link>
                </p>
            </div>
        </div>
    </BreezeGuestLayout>

</template>
