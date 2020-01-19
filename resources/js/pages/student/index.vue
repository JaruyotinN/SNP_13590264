<template>
  <div class="container" >
    <Profile />
      <div class="col-md-12">
        <div class="row mb-3">
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
                <div class="col-md-4 mb-2" v-for="(event, index) in comevents" :key="index">
                <router-link :to="{name:'detail', params:{id:event.id}}">
                <ComEventCard :event="event"/>
                </router-link>

                <!-- <button class="btn btn-danger" @click="confirmDel(test.id)">
                  del
                </button> -->
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>


<script>
import ComEventCard from '~/components/ComEventCard'
import Profile from '~/components/Profile'
import Calendar from '~/components/Calendar'
import { mapGetters, mapActions } from "vuex";
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

export default {
  middleware: 'auth',
  methods: {
   ...mapActions({
    fetch:'comevents/fetch',
    del:'comevents/del'
   }),
   confirmDel(id){
     Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    this.del(id)
    this.fetch()
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
   }
  },
  created(){
    this.fetch()
  },
  computed:{
  ...mapGetters({
      comevents:'comevents/comevents'
    }),
  },
data() {
  return {
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
    ComEventCard,
    Profile,
    Calendar,
  }
}
</script>
<style scoped>
router-link{
    text-decoration: none;
}
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