<template>
<div class="container" >
  <div class="col-12">
      <div class="row">
         <div class="col-md-6">
              <div class="mb-3 ml-3 mt-2" style="float: left">
                 <h4 class="mb-2 bold">สถานะการฝึกงานของนักศึกษา</h4>
                   <p class="bold color-dblue" v-for="(mj, index) in majors" :key="index" v-if="major == mj.id">นักศึกษาสาขา {{mj.name}} </p>
                    <p class="bold color-dblue"  v-if="major == 'all'">นักศึกษาทั้งหมด</p>
               </div>
          </div>
            <div class="col-md-6 mb-3">
              <div class="row" >
                <div class="col-6">
                 <router-link :to="{name:'calendar' }">
                   <div class="btn btn-outline-warning bold">สร้างปฎิทินกำหนดการ</div>
                </router-link>
                </div>
                 <div class="col-6">
                   <router-link class="btn btn-outline-primary bold" :to="{name:'adduser' }">สร้างข้อมูลนักศึกษา</router-link>
                 </div>
              </div>
            </div> 
      </div>
            <div class="input-group mt-2 mb-3">
              <select class="custom-select col-md-3 ml-2" v-model="major" >
                <option value="all" selected>นักศึกษาทั้งหมด</option>
                <option v-for="(major, index) in majors" :value="major.id" :key="index"> {{major.name}}</option>
              </select>
            </div>
             <hr class="hr-yellow">
              <div class="row" v-for="(user, index) in users" :key="index" >
                <div class="col-md-6">
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mb-2 bold">ข้อมูลนักศึกษาฝึกงาน</h4>
                        <p>เข้าสู่ระบบโดย "อาจารย์ {{user.teacher.name}} {{user.teacher.surname}}"</p>
                    </div>
                </div>
                <div class="col-md-4">
                   <div class="img-circle" style="float:right;">
                      <img src="/uploads/images/comevents/user.png"  v-if="user.teacher.img == null"   />
                      <img v-else :src="user.teacher.img" /> 
                    </div>
                </div>
                 <div class="col-md-2">
                   <router-link class="btn btn-outline-primary mt-3" :to="{name:'editteacher' , params:{id:user.user_id }}  ">แก้ไขข้อมูล</router-link>
                 </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table mb-5" >
                <thead class="color-dblue">
                    <tr>
                    <th class="center " scope="col">รหัสนักศึกษา</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th class="center ">ชื่อบริษัทที่ฝึกงาน</th>
                    <th class="center " scope="col">ตำแหน่งฝึกงาน</th>
                    <th class="center " scope="col">สถานะ</th>
                    <th class="center " scope="col">ประเมินผล</th>
                    </tr>
                </thead>
                <tbody v-for="(student, index) in students" :key="index">
                    <!-- (stu.result == status || status == 'all') && -->
                    
                      <tr v-if="student.major_id == major || major == 'all'"> 
                      <td class="center " scope="col">{{student.number}}</td>
                      <td>{{student.name}} {{student.surname}}</td>
                      <td>
                         <p v-if="student.intern_id == 1" class="center" >-</p>
                         <p v-else class="center " >บริษัท {{student.joincomevent.company.name}}<br><small>( {{student.joincomevent.comevent.division}} )</small></p>
                         
                      </td>
                      <td class="center " scope="col">
                        <p v-if="student.intern_id == 1" class="center" >-</p>
                         <p v-else >{{student.joincomevent.jobtype}}</p>
                      </td>

                      <td class="center " scope="col">
                          <p v-if="student.intern_id == 1"      class="badge waiting" >ยังไม่มีสถานที่ฝึกงาน</p>
                          <p v-else-if="student.intern_id == 2" class="badge ongoing" >ยืนยันสถานที่ฝึกงาน</p>
                          <p v-else-if="student.intern_id == 3" class="badge ongoing">มีสถานที่ฝึกงาน</p>
                          <p v-else-if="student.intern_id == 4" class="badge ongoing" >รอการฝึกงาน</p>
                          <p v-else-if="student.intern_id == 5" class="badge review" >กำลังฝึกงาน</p>
                          <p v-else-if="student.intern_id == 6" class="badge review">กำลังฝึกงาน (ประเมินครั้งที่ 1)</p>
                          <p v-else-if="student.intern_id == 7" class="badge review" >กำลังฝึกงาน (ประเมินครั้งที่ 2)</p>   
                          <p v-else-if="student.intern_id == 8" class="badge finish">สิ้นสุดฝึกงาน</p>      
                      </td>
                      <td class="center " scope="col">
                         
                         <p v-if="student.intern_id == 1" class="center" >-</p>
                         <label v-else>  
                           <router-link v-if="student.joincomevent.sturev01_id != null" :to="{name:'detailreview', params:{id:student.joincomevent.sturev01_id}}">ประเมินครั้งที่ 1</router-link> 
                           <br>
                           <router-link v-if="student.joincomevent.sturev02_id != null" :to="{name:'detailreview', params:{id:student.joincomevent.sturev02_id}}">ประเมินครั้งที่ 2</router-link> 
                         </label>  
                      
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

export default {
  middleware: 'auth',
  methods: {
    setTab(tab) {
      this.tab = tab
    },
    ...mapActions({
       fetch:'profile/fetch',
       fetchallstudent:'teacher/fetchallstudent',
       fetchmajor:'teacher/fetchmajor'
    }),
  },
  data() {
    return {
      tab: 0,
      major: 'all',
      }
  },
 
  computed:{
  
    ...mapGetters({
        users:'profile/userinfos',
        students:'teacher/allstudent',
        majors: 'teacher/majors'
    })
  },
  created(){
     this.fetch()
     this.fetchallstudent()
     this.fetchmajor()
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
.btn-outline-warning{
    width: 100% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#FFB105;
    border: 2px solid #FFB105;
    box-shadow:none;
}
.btn-outline-warning:hover {
    color: #212529;
    background-color: #FFB105;;
    border-color: #FFB105;;
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
.w15{
    width: 15%
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

.badge.review {
  background: #E4EFFE;;
  color: #133CBA;
}

.badge.ongoing {
  background:#F5E8C4;
  color: #FFB105;
}

.badge.waiting {
  background: #ECEEF0;
  color: #9DA3AB;
}

.badge.finish {
  background:#E0F2DE;
  color: rgb(94, 139, 89);
}

 

</style>
