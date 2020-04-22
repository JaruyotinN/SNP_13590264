<template>
<div class="col-md-12">
 <form @submit.prevent="check" @keydown="form.onKeydown($event)">
<div class="row">
    <div class="col-md-6">
        <div class="card mt-4">
           <div class="col-12">
                  <div class="card-info">
                    <h4 class="bold mt-3">ข้อมูลการฝึกงาน</h4>
                    <label>ชื่อ : </label><label class="bold"> &nbsp{{ body.name }} {{ body.surname }}</label><br>
                    <label>เบอร์ติดต่อ : </label><label class="bold"> &nbsp{{ body.pnum }}</label><br>
                    <label>มหาวิทยาลัย : </label><label class="bold"> &nbsp{{ body.university }}</label><br>
                    <label>คณะ : </label><label class="bold"> &nbsp{{ body.faculty }}</label><br>
                    <label>สาขา : </label><label class="bold"> &nbsp{{ body.major }}</label><br>
                  </div> 
              </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mt-4">
             <div class="col-12">
                  <div class="card-info">
                    <h4 class="bold mt-3">ข้อมูลการฝึกงาน</h4>
                    <label>บริษัท : </label><label class="bold"> &nbsp{{ body.cname }}</label><br>
                    <label>หน่วยงาน : </label><label class="bold"> &nbsp{{ body.csubname }}</label><br>
                    <label>ผู้ดูแล : </label><label class="bold"> &nbsp{{ body.cstaff }}</label><br>
                    <label>ตำแหน่ง: </label><label class="bold"> &nbsp{{ body.cstaffjob }}</label><br>
                    <label>สถานที่ : {{ body.caddress }}</label>
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
                    <h4 class="bold mt-3">ข้อมูลอาจารย์ที่ปรึกาา</h4>
                    <label>ชื่อ : </label><label class="bold"> &nbspอาจารย์{{ body.tname }}&nbsp{{ body.tsurname }}</label><br>
                    <label>เบอร์ติดต่อ : </label><label class="bold"> &nbsp{{ body.tpnum }}</label><br>
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
     userjoin:'comevents/userjoin',
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
.card{
    padding-bottom: 10px;
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
    width: 40% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
}
</style>