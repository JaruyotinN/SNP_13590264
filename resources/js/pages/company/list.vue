<template>
<div class="container" >
   <div class="col-md-12">
            <div class="row">
                <div class="col-md-10">
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mb-2 bold">ข้อมูลนักศึกษาฝึกงาน</h4>
                    </div>
                </div>
                <div class="col-md-2" v-for="(info, index) in infos" :key="index">
                   <div class="img-circle" style="float:right;">
                            <img :src="info.company.logo">
                    </div>
                </div>
            </div>
  
              <ul class="nav ml-3">
                <li>
                   <div class="dropdown show">
                      <a  href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="setTab(1)">
                    ดำเนินการอยู่ 
                      </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </li>
                <p>&nbsp;&nbsp;|&nbsp;&nbsp;</p>
                <li>
                  <button @click="setTab(2)">
                  ประเมินนักศึกษาฝึกงาน
                  </button>
                   <!-- <div class="dropdown show">
                      <a  href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="setTab(2)">
                    ประเมินนักศึกษาฝึกงาน
                      </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div> -->

                </li>
                 <p>&nbsp;&nbsp;|&nbsp;&nbsp;</p>
                 <li @click="setTab(3)">จบฝึกงาน</li>
              </ul>
            </div>
             <hr class="hr-yellow">

             <div v-if="tab == 1">
                <div class="row" v-if="ongoing.length != 0 ">
                  <div class="col-md-3 mb-2" v-for="(stu, index) in ongoing" :key="index" >
                        <div class="card mt-4 h-100">
                            <div class="radio-img">
                                <img :src="stu.student.img" center  class="card-img-top"/>
                            </div>
                              <div class="top-box textcustom">
                                <div class="col-12">
                                    <div class="card-info">
                                      <h5 class="bold mt-3">tab1</h5>   
                                      <h5 class="bold mt-3"> {{ stu.student.name }} {{stu.student.surname }} </h5>     
                                      <p>โครงการที่สมัคร : {{stu.comevent.division}} </p>
                                      <p>ตำแหน่ง: {{ stu.question1 }} </p>
                                      <p>intern_id: {{ stu.student.intern_id }} </p>
                                    </div> 
                                </div>
                              </div>
                        </div>     
                    </div>
                </div>
                <div v-else>
                      NO INFO
                </div>
            </div> 
            <div v-if="tab == 2">
                <div class="row" v-if="needreview.length != 0 ">
                  <div class="col-md-3 mb-2" v-for="(stu, index) in needreview" :key="index" >
                        <div class="card mt-4 h-100">
                            <div class="radio-img">
                                <img :src="stu.student.img" center  class="card-img-top"/>
                            </div>
                              <div class="top-box textcustom">
                                <div class="col-12">
                                    <div class="card-info">
                                      <h5 class="bold mt-3">tab2</h5>   
                                      <h5 class="bold mt-3"> {{ stu.student.name }} {{stu.student.surname }} </h5>     
                                      <p>โครงการที่สมัคร : {{stu.comevent.division}} </p>
                                      <p>ตำแหน่ง: {{ stu.question1 }} </p>
                                      <p>intern_id: {{ stu.student.intern_id }} </p>
                                    </div> 
                                </div>
                              </div>
                              <div class="low-box mt-2">
                              <div class="col-12">
                                <div class="card-info">
                                <router-link v-if="stu.student.intern_id == 6" class="btn btn-outline-primary bold mt-3" :to="{name:'review', params:{id:stu.id}}">ประเมินผลครั้งที่ 1</router-link>
                                <router-link v-else-if="stu.student.intern_id == 7" class="btn btn-outline-primary bold mt-3" :to="{name:'review', params:{id:stu.id}}">ประเมินผลครั้งที่ 2</router-link>
                                </div>
                                <router-link v-if="stu.sturev01_id != null"  :to="{name:'detailreview', params:{id:stu.sturev01_id}}">ผลการประเมิน 1</router-link>
                              </div>
                            </div>
                        </div>     
                    </div>
                </div>
                <div v-else>
                      NO INFO
                </div>
            </div> 

            <div v-if="tab == 3">
                <div class="row" v-if="finishintern.length != 0 ">
                  <div class="col-md-3 mb-2" v-for="(stu, index) in finishintern" :key="index" >
                        <div class="card mt-4 h-100">
                            <div class="radio-img">
                                <img :src="stu.student.img" center  class="card-img-top"/>
                            </div>
                              <div class="top-box textcustom">
                                <div class="col-12">
                                    <div class="card-info">
                                      <h5 class="bold mt-3">tab3</h5>   
                                      <h5 class="bold mt-3"> {{ stu.student.name }} {{stu.student.surname }} </h5>     
                                      <p>โครงการที่สมัคร : {{stu.comevent.division}} </p>
                                      <p>ตำแหน่ง: {{ stu.question1 }} </p>
                                      <p>intern_id: {{ stu.student.intern_id }} </p>
                                    </div> 
                                </div>
                              </div>
                        </div>     
                    </div>
                </div>
                <div v-else>
                      NO INFO
                </div>
            </div> 
             
             

</div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex'
export default {
    
data() {
  return {
    lists: [
     {
      img:'https://picsum.photos/id/237/200/300',
      name:'นายณัทกฤช จารุโยธิน',
      division:'Future Trends',
      university:'ศิลปากร' ,
    },
    {
      img:'https://picsum.photos/id/137/200/300',
      name:'นายณัฐพล ปัญญาดี',
      division:'Future Trends',
      university:'ศิลปากร' ,
    },
    ],
    tab :1,
  }
  },
  computed:{
    ...mapGetters({
      infos:'profile/userinfos',
      stuconfirm:'comevents/stuconfirm',
      ongoing:'comevents/ongoing',
      needreview : 'comevents/needreview',
      finishintern : 'comevents/finishintern',
    }),
  },
  methods: {
    ...mapActions({
      fetch:'profile/fetch',
      fetchstuconfirm:'comevents/fetchstuconfirm',
    }),
    setTab(tab) {
      this.tab = tab
    },
    
  },
  created(){
     this.fetch()
     this.fetchstuconfirm()

  }
}
</script>

<style scoped>
.textcustom p{
   margin: 0 !important;
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
.n-setup a{
    color: gray;
    padding-right: 15px;
}
.n-setup a:hover{
    text-decoration: none;
    color: #0047BA !important;
}
.active a{ 
  color: #0047BA !important;
 }
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.radio-img{
  height: 250px;
  box-sizing: border-box;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  overflow: hidden;
}
.radio-img img {
    width: 100%;
}
.low-box{
  border-top: 0.05em #E4E4E4 solid;
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
</style>