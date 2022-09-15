<script setup>
    import {
        computed
    } from 'vue';
    import BreezeButton from '@/Components/Button.vue';
    import BreezeGuestLayout from '@/Layouts/Home.vue';
    import {
        Head,
        Link,
        useForm
    } from '@inertiajs/inertia-vue3';

    const props = defineProps({
        status: String,
    });

    const form = useForm();

    const submit = () => {
        form.post(route('verification.send'));
    };

    const verificationLinkSent = computed(() => props.status === 'verification-link-sent');

</script>

<template>
    <BreezeGuestLayout>

        <Head title="Email Verification" />

        <div class="col-md-6 p-5 mx-auto">
            <div class="card card-body">
                <div class="mb-4 text-sm text-gray-600">
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the
                link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </div>

            <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
                A new verification link has been sent to the email address you provided during registration.
            </div>

            <form @submit.prevent="submit">
                <div class="mt-4 flex items-center justify-between mb-2">
                    <button class="btn btn-success" :disabled="form.processing">
                        Resend Verification Email
                    </button>

                    <Link :href="route('send-otp')" class="btn btn-outline-success">Verify By Phone</Link>
                </div>
                <Link :href="route('logout')" method="post" as="button" class="btn btn-danger">Log Out</Link>
            </form>
            </div>
        </div>
    </BreezeGuestLayout>
</template>
