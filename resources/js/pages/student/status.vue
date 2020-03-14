<template>
  <div class="container">
      <div class="col-md-12" v-for="(user, index) in users" :key="index" :class="{ active: index == 0 }">
            <div class="mb-5">
        <h4 class="center bold mb-3">สถานะของการฝึกงาน</h4>
        <ul class="progressbar mt-3" v-if="user.student.intern_id == 1">
            <li class="active">ผลการตอบรับจากทางบริษัท</li>
            <li>ยืนยันจากสถานที่ฝึกงาน</li>
            <li>ตรวจสอบข้อมูลเพื่อยืนยัน</li>
            <li>รับเอกสารอนุเคราะห์ขอฝึกงาน</li>
        </ul>
         <ul class="progressbar mt-3" v-if="user.student.intern_id == 2">
            <li class="active">ผลการตอบรับจากทางบริษัท</li>
            <li class="active">ยืนยันจากสถานที่ฝึกงาน</li>
            <li>ตรวจสอบข้อมูลเพื่อยืนยัน</li>
            <li>รับเอกสารอนุเคราะห์ขอฝึกงาน</li>
        </ul>
        <ul class="progressbar mt-3" v-if="user.student.intern_id == 3">
            <li class="active">ผลการตอบรับจากทางบริษัท</li>
            <li class="active">ยืนยันจากสถานที่ฝึกงาน</li>
            <li class="active">ตรวจสอบข้อมูลเพื่อยืนยัน</li>
            <li>รับเอกสารอนุเคราะห์ขอฝึกงาน</li>
        </ul>
        <ul class="progressbar mt-3" v-if="user.student.intern_id == 4">
            <li class="active">ผลการตอบรับจากทางบริษัท</li>
            <li class="active">ยืนยันจากสถานที่ฝึกงาน</li>
            <li class="active">ตรวจสอบข้อมูลเพื่อยืนยัน</li>
            <li class="active">รับเอกสารอนุเคราะห์ขอฝึกงาน</li>
        </ul>
          </div>
          {{user.student.intern_id}}
          <hr>
      
          <Status01  v-if="user.student.intern_id == 1"/>
          <Status02 v-else-if="user.student.intern_id == 2" />
          <Status03 v-else-if="user.student.intern_id == 3" :body="body"/>
          <Status04 v-else-if="user.student.intern_id == 4"/>
          
      </div>

  </div>
</template>

<script>
import Status01 from '~/components/Internstatus/Status01'
import Status02 from '~/components/Internstatus/Status02'
import Status03 from '~/components/Internstatus/Status03'
import Status04 from '~/components/Internstatus/Status04'
import {mapActions, mapGetters} from 'vuex'

export default {
  middleware: 'auth',
data() {
  return {
    tab:1,
 body:
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

    }
},
  components:{
    Status01,
    Status02,
    Status03,
    Status04,
  },
  computed:{
    ...mapGetters({
      users:'profile/userinfos'
    })
  },
  methods: {
    ...mapActions({
      fetch:'profile/fetch'
    }),
    // setTab(tab) {
    //   this.tab = tab
    // },
    // checkActive(tab){
    //   return this.tab >= tab ? 'active' : ''
    // }
  },
  created(){
     this.fetch()
  }
}
</script>

<style>
.progressbar {
      counter-reset: step;
      height: 5rem;
  }
  .progressbar li {
      list-style-type: none;
      width: 25%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
  }
  .progressbar li:before {
      width: 50px;
      height: 50px;
      content: counter(step);
      counter-increment: step;
      line-height: 45px;
      border: 2px solid #7d7d7d;
      display: block;
      text-align: center;
      font-size: 1.5rem;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      background-color: white;
  }
  .progressbar li:after {
      width: 100%;
      height: 2px;
      content: '';
      position: absolute;
      margin: 10px auto 0px auto;
      background-color: #7d7d7d;
      top: 15px;
      left: -50%;
      z-index: -1;
  }
  .progressbar li:first-child:after {
      content: none;
  }
  .progressbar li.active {
     color: #0047BA;
  }
  .progressbar li.active:before {
      border-color: #0047BA;
  }
  .progressbar li.active + li:after {
      background-color: #0047BA;
  }
</style>
