<template>
<div>

    <table class="table" >
    <thead>
        <tr>
        <th>ชื่อบริษัท</th>
        <th>ตำแหน่ง</th>
        <th class="center w15" scope="col">การตรวจ</th>
        <th class="center w15" scope="col">สัมภาษณ์</th>
        <th class="center w15" scope="col">ผลตอบรับ</th>
        </tr>
    </thead>
    <tbody>
        
        <tr class="spaceUnder" v-for="(userjoin, index) in userjoins" :key="index">
            <td><h5> {{userjoin.name}} </h5><label>none </label></td>
            <td><h5> {{userjoin.requirement}} </h5></td>
            <td class="center w15">
                <i v-if="userjoin.check " class="fa fa-check-circle "></i>  
                <i v-else class="fa fa-minus-circle"></i>
            </td>
            <td class="center w15">
                <i v-if="userjoin.interview" class="fa fa-check-circle "></i>  
                <i v-else class="fa fa-minus-circle"></i>
            </td>
            <td class="center w15">
                <h5 v-if="userjoin.result == 0" >wait</h5>
                <h5 v-else-if="userjoin.result == 1" >PASS</h5>
                <h5 v-else-if="userjoin.result == 2" >NOPASS</h5>
                <!-- <h5>{{ userjoin.result }}</h5> -->
            </td>
        </tr>
    </tbody>
    </table>
    <div class="col-md-10 offset-1 mt-5">
        <div class="input-group mb-3">
            <h5 class="bold mt-auto mb-auto">ต้องการฝึกงานกับ</h5>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <!-- <option v-for="(userjoin, index) in userjoins" :key="index" v-if="userjoin.result == 1">{{comevent.staff.company.name}}</option> -->
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>
    <div class="btn-detail-style mt-3 mb-3">
        <button class="btn btn-primary bold" :to="{name:'student'}" @click="$emit('next', 2)">ยืนยันบริษัทฝึกงาน</button>
	</div>
</div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

   export default {
  middleware: 'auth',
  methods: {
   ...mapActions({
     userjoin:'comevents/userjoin',
   }),
  },
  created(){
    this.userjoin()
  },
  computed:{
  ...mapGetters({
      userjoins:'comevents/userjoins',
    }),
  },
   }
</script>

<style  scoped>
.custom-select{
    border-radius: 2rem !important;
    margin-left: 1rem;
}
i{
    font-size: 2rem;
    color: gray
}
h5{
    margin: 0;
}
label{
    margin: 0;
    font-size: 0.75rem;
}
tr.spaceUnder>td {
  padding-bottom: 0.5rem;
}
.w15{
    width: 15%
}
 .progressbar {
      counter-reset: step;
      height: 5rem;
  }
  .progressbar li {
      list-style-type: none;
      width: 25%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
  }
  .progressbar li:before {
      width: 50px;
      height: 50px;
      content: counter(step);
      counter-increment: step;
      line-height: 45px;
      border: 2px solid #7d7d7d;
      display: block;
      text-align: center;
      font-size: 1.5rem;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      background-color: white;
  }
  .progressbar li:after {
      width: 100%;
      height: 2px;
      content: '';
      position: absolute;
      margin: 10px auto 0px auto;
      background-color: #7d7d7d;
      top: 15px;
      left: -50%;
      z-index: -1;
  }
  .progressbar li:first-child:after {
      content: none;
  }
  .progressbar li.active {
     color: #0047BA;
  }
  .progressbar li.active:before {
      border-color: #0047BA;
  }
  .progressbar li.active + li:after {
      background-color: #0047BA;
  }
  .table th {
      border-top: none !important;
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
