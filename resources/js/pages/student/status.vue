<template>
  <div class="container" >
      <div class="col-md-12">
            <div class="mb-5">
        <h4 class="center bold mb-3">สถานะของการฝึกงาน</h4>
        <ul class="progressbar mt-3">
            <li class="active">ผลการตอบรับจากทางบริษัท</li>
            <li :class="checkActive(2)">ยืนยันจากสถานที่ฝึกงาน</li>
            <li :class="checkActive(3)">ตรวจสอบข้อมูลเพื่อยืนยัน</li>
            <li :class="checkActive(4)">รับเอกสารอนุเคราะห์ขอฝึกงาน</li>
        </ul>
          </div>
          <hr>
          <Status01  v-if="tab == 1" @next="setTab"/>
          <Status02 v-if="tab == 2" @next="setTab"/>
          <Status03 v-if="tab == 3" @next="setTab" :body="body"/>
          <Status04  v-if="tab == 4"/>
          
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
import Statusheader from '~/components/Internstatus/Statusheader'
import Status01 from '~/components/Internstatus/Status01'
import Status02 from '~/components/Internstatus/Status02'
import Status03 from '~/components/Internstatus/Status03'
import Status04 from '~/components/Internstatus/Status04'

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
    Statusheader,
    Status01,
    Status02,
    Status03,
    Status04,
  },
  methods: {
    setTab(tab) {
      this.tab = tab
    },
    checkActive(tab){
      return this.tab >= tab ? 'active' : ''
    }
  },
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