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
            <!-- <pre>{{userjoin}}</pre> -->
            <td><h5>{{userjoin.id}}  {{userjoin.comevent.company.name}} </h5><label>{{userjoin.comevent.division}} </label></td>
            <td><h5> {{userjoin.comevent.requirement}} </h5></td>
            <td class="center w15">
                <i v-if="userjoin.check " class="fa fa-check-circle "></i>  
                <i v-else class="fa fa-minus-circle"></i>
            </td>
            <td class="center w15">
                <i v-if="userjoin.interview" class="fa fa-check-circle "></i>  
                <i v-else class="fa fa-minus-circle"></i>
            </td>
            <td class="center w15">
                <h5 v-if="userjoin.result == 0" >รอการพิจารณา</h5>
                <h5 v-else-if="userjoin.result == 1" >ต้องการให้มาสัมภาษณ์</h5>
                <h5 v-else-if="userjoin.result == 2" >อยู่ในการพิจารณา</h5>
                <h5 v-else-if="userjoin.result == 3" >ผ่าน</h5>
            </td>
        </tr>
    </tbody>
    </table>
  
    <form class="was-validated"  @submit.prevent="update" @keydown="form.onKeydown($event)">
    <div class="col-md-10 offset-1 mt-5" v-for="(user, index) in users" :key="index" :class="{ active: index == 0 }">
        <label>comeventjoin_id : {{form.id}} stu_id : {{form.stu_id}}</label>
        <div class="input-group mb-3">
            <h5 class="bold mt-auto mb-auto">เลือกบริษัทที่นักศึกษาต้องการฝึกงาน</h5>
            <select class="custom-select" v-model="form.id" required>
                <option v-for="(userjoin, index) in userjoins" :key="index" :value="userjoin.id" v-if="userjoin.result == 3">บริษัท {{userjoin.comevent.company.name}}</option>
            </select>
        </div>
          <input class="form-control" type="hidden" v-model="form.stu_id = user.student.id">
          <p class="center color-orange " >*** หากยืนยันบริษัทฝึกงานเรียบร้อยจะไม่สามารถแก้ไขในภายหลัง ***</p>
    </div>
    <div class="btn-detail-style mt-3 mb-3">
        <button class="btn btn-primary bold" :loading="form.busy">ยืนยันบริษัทฝึกงาน</button>
	</div>
    </form>
</div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Form from "vform";

   export default {
  middleware: 'auth',
  data: () => ({
    form: new Form({
      id:'',
      stu_id:"",
      stu_confirm:1,
      get:3,
    }),
  }),
  methods: {
   ...mapActions({
     userjoin:'comevents/userjoin',
     fetch:'profile/fetch'
   }),
      async update() {

     const { data } = await this.form.put(`/api/update/${this.form.id}`);
     console.log(data)
     this.fetch()
      // if (data) {
      //   this.$router.push({
      //     name: "admin.item.show",
      //     params: { id: this.show.id }
      //   });
      // }
    },
  },
  created(){
    this.userjoin()
    
  },
  computed:{
  ...mapGetters({
      users:'profile/userinfos',
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
