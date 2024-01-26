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

        <div class="row py-2 ">
            <h1>Home</h1>

            <div v-if="this.state.users.length > 0">
                <h2>Lista Utenti:</h2>
                <ul>
                    <li v-for="user in state.users" :key="user.id">{{ user.name }}</li>
                </ul>
            </div>
            <div v-else>
                <p>Caricamento...</p>
            </div>
        </div>
        <!-- /.row -->

    </div>
</template>


<style lang="scss" scoped></style>