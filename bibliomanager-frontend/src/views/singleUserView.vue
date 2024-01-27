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
        getBookImageUrl(imagePath) {
            // Rimuovi la parte "images/" dal percorso dell'immagine
            return imagePath.replace('images/', '');
        },
        async incrementReadCount(userId, bookId) {
            try {
                const response = await axios.post(`${this.state.base_url}api/user/${userId}/book/${bookId}/increment-read-count`);
                console.log('Contatore incrementato:', response.data.result);
            } catch (error) {
                console.error(error);
            }
        }
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

        <div v-if="this.singleUser">

            <h2 class="pt-3">{{ singleUser.name }}</h2>
            <p>Email: {{ singleUser.email }}</p>
            <div class="row py-3 row-cols-1 row-cols-md-3">
                <div v-for="book in singleUser.books" :key="book.id" class="col mb-4">
                    <div class="card">
                        <img :src="state.base_url + 'storage/' + book.image" class="card-img-top" alt="Book Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ book.title }}</h5>
                            <p class="card-text"><strong>Author:</strong> {{ book.author }}</p>
                            <p class="card-text"><strong>Codice ISBN:</strong> {{ book.isbn }}</p>
                            <!--  <p class="card-text"><strong>Plot:</strong> {{ book.plot }}</p> -->
                            <div class="d-flex justify-content-center ">

                                <a @click="incrementReadCount(singleUser.id, book.id)" :href="book.url"
                                    class="btn btn-primary">Leggi il libro!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>

    </div>
</template>


<style lang="scss" scoped></style>