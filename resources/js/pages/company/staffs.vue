<template>
<div class="container" >
    <div class="mb-5"> 
        <router-link :to="{ name: 'company'}">ย้อนกลับ</router-link>
    </div>
  <div class="col-12">
      <div class="row">
         <div class="col-md-9">
              <div class="mb-3 ml-3 mt-2" style="float: left">
                 <h4 class="mb-2 bold">ข้อมูลพนักงานดูแลโครงการ</h4>
               
               </div>
          </div>
          <div class="col-md-3">
                <router-link class="btn btn-outline-primary bold" :to="{name:'createstaff' }">สร้างข้อมูลพนักงาน</router-link>
          </div>
      </div>
      
             <hr class="hr-yellow">
            <div class="table-responsive mt-3">
                <table class="table mb-5" >
                <thead class="color-dblue">
                    <tr>
                    <th>ชื่อ - นามสกุล</th>
                    <th >ตำแหน่ง / อาชีพ</th>
                    <th  scope="col">Email</th>
                    <th  scope="col">เบอร์โทรศัพท์</th>
                    </tr>
                </thead>
                      <tbody v-for="(staff, index) in staffs" :key="index">
                      <tr > 
                      <td><p class="mt-2">{{staff.name}} {{staff.surname}}</p></td>
                      <td><p class="mt-2">{{staff.career}}</p></td>
                      <td><p class="mt-2">{{staff.email}}</p></td>
                      <td><p class="mt-2">{{staff.phonenumber}}</p></td>
                      <td  scope="col">
                           <router-link :to="{name:'editstaff', params:{id:staff.id }}" class="btn btn-outline-primary bold" >
                            แก้ไขข้อมูล
                           </router-link> 
                      </td>
                      </tr>
                </tbody>
                </table>
            </div>
  
  </div>
</div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
 
  methods: {
 
    ...mapActions({
        fetchstaffs : 'comevents/fetchstaffs',
    }),
  },
  data() {
    return {
      
      }
  },
 
  computed:{
  
    ...mapGetters({
        staffs: 'comevents/staffs', 
    })
  },
  created(){
        this.fetchstaffs()
  }
}
</script>

<style  scoped>
h5{
    margin: 0;
}
small{
  margin: 0;
  font-size: 0.75rem;
}
li{
  margin-right: 1rem;
}
.btn-outline-primary {
    width: 100% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
    /* font-size: 0.75rem; */
}
.w15{
    width: 15%
}
.img-circle{
    margin: 0 auto;
    width: 75px;
    height: 75px;
    border-radius: 50%;
    overflow: hidden; 

}
.img-circle img{
    width: 100%;
}
.card{
    padding : 1.5rem;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
.badge {
  width: 90%;
  text-align: center;
  font-size: 1rem;
  padding: 15px 15px;
  border-radius: 5px;
}

.custom-select{
    border-radius: 2rem !important;
    font-size: 0.80rem;
}


 
</style>
