
import { reactive } from "vue";
import axios from 'axios';

export const state = reactive({
    base_url: 'http://127.0.0.1:8000/',
    users: [],

    async fetchUsers() {
        try {
            const response = await axios.get(this.base_url + 'api/users');
            state.users = response.data.result;
        } catch (error) {
            console.error('Errore durante il recupero degli utenti:', error);
        }
    }
});