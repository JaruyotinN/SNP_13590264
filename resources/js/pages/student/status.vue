<template>
  <div class="container" >
      <div class="col-md-12">
          <Statusheader />
          <!-- Status01 />
          <hr>
          <Status02 />
          <hr> 
          <div v-for="(body, index) in bodys" :key="index">
              <Status03 :body="body"/>
          </div> -->
          <hr>
          <Status04 />
          
      </div>

      <!-- <div v-if="type === 'A'">
        A
      </div>
      <div v-else-if="type === 'B'">
        B
      </div>
      <div v-else-if="type === 'C'">
        C
      </div>
      <div v-else>
        Not A/B/C
      </div> -->
  </div>
</template>

<script>
import Statusheader from '~/components/internstatus/Statusheader'
import Status01 from '~/components/internstatus/Status01'
import Status02 from '~/components/internstatus/Status02'
import Status03 from '~/components/internstatus/Status03'
import Status04 from '~/components/internstatus/Status04'

export default {
  middleware: 'auth',
data() {
  return {
    bodys:[
    {  
      name:'ณัทกฤช',
      surname:'จารุโยธิน',
      pnum:'09x-xxx-xxxx',
      university:'มหาวิทยาลัยศิลปากร',
      faculty:'เทคโนโลยีสารสนเทศและการสื่อสาร',
      major:'ออกแบบเว็บและสื่อโต้ตอบ',
      cname:'ไลค์ มี จำกัด',
      csubname:'Future Trends',
      cstaff:'นางสาวโลเร็ม อิปซัม',
      cstaffjob:'Graphic Desinger, illustrator , Motion Grapihc',
      caddress:'126/5 อาคาร ไทยศรี ชั้น2 ถนนกรุงธนบุรี แขวงบางลำภูล่าง เขตคลองสาน กรุงเทพมหานคร 10600',
      tname:'โลเร็ม',
      tsurname:'อิปซัม',
      tpnum:'09x-xxx-xxx',
    },
    ],
    }
},
  components:{
    Statusheader,
    Status01,
    Status02,
    Status03,
    Status04,
  }
}
</script>

<style>

</style>