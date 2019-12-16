<template>
  <div class="container" >
    <Profile />
    <!-- <card>
      login
    </card>
      <router-link :to="{name:'student'}">student</router-link> -->
            <!-- <router-link to="/student">student</router-link> -->
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3">
                <div class="card mt-4">
                <div class="c-header">
                  <h4 class="bold">ปฏิทินฝึกงาน</h4>
                </div>
                <div class="inactive" v-for="(info, index) in infos" :key="index" :class="{ active: index == 0 }">
                <calendar :info="info"/>
                </div>
                </div>
          </div>     
          <div class="col-md-9">
               <h4 class="bold mt-5">สถานที่ฝึกงานที่เหมาะกับคุณ</h4>
            <div class="row">
                <div class="col-md-4" v-for="(test, index) in tests" :key="index">
                <test-card :test="test"/>
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>


<script>
import TestCard from '~/components/TestCard'
import Profile from '~/components/Profile'
import Calendar from '~/components/Calendar'

export default {
  middleware: 'auth',
data() {
  return {
    tests: [
    {
      img:'https://picsum.photos/id/237/200/300',
      name:'บริษัท ไลค์ มี จำกัด',
      type:'Graphic Design' ,
      description:'Graphic Designer,illustrator,MoionGraphic',
      place:'บางบอน,กรุงเทพ',

    },
    {
      img:'https://picsum.photos/id/230/200/300',
      name:'บริษัท ไลค์ มี จำกัด',
      type:'Graphic Design' ,
      description:'Graphic Designer,illustrator,MoionGraphic',
      place:'บางบอน,กรุงเทพ',
    },
    {
      img:'https://picsum.photos/id/222/200/300',
      name:'บริษัท ไลค์ มี จำกัด',
      type:'Graphic Design' ,
      description:'Graphic Designer,illustrator,MoionGraphic',
      place:'บางบอน,กรุงเทพ',
    },
    {
      img:'https://picsum.photos/id/264/200/300',
      name:'บริษัท ไลค์ มี จำกัด',
      type:'Graphic Design' ,
      description:'Graphic Designer,illustrator,MoionGraphic',
      place:'บางบอน,กรุงเทพ',

    },
    {
      img:'https://picsum.photos/id/357/200/300',
      name:'บริษัท ไลค์ มี จำกัด',
      type:'Graphic Design' ,
      description:'Graphic Designer,illustrator,MoionGraphic',
      place:'บางบอน,กรุงเทพ',

    },
    {
      img:'https://picsum.photos/id/123/200/300',
      name:'บริษัท ไลค์ มี จำกัด',
      type:'Graphic Design' ,
      description:'Graphic Designer,illustrator,MoionGraphic',
      place:'บางบอน,กรุงเทพ',

    },
     
    ],
     infos: [
    {
      date: '1 ม.ค. - 6 พ.ค.',
      description:'นักศึกษาทำเรื่องขอฝึกงานผ่านคณะวิชา เพื่อทำหนังสือขอความอนุเคราะห์หน่วยงาน',

    },
    {
      date: '20 พ.ค.',
      description:'วันสุดท้ายของการตอบรับนักศึกษาเข้าฝึกงาน',
    },
    {
      date: '30 พ.ค. - 5 ส.ค.',
      description:'ช่วงเวลาฝึกงาน โดยมีเวลารวมไม่น้อยกว่า 320 ชั่วโมง',
    }
     
    ]
  }
},
  components:{
    TestCard,
    Profile,
    Calendar,
  }
}
</script>
<style scoped>
.card{
    padding-bottom: 10px;
    box-shadow: 0 1px 6px 0 rgba(0,0,0,0.5);
    border-radius: 5px;
}
.c-header{
    padding-top: 20px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
}
.inactive{
  color: gray;
}
.active{ 
  color: #0047BA !important;
 }
</style>