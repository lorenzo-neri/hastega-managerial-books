
import { reactive } from "vue";
import axios from 'axios';

export const state = reactive({
    base_url: 'http://127.0.0.1:8000/',
    users: [],
    books: [],

    async fetchUsers() {
        try {
            const response = await axios.get(this.base_url + 'api/users');
            state.users = response.data.result;
        } catch (error) {
            console.error('Errore durante il recupero degli utenti:', error);
        }
    },

    async fetchBooks() {
        try {
            const response = await axios.get(this.base_url + 'api/books');
            state.books = response.data.result;
        } catch (error) {
            console.error('Errore durante il recupero dei libri', error);
        }
    }

});