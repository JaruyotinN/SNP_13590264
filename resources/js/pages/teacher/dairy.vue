<template>
<div class="container" >
  <div class="col-12">
      <div class="row">
         <div class="col-md-9">
              <div class="mb-3 ml-3 mt-2" style="float: left">
                 <h4 class="mb-2 bold">บันทึกฝึกงานของนักศึกษา</h4>
                   <p class="bold color-dblue" v-for="(mj, index) in majors" :key="index" v-if="major == mj.id">นักศึกษาสาขา {{mj.name}} </p>
                   <p class="bold color-dblue"  v-if="major == 'all'">นักศึกษาทั้งหมด</p>
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
                   <router-link class="btn btn-outline-pmr mt-3" :to="{name:'editteacher' , params:{id:user.user_id }}  ">แก้ไขข้อมูล</router-link>
                 </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table mb-5" >
                <thead class="color-dblue">
                    <tr>
                    <th class="center " scope="col">รหัสนักศึกษา</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th class="center ">จำนวนโพส</th>
                    <th class="center " scope="col">บันทึกฝึกงาน</th>
                    </tr>
                </thead>
                <tbody v-for="(student, index) in students" :key="index">
                     
                      <tr v-if="student.major_id == major || major == 'all'"> 
                      <td class="center" scope="col">
                        <p class="mt-2">{{student.number}}</p></td>
                      <td >
                        <p class="mt-2">{{student.name}} {{student.surname}}</p>
                      </td>
                      <td class="center cs-p" scope="col">
                         <p class="mt-2">{{student.count}}</p>
                      </td>

                      <td class="center" scope="col">
                        <router-link  :to="{name:'detaildairy', params:{id: student.id}}" class="btn btn-outline-primary bold" >
                            <i class="fa fa-address-book-o fa-lg"></i> บันทึกฝึกงาน
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

export default {
  middleware: 'auth',
  methods: {
    setTab(tab) {
      this.tab = tab
    },
    ...mapActions({
       fetch:'profile/fetch',
       fetchalldairy:'teacher/fetchalldairy',
       fetchmajor:'teacher/fetchmajor'
    }),
  },
  data() {
    return {
      major: 'all',

      }
  },
 
  computed:{
  
    ...mapGetters({
        users:'profile/userinfos',
        students:'teacher/alldairy',
        majors: 'teacher/majors'
    })
  },
  created(){
     this.fetch()
     this.fetchalldairy()
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
.cs-p p{
  padding: 0;
  margin: 0;
}
.btn-outline-pmr:hover {
    color: #fff !important;
    background-color: #133CBA;
    border-color: #133CBA;
}
.btn-outline-pmr{
   width: 100% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
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
.btn-outline-primary {
    width: 60%;
    height: 40px;
    padding: 10px;
    line-height: 17px;
    border-radius: 2rem;
    color: #133CBA;
    border: 2px solid #133CBA;
    box-shadow: none;
}

.custom-select{
    border-radius: 2rem !important;
    font-size: 0.80rem;
}

 

</style>
