<script>
import { state } from '../state';

export default {
    name: 'AppHome',

    data() {
        return {
            state,
        }
    },
    mounted() {
        this.state.fetchUsers();
    },


}    
</script>
<template>
    <div class="container">

        <div v-if="this.state.users.length > 0">

            <h2 class="pt-3">Case Editrici:</h2>
            <div class="row py-3 row-cols-1 row-cols-md-3 ">


                <div v-for="user in state.users" :key="user.id" class="col p-2">
                    <router-link :to="{ name: 'singleUser', params: { slug: user.slug } }">
                        <div class="card">
                            <div class="card-header text-center bg-primary text-light ">
                                <div class="fs-3 fw-3">{{ user.name }}</div>
                            </div>

                            <div class="card-body text-center">
                                Scopri i libri!
                            </div>
                        </div>
                    </router-link>
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->

        </div>





        <div class="row" v-else>
            <div class="container py-5">
                <div class="py-5 text-center">
                    <p class="fs-1">
                        <i class="fa-solid fa-compact-disc fa-spin"></i>
                        <strong>
                            Caricamento...
                        </strong>
                    </p>
                </div>
            </div>
        </div>

    </div>
</template>


<style lang="scss" scoped></style>