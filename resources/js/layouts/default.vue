<template>
  <div class="main-layout">
    <navbar />
    <div class="mt-4 m-height">
      <child />
    </div>
    <footer-app/>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'
import FooterApp from '~/components/Footer'

export default {
  name: 'MainLayout',

  components: {
    Navbar,
    FooterApp
  }
}
</script>
<style  scoped>
.m-height{
  min-height: 790px;
}
</style>
<style>
  @import url('https://fonts.googleapis.com/css?family=Kanit&display=swap');
  body{
    font-family: 'Kanit', sans-serif !important;
  }
</style>
