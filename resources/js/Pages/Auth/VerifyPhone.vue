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
        otp: '',
    });

    const submit = () => {
        form.post(route('verify-phone'), {
            onFinish: () => form.reset('verify-phone'),
        });
    };

</script>

<template>

    <Head title="Log in" />
    <BreezeGuestLayout>
        <div class="col-md-6 card my-5">
            <h3>Hello !</h3>
            <h6>Verify Phone Number </h6>
            <form @submit.prevent="submit">
                <BreezeValidationErrors class="mb-4" />
                <BreezeInput type="number" placeholder="OTP" v-model="form.otp" required class="form-control" />

                <button class="btn btn-submit form-control" type="submit"> Submit </button>
            </form>
        </div>
    </BreezeGuestLayout>



</template>
