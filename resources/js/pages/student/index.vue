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
              <div class="mt-5 d-flex justify-content-lg-between align-items-center">
                <div><h4 class="bold">สถานที่ฝึกงานที่เหมาะกับคุณ</h4></div>
                    <div class="d-flex justify-content-end flex-fill">
                        <select class="custom-select w-25" v-model="reward">
                          <option value="all" selected>แสดงค่าตอบแทนทั้งหมด</option>
                          <option value="0">ไม่มีมีค่าตอบแทน</option>
                          <option value="1">มีค่าตอบแทน</option>
                        </select>
                        <select class="custom-select ml-3 w-40" v-model="province" >
                          <option value="all" selected>จังหวัดทั้งหมด</option>
                          <option v-for="(loc, index) in location.province" :key="index" :value="loc.id">{{loc.name_th}}</option>
                        </select>
                    </div>
                </div>
            <div class="row"> 
                <div class="col-md-4 mb-2" v-for="(event, index) in comevents" :key="index" v-if="((event.havereward == reward && reward != 'all') || reward == 'all') && ((event.company.province_id == province && province != 'all') || province == 'all')">
                  
                  	<div class="card mt-4 h-95">
                      <router-link :to="{name:'detail', params:{id:event.id }}">
                      <div class="radio-img">
                        <img :src="event.img" center  class="card-img-top"/>
                      </div>
                      </router-link>
                      <div class="top-box">
                        <div class="col-12">
                            <div class="card-info">
                              <router-link :to="{name:'detail', params:{id:event.id }}">
                              <p class="bold mt-2 color-dblue">บริษัท{{ event.company.name }} </p>
                              <p class="mb-2 color-dblue">{{ event.division }}</p>
                              </router-link>
                              <input class="form-control" type="hidden" v-model="comeventjob = event.job_id">  
                              <label>ประเภทงาน : </label>
                              <label v-for="cj in comeventjob.split(',')"  v-bind:key="cj.id">
                                <label v-for="(job, index) in jobs" :key="index" v-if="cj == job.id" >{{job.title}}</label>
                                {{jobs.title}}
                              </label>
                            <br>
                              <label>ตำแหน่งที่ต้องการ : {{event.requirement}}</label>
                              <label>ค่าตอบแทน : </label>
                                <label v-if="event.havereward == 1" > {{event.reward}} {{event.formreward}}</label>
                                <label v-else > ไม่มีค่าตอบแทน</label>
                              <label>ระยะเวลา : {{moment(event.enddate)}} </label><br>
                            </div> 
                        </div>
                      </div>
                    <div class="low-box">
                      <div class="col-12">
                        <div class="card-info">
                      <label class="mt-1"><i class="fa fa-map-marker fa-2x color-orange"></i> {{ event.company.address }} </label>
                        </div>
                      </div>
                    </div>
                  </div>                     
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>


<script>
import Profile from '~/components/Profile'
import Calendar from '~/components/Calendar'
import { mapGetters, mapActions } from "vuex";
import * as moment from 'moment';
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'


export default {
  middleware: 'auth',
  methods: {
   ...mapActions({
    fetch:'comevents/fetch',
    del:'comevents/del',
    fetchjob : 'jobs/fetchjob',
    fetchauth : 'location/fetchauth'
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
   },
   moment: function (value) {
          moment.locale('th');
          return moment(String(value)).format('LL')
          
      },
  },
  created(){
    this.fetch()
    this.fetchjob()
    this.fetchauth()
  },
  computed:{
  ...mapGetters({
      comevents:'comevents/comevents',
      jobs: 'jobs/jobs',
      location : 'location/authprovince'
    }),
  },
data() {
  return {
     comeventjob: "",
     reward:'all',
     province:'all',
  }
},
  components:{
    Profile,
    Calendar,
  }
}
</script>
<style scoped>
router-link{
    text-decoration: none;
}
.c-header{
    padding-top: 20px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
}
.w-25{
  width: 25%;
}
.w-40{
  width: 40%;
}
.inactive{
  color: gray;
}
.active{ 
  color: #0047BA !important;
 }
 a{
  text-decoration: none;
}
label{
  margin: 0;
  font-size: 0.75rem;
}
p{
  margin: 0;
}
.display-inline{
  display: inline;
}
.h-95{
  height: 95%;
}
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
   
}
.custom-select{
    border-radius: 2rem !important;
    font-size: 0.8rem;
}
.radio-img{
  height: 165px;
  box-sizing: border-box;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  overflow: hidden;
}
.radio-img img {
    width: 100%;
}
.top-box{
  border-bottom: 0.05em #E4E4E4 solid;
}
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
</style>