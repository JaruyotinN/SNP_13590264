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
                     <div class="input-group mt-2 mb-3 m-auto">
                        <select class="custom-select col-md-3 m-auto" id="inputGroupSelect01">
                            <option selected>หมวดหมู่</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select col-md-3 m-auto" id="inputGroupSelect01">
                            <option selected>เลือกหมวด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select col-md-3 m-auto" id="inputGroupSelect01">
                            <option selected>ความถนัด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>   
                        <div class="m-auto col-md-2">
                            <router-link class="btn btn-detail-style bold" :to="{name:'student'}">ค้นหา</router-link>
                        </div> 
                    </div> 
                    <hr class="hr-yellow mt-4 mb-4">   
                    <label>ผลการค้นหา ... </label>
                    <label class="bold color-dblue">มหาวิทยาลัยศิลปากร</label>
                    <label>| ความถนัด</label>
                    <label class="bold color-dblue">ออกแบบ Graphic </label>
                    <div class="row">
                    <div class="col-md-12 mb-2" v-for="(card, index) in cards" :key="index">
                        <!-- <router-link :to="{name:'detail', params:{id:card.id}}">
                        <CompanyCard :card="card"/>
                        </router-link> -->
                          <CompanyCard :card="card"/>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

import CompanyCard from '~/components/Companyindex/CompanyCard'
import {mapActions, mapGetters} from 'vuex'
export default {
    
data() {
  return {
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
   
  }
  },
   components:{
    CompanyCard,
   
  },
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      infos:'profile/userinfos'
    })
  },
  methods: {
    ...mapActions({
      fetch:'profile/fetch'
    })
  },
  created(){
     this.fetch()
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

</style>