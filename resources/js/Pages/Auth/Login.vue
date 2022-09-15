<script setup>
    import BreezeButton from '@/Components/Button.vue';
    import BreezeCheckbox from '@/Components/Checkbox.vue';
    import BreezeGuestLayout from '@/Layouts/Home.vue';
    import BreezeInput from '@/Components/Input.vue';
    import BreezeLabel from '@/Components/Label.vue';
    import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
    import {
        Head,
        Link,
        useForm
    } from '@inertiajs/inertia-vue3';

    defineProps({
        canResetPassword: Boolean,
        status: String,
    });

    const form = useForm({
        email: '',
        password: '',
        remember: false
    });

    const submit = () => {
        form.post(route('login'), {
            onFinish: () => form.reset('password'),
        });
    };

</script>

<template>

    <Head title="Log in" />
    <BreezeGuestLayout>
        <div class="col-md-5 mx-auto my-5">
            <div class="card card-body shadow">
                <h3>Hello !</h3>
                <p>Login to start voting </p>
                <form @submit.prevent="submit" class="mt-4">
                    <BreezeValidationErrors class="mb-4" />
                    <div class="form-group">
                        <label for="">Email</label>
                        <BreezeInput type="email" placeholder="Email" v-model="form.email" required autofocus
                            autocomplete="username" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <BreezeInput type="password" placeholder="Password" v-model="form.password" required autofocus
                            autocomplete="current-password" class="form-control" />
                    </div>

                    <button class="btn btn-submit form-control" type="submit"> Submit </button>
                </form>
                <p class="text-center mt-3">Don't have an account?
                    <Link :href="route('register')">Register</Link>
                </p>

                <p class="text-center mt-3">
                    <Link :href="route('password.request')">Forgot Password</Link>
                </p>
            </div>
        </div>
    </BreezeGuestLayout>



</template>
