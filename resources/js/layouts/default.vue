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
    FooterApp,
  }
}
</script>
<style  scoped>
.m-height{
  min-height: 790px;
}
</style>
<style>
  @import url('https://fonts.googleapis.com/css?family=Kanit:400,700&display=swap&subset=thai');
  body{
    font-family: 'Kanit', sans-serif !important;
  }
  .bold{
  font-weight: 700;
  }
  .hr-yellow{
   border: 1px solid #FFB105;
  }
  .color-yellow{
    color: #FFB105;
  }
  .hr-orange{
   border: 1px solid #FE7250;
  }
  .color-orange{
   color: #FE7250;
  }
  .hr-blue{
   border: 1px solid #0A63B3;
  }
  .color-blue{
   color: #0A63B3;
  }
  .hr-dblue{
   border: 1px solid #133CBA ;
  }
  .color-dblue{
   color: #133CBA ;
  }
  .center{
    text-align: center;
    margin: 0 auto;
  }
</style>
