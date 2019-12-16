<template>
   <div class="container" >
     <Dairyheader />
      <div class="row">
          <div class="col-md-12" v-for="(dairy, index) in dairys" :key="index">
          <Dairycard :dairy="dairy"/>
          </div>
      </div>
  </div>
</template>

<script>
import Dairyheader from '~/components/Dairyheader'
import Dairycard from '~/components/Dairycard'

export default {
  middleware: 'auth',
data() {
  return {
    dairys: [
    {
      img:'https://learnodo-newtonic.com/wp-content/uploads/2015/01/Girl-with-a-Pearl-Earring-1665-Johannes-Vermeer.jpg',
      description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas scelerisque lorem non tellus rhoncus, quis rhoncus ligula sagittis. Phasellus viverra lectus sed dui vehicula, a congue ipsum vestibulum. Phasellus ornare eleifend libero nec aliquam. Duis sit amet eros sodales, bibendum odio quis, semper odio. Vestibulum ante ipsum primis in faucibus',
      date:'20 Oct 2019' ,
      name:'นายณัทกฤช จารุโยธิน' ,
      number:'13590264',
      time:'10:20',
    },
    {
      img:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZgw7kYX_a6VzMCkp1Euyt6bypP8kb8nG9KJe_fK8bWauijcKo&s',
      description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas scelerisque lorem non tellus rhoncus, quis rhoncus ligula sagittis. Phasellus viverra lectus sed dui vehicula, a congue ipsum vestibulum. Phasellus ornare eleifend libero nec aliquam. Duis sit amet eros sodales, bibendum odio quis, semper odio. Vestibulum ante ipsum primis in faucibus',
      date:'25 Oct 2019' ,
      name:'นายโลเล็ม อิบซัม' ,
      number:'13590999',
      time:'20:18',
    },
    ]}
},
  components:{
    Dairyheader,
    Dairycard,
  }
}
</script>