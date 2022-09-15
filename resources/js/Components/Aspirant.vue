<template>
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card shadow">
            <img :src="'/storage/aspirant/'+asp.aspirant_image" class="card-img-top" style="max-height:300px;">

            <div class="card-body ">
                <h5 v-if="asp.state_id != 0">{{asp.name}} ({{ asp.party.name }} {{ asp.state.state }})</h5>
                <!-- <h5 v-else>{{asp.name}} ({{ asp.party.name }})</h5> -->
                <p>{{asp.bio.substring(0, 100)}} ...</p>

                <div class="d-flex justify-content-between btn-group">
                    <Link  class="btn btn-outline-success" data-bs-toggle="modal" :data-bs-target="'#myModal'+asp.id" data-toggle="modal" :data-target="'#myModal'+asp.id"> Profile</Link>
                    <a :href="route('vote.confirm', [asp.name, asp.id])" class="btn btn-success"> Vote</a>
                </div>
            </div>
        </div>

        <div class="modal" :id="'myModal'+asp.id">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h4 v-if="asp.state_id != null" class="modal-title">{{ asp.name }} ({{ asp.party.name }} {{ asp.state.state }})</h4> -->
                         <!-- <h4 v-else class="modal-title">{{ asp.name }}</h4> -->
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" data-bs-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{ asp.bio }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            asp: '',
        }
    }

</script>

<style lang="scss" scoped>

</style>
