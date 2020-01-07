<template>
<div class="container" >
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="mb-3 ml-3 mt-2" style="float: left">
                    <h4 class="mb-2 bold">ค้นหาเด็กฝึกงาน</h4>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <router-link class="btn btn-primary bold" :to="{name:'postevent'}">สร้างแบบฟอร์มฝึกงาน</router-link>
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
                    <hr>   
                    <label>ผลการค้นหา ... </label>
                    <label class="bold">มหาวิทยาลัยศิลปากร</label>
                    <label>| ความถนัด</label>
                    <label class="bold">ออกแบบ Graphic </label>
                    <div class="row">
                    <div class="col-md-12 mb-2" v-for="(card, index) in cards" :key="index">
                        <router-link :to="{name:'detail', params:{id:card.id}}">
                        <CompanyCard :card="card"/>
                        </router-link>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

import CompanyCard from '~/components/Companyindex/CompanyCard'
export default {
    
data() {
  return {
       cards: [
     {
      img:'https://picsum.photos/id/237/200/300',
      name:'นายณัทกฤช จารุโยธิน',
      university:'มหาวิทยาลัยศิลปากร' ,
      type: 'Graphic Design',
      score: 'Advance',
      type2: 'Motion',
      score2: 'Beginning',

    },
    {
      img:'https://picsum.photos/id/222/200/300',
      name:'นายสิทธิชัย อยู่ถาวร',
      university:'มหาวิทยาลัยศิลปากร' ,
      type: 'Graphic Design',
      score: 'Advance',
      type2: 'Frontend-Developer',
      score2: 'Basic',
    },
    {
      img:'https://picsum.photos/id/123/200/300',
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
   
  }
}
</script>

<style scoped>

.custom-select{
   width: 80% !important;
   border-radius: 2rem !important;
}

.input-group {
    height: 100px;
    background-color: #0047BA;
    padding: 10px;
    border-radius: 1rem !important;
}
.btn-primary{
    width: 100% ; 
    height: 50px; 
    line-height: 45px;
    border-radius: 2rem; 
    color:#ffff;
    background-color: #0047BA ;
    border: none;  
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