<template>
<div class="container" >
  <div  v-for="(info, index) in infos" :key="index" >
  <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
      <div class="mb-5"> 
        <router-link :to="{ name: 'calendar'}">ย้อนกลับ</router-link>
     </div>

          <div class="card mt-5 mb-3">
                <div class="col-md-10 m-auto">
                        <h4 class="mb-5 mt-5 bold">สร้างข้อมูลประกาศปฏิทินฝึกงานของนักศึกษา</h4>   
                    <hr class="hr-orange">
                </div>
                <div class="col-md-10 mt-2 m-auto">
                   <div class="row" style="padding:20px;">
 

                           <div class="col-md-4">
                            <p class="bold color-blue" >วันเริ่มหลักสูตรฝึกงานของนักศึกษา</p>
                            <div class="mt-2 mb-3">
                               <transition name="calendar-fade">
                                  <date-picker color="#E7B223"
                                              @close="show = false"
                                              v-if="show"
                                              v-model="form.start_date">
                                              </date-picker>
                                </transition>
                                   <div class="input-group">
                                        <input class="form-control py-2 border-right-0 border" type="text" @focus="show = true" v-model="form.start_date" required>
                                        <span class="input-group-append">
                                            <div class="input-group-text bg-transparent form-control"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
                                        </span>
                                    </div>
                            </div>
                        </div>
                        <div v-for="(info, index) in infos" :key="index">
                             <input class="form-control" type="hidden" v-model="form.faculty_id = info.teacher.faculty_id">
                              <input class="form-control" type="hidden" v-model="form.uni_id = info.teacher.uni_id">
                        </div>
                         <div class="col-md-4">
                            <p class="bold color-blue" >วันจบหลักสูตรฝึกงานของนักศึกษา</p>
                            <div class="mt-2 mb-3">
                               <transition name="calendar-fade">
                                  <date-picker color="#133CBA"
                                              @close="show2 = false"
                                              v-if="show2"
                                              v-model="form.end_date">
                                              </date-picker>
                                </transition>
                                   <div class="input-group">
                                        <input class="form-control py-2 border-right-0 border" type="text" @focus="show2 = true" v-model="form.end_date" required>
                                        <span class="input-group-append">
                                            <div class="input-group-text bg-transparent form-control"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
                                        </span>
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="bold color-blue" >เนื้อหาประกาศปฏิทินฝึกงานของนักศึกษา</p>
                            <div class="mt-2 mb-3">
                               <textarea v-model="form.description" rows="2" cols="100" required>
                                </textarea>
                            </div>
                        </div>
                </div>
               
        </div>   <!-- col-md-12 -->
        </div> <!-- card -->
         <div class="col-md-6 m-auto">
            <button class="btn-outline-primary bold mb-3" :loading="form.busy">
               สร้างข้อมูลประกาศปฏิทินฝึกงาน
            </button>
         </div>
    
  </form>
  </div>
</div>
</template>
<script>
import Form from "vform";
import {mapActions, mapGetters} from 'vuex'
import DatePicker from 'vue-md-date-picker'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

export default {
  middleware: 'auth',
  data: () => ({
    form: new Form({
      id:'',
      description:'',
      start_date:'',
      end_date:'',
      faculty_id:'',
      uni_id:'',
      }),
      show:'',
      show2:'',
    }),
  components:{
    DatePicker,
  },
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      infos:'profile/userinfos',
      calendar : 'teacher/showcalendar'
    })
  },
 methods: {
    submitForm() {
        Swal.fire({
        title: 'ยืนยันแก้ไขข้อมูล',
        text: "ต้องการแก้ไขข้อมูลประกาศปฏิทินฝึกงานของนักศึกษา",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ยืนยันแก้ไข'
        }).then((result) => {
        if (result.value) {
         this.save();
            Swal.fire(
          'แก้ไขเรียบร้อย',
          'ทำการแก้ไขข้อมูลประกาศปฏิทินฝึกงานของนักศึกษา',
          'success',
            )
        }
        })  
         
    },
    async save() {
      
      const { data } = await this.form.put(`/api/calendar/${this.form.id}`);

      if (data) {
        this.$router.push({
          name: "calendar",
        });
      }
    },
    
    ...mapActions({
      fetch:'profile/fetch',
      fetchcalendar:'teacher/showcalendar',
    })
  },
   async  created(){
     await this.fetch()  
     await this.fetchcalendar(this.id),
     this.form.keys().forEach(key => {
     this.form[key] = this.calendar[key]
    })
  }
}
</script>

<style scoped>
textarea {
  width: 100%;
  overflow: auto;
  padding : 1.5rem;
  box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
  border-radius: 5px;
  outline: none !important; 
  border:none;
}
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
   
}
.form-control{
    border-radius: 2rem;
}
.btn-outline-primary {
    width: 70% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
    margin-left:auto;
    margin-right:auto;
    display:block;
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
