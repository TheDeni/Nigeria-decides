<template>
    <admin-layout>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <a href="#">
                                <h4 class="text-capitalize">Voters</h4>
                            </a>
                        </div>

                        <div class="col-12">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(user, index) in voters" :key="index">
                                        <td>VOT-000{{ user.id }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ user.phone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </admin-layout>
</template>

<script>
    import AdminLayout from '@/Layouts/Admin.vue';

    export default {
        components: {
            AdminLayout,
        },

        props: {
            voters: '',
        }
    }

</script>

<style lang="scss" scoped>

</style>
