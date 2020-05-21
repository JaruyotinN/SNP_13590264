<template>
<div class="col-md-12">
 <form @submit.prevent="check" @keydown="form.onKeydown($event)">
<div class="row" v-for="(intern, index) in internstep" :key="index">
   
    <div class="col-md-6">
        <div class="card mt-4">
           <div class="col-12">
                  <div class="card-info">
                    <h5 class="bold mt-3 mb-3 color-blue">ข้อมูลของนักศึกษาฝึกงาน</h5>
                    <label>ชื่อ : </label><label class="bold"> &nbsp{{ intern.student.name }} {{ intern.student.surname }}</label><br>
                    <label>ตำแหน่งที่สมัคร : </label><label class="bold"> &nbsp{{ intern.jobtype }}</label><br>
                    <label>หลักสูตร : </label><label class="bold"> &nbsp{{ intern.student.course.name }} </label><label class="smalltext">&nbsp({{intern.student.course.description}})</label><br>
                    <hr class="hr-blue">
                    <label>มหาวิทยาลัย : </label><label class="bold"> &nbsp{{ intern.student.major.faculty.university.name }}</label><br>
                    <label>คณะ : </label><label class="bold"> &nbsp{{ intern.student.major.faculty.name }}</label><br>
                    <label>สาขา : </label><label class="bold"> &nbsp{{ intern.student.major.name }}</label><br>
                    <label>เบอร์ติดต่อ : </label><label class="bold"> &nbsp{{ intern.student.phonenumber }}</label><br>
                    <div class="img-circle">
                        <img :src="intern.student.img">
                    </div> 
                  </div> 
              </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mt-4">
             <div class="col-12">intern.comevent.company
                  <div class="card-info">
                    <h5 class="bold mt-3 mb-3 color-blue">ข้อมูลของบริษัทฝึกงาน</h5>
                    <label>บริษัท : </label><label class="bold"> &nbsp{{ intern.comevent.company.name }}</label><br>
                    <label>โครงการ : </label><label class="bold"> &nbsp{{ intern.comevent.division }}</label><br>
                    <label>เวลาปฏิบัติงาน : </label><label class="bold"> &nbsp{{ intern.comevent.jobtime }}</label><br>
                    <hr class="hr-blue">
                    <label>ผู้ดูแล : </label><label class="bold"> &nbspคุณ{{ intern.comevent.staff.name}} {{intern.comevent.staff.surname }}</label><br>
                    <label>ตำแหน่ง : </label><label class="bold"> &nbsp{{ intern.comevent.staff.career }}</label><br>
                    <label>Email ผู้ดูแล : </label><label class="bold"> &nbsp{{ intern.comevent.staff.email }}</label><br>
                    <label>เบอร์ติดต่อผู้ดูแล : </label><label class="bold"> &nbsp{{ intern.comevent.staff.phonenumber }}</label><br>
                    <label>สถานที่ : {{ intern.comevent.company.address }}</label>
                    <div class="img-circle">
                        <img :src="intern.comevent.company.logo">
                    </div> 
                  </div> 
              </div>
        </div>
    </div>
     <div class="" v-for="(user, index) in users" :key="index" :class="{ active: index == 0 }">
            <input class="form-control" type="hidden" v-model="form.id = user.student.id">
    </div>
     <div class="col-md-12">
        <div class="card mt-4">
             <div class="col-12">
                  <div class="card-info">
                    <h5 class="bold mt-3 mb-3 color-blue">ข้อมูลของอาจารย์ที่ปรึกษา</h5>
                    <label>ชื่อ : </label><label class="bold"> &nbspอาจารย์&nbsp{{ intern.student.teacher.name }}&nbsp{{ intern.student.teacher.surname }}</label><br> 
                    <label>Email อาจารย์ : </label><label class="bold"> &nbsp{{intern.student.teacher.email }}</label>&nbsp&nbsp&nbsp<label>เบอร์ติดต่ออาจารย์ฺ : </label>
                    <label class="bold"> &nbsp{{ intern.student.teacher.phonenumber }}</label><br><br>
                   
                    <div class="img-circle">
                        <img :src="intern.student.teacher.img">
                    </div> 
                  </div> 
              </div>
        </div>
    </div>
    
    <div class="col-md-10 m-auto">
     <div class="mt-3 mb-3 center">
        <button class="btn-outline-primary bold" :loading="form.busy" >ดำเนินการขั้นต่อไป</button>
     </div>
     </div>
  
</div>
  </form>
</div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Form from "vform";
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

export default {
    props:['body'],
    data: () => ({
    form: new Form({
      id:'',
      get:5,
    }),
  }),
  methods: {
   ...mapActions({
     fetchinternconfirm:'comevents/fetchinternconfirm',
     fetch:'profile/fetch'
   }),
      check(){
       Swal.fire({
        title: 'รับทราบข้อมูล',
        text: "นักศึกษารับทราบข้อมูลของบริษัทเรียบร้อย ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ยืนยันการสมัคร'
        }).then((result) => {
        if (result.value) {
          this.update()
            Swal.fire(
          'ดำเนินการเสร็จสิ้น',
          'โปรดตรวจสอบข้อมูลให้ครบถ้วน',
          'success',
            )
        }
        })  
   },
      async update() {

     const { data } = await this.form.put(`/api/updateprofile/${this.form.id}`);
     console.log(data)
     this.fetch()
    },
  },
  created(){
    this.fetchinternconfirm()
    
  },
  computed:{
  ...mapGetters({
     users:'profile/userinfos',
      internstep:'comevents/internstepconfirm',
    }),
  },
}
</script>

<style scoped>
.smalltext{
  font-size: 0.65rem;
  color:rgb(171, 171, 171);
}
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.card-info{
    margin-top: 2px;
    padding: 10px;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
.btn-outline-primary {
    width: 40% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
}
.img-circle{
   position: absolute;
   top: 30px;
  right: 20px;
    width: 5rem;
    height: 5rem;
    border-radius: 50%;
    overflow: hidden; 
    float: left;
}
.img-circle img{
    width: 100%;
}
</style>