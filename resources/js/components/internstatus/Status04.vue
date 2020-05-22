<template>
<div class="row">
    <div class="col-md-12">
    
        <div class="" v-for="(intern, index) in internstep" :key="index" :class="{ active: index == 0 }">
         
          <!-- <pre> {{intern}}</pre>
          <pre>{{intern.stu_id}}</pre>
          <pre>{{intern.student.course.end_date}}</pre> -->
        <!-- <div class="card mt-4">
             <div class="row">
                <div class="col-md-9">
                   <label class="mt-3 ml-3"><i class="fa fa-file-pdf-o fa-2x color-dblue"></i> คำรองขอส่งตัว</label>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-outline-primary bold"
                        href="/create">ดาวน์โหลดไฟล์
                    </a>
                </div>
             </div>
        </div> -->
        <div class="card mt-4">
             <div class="row">
                <div class="col-md-9">
                   <label class="mt-3 ml-3"><i class="fa fa-file-text-o fa-2x color-yellow"></i> <label>ส่งคำร้องขอประเมินฝึกงานครั้งที่ 1 | ส่งได้เมื่อ {{moment(intern.student.course.start_date)}} </label></label>
                </div>
                <div class="col-md-3">
                   <form @submit.prevent="cheackform1" @keydown="form.onKeydown($event)">     
                             
                            <input class="form-control" type="hidden" v-model="form.id = intern.stu_id">  
                             <input class="form-control" type="hidden" v-model="form.startdate = intern.student.course.start_date">  
                            <div class="mt-2 center" v-if="intern.sturev01_id">
                                <button class="btn-outline-warning  " disabled>ประเมินเรียบร้อย</button>
                            </div>
                             <div class="mt-2 center" v-else>
                                <button class="btn-outline-primary  " :loading="form.busy" >ขอประเมินครั้งที่ 1</button>
                            </div>
                           
                    </form>
                </div>
             </div>
        </div>
         <div class="card mt-4" >
             <div class="row">
                <div class="col-md-9"> 
                   <label class="mt-3 ml-3"><i class="fa fa-file-text-o fa-2x color-yellow"></i> <label>ส่งคำร้องขอประเมินฝึกงานครั้งที่ 2 | ส่งได้เมื่อ {{moment(intern.student.course.end_date)}}</label></label>
                </div>
                <div class="col-md-3">
                   <form @submit.prevent="cheackform2" @keydown="form2.onKeydown($event)">

                             <input class="form-control" type="hidden" v-model="form2.id =  intern.stu_id">  
                             <input class="form-control" type="hidden" v-model="form2.enddate =  intern.student.course.end_date">  
                            <div class="mt-2 center" v-if="intern.sturev02_id">
                                <button class="btn-outline-warning  " disabled>ประเมินเรียบร้อย</button>
                            </div>
                            <div class="mt-2 center" v-else>
                                <button class="btn-outline-primary " :loading="form2.busy" >ขอประเมินครั้งที่ 2</button>
                            </div>
                   </form>
                </div>
             </div>
        </div>
    
     
         </div>
    </div>
</div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
import Form from "vform";
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
import * as moment from 'moment';

export default {
    props:['body'],
    data: () => ({
    form: new Form({
      id:'',
      startdate:'',
      get:6,
    }),
     form2: new Form({
      id:'',
      enddate:'',
      get:7,
    }),
  }),
  methods: {
   ...mapActions({
    fetchinternconfirm:'comevents/fetchinternconfirm',
     fetch:'profile/fetch'
   }),
    moment: function (value) {
          return moment(String(value)).format('LL')
      },
      cheackform1(){
       Swal.fire({
        title: 'ยืนยันส่งคำร้อง',
        text: "ส่งคำร้องขอประเมินฝึกงานครั้งที่ 1",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ยืนยันส่งคำร้องครั้งที่ 1'
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
   cheackform2(){
       Swal.fire({
         title: 'ยืนยันส่งคำร้อง',
        text: "ส่งคำร้องขอประเมินฝึกงานครั้งที่ 2",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ยืนยันส่งคำร้องครั้งที่ 1'
        }).then((result) => {
        if (result.value) {
          this.update2()
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
    async update2() {
      const { data } = await this.form2.put(`/api/updateprofile/${this.form2.id}`);
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
.w80{
    width: 80%;
}
.custome{
    width: 100% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:white;
    background-color: #0047BA ;
    border: none;  
    box-shadow:none;
}
.card{
    padding: 20px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.btn-outline-primary {
    width: 70% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
    margin-left: auto;
    margin-right: auto;
    display: block;
}
.btn-outline-primary:hover {
    color: #fff !important;
    background-color: #133CBA;
    border-color: #133CBA;
}
.btn-outline-warning{
    width: 70% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:gray;
    border: 2px solid gray ;
    box-shadow:none;
}
.btn-outline-warning:hover {
    color: #212529;
    background-color: #FFB105;;
    border-color: #FFB105;;
}
.btn-detail-style .btn-primary{ 
    background-color: #0047BA ;
    border:none; 
    border-radius: 30px;
    width: 80%;
    height: 60px;
    padding-top:20px;
}
.btn-detail-style .btn-primary:hover { 
    background-color:  #E7B223 ;
    color: black;
    font-size: 1.5rem;
    border-radius: 60px;
    width: 90%;
    height: 60px;
    padding-top:14px;
    -webkit-transition: width 0.5s ease-in-out;
    transition: width 0.5s ease-in-out;
    transition: 0.3s ease-in-out;
}
.btn-detail-style{
  text-align: center;
  padding-top:20px ;
  padding-bottom:20px;
}
</style>