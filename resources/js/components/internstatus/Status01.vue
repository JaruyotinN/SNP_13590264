<template>
<div>
    <div class="table-responsive">
    <table class="table mb-5" >
    <thead class="color-dblue">
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
            <td><h5> {{userjoin.comevent.company.name}} </h5><label>{{userjoin.comevent.division}} </label></td>
            <td><h5> {{userjoin.jobtype}} </h5></td>
            <td class="center w15">
                <i v-if="userjoin.check " class="fa fa-check-circle color-dblue"></i>  
                <i v-else class="fa fa-minus-circle"></i>
            </td>
            <td class="center w15">
                <p v-if="userjoin.interview" class="mt-2">มีสัมภาษณ์</p>
                <p v-else class="mt-2" >ไม่มีสัมภาษณ์</p>
                <!-- <i v-if="userjoin.interview" class="fa fa-check-circle "></i>  
                <i v-else class="fa fa-minus-circle"></i> -->
            </td>
            <td class="center w15">
                <p v-if="userjoin.result == 0" class="badge waiting">รอการพิจารณา</p>
                <p v-else-if="userjoin.result == 1" class="badge in-progress">ต้องการให้มาสัมภาษณ์</p>
                <p v-else-if="userjoin.result == 2" class="badge in-review">อยู่ในการพิจารณา</p>
                <p v-else-if="userjoin.result == 3" class="badge approved">ผ่านการพิจารณา</p>
                <p v-else-if="userjoin.result == 50" class="badge invite">คำเชิญให้มาฝึกงาน</p>
                <p v-else-if="userjoin.result == 99" class="badge disapproved">ไม่ผ่านการพิจารณา</p>
            </td>
        </tr>
    </tbody>
    </table>
    </div>
    <form class="was-validated"  @submit.prevent="check" @keydown="form.onKeydown($event)">
    <div class="card mt-4">
              <div class="card-info">
                    <div class="col-md-10 offset-1 mt-5" v-for="(user, index) in users" :key="index" :class="{ active: index == 0 }">
                    <div class="col-md-10 m-auto">
                         <h5 class="bold mt-auto mb-auto center">เลือกบริษัทที่นักศึกษาต้องการฝึกงาน</h5>
                          <p class="center color-orange" >*** หากยืนยันบริษัทฝึกงานเรียบร้อยจะไม่สามารถแก้ไขในภายหลัง ***</p>
                          <br>
                           <div class="input-group mb-3">
                                <select class="custom-select" v-model="form.id" required>
                                    <option v-for="(userjoin, index) in userjoins" :key="index" :value="userjoin.id" v-if="userjoin.result == 3 || userjoin.result == 50">บริษัท {{userjoin.comevent.company.name}}</option>
                                </select>
                            </div>
                             <!-- <label>comeventjoin_id : {{form.id}} stu_id : {{form.stu_id}}</label> -->
                             <input class="form-control" type="hidden" v-model="form.stu_id = user.student.id">
                    </div>
              </div> 
                <div class="mt-3 mb-3 center">
                    <button v-if="form.id == false" class="btn-outline-secondary bold" disabled>โปรดเลือกบริษัทที่ต้องการฝึกงาน</button>
                    <button v-else class="btn-outline-primary bold" :loading="form.busy" >ยืนยันบริษัทฝึกงาน</button>
                </div>
            </div>
    </div>
    </form>
   
  
   
</div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Form from "vform";
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

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
   check(){
       Swal.fire({
        title: 'ยืนยันบริษัทที่ต้องการฝึกงาน',
        text: "หากยืนยันบริษัทฝึกงานเรียบร้อยจะไม่สามารถแก้ไขในภายหลัง",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ยืนยันการสมัคร'
        }).then((result) => {
        if (result.value) {
          this.update()
            Swal.fire(
          'ยืนยันเสร็จสิ้น',
          'ยินดีด้วยคุณได้สถานที่ฝึกงานเรียบร้อย',
          'success',
            )
        }
        })  
   },
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
.btn-outline-primary:hover {
    color: #fff !important;
    background-color: #133CBA;
    border-color: #133CBA;
}
.btn-outline-secondary {
    width: 40% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    border: 2px solid ;
    box-shadow:none;
}
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}

/* badge */
.badge {
  width: 100%;
  text-align: center;
  font-size: 1rem;
  padding: 15px 15px;
  border-radius: 5px;
}

.badge.approved {
  background:#E0F2DE;
  color: rgb(94, 139, 89);
}

.badge.disapproved {
  background: #EDBEBE;
  color: #BF5C5C;
}

.badge.in-progress {
  background: #FFE2DB;
  color: #FE7250;
}

.badge.in-review {
  background:#F5E8C4;
  color: #FFB105;
}

.badge.waiting {
  background: #ECEEF0;
  color: #9DA3AB;
}

.badge.invite {
  background: #E4EFFE;;
  color: #133CBA;
}

</style>
