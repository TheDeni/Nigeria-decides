<script setup>
    import BreezeButton from '@/Components/Button.vue';
    import BreezeGuestLayout from '@/Layouts/Home.vue';
    import BreezeInput from '@/Components/Input.vue';
    import BreezeLabel from '@/Components/Label.vue';
    import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
    import {
        Head,
        useForm
    } from '@inertiajs/inertia-vue3';

    defineProps({
        status: String,
    });

    const form = useForm({
        email: '',
    });

    const submit = () => {
        form.post(route('password.email'));
    };

</script>

<template>
    <BreezeGuestLayout>

        <Head title="Forgot Password" />

        <div class="col-md-5 mx-auto my-5">
            <div class="card card-body">
                <div class="mb-4 text-sm text-gray-600">
                    Forgot your password? No problem. Just let us know your email address and we will email you a
                    password reset link that will allow you to choose a new one.
                </div>

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600 text-success">
                    {{ status }}
                </div>

                <BreezeValidationErrors class="mb-4" />

                <form @submit.prevent="submit">
                    <div>
                        <BreezeLabel for="email" value="Email" />
                        <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                            autofocus autocomplete="username" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <BreezeButton :class="{ 'opacity-25': form.processing } + ' btn btn-success'" :disabled="form.processing">
                            Email Password Reset Link
                        </BreezeButton>
                    </div>
                </form>
            </div>
        </div>
    </BreezeGuestLayout>
</template>
