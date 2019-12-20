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
      title:'ทำงานออกแบบเว็บ Hospital Eye ',
      img:'https://i.imgur.com/CTA3XtA.jpg',
      description:'ทำงาน UX/UI ของโรงพยาบาลครั้งแรก รู้สึกเครียดๆ เพราะทางบริษัทคาดหวังกับผลงานชิ้นนี่้มากๆผมจะพยายามทำสุดความสามารถเลยครับ',
      date:'20 Oct 2019' ,
      name:'นายณัทกฤช จารุโยธิน' ,
      number:'13590264',
      time:'10:20',
    },
    {
      title:'เขียน code Website E-Sport ROV Thailand',
      img:'https://i.imgur.com/xNYcL05.jpg',
      description:'เขียน code หน้าเว็บไซต์ทั้งหน้าจำนวนทั้งหมด 5 หน้า ภายใน 1 อาทิตย์เท่านั้น รู้สึกท้าทายความสามารถตัวเองมากๆ แต่ก็รู้สึกว่าเราต้องทำให้ได้เท่านั้น สู้!',
      date:'25 Oct 2019' ,
      name:'นายณัฐพล ปัญญาดี' ,
      number:'13590260',
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