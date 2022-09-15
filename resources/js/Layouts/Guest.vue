<script>
    export default {
        watch: {
            '$page.props.flash': function (data) {
                if (data.success) {
                    swal.fire('Yes!!', data.success, 'success')
                }

                if (data.error) {
                    swal.fire('Oops!!', data.error, 'error')
                }
            },
        },
    };

</script>

<template>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>
    <section class="sign bg-light vh-100">
        <div class="row">
            <slot />
        </div>

    </section>



</template>
