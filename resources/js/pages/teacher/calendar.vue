<template>
<div class="container" >
    <div class="mb-5"> 
        <router-link :to="{ name: 'teacher'}">ย้อนกลับ</router-link>
    </div>
 
  <div class="col-12" v-if="tab == 1">
      <div class="row">
         <div class="col-md-9">
             <div class="row">
              <div class="mb-3 ml-3 mt-2" style="float: left">
                 <h4 class="mb-2 bold">ข้อมูลหลักสูตรการฝึกงาน</h4>
               </div>
             </div>
               <ul class="nav ml-3">
                <li>
                      <a  href="#"  @click="setTab(1)" class="bold color-dblue">
                    ข้อมูลหลักสูตรการฝึกงาน 
                      </a>
                </li>
                <p>&nbsp;&nbsp;|&nbsp;&nbsp;</p>
                <li>
                  <a  href="#"  @click="setTab(2)" class="color-blue">
                    ข้อมูลประกาศปฏิทินฝึกงานของนักศึกษา
                      </a>

                </li>
              </ul>
          </div>
          <div class="col-md-3">
                <router-link class="btn btn-outline-primary bold" :to="{name:'createcourse' }">สร้างหลักสูตรการฝึกงาน</router-link>
          </div>
      </div>
            <hr class="hr-yellow">
            <div class="table-responsive mt-3">
                <table class="table mb-5" >
                <thead class="color-dblue">
                    <tr>
                    <th>ชื่อหลักสูตร</th>
                    <th>คำอธิบายหลักสูตร</th>
                    <th  scope="col">วันเริ่มหลักสูตร</th>
                    <th  scope="col">วันจบหลักสูตร</th>
                    </tr>
                </thead>
                      <tbody v-for="(co, index) in course" :key="index">
                      <tr > 
                      <td><p class="mt-2">{{co.name}}</p></td>
                      <td><p class="mt-2">{{co.description}}</p></td>
                     <td><p class="mt-2">{{moment(co.start_date)}}</p></td>
                     <td><p class="mt-2">{{moment(co.end_date)}}</p></td>
                      </tr>
                </tbody>
                </table>
            </div>
   </div>
    <div class="col-12" v-if="tab == 2">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mb-2 bold">ข้อมูลประกาศปฏิทินฝึกงานของนักศึกษา</h4>
                    </div>
                </div>
                <ul class="nav ml-3">
                    <li>
                        <a  href="#"  @click="setTab(1)" class="color-blue">
                        ข้อมูลหลักสูตรการฝึกงาน 
                        </a>
                    </li>
                    <p>&nbsp;&nbsp;|&nbsp;&nbsp;</p>
                    <li>
                    <a  href="#"  @click="setTab(2)" class="bold color-dblue">
                        ข้อมูลประกาศปฏิทินฝึกงานของนักศึกษา
                        </a>
                    </li>
               </ul>
 
            </div>
            <div class="col-md-3">
                    <router-link class="btn btn-outline-primary bold" :to="{name:'createcalendar' }">สร้างประกาศ</router-link>
            </div>
        </div>
                <hr class="hr-yellow">
                <div class="table-responsive mt-3">
                    <table class="table mb-5" >
                    <thead class="color-dblue">
                        <tr>
                        <th class="w-50">คำอธิบายประกาศ</th>
                        <th  scope="col">ระยะเวลาเริ่ม</th>
                        <th  scope="col">ระยะเวลาจบ</th>
                        </tr>
                    </thead>
                        <tbody v-for="(co, index) in calendar" :key="index">
                        <tr > 
                        <td class="w-50"><p class="mt-2">{{co.description}}</p></td>
                        <td><p class="mt-2">{{moment(co.start_date)}}</p></td>
                        <td><p class="mt-2">{{moment(co.end_date)}}</p></td>
                        <td  scope="col">
                            <router-link :to="{name:'editcalendar', params:{id:co.id }}" class="btn btn-outline-primary bold" >
                                แก้ไขประกาศ
                            </router-link> 
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
    </div>   
</div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import * as moment from 'moment';
export default {
        
  methods: {
 
    ...mapActions({
        fetchcalendar : 'teacher/fetchcalendar',
        fetchcourse : 'teacher/fetchcourse',
    }),
     setTab(tab) {
      this.tab = tab
    },
     moment: function (value) {
        moment.locale('th');    
       return moment(String(value)).format('LL')
    },
  },
  data() {
    return {
       tab :1,
      }
  },
 
  computed:{
  
    ...mapGetters({
        calendar: 'teacher/calendar', 
        course: 'teacher/course', 
    })
  },
  created(){
        this.fetchcalendar();
        this.fetchcourse();
  }
}
</script>

<style  scoped>
h5{
    margin: 0;
}
small{
  margin: 0;
  font-size: 0.75rem;
}
li{
  margin-right: 1rem;
}
.btn-outline-primary {
    width: 100% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
    /* font-size: 0.75rem; */
}
.btn-outline-primary:hover {
    color: #fff !important;
    background-color: #133CBA;
    border-color: #133CBA;
}
.w50{
    width: 50%
}
.img-circle{
    margin: 0 auto;
    width: 75px;
    height: 75px;
    border-radius: 50%;
    overflow: hidden; 

}
.img-circle img{
    width: 100%;
}
.card{
    padding : 1.5rem;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
.badge {
  width: 90%;
  text-align: center;
  font-size: 1rem;
  padding: 15px 15px;
  border-radius: 5px;
}

.custom-select{
    border-radius: 2rem !important;
    font-size: 0.80rem;
}


 
</style>
