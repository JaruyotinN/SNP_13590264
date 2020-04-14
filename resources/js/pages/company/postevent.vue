<template>
<div class="container"  >
  <div  v-for="(info, index) in infos" :key="index" >
  <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
    <ColumHeader title='บริษัท ไลค์มี จำกัด' showBack="company" img="/uploads/images/comevents/likeme.jpg"/>
    <div class="card mt-5">
                <div class="col-md-12 mt-2">
                 <ColumHeader  title='สร้างแบบฟอร์ม'/>
                 <div class="row" style="padding:20px;">
                        <div class="col-md-6" >

                           <input class="form-control" type="hidden" v-model="form.com_id = info.company.id">
                            <p>บริษัท</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" type="text" v-bind:value="info.name" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>หน่วยงาน / แผนก</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" v-model="form.division" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>ผู้ดูแล</p>
                             <div class="input-group mt-2 mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>เลือกผู้ดูแล</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                             </div>
                        </div>

                        <div class="col-md-4">
                            <p>จำนวน</p>
                             <div class="input-group mt-2 mb-3">
                                <select v-model="form.quantity" class="custom-select" id="inputGroupSelect01">
                                    <option selected>จำนวน</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                             </div>
                        </div>
                
                        <div class="col-md-4">
                            <p>วันปิดรับ</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" v-model="form.enddate" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>หมวดหมู่ที่เกี่ยวข้อง ID: {{ form.job_id }}</p>
                            <div class="mt-2 mb-3">
                               <ul class="ks-cboxtags">
                                  <div class="" v-for="(job, index) in jobs" :key="index">
                                     <li><input :id="job.id" type="checkbox" :value="job.id" v-model="form.job_id"><label :for="job.id" >{{job.title}}</label></li>
                                  </div>
                               </ul>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <p>ตำแหน่งที่ต้องการ ID :  {{ form.requirement }}</p>
                            <div class="mt-2 mb-3 overflow-auto" style="height:200px;">

                              <ul class="ks-cboxtags">
                               <div class="" v-for="(job, index) in jobs" :key="index">
                                  <div class="" v-for="(type, index) in job.jobtypes" :key="index">
                                      <div class="" v-for="(catagory, index) in form.job_id.length" :key="index">
                                        <div  v-if="type.job_id == form.job_id[index]">
                                          <li><input :id="type.name" type="checkbox" :value="type.name" v-model="form.requirement"><label :for="type.name" >{{type.name}}</label></li>
                                            <!-- <input class="typestyle" type="checkbox" :value="type.id" v-model="form.requirement" >
                                            <label>{{type.name}}</label> -->
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p>ประวัติและผลงาน</p>
                            <div class="mt-2 mb-3">
                               <textarea v-model="form.desciption" rows="4" cols="100">

                                </textarea>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <p>ประวัติและผลงาน</p>
                            <div class="mt-2 mb-3">
                                <div class>
                                  <input class="form-control" type="file" name="image" @change="setImg" />
                                  <has-error :form="form" field="image" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <div class="btn-detail-style btn-primary mt-3 mb-3" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <p>คำถามเด็กฝึกงาน 01</p>
                            </div>
                        </div>
                            <div class="collapse" id="collapseExample">
                            <p>Q1</p>
                            <textarea v-model="form.question1" rows="4" cols="100">

                            </textarea>
                            <p>Q2</p>
                            <textarea v-model="form.question2" rows="4" cols="100">

                            </textarea>
                          </div>

                </div>
               
        </div>   <!-- card -->
        <div class="form-group row">
          <div class="col-md-7 offset-md-5 d-flex">
            <!-- Submit Button -->
            <v-button
            
              :loading="form.busy"
              id="createbtn"
              style="width:130px;"
              class="text-white colorr"
            >บันทึก</v-button>
          </div>
        </div>
    </div>
    
  </form>
  </div>
</div>
</template>
<script>
import ColumHeader from '~/components/ColumHeader';
import Form from "vform";
import {mapActions, mapGetters} from 'vuex'
export default {
  middleware: 'auth',
  data: () => ({
    form: new Form({
      division:'',
      desciption:'',
      quantity:'',
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
    }),
  components:{
    ColumHeader,
  },
  computed:{
    ...mapGetters({
      infos:'profile/userinfos',
      jobs: 'comevents/jobs'
    })
  },
 methods: {
    setImg(e) {
      this.image = e.target.files[0];
    },
    submitForm() {
        this.save();
    },
    getData() {
        axios.get('/some-url')
            .then(data => {
                this.form.com_id = data.email;
            });
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
      fetchjob : 'comevents/fetchjob'
    })
  },
  created(){
     this.fetch()
     this.fetchjob()
  }
}
</script>

<style scoped>

.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
   
}
.form-control{
    border-radius: 2rem;
}
.btn-detail-style .btn-primary{ 
    background-color: #0047BA ;
    border:none; 
    border-radius: 30px;
    width: 100%;
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
.custom-select{
    border-radius: 2rem !important;
}

/* //toggle botton */
ul.ks-cboxtags {
    list-style: none;
}
ul.ks-cboxtags li{
  display: inline;
  float: left;
}
ul.ks-cboxtags li label{
    display: inline-block;
    background-color: rgba(255, 255, 255, .9);
    border: 2px solid rgba(139, 139, 139, .3);
    color: #adadad;
    border-radius: 25px;
    white-space: nowrap;
    margin: 5px 0px 5px 0px;
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
    border: 2px solid #1bdbf8;
    background-color: #12bbd4;
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
  border: 2px solid #e9a1ff;
}
</style>
