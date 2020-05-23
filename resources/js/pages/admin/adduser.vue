<template>
<div class="container" >
    <div class="mb-3"> 
        <router-link :to="{ name: 'teacher'}">ย้อนกลับ</router-link>
     </div>
    <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
    <div class="card mt-5">
      <div class="col-md-12">  
          <div class="row">
            <h4 class="mb-3 ml-3 mt-2 bold">เพิ่มผู้ใช้งานนักศึกษา</h4>
          </div>
          <hr class="hr-yellow" >
          <div class="row">
            <div class="form-group col-md-6">
                <label class="color-blue bold">ชื่อขึ้นต้น Email</label>
                <input v-model="form.front" :class="{ 'is-invalid': form.errors.has('front') }" class="form-control" type="text" name="front" required>
                <has-error :form="form" field="front" />
            </div>
            <div class="form-group col-md-6">
                      <label class="color-blue bold">@ลงท้ายของ Email</label>
                      <input v-model="form.back" :class="{ 'is-invalid': form.errors.has('back') }" class="form-control" type="text" name="back" required>
                      <has-error :form="form" field="back" />
            </div>

            <div class="form-group col-md-6">
              <label class="color-blue bold">เพิ่มผู้ใช้งานตั้งแต่รหัสนักศึกษา</label>
               <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <span class="input-group-text">{{form.front}}</span>
                </div>
                <input v-model="form.start" :class="{ 'is-invalid': form.errors.has('start') }" class="form-control" type="text" name="start" required>
                <has-error :form="form" field="start" />
                <div class="input-group-append">
                    <span class="input-group-text">@{{form.back}}</span>
                </div>

               </div>
            </div>

             <div class="form-group col-md-6">
              <label class="color-blue bold">เพิ่มผู้ใช้งานจนถึงรหัสนักศึกษา</label>
               <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <span class="input-group-text">{{form.front}}</span>
                </div>
                <input v-model="form.end" :class="{ 'is-invalid': form.errors.has('end') }" class="form-control" type="text" name="end" required>
                <has-error :form="form" field="end" />
                <div class="input-group-append">
                    <span class="input-group-text">@{{form.back}}</span>
                </div>

               </div>
            </div>
            
            <div class="form-group col-md-4" v-for="(user, index) in users" :key="index">
                <input class="form-control" type="hidden" v-model="form.uni_id = user.teacher.uni_id">  
                <input class="form-control" type="hidden" v-model="form.teacher_id = user.teacher.id">  
                <label class="color-blue bold">คณะ </label>
                <select class="custom-select  m-auto" v-model="form.faculty_id" >
                    <option value="" disabled hidden>เลือกหมวดหมู่การฝึกงาน</option>
                    <option v-for="(fac, index) in university.faculty" v-if="fac.id == user.teacher.faculty_id" :key="index" :value="fac.id">{{fac.name}}</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label class="color-blue bold">สาขา </label>
                <select class="custom-select  m-auto" v-model="form.major_id" >
                    <option value="" disabled hidden>เลือกหมวดหมู่การฝึกงาน</option>
                    <option v-for="(maj, index) in university.major" v-if="maj.faculty_id == form.faculty_id" :key="index" :value="maj.id">{{maj.name}}</option>
                </select>
            </div>

             <div class="form-group col-md-4" >
                <label class="color-blue bold">หลักสูตรการฝึกงาน</label>
                <select class="custom-select  m-auto" v-model="form.course_id" >
                    <option value="" disabled hidden>เลือกหลักสูตรการฝึกงาน</option>
                    <option v-for="(co, index) in course" :key="index" :value="co.id">{{co.name}} {{co.description}}</option>
                </select>
            </div>

          </div>
          <div class="col-md-12">
              <div class="row">
                <h4 class="mb-3 ml-3 mt-5 bold">เพิ่มทักษะความถนัดเบื้องต้น<br><small class="f-075">(นักศึกษาสามารถแก้ไขได้ในภายหลัง)</small></h4>
              </div>
              <hr class="hr-yellow" >
          <div class="row">
              <div class="col-md-6" v-for="i in 4 " :key="i">
                  <div class="form-group">
                    <label class="color-blue bold">ทักษะที่ {{i}}</label>
                    <div class="input-group mt-2 mb-3 m-auto">
                            <select class="custom-select  col-md-6 m-auto" v-model="form.job_id[i]" required>
                                <option value="" disabled hidden>เลือกหมวดหมู่การฝึกงาน</option>
                                <option v-for="(job, index) in jobs" :key="index" :value="job.id">{{job.title}}</option>
                            </select>
                          <select class="custom-select  col-md-6 m-auto" v-model="form.jobtypes_id[i]" required>
                                <option value="" disabled hidden>เลือกตำแหน่งการฝึกงาน</option>
                                <option v-for="(type, index) in types" :key="index" :value="type.id" v-if="form.job_id[i] == type.job_id">{{type.name}}</option>
                            </select>   
                    </div> 
                  </div>
              </div>
          </div> 
          </div> 
    </div>
      
         
 
    </div>
    <div class="col-md-6 m-auto">
        <button class="btn-outline-primary bold mt-5 mb-5" :loading="form.busy">
            เพิ่มผู้ใช้งานนักศึกษา
        </button>
    </div>
    </form>
</div>
</template>
<script>
import Form from "vform";
import {mapActions, mapGetters} from 'vuex'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
export default {

data: () => ({
    form: new Form({
      front:'',
      back:'',
      start:'',
      end:'',
      role:1,
      course_id:'',
      uni_id:'',
      faculty_id:'',
      major_id:'',
      teacher_id:'',
      job_id:[],
      jobtypes_id:[],
 
    }),
  }),
  computed:{
    ...mapGetters({
      users:'profile/userinfos',
      jobs: 'jobs/jobs',
      types: 'jobs/types',
      university:'teacher/authalluniversity',
      course: 'teacher/course', 
      
    })
  },
  components:{
    
  },
   methods: {
    ...mapActions({
      fetch:'profile/fetch',
      fetchjob : 'jobs/fetchjob',
      fetchtype : 'jobs/fetchtype',
      fetchauthuni: 'teacher/fetchauthuni',
      fetchcourse : 'teacher/fetchcourse',
      
    }),
    submitForm() {
    Swal.fire({
    title: 'ยืนยันเพิ่มผู้ใช้งานนักศึกษา',
    text: "หากดำเนินการแล้วจะไม่สามารถแก้ไขได้",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'ยกเลิก',
    confirmButtonText: 'ยืนยันข้อมูล',
    }).then((result) => {
      if (result.value) {
        this.save()
        Swal.fire(
          'เพิ่มผู้ใช้นักศึกษาสำเร็จ',
          'เสร็จสิ้นเพิ่มผู้ใช้งานนักศึกษา',
          'success',
        )
      }
    })
    },
    async save() {
     
      const { data } = await this.form.post("/api/adduser");
      if (data) {
        this.$router.push({
          name: "teacher",
        });
        }else{
        alert('error!!')
      }
    },
  },
   created(){
      this.fetchjob()
      this.fetchtype()
      this.fetch()
      this.fetchauthuni()
      this.fetchcourse()
  }
}
</script>


<style scoped>
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
textarea {
  padding : 1.5rem;
  width: 100%;
  overflow: auto;
  box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
  border-radius: 5px;
  outline: none !important; 
  border:none;
}
.f-075{
  font-size: 0.75rem !important;
}
.card{
    padding :25px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.form-control{
    border-radius: 2rem;
}
.input-group-text {
    border-radius: 1.125rem;
}
.btn-outline-primary {
    width: 60% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    display:block;
    margin-left: auto;
    margin-right: auto;
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
}
.btn-outline-primary:hover {
    color: #fff !important;
    background-color: #133CBA;
    border-color: #133CBA;
}

.custom-select{
    border-radius: 2rem !important;
}
</style>
