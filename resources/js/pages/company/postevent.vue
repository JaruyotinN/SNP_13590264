<template>
<div class="container" >
  <div  v-for="(info, index) in infos" :key="index" >
  <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
      <div class="mb-5"> 
        <router-link :to="{ name: 'company'}">ย้อนกลับ</router-link>
     </div>
      <div class="col-md-12">
          <div class="row">
                <div class="col-md-10">
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mt-4 bold">{{info.company.name}}</h4>
                    </div>
                </div>
                <div class="col-md-2">
                   <div class="img-circle" style="float:right;">
                            <img :src="info.company.logo">
                    </div>
                </div>
          </div>
      </div>
      <hr class="hr-yellow">
          <div class="card mt-5 mb-3">
                <div class="col-md-10 m-auto">
                        <h4 class="mb-5 mt-5 bold">สร้างแบบฟอร์มประกาศรับนักศึกษาฝึกงาน</h4>   
                    <hr class="hr-orange">
                </div>
                <div class="col-md-10 mt-2 m-auto">
                   <div class="row" style="padding:20px;">
                     <input class="form-control" type="hidden" v-model="form.com_id = info.company.id">
                        <div class="col-md-6">
                            <p>ชื่อประกาศ / โครงการ</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" v-model="form.division" type="text" placeholder="ชื่อโครงการของคุณ" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>ผู้ดูแลโครงการ</p>
                            <div class="input-group mt-2 mb-3">
                            <select class="custom-select " v-model="form.staff_id" required>
                              <option value="" disabled hidden>โปรดสร้างผู้ดูแลโครงการ เพื่อสร้างแบบฟอร์ม</option>
                              <option v-if="staffs != null" v-for="(staff, index) in staffs" :key="index" :value="staff.id">{{staff.career}} | คุณ{{staff.name}} {{staff.surname}}</option>
                            </select>
                             </div>
                        </div> 
                                     
                        <div class="col-md-4">
                            <p>ปิดรับสมัคร</p>
                            <div class="mt-2 mb-3">
                               <transition name="calendar-fade">
                                  <date-picker color="#E7B223"
                                              @close="show = false"
                                              v-if="show"
                                              v-model="form.enddate">
                                              </date-picker>
                                </transition>
                                   <div class="input-group">
                                        <input class="form-control py-2 border-right-0 border" type="text" @focus="show = true" v-model="form.enddate" required>
                                        <span class="input-group-append">
                                            <div class="input-group-text bg-transparent form-control"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
                                        </span>
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <p>เวลาเริ่มปฏิบัติงาน</p>
                            <div class="input-group mt-2 mb-3" >
                                <datetime  
                                value-zone="Asia/Bangkok"
                                zone="Asia/Bangkok"
                                format="HH:mm"
                                placeholder="เวลาเริ่มปฏิบัติงาน"
                                type="time" v-model="form.strtime" input-class="form-control" style="border-radius: 2rem !important; ">
                                </datetime>
                             </div>
                        </div>
                        
                        <div class="col-md-4">
                            <p>เวลาจบปฏิบัติงาน</p>
                            <div class="input-group mt-2 mb-3" >
                                <datetime  
                                value-zone="Asia/Bangkok"
                                zone="Asia/Bangkok"
                                format="HH:mm"
                                placeholder="เวลาจบปฏิบัติงาน"
                                type="time" v-model="form.endtime" input-class="form-control" style="border-radius: 2rem !important; ">
                                </datetime>
                             </div>
                        </div>

                        <div class="col-md-4">
                            <p>อัตราที่รับนักศึกษา / ตำแหน่ง</p>
                             <div class="mt-2 mb-3">
                                <select v-model="form.quantity" class="custom-select" id="inputGroupSelect01" required>
                                    <option value="" disabled hidden>เลือกจำนวนที่ต้องการ</option>
                                    <option value="1">1 อัตรา/ตำแหน่ง</option>
                                    <option value="2">2 อัตรา/ตำแหน่ง</option>
                                    <option value="3">3 อัตรา/ตำแหน่ง</option>
                                    <option value="4">4 อัตรา/ตำแหน่ง</option>
                                    <option value="5">5 อัตรา/ตำแหน่ง</option>
                                    <option value="หลายอัตรา">รับหลายอัตรา</option>
                                </select>
                             </div>
                        </div>

                          <div class="col-md-4">
                            <p>ค่าตอบแทน</p>
                            <div class="mt-2 mb-3">
                                   <select v-model="form.havereward" class="custom-select" id="inputGroupSelect01" required>
                                    <option value="" disabled hidden>เลือกค่าตอบแทน</option>
                                    <option value="1">มีค่าตอบแทน</option>
                                    <option value="0">ไม่มีค่าตอบแทน</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4" v-if="form.havereward == 1 ">
                            <p>อัตราค่าตอบแทน</p>
                             <div class="mt-2 mb-3">
                                <div class="row">
                                  <input class="form-control col-md-6" v-model="form.reward" type="number" placeholder="ค่าตอบแทน" required>
                                    <select v-model="form.formreward" class="ml-3 custom-select col-md-4" id="inputGroupSelect01" required>
                                    <option value="" disabled hidden>หน่วย</option>
                                    <option value="/ ต่อวัน">/ ต่อวัน</option>
                                    <option value="/ ต่อสัปดาห์">/ ต่อสัปดาห์</option>
                                    <option value="/ ต่อเดือน">/ ต่อเดือน</option>
                                    <option value="/ การฝึกงาน">/ การฝึกงาน</option>
                                </select>
                               </div>
                             </div>
                        </div>
   
                        <div class="col-md-12 mt-3">
                            <p>หมวดหมู่ที่เกี่ยวข้อง</p>
                            <div class="mt-2 mb-3">
                               <ul class="ks-cboxtags ">
                                  <div  v-for="(job, index) in jobs" :key="index">
                                     <li><input :id="job.id" type="checkbox" :value="job.id" v-model="form.job_id"><label :for="job.id" >{{job.title}}</label></li>
                                  </div>
                               </ul>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <p>ตำแหน่งที่ต้องการ</p>
                            <div class="mt-2 mb-3 overflow-auto customebox" style="height:200px;">
                              <ul class="ks-cboxtags">
                               <div class="" v-for="(job, index) in jobs" :key="index">
                                  <div class="" v-for="(type, index) in job.jobtypes" :key="index">
                                      <div class="" v-for="(catagory, index) in form.job_id.length" :key="index">
                                        <div  v-if="type.job_id == form.job_id[index]">
                                          <li><input :id="type.name" type="checkbox" :value="type.name" v-model="form.requirement"><label :for="type.name" >{{type.name}}</label></li>
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p>รายละเอียดเพิ่มเติมเกี่ยวกับประกาศฝึกงาน</p>
                            <div class="mt-2 mb-3">
                               <textarea v-model="form.desciption" rows="4" cols="100" required>
                                </textarea>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <p>คำถาม / โจทย์งาน ถึงนักศึกษาที่สมัครฝึกงาน(1)</p>
                            <div class="mt-2 mb-3">
                               <textarea v-model="form.question1" rows="4" cols="100" required>
                                </textarea>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <p>คำถาม / โจทย์งาน ถึงนักศึกษาที่สมัครฝึกงาน(2)</p>
                            <div class="mt-2 mb-3">
                               <textarea v-model="form.question2" rows="4" cols="100" required>
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p>ภาพประกาศรับนักศึกษาฝึกงาน</p>
                            <div class="input-group mb-3">

                                <input class="form-control custom-file-input" type="file" name="image" @change="setImg">
                                <label class="custom-file-label" >{{image.name}}</label>
                                <has-error :form="form" field="image" />
                            </div>
                            
                        </div>

                </div>
               
        </div>   <!-- col-md-12 -->
        </div> <!-- card -->
         <div class="col-md-6 m-auto">
            <button class="btn-outline-primary bold mb-3" :loading="form.busy">
                สร้างแบบฟอร์มประกาศรับนักศึกษาฝึกงาน
            </button>
         </div>
    
  </form>
  </div>
</div>
</template>
<script>
import ColumHeader from '~/components/ColumHeader';
import Form from "vform";
import DatePicker from 'vue-md-date-picker'
import { Datetime } from 'vue-datetime';
import 'vue-datetime/dist/vue-datetime.css'

import {mapActions, mapGetters} from 'vuex'
export default {
  middleware: 'auth',
  data: () => ({
    form: new Form({
      division:'',
      desciption:'',
      quantity:'',
      strtime:'',
      endtime:'',
      staff_id:'',
      havereward:'',
      reward:'',
      formreward:'',
      job_id:[],
      requirement:[],
      img: "",
      question1:'',
      question2:'',
      invite:5,
      enddate:'',
      com_id:'',
      }),
      image: "",
      show:'',
    }),
  components:{
    ColumHeader,
    DatePicker,
    datetime: Datetime,
  },
  computed:{
    ...mapGetters({
      infos:'profile/userinfos',
      jobs: 'jobs/jobs',
      staffs: 'comevents/staffs',
    })
  },
 methods: {
    setImg(e) {
      this.image = e.target.files[0];
    },
    submitForm() {
        this.save();
    },
    async save() {
      this.form.img = await this.upImg({
        image: this.image,
        path: "comevents"
      });

      this.form.job_id = this.form.job_id.join();	
      this.form.requirement = this.form.requirement.join();	
     
      const { data } = await this.form.post("/api/comevents");

      if (data) {
        this.$router.push({
          name: "company",
        });
      }
    },
    
    ...mapActions({
      fetch:'profile/fetch',
      fetchjob : 'jobs/fetchjob',
      fetchstaffs : 'comevents/fetchstaffs',
    })
  },
  created(){
     this.fetch()
     this.fetchjob()
     this.fetchstaffs()
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
.img-circle{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden; 
    float: left;
}
.img-circle img{
    width: 100%;
}
.customebox{
  border-radius: 5px;
  background-color: #F5F5F5;
}
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
   
}
.form-control{
    border-radius: 2rem !important;
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
.input-group-append{
    right: 0;
    position: absolute;
}
/* //toggle botton */
ul.ks-cboxtags {
    list-style: none;
}
ul.ks-cboxtags li{
  float: left;
}
ul.ks-cboxtags li label{
    display: inline-block;
    background-color: rgba(255, 255, 255, .9);
    border: 2px solid rgba(139, 139, 139, .3);
    color: #adadad;
    border-radius: 2rem;
    white-space: nowrap;
    margin: 5px 5px 5px 5px;
    font-size: 0.75rem;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    transition: all .2s;
}

ul.ks-cboxtags li label {
    padding: 8px 12px;
    cursor: pointer;
}

ul.ks-cboxtags li label::before {
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 12px;
    padding: 2px 6px 2px 2px;
    content: "\f067";
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
    content: "\f00c";
    transform: rotate(-360deg);
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label {
    border: 2px solid #133CBA;
    background-color: #133CBA;
    color: #fff;
    transition: all .2s;
}
ul.ks-cboxtags li input[type="checkbox"] {
  display: absolute;
}
ul.ks-cboxtags li input[type="checkbox"] {
  position: absolute;
  opacity: 0;
}
ul.ks-cboxtags li input[type="checkbox"]:focus + label {
  border: 2px solid #FFB105;
}

</style>
