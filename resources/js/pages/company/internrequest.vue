<template>
  <div class="container">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-10">
          <div class="mb-3 ml-3 mt-2" style="float: left">
            <h4 class="mb-2 bold">คำร้องขอฝึกงาน</h4>
              <p class="bold color-blue" v-if="tab == 1">รอพิจารณา </p>
               <p class="bold color-blue" v-if="tab == 2">อยู่ในการพิจารณา </p>
          </div>
        </div>

        <div class="col-md-2" v-for="(info, index) in infos" :key="index">
          <div class="img-circle" style="float:right;">
            <img :src="info.company.logo" />
          </div>
        </div>
      </div>

      <ul class="nav ml-3">
                <li>
                      <a  href="#"  @click="setTab(1)">
                    รอพิจารณา 
                      </a>
                </li>
                <p>&nbsp;&nbsp;|&nbsp;&nbsp;</p>
                <li>
                  <a  href="#"  @click="setTab(2)">
                    อยู่ในการพิจารณา 
                      </a>
                  

                </li>
              </ul>
    </div>
    <hr class="hr-yellow" />
    <div v-if="tab == 1">
    <div class="col-md-12" v-for="(stu, index) in studentjoins" :key="index" v-if="stu.student.intern_id == 1">
      	<div class="card mt-3 mb-2" v-if="stu.result == 0 "> 
             <div class="row">
                <div class="col-md-6">
                      
                      <div class="img-circle mb-3 ml-3 mt-2 float: left">
                        <img :src="stu.student.img">
                      </div>
                        <div class="mb-3 mt-2 ml-3" style="float: left">
                        <div class="f-1 bold m-0">
                          <label class="color-blue">{{stu.student.name}} {{stu.student.surname}} </label>
                          <label>|</label>
                          <label>{{stu.student.major.faculty.university.name}}</label>
                        </div>
                        <div class="f-075 m-0">
                            <label>{{stu.student.major.faculty.name}} </label>
                            <label>สาขา </label>
                            <label>{{stu.student.major.name}}</label>
                        </div>
                        <div class="f-075 m-0">
                           <label>โครงการ : </label>
                           <label class="color-blue">{{stu.comevent.division}}</label>
                            <label>|</label>
                            <label>ตำแหน่ง : </label>
                            <label class="color-blue" >{{stu.jobtype}}</label>
                        </div>
                    </div>   
                </div>
                <div class="col-md-6">
                     <div class="mb-3 mt-2 mr-3" style="float: left">
                        <div class="f-1" v-if="stu.student.port != null">
                          <a  class="mb05" href="" v-on:click.stop.prevent="openWindow(stu.student.port )">Portfolio</a>
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
                        <div class="f-1" v-if="stu.student.cv != null">
                         <a class="mb05" href="" v-on:click.stop.prevent="openWindow(stu.student.cv )">Resume</a>
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
                      <i class="fa fa-info fa-lg"></i> พิจารณาคำร้อง
                    </button>
                     </div>
                    </form>
               
                </div>
                
            </div>
    </div>
    </div>
  </div>
      <div v-if="tab == 2">
       <div class="col-md-12" v-for="(stu, index) in studentjoins" :key="index" v-if="stu.student.intern_id == 1">
      	<div class="card mt-3 mb-2" v-if="stu.result > 0 "> 
             <div class="row">
                <div class="col-md-6">
                      <div class="img-circle mb-3 ml-3 mt-2 float: left">
                         <img src="/uploads/images/comevents/user.png" v-if="stu.student.img == null"/>
                        <img v-else :src="stu.student.img">
                      </div>
                        <div class="mb-3 mt-2 ml-3" style="float: left">
                        <div class="f-1 bold m-0">
                          <label class="color-blue">{{stu.student.name}} {{stu.student.surname}} </label>
                          <label>|</label>
                          <label>{{stu.student.major.faculty.university.name}}</label>
                        </div>
                        <div class="f-075 m-0">
                            <label>{{stu.student.major.faculty.name}} </label>
                            <label>สาขา </label>
                            <label>{{stu.student.major.name}}</label>
                        </div>
                        <div class="f-075 m-0">
                           <label>โครงการ : </label>
                           <label class="color-blue">{{stu.comevent.division}}</label>
                            <label>|</label>
                            <label>ตำแหน่ง : </label>
                            <label class="color-blue" >{{stu.jobtype}}</label>
                              <br>
                            <label class="f-1 color-dblue bold" v-if="stu.result == 1 ">ต้องการให้มาสัมภาษณ์</label>
                            <label class="f-1 color-dblue bold" v-if="stu.result == 2">อยู่ในการพิจารณา</label>
                             <label class="f-1 color-dblue bold" v-if="stu.result == 3">ผ่านการพิจารณา</label>
                        </div>
                    </div>   
                </div>
                <div class="col-md-6">
                     <div class="mb-3 mt-2 mr-3" style="float: left">
                        <div class="f-1" v-if="stu.student.port != null">
                          <a  class="mb05" href="" v-on:click.stop.prevent="openWindow(stu.student.port )">Portfolio</a>
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
                        <div class="f-1" v-if="stu.student.cv != null">
                         <a class="mb05" href="" v-on:click.stop.prevent="openWindow(stu.student.cv )">Resume</a>
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
                      <i class="fa fa-info fa-lg"></i> พิจารณาคำร้อง
                    </button>
                     </div>
                    </form>
               
                </div>
                
            </div>
    </div>
    </div>
    </div>
  </div>
</template>

<script>
import Form from "vform";
import {mapActions, mapGetters} from 'vuex'

export default {
    data: () => ({
    form: new Form({
      check:1,
      get:1,
      id:"",
    }),
    tab :1,
    }),
     methods: {
        setTab(tab) {
      this.tab = tab
      },
     ...mapActions({
     fetch:'profile/fetch',
     fetchstudentjoin:'comevents/fetchstudentjoin',
   }),
   openWindow: function (link) {
         window.open(link);
    },
    async update(id) {
      this.form.id = id;
      const { data } = await this.form.put(`/api/update/${this.form.id}`);
      console.log(data);

       if (data) {
        this.$router.push({
          name: "getstudent",
          params: { id: this.form.id }
        });
      }
    },
  },

  computed:{
  ...mapGetters({
      infos:'profile/userinfos',
      studentjoins:'comevents/studentjoins',
      
    }),
  },
  created(){
    this.fetchstudentjoin()
    this.fetch()
  },

}
</script>

<style scoped>
a{
  margin-bottom: 0.5rem;
  display: inline-block;
}
color-gray{
  color: gainsboro;
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
.img-circle {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  overflow: hidden;
  float: left;
}
.img-circle img {
  width: 100%;
}
.n-setup a {
  color: gray;
  padding-right: 15px;
}
.n-setup a:hover {
  text-decoration: none;
  color: #0047ba !important;
}
.active a {
  color: #0047ba !important;
}
.card{
    padding: 20px 20px 10px 20px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.btn-outline-primary {
    width: 70% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
    margin-left: auto;
    margin-right: auto;
    display: block;
}
 
</style>
