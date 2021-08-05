<template>
  <div id="app">
    <Navbar></Navbar>

    <router-view/>

    <Footer></Footer>
  </div>
</template>

<script>
import Navbar from './layout/Navbar'

export default {
  components: {
    Navbar
  },
};
</script>

<style>
.center {
  text-align: center;
}
</style>