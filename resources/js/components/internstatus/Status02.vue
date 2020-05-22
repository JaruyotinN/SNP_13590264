<template>
<div class="card mt-4">
   <div class="card-info">
      <form @submit.prevent="check" @keydown="form.onKeydown($event)">
          <h5 class="bold mt-4 center">ข้อมูลผู้ดูแลการฝึกงาน</h5>
          <div class="col-md-10 m-auto">
              <div class="row mt-3"  v-for="(intern, index) in internstep" :key="index">   
                <!-- <pre>{{intern.comevent.staff}}</pre> -->
                  <div class="col-md-6 mb-1">
                      <h5 class="color-blue ml-1"><i class="fa fa-building"></i> บริษัท</h5>
                      <div class="mt-2 mb-3">
                      <input class="form-control" disabled type="text" :value="intern.comevent.company.name">
                      </div>
                  </div>
                  <div class="col-md-6 mb-1">
                      <h5 class="color-blue mb-1"><i class="fa fa-font-awesome"></i> โครงการ</h5>
                      <div class="mt-2 mb-3">
                      <input class="form-control" disabled type="text" :value="intern.comevent.division">
                      </div>
                  </div>
                  <div class="col-md-6 mb-1">
                      <h5 class="color-blue mb-1"><i class="fa fa-user"></i> ผู้ดูแล</h5>
                      <div class="mt-2 mb-3">
                      <input class="form-control" disabled type="text" :value="'คุณ'+intern.comevent.staff.name+' '+intern.comevent.staff.surname">
                      </div>
                  </div>
                  <div class="col-md-6 mb-1">
                      <h5 class="color-blue mb-1"><i class="fa fa-certificate"></i> ตำแหน่งผู้ดูแล</h5>
                      <div class="mt-2 mb-3">
                      <input class="form-control" disabled type="text" :value="intern.comevent.staff.career">
                      </div>
                  </div>
                   <div class="col-md-6 mb-1">
                      <h5 class="color-blue mb-1"><i class="fa fa-phone-square"></i> เบอร์โทรศัพท์</h5>
                      <div class="mt-2 mb-3">
                      <input class="form-control" disabled type="text" :value="intern.comevent.staff.phonenumber">
                      </div>
                  </div>
                   <div class="col-md-6 mb-1">
                      <h5 class="color-blue mb-1"><i class="fa fa-envelope"></i> Email</h5>
                      <div class="mt-2 mb-3">
                      <input class="form-control" disabled type="text" :value="intern.comevent.staff.email">
                      </div>
                  </div>
              </div>
              <div class="" v-for="(user, index) in users" :key="index" :class="{ active: index == 0 }">
                 <input class="form-control" type="hidden" v-model="form.id = user.student.id">
              </div>
              <div class="mt-3 mb-3 center">
                    <button class="btn-outline-primary bold" :loading="form.busy" >ดำเนินการขั้นต่อไป</button>
              </div>
          </div>
      </form>
   </div>
</div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Form from "vform";
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

   export default {
  middleware: 'auth',
  data: () => ({
    form: new Form({
      id:'',
      get:4,
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
      // if (data) {
      //   this.$router.push({
      //     name: "admin.item.show",
      //     params: { id: this.show.id }
      //   });
      // }
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

<style  scoped>
.form-control{
    border-radius: 2rem;
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
.btn-outline-primary:hover {
    color: #fff !important;
    background-color: #133CBA;
    border-color: #133CBA;
}
.card-info{
    margin-top: 2px;
    padding: 10px;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
</style>
