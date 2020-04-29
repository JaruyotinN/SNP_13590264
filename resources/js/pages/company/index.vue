<template>
<div class="container" >
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 ml-3 mt-2" style="float: left">
                    <h4 class="mb-2 bold">ค้นหาเด็กฝึกงาน</h4>
                </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="row" v-for="(info, index) in infos" :key="index">
                <div class="col-6">
                 <router-link :to="{name:'postevent', params:{id:info.id }}">
                   <div class="btn btn-outline-warning bold">สร้างข้อมูลพนักงาน</div>
                </router-link>
                </div>
                 <div class="col-6">
                 <router-link :to="{name:'postevent', params:{id:info.id }}">
                   <div class="btn btn-outline-primary bold">สร้างแบบฟอร์มฝึกงาน</div>
                </router-link>
                 </div>
              </div>
            </div>  
             
            <div class="col-md-12">
                <form class="was-validated"  @submit.prevent="search" @keydown="form.onKeydown($event)">
                     <div class="input-group mt-2 mb-3 m-auto">
                        <select class="custom-select col-md-3 m-auto" v-model="form.job_id" required>
                            <option value="" disabled hidden>เลือกหมวดหมู่การฝึกงาน</option>
                            <option v-for="(job, index) in jobs" :key="index" :value="job.id">{{job.title}}</option>
                        </select>
                       <select class="custom-select col-md-3 m-auto" v-model="form.jobtypes_id" required>
                             <option value="" disabled hidden>เลือกตำแหน่งการฝึกงาน</option>
                             <option v-for="(type, index) in types" :key="index" :value="type.id" v-if="form.job_id == type.job_id">{{type.id}}{{type.name}}</option>
                        </select>
                        <select class="custom-select col-md-3 m-auto" v-model="form.score">
                            <option value="" disabled hidden >เลือกระดับความถนัด</option>
                            <option value="1">01 เริ่มต้น(Beginning)</option>
                            <option value="2">02 พื้นฐาน(Basic)</option>
                            <option value="3">03 เชี่ยวชาญ(Advance)</option>
                        </select>   
                        <div class="m-auto col-md-2">
                            <button class="btn btn-detail-style  bold" :loading="form.busy">
                              ค้นหา
                            </button>
                        </div> 
                    </div> 
                </form>
                    <hr class="hr-yellow mt-4 mb-4">   
                   
                    <div class="row">
                
                      <!-- <pre>   {{users}}</pre> -->
              <div class="col-md-12" v-for="(stu, index) in users" :key="index">
               
      	        <div class="card mt-3 mb-2"> 
                  <div class="row">
                      <div class="col-md-6">
                            <div class="img-circle mb-3 ml-3 mt-2 float: left">
                               <img src="/uploads/images/comevents/user.png" v-if="stu.img == null"/>
                              <img v-else :src="stu.img" >
                            </div>
 
                            <div class="mb-3 mt-2 ml-3" style="float: left">
                              <div class="f-1 bold m-0">
                                <label class="color-blue">{{stu.name}} {{stu.surname}} </label>
                                <label>|</label>
                                <label >{{stu.university.name}}</label>
                              </div>
                              <div class="f-075 m-0">
                                  <label>{{stu.faculty.name}} </label>
                                  <label>สาขา </label>
                                  <label>{{stu.major.name}}</label>
                                    <div  class="d-flex">
                                      <!-- <pre>{{stu.score}}</pre> -->
                                      <label v-for="(sc, index) in stu.score" :key="index" class="mr-1">{{sc.types.name}}({{sc.score}}) </label>
                                    </div>
                              </div>

                            </div>   
                      </div>
                      <div class="col-md-6">
                          <div class="mb-3 mt-2 mr-3" style="float: left">
                              <div class="f-1" v-if="stu.port != null">
                                <a  class="mb05" href="" v-on:click.stop.prevent="openWindow(stu.port )">Portfolio</a>
                                <br>
                                <i class="ml-1 fa fa-file-image-o fa-3x color-dblue" ></i>
                              </div>
                              <div class="f-1" v-else>
                                <label>Portfolio</label>
                                <br>
                                <i class="ml-1 fa fa-file-image-o fa-3x color-gray" ></i>
                              </div>
                          </div>
                          <div class="mb-3 mr-3 mt-2" style="float:left">
                              <div class="f-1" v-if="stu.cv != null">
                              <a class="mb05" href="" v-on:click.stop.prevent="openWindow(stu.cv )">Resume</a>
                                <br>
                                <i class="ml-1 fa fa-file-pdf-o fa-3x color-dblue" ></i>
                              </div>
                              <div class="f-1" v-else>
                                <label>Resume</label>
                                <br>
                                <i class="ml-1 fa fa-file-pdf-o fa-3x color-gray" ></i>
                              </div>
                          </div>
                          <form @submit.prevent="update(stu.id)" @keydown="form.onKeydown($event)">  
                          <div class="col-md-6 mt-3" style="float:right">
                          <button class="btn-outline-primary bold" :loading="form.busy">
                            <i class="fa fa-envelope fa-lg"></i> ส่งคำเชิญ
                          </button>
                          </div>
                          </form>
                      </div>
                      
                  </div>
                </div>
              </div>
      
                    </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

import CompanyCard from '~/components/Companyindex/CompanyCard'
import Form from "vform";
import {mapActions, mapGetters} from 'vuex'
import axios from "axios";

export default {
  data: () => ({
    form: new Form({
      job_id:'',
      jobtypes_id:'',
      score:'',
      }),
      users:"",
      cards: [
     {
      img:'/uploads/images/comevents/profile.JPG',
      name:'นายณัทกฤช จารุโยธิน',
      university:'มหาวิทยาลัยศิลปากร' ,
      type: 'Graphic Design',
      score: 'Advance',
      type2: 'Motion',
      score2: 'Beginning',

    },
    {
      img:'/uploads/images/comevents/DSCF9731.jpeg',
      name:'นายสิทธิชัย อยู่ถาวร',
      university:'มหาวิทยาลัยศิลปากร' ,
      type: 'Graphic Design',
      score: 'Advance',
      type2: 'Frontend-Developer',
      score2: 'Basic',
    },
    {
      img:'/uploads/images/comevents/DSCF9683.JPG',
      name:'นายณัฐพล ปัญญาดี',
      university:'มหาวิทยาลัยศิลปากร' ,
      type: 'Graphic Design',
      score: 'Advance',
      type2: 'Photoshop',
      score2: 'Basic',
    },
    ]
   }),      
   components:{
    CompanyCard,
  },
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      infos:'profile/userinfos',
      jobs: 'jobs/jobs',
      types: 'jobs/types'
    }),
    sortedArray: function() {
    function compare(a, b) {
      if (a.name < b.name)
        return -1;
      if (a.name > b.name)
        return 1;
      return 0;
    }

    return this.arrays.sort(compare);
  }
  },
  methods: {
    async search() {
        this.users = "";
        const { data } = await this.form.post(`/api/search`);
        // const { data } = await axios.get(`/api/search/users/${this.form}`);
        this.users = data;
        console.log(data);
        console.log(this.users);
    },
    ...mapActions({
      fetch:'profile/fetch',
      fetchjob : 'jobs/fetchjob',
      fetchtype : 'jobs/fetchtype'
    })
    
  },
  created(){
     this.fetch()
     this.fetchjob()
     this.fetchtype()
     this.search()
  }
}
</script>

<style scoped>

.custom-select{
   width: 80% !important;
   border-radius: 2rem !important;
   border:none;
}

.input-group {
    height: 100px;
    background-color: #F0DDCF;
    padding: 10px;
    border-radius: 1rem !important;
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
.btn-outline-warning{
    width: 100% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#FFB105;
    border: 2px solid #FFB105;
    box-shadow:none;
}
.btn-detail-style {
    width: 100% ; 
    height: 40px;
    line-height: 30px;
    border-radius: 2rem; 
    color:black;
    background-color: white ;
    border: none;  
    box-shadow:none;
}
.f-075{
  font-size: 0.75rem !important;
}
.f-1{
  font-size: 1rem !important;
}
.f-125{
  font-size: 1.25rem !important;
}
.img-circle{
    width: 80px;
    height: 80px;
    border-radius: 50%;
    overflow: hidden; 
    float: left;
}
.img-circle img{
    width: 100%;
}
.card{
    padding: 20px 20px 10px 20px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}


</style>