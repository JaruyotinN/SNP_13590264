<template>
<div class="card mt-4">
   <div class="card-info">
      <form @submit.prevent="check" @keydown="form.onKeydown($event)">
          <h5 class="bold mt-4 center">ยืนยันข้อมูลผู้ดูแลการฝึกงาน</h5>
          <div class="col-md-10 m-auto">
              <div class="row">   
                  <div class="col-md-6">
                      <h>บริษัท</h>
                      <div class="mt-2 mb-3">
                      <input class="form-control" type="text" placeholder="Comapany" value="บริษัท ไลค์มี จำกัด">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <h>หน่วยงาน</h>
                      <div class="mt-2 mb-3">
                      <input class="form-control" type="text" placeholder="Comapany" value="Future Trends">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <h>ผู้ดูแล</h>
                      <div class="mt-2 mb-3">
                      <input class="form-control" type="text" placeholder="Comapany" value="นางโลเล็ม ยิปซั่ม">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <h>ตำแหน่งผู้ดูแล</h>
                      <div class="mt-2 mb-3">
                      <input class="form-control" type="text" placeholder="Comapany" value="Content Creator">
                      </div>
                  </div>
              </div>
              <div class="" v-for="(user, index) in users" :key="index" :class="{ active: index == 0 }">
                  <p>stu : id {{user.student.id}}</p> <input class="form-control" type="hidden" v-model="form.id = user.student.id">
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
      // if (data) {
      //   this.$router.push({
      //     name: "admin.item.show",
      //     params: { id: this.show.id }
      //   });
      // }
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
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
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
