<script>
import { state } from '../state';
import axios from 'axios';

export default {
    name: 'singleBookView',

    data() {
        return {
            state,
            singleBook: null,
        }
    },
    methods: {
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
        axios.get(this.state.base_url + `api/books/${this.$route.params.slug}`)
            .then(response => {
                console.log(response.data.result);

                this.singleBook = response.data.result;
            }).catch(err => {
                console.error(err);
            })
    },
}    
</script>

<template>
    <div class="container">

        <div class="row pt-5" v-if="singleBook">
            <div class="col">

                <h2 class="pt-3">{{ singleBook.title }}</h2>
                <p><strong>Author:</strong> {{ singleBook.author }}</p>
                <p><strong>Codice ISBN:</strong> {{ singleBook.isbn }}</p>
                <p><strong>Trama:</strong> {{ singleBook.plot }}</p>
                <div class="d-flex justify-content-center pt-3">
                    <a @click="incrementReadCount(singleBook.user_id, singleBook.id)" :href="singleBook.url"
                        class="btn btn-primary">Leggi il
                        libro!</a>
                </div>
            </div>
            <div class="col">

                <img :src="state.base_url + 'storage/' + singleBook.image" class="img-fluid mb-3" alt="Book Image">
            </div>
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