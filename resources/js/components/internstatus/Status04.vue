<template>
<div class="row">
     <div class="col-md-12">
         <div class="" v-for="(user, index) in users" :key="index" :class="{ active: index == 0 }">
        <div class="card mt-4">
            <table class="table" >
                <tbody>
                    <tr>
                        <td class="w80"><label>คำรองขอส่งตัว</label></td>
                        <td> <a class="btn btn-outline-primary bold"
                       href="/create">ดาวน์โหลดไฟล์</a>
                       </td>
                    </tr>
                    <tr>
                        <td class="w80"><label>ส่งคำร้องขอประเมินฝึกงานครั้งที่ 1 | start_date {{user.student.course.start_date}}</label></td>
                        <td> 
                            <form @submit.prevent="cheackform1" @keydown="form.onKeydown($event)">

                                    <input class="form-control" type="hidden" v-model="form.id = user.student.id">
                                    <input class="form-control" type="hidden" v-model="form.enddate = user.student.course.start_date">
                               
                            <div class="mt-3 mb-3 center">
                                <button class="btn-outline-primary bold" :loading="form.busy" >ประเมินฝึกงานครั้งที่ 1</button>
                            </div>
                            </form>
                       </td>
                    </tr>
                    <tr>
                        <td class="w80"><label>ส่งคำร้องขอประเมินฝึกงาน</label></td>
                        <td> 
                             <form @submit.prevent="cheackform2" @keydown="form2.onKeydown($event)">

                                 <input class="form-control" type="hidden" v-model="form2.id = user.student.id">
                                 <input class="form-control" type="hidden" v-model="form2.enddate = user.student.course.end_date">

                            <div class="mt-3 mb-3 center">
                                <button class="btn-outline-primary bold" :loading="form2.busy" >ประเมินฝึกงานครั้งที่ 2</button>
                            </div>
                            </form>
                       </td>
                    </tr>
                </tbody>
            </table>
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
     userjoin:'comevents/userjoin',
     fetch:'profile/fetch'
   }),
      cheackform1(){
       Swal.fire({
        title: 'ยืนยันส่งคำร้อง',
        text: "ส่งคำร้องขอประเมินฝึกงานครั้งที่ 1",
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
   cheackform2(){
       Swal.fire({
         title: 'ยืนยันส่งคำร้อง',
        text: "ส่งคำร้องขอประเมินฝึกงานครั้งที่ 2",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ยืนยันการสมัคร'
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
    this.userjoin()
    
  },
  computed:{
  ...mapGetters({
      users:'profile/userinfos',
      userjoins:'comevents/userjoins',
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
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.btn-outline-primary {
    width: 100% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
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