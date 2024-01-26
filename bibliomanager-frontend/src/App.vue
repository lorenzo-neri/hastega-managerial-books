<script>
import { RouterView } from 'vue-router';
import ComponentNavbar from './components/ComponentNavbar.vue';

export default {
  name: 'App',
  components: {
    ComponentNavbar,
    RouterView,
  },
}
</script>


<template>
  <ComponentNavbar />

  <main>
    <div class="white_box min-vh-100 ">
      <router-view></router-view>
    </div>
  </main>
</template>

<style lang="scss" scoped>
main {
  background-image: url(./assets/img/pattern-books.jpeg);
  background-size: cover;
  background-repeat: no-repeat;
}

.white_box {
  background-color: rgba(255, 255, 255, 0.89);
  height: 100%;
}
</style>