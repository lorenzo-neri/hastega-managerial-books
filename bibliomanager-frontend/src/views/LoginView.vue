<script>
import { state } from '../state';

export default {
    name: 'LoginView',

    data() {
        return {
            state,
        }
    },
    mounted() {
    },
}    
</script>

<template>
    <div class="container py-3  ">





        <div class="row py-3 justify-content-center align-items-center ">
            <div class="col text-center p-5">
                <router-link to="/home" class="">
                    <div class="card">
                        <div class="card-header text-center">
                            <div class="fs-3 fw-3">Accedi come ospite</div>
                        </div>

                        <div class="card-body">
                            <img class="img-fluid" src="../assets/img/guest-icon.jpeg" alt="Accedi come guest!">
                        </div>
                    </div>
                </router-link>
            </div>
            <div class="col text-center p-5">
                <router-link to="/home" class="">
                    <div class="card">
                        <div class="card-header text-center">
                            <div class="fs-3 fw-3">Login</div>
                        </div>

                        <div class="card-body">
                            <img class="img-fluid" src="../assets/img/login-icon.jpeg" alt="Loggati!">
                        </div>
                    </div>
                </router-link>
            </div>
        </div>


        <!--### SOLO ED ESCLUSIVAMENTE PER TEST ###-->
        <div class="row py-3 justify-content-center align-items-center ">
            <div class="col text-center">
                <h3>
                    Utenti recenti:
                </h3>
                <div class="row py-2 ">
                    <div class="col">
                        <router-link to="/home" class="btn btn-secondary">Lorenzo</router-link>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col">
                        <router-link to="/home" class="btn btn-secondary">Doc Brown</router-link>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col">
                        <router-link to="/home" class="btn btn-secondary">Marty McFly</router-link>
                    </div>
                </div>
            </div>
        </div>
        <!--### SOLO ED ESCLUSIVAMENTE PER TEST ###-->

    </div>
</template>

<style lang="scss" scoped></style>