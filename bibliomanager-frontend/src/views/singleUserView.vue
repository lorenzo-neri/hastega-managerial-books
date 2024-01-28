<script>
import { state } from '../state';
import axios from 'axios';

export default {
    name: 'singleUserView',

    data() {
        return {
            state,
            singleUser: [],
        }
    },
    methods: {
        /* async incrementReadCount(userId, bookId) {
            try {
                const response = await axios.post(`${this.state.base_url}api/user/${userId}/book/${bookId}/increment-read-count`);
                console.log('Contatore incrementato:', response.data.result);
            } catch (error) {
                console.error(error);
            }
        } */
    },
    mounted() {
        axios.get(this.state.base_url + `api/user/${this.$route.params.slug}`)
            .then(response => {
                console.log('topperia');

                this.singleUser = response.data.result;
                console.log(this.singleUser);

            }).catch(err => {
                console.error(err);
            })
    },


}    
</script>
<template>
    <div class="container">

        <div v-if="singleUser">

            <h2 class="pt-3">{{ singleUser.name }}</h2>
            <p>{{ singleUser.email }}</p>
            <div class="row py-3 row-cols-1 row-cols-md-3">
                <div v-for="book in singleUser.books" :key="book.id" class="col mb-4">
                    <router-link :to="{ name: 'singleBook', params: { slug: book.slug } }">
                        <div class="card">
                            <img :src="state.base_url + 'storage/' + book.image" class="card-img-top" alt="Book Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ book.title }}</h5>
                                <p class="card-text"><strong>Author:</strong> {{ book.author }}</p>
                                <p class="card-text"><strong>Codice ISBN:</strong> {{ book.isbn }}</p>
                                <!--  <p class="card-text"><strong>Plot:</strong> {{ book.plot }}</p> -->


                                <!-- BOTTONE -->
                                <!-- <div class="d-flex justify-content-center ">

                                    <a @click="incrementReadCount(singleUser.id, book.id)" :href="book.url"
                                        class="btn btn-primary">Leggi il libro!</a>
                                </div> -->
                            </div>
                        </div>
                    </router-link>
                </div>
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