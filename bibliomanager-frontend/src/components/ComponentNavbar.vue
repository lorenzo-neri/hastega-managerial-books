<script>
import { state } from '../state.js';

export default {
  name: 'ComponentNavbar',
  data() {
    return {
      state,
    }
  },
  methods: {
  }
}
</script>

<template>
  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
          <div style="width: 70px">
            <img class=" img-fluid " src="../assets/img/logo-bibliomanager.jpeg" alt="">
          </div>
          <strong>BiblioManager</strong>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <router-link class="nav-link active" to="/" aria-current="page">
                Home
              </router-link>
            </li>
          </ul>


          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a target="_blank" class="nav-link" href="http://127.0.0.1:8000/">Admin</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<style lang="scss" scoped></style>