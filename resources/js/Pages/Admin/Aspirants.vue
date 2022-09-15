<template>
    <admin-layout>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <a href="#">
                                <h4 class="text-capitalize">{{ status }} Aspirants</h4>
                            </a>
                        </div>

                        <div class="col-12">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Party</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(asp, index) in aspirants" :key="index">
                                        <td>ASP-000{{ asp.id }}</td>
                                        <td>{{ asp.name }}</td>
                                        <td>{{ asp.party.name }}</td>
                                        <td class="text-capitalize">{{ asp.position.name }}
                                                <span v-if="asp.position.state_id != 0">({{ asp.position.state.state }})</span>
                                        </td>
                                        <td class="text-capitalize">
                                            <span class="text-success" v-if="asp.status == 'approved'">
                                                {{ asp.status }}</span>
                                            <span class="text-primary" v-else-if="asp.status == 'pending'">
                                                {{ asp.status }}</span>
                                            <span class="text-danger" v-else-if="asp.status == 'declined'">
                                                {{ asp.status }}</span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button v-if="asp.status != 'approved'" @click="action(asp.id, 'approve')"
                                                    class="btn btn-success">Approve</button>

                                                <button v-if="asp.status != 'declined'" @click="action(asp.id, 'decline')" class="btn btn-danger">Decline</button>

                                                 <a :href="route('admin.aspirant.edit', asp)"
                                                    class="btn btn-primary">Edit</a>
                                            </div>
                                        </td>
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
            aspirants: '',
            status: '',
        },

        methods: {
            action(id, action) {
                Swal.fire({
                    title: 'Are you sure?',
                    // text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#2ab57d',
                    confirmButtonText: 'Yes, '+ action +' it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                       this.$inertia.put(route('admin.aspirant.action', {
                        'id' : id,
                        'action' : action
                       }));
                    }
                })
            }
        },
    }

</script>

<style lang="scss" scoped>

</style>
