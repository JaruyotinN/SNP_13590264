<template>
   <div class="container" >
          <ColumHeader :title="comevent.company.name" showBack="student" :img="comevent.company.logo"/> 
      <div class="row">
          <div class="col-md-12">
            <div class="row">

                <div class="col-md-6">
                    <div class="mt-4">
                        <div class="radio-img d-flex">
                        <img :src="comevent.img" center alt="..." class="card-img-top"/>
                    </div>
                    </div>
                </div>
              
                <div class="col-md-6" >
                    <div class="card mt-4">
                        <div class="col-12">
                              <div class="card-info">
                                <h4 class="bold mt-3 color-blue">ข้อมูลประกาศรับสมัครฝึกงาน</h4>
                                <lable>โครงการ : </lable><label class="bold"> &nbsp {{ comevent.division }}</label><br>
                                <label>จำนวนที่เปิดรับ อัตรา/ตำแหน่ง: </label><label class="bold"> &nbsp{{ comevent.quantity }}</label><br>
                                <label>เวลาปฏิบัติงาน : </label><label class="bold"> &nbsp {{comevent.jobtime}}</label><br>
                                <label>ค่าตอบแทน : </label><label class="bold"> &nbsp {{comevent.reward}}</label><br>
                                <label>วันปิดรับสมัคร :</label> <label class="bold"> &nbsp {{comevent.enddate}}</label>
                                <label>สถานที่บริษัท : {{ comevent.company.address }}</label>
                                <hr class="hr-orange mt-3 mb-3">
                                <h5 class="bold">รายละเอียดเพิ่มเติม</h5>
                                <p>&nbsp&nbsp{{ comevent.desciption }}</p>
                              </div> 
                          </div>
                    </div>
                </div>
            </div>

          <div class="card mt-4">
              <div class="card-info">
                  <h5 class="bold mt-4 center">ตำแหน่งที่ต้องการสมัคร</h5>
                    <div class="col-md-10 m-auto">
                    <input class="form-control" type="hidden" v-model="comeventjob = comevent.requirement.split(',')">  
                    <hr class="hr-orange">
                    <div class="center">
                       <div class="form-check-inline" v-for="(job, index) in comeventjob" :key="index" >
                          <label class="form-check-label mt-3 mb-3">
                            <input type="radio" class="form-check-input" :value="job" v-model="form.jobtype">{{job}}
                          </label>
                       </div>
                    </div>
                    </div>
              </div> 
          </div>
          <div class="card mt-4">
              <div class="card-info">
                  <h5 class="bold mt-4 center">คำถาม / โจทย์งาน ถึงนักศึกษาที่สมัครฝึกงาน(1)</h5>
                    <div class="col-md-10 m-auto">
                        <hr class="hr-orange">
                         <div class="form-group">
                         <p>{{ comevent.question1 }}</p>
                        <textarea class="form-control" v-model="form.question1" rows="3" required></textarea>
                        </div>         
                    </div>
              </div> 
          </div>
          <div class="card mt-4">
              <div class="card-info">
                  <h5 class="bold mt-4 center">คำถาม / โจทย์งาน ถึงนักศึกษาที่สมัครฝึกงาน(2)</h5>
                    <div class="col-md-10 m-auto">
                        <hr class="hr-orange">
                         <div class="form-group">
                         <p>{{ comevent.question2 }}</p>
                        <textarea class="form-control" v-model="form.question2" rows="3" required></textarea>
                        </div>         
                    </div>
              </div> 
          </div>
        <div  v-for="(info, index) in infos" :key="index">
            <input class="form-control" type="hidden" v-model="form.course_id = info.student.course.id">
            <input class="form-control" type="hidden" v-model="form.stu_id = info.student.id"> 
        </div>
         <input class="form-control" type="hidden" v-model="form.com_id = comevent.com_id">  
              <div class="mt-3 mb-3 center">
                <button class="btn-outline-primary bold" @click="cheack()">
                  ส่งคำร้องขอสมัครฝึกงาน
                </button>
						  </div>
            </div>
      </div>
  </div>
</template>

<script>
import ColumHeader from '~/components/ColumHeader'
import {mapActions, mapGetters} from 'vuex'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

export default {
  middleware: 'auth',
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      comevent:'comevents/show',
      infos:'profile/userinfos',
    })
  },
data() {
  return {
    form:{
      question1:'',
      question2:'',
      jobtype:'',
      course_id:'',
      event_id:'',
      stu_id:'',
      com_id:'',
    },
    comeventjob:'',

    }
},
  components:{
    ColumHeader,
  },
  methods: {
    ...mapActions({
      fetch:'comevents/show',
      join:'comevents/join',
      fetchprofile:'profile/fetch',
    }),
    cheack(){
     Swal.fire({
    title: 'ยืนยันการสมัครฝึกงาน',
    text: "หากยืนยันแล้วจะไม่สามารถแก้ไขได้",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'ยกเลิก',
    confirmButtonText: 'ยืนยันการสมัคร',
    }).then((result) => {
      if (result.value) {
        this.confirmJoin()
        Swal.fire(
          'สมัครการฝึกงานเรียบร้อย',
          'ผลการสมัครของคุณอยู่ในสถานะฝึกงาน',
          'success',
        )
      }
    })
   },
    async confirmJoin(){
      this.form.event_id = this.comevent.id
      await this.join(this.form)
      this.$router.push({name:'status'})
    }
  },
  created(){
    this.fetch(this.id),
    this.fetchprofile()
  },

}
</script>
<style scoped>
/* .btn-detail-style .btn-primary{ 
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
} */
.btn-outline-primary {
    width: 40% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
}
textarea {
  padding : 1.5rem;
  overflow: auto;
  box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
  border-radius: 5px;
  outline: none !important; 
}
.radio-img{
  box-sizing: border-box;
  border-radius: 5px;
  overflow: hidden;
  box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
}
.radio-img img {
    width: 100%;
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

/* cheackbox */
.form-check-inline {
    padding-left: 1rem;
}

</style>