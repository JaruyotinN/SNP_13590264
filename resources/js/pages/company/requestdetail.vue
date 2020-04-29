<template>
   <div class="container" >    
        <div class="mb-3"> 
              <router-link :to="{ name: 'internrequest'}">ย้อนกลับ</router-link>
              </div>
              <div class="row">
                  <div class="col-md-10">
                      <div class="mb-3 ml-3 mt-2">
                          <h4 class="mb-2 bold">ข้อมูลของนักศึกษา</h4>
                      </div>
                  </div>
              </div>
              <hr class="hr-yellow" >
            <div class="row">
            <div class="col-md-4"  >
                    <div class="mt-4">
                        <div class="radio-img d-flex">
                        <img src="/uploads/images/comevents/user.png" v-if="showstudent.student.img == null" center alt="..." class="card-img-top"/>
                        <img v-else :src="showstudent.student.img" center alt="..." class="card-img-top"/>
                    </div>
                    </div>
              </div>
             <div class="col-md-8" >
                    <div class="card mt-4">
                        <div class="col-12">
                              <h5 class="bold mt-3 mb-3 color-blue">ข้อมูลของนักศึกษาฝึกงาน</h5>
                              <label>ชื่อ : </label><label class="bold"> &nbsp{{ showstudent.student.name }} {{ showstudent.student.surname }}</label><br>
                              <label>ตำแหน่งที่สมัคร : </label><label class="bold"> &nbsp{{ showstudent.jobtype }}</label><br>
                              <label>หลักสูตร : </label><label class="bold"> &nbsp{{ showstudent.student.course.name }} </label><label class="smalltext">&nbsp({{showstudent.student.course.description}})</label><br>
                              <label>ช่วงเวลาที่สามารถฝึกงาน : </label><label class="bold"> &nbsp{{moment(showstudent.student.course.start_date)}} - {{moment(showstudent.student.course.end_date)}} </label>
                              <hr class="hr-blue">
                              <label>มหาวิทยาลัย : </label><label class="bold"> &nbsp{{ showstudent.student.major.faculty.university.name }}</label><br>
                              <label>คณะ : </label><label class="bold"> &nbsp{{ showstudent.student.major.faculty.name }}</label><br>
                              <label>สาขา : </label><label class="bold"> &nbsp{{ showstudent.student.major.name }}</label><br>
                              <label>เบอร์ติดต่อ : </label><label class="bold"> &nbsp{{ showstudent.student.phonenumber }}</label><br>
                              <label>ที่อยู่ : {{ showstudent.student.address }}</label>
                          </div>
                    </div>
                </div>
                </div>
        
                 <div class="card mt-4">
                  <div class="card-info">
                  <h5 class="bold mt-4 center">คำถาม / โจทย์งาน ถึงนักศึกษาที่สมัครฝึกงาน(1)</h5>
                    <div class="col-md-10 m-auto"> 
                         <h5 class="center mt-2" >{{showstudent.comevent.question1}}</h5>
                        <hr class="hr-orange">
                         <div class="form-group">
                         <p>{{ showstudent.question1 }}</p>
                        </div>         
                    </div>
              </div> 
            </div>
             <div class="card mt-4">
                  <div class="card-info">
                  <h5 class="bold mt-4 center">คำถาม / โจทย์งาน ถึงนักศึกษาที่สมัครฝึกงาน(2)</h5>
                    <div class="col-md-10 m-auto"> 
                         <h5 class="center mt-2" >{{showstudent.comevent.question2}}</h5>
                        <hr class="hr-orange">
                         <div class="form-group">
                         <p>{{ showstudent.question2 }}</p>
                        </div>         
                    </div>
              </div> 
            </div>
            <form class="was-validated" @submit.prevent="update" @keydown="form.onKeydown($event)">
            <div class="card mt-4">
              <div class="col-md-10  m-auto"> 
                  <div class="card-info">
                  <div class="row mt-3 mb-3">
                    <div class="col-md-3 m-auto " > 
                         <p>มีการสอบสัมภาษณ์</p>
                        <input class="tgl tgl-flat" id="cb4" type="checkbox"  v-model="form.interview"/>
                        <label class="tgl-btn" for="cb4"></label> 
                     </div>
                     <div class="col-md-8 m-auto">
                       <p>อัพเดตสถานะ</p>
                          <select class="custom-select" v-model="form.result" required> 
                            <option value="0">รอการพิจารณา</option>
                            <option value="1">ต้องการให้มาสัมภาษณ์</option>
                            <option value="2">อยู่ในการพิจารณา</option>
                            <option value="3">ผ่าน</option>
                            <option value="99">ไม่ผ่าน</option>
                          </select>
                     </div>
                     </div>
                  </div>
              </div> 
            </div>
           
            
          <label>inputinterview: {{form.interview}} , inputresult: {{ form.result }}</label> 
           <div class="btn-detail-style mt-3 mb-3">
                <button class="btn btn-primary bold" 
                :loading="form.busy">
                  ยืนยันการพิจารณา
                </button>
					</div>
           </form>
  </div>
</template>

<script>
import ColumHeader from '~/components/ColumHeader'
import {mapActions, mapGetters} from 'vuex'
import * as moment from 'moment';
import Form from "vform";

export default {
  middleware: 'auth',
  
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      showstudent:'comevents/showstudent_join',
    })
  },
data: () => ({
    form: new Form({
      interview:0,
      result:'',
      get:2,
    }),
  }),
  components:{
    ColumHeader,

  },
  methods: {
    moment: function (value) {
          return moment(String(value)).format('L')
      },
    ...mapActions({
      fetch:'comevents/showjoin',
    }),
  //   cheack(){
  //     this.update();
  //  },
    // async update(id){
    //   // this.form.event_id = this.comevent.id
    //   await this.update(this.form , id)
    //   // this.$router.push({name:'showstudentrequest'})
    // },
    
    async update() {

      const { data } = await this.form.put(`/api/update/${this.id}`);
      
      if (data) {
        this.$router.push({
          name: "internrequest",
        });
      }
    },
  },
  created(){
    this.fetch(this.id)
  }
}
</script>

<style scoped>
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
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
.radio-img{
  box-sizing: border-box;
  border-radius: 5px;
  overflow: hidden;
  box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
}
.radio-img img {
    width: 100%;
}
.smalltext{
  font-size: 0.65rem;
  color:rgb(171, 171, 171);
}

/* cheackbox */

.tgl {
  display: none;
}
.tgl, .tgl:after, .tgl:before, .tgl *, .tgl *:after, .tgl *:before, .tgl + .tgl-btn {
  box-sizing: border-box;
}
.tgl::-moz-selection, .tgl:after::-moz-selection, .tgl:before::-moz-selection, .tgl *::-moz-selection, .tgl *:after::-moz-selection, .tgl *:before::-moz-selection, .tgl + .tgl-btn::-moz-selection {
  background: none;
}
.tgl::selection, .tgl:after::selection, .tgl:before::selection, .tgl *::selection, .tgl *:after::selection, .tgl *:before::selection, .tgl + .tgl-btn::selection {
  background: none;
}
.tgl + .tgl-btn {
  outline: 0;
  display: block;
  width: 4em;
  height: 2em;
  position: relative;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.tgl + .tgl-btn:after, .tgl + .tgl-btn:before {
  position: relative;
  display: block;
  content: "";
  width: 50%;
  height: 100%;
}
.tgl + .tgl-btn:after {
  left: 0;
}
.tgl + .tgl-btn:before {
  display: none;
}
.tgl:checked + .tgl-btn:after {
  left: 50%;
}
.tgl-flat + .tgl-btn {
  padding: 2px;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
  background: #fff;
  border: 4px solid #f2f2f2;
  border-radius: 2em;
}
.tgl-flat + .tgl-btn:after {
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
  background: #f2f2f2;
  content: "";
  border-radius: 1em;
}
.tgl-flat:checked + .tgl-btn {
  border: 4px solid #7FC6A6;
}
.tgl-flat:checked + .tgl-btn:after {
  left: 50%;
  background: #7FC6A6;
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