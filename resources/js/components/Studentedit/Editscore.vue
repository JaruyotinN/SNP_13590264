<template>
<div class="card mt-5">
    <div class="col-md-12">
       <div class="mt-4 mb-4">
                  <h5 class="bold">แก้ไขข้อมูลความถนัด</h5>
              </div>
          <hr class="hr-orange">
       <form @submit.prevent="cheack(1)" @keydown="form.onKeydown($event)">
        <div class="row mt-3">
          <!-- {{form.index}}<br> {{form.title}} <br>{{form.name}}  -->
          <!-- <pre>{{users.student.scores}}</pre> -->
            <div class="col-md-6" v-for="(score, index) in users.student.scores" :key="index" >          
              <!-- <pre> {{score}}</pre> -->
       
                <input class="form2-control" type="hidden" v-model="form.id = users.student.id">
                <p>หมวดหมู่ที่ {{index+1}}</pre>                
                <div class="input-group mt-2 mb-3">
                    <select class="custom-select col-md-5 m-auto" v-model="form.title[index]" required>
                       <option  value="0" >โปรดระบุ</option>
                            <option v-for="(job, i) in jobs" :key="i" :value="job.id">{{job.title}}</option>
                    </select>
                    <select class="custom-select col-md-5  m-auto" v-model="form.name[index]" required>
                            <option  value="0" >โปรดระบุ</option>
                            <!-- <option v-for="(type, index) in types" :key="index" :value="type.id">{{type.name}}</option> -->
                             <option v-for="(type, i) in types" :key="i" v-if="form.title[index] == type.job_id" :value="type.id">{{type.name}}</option>
                    </select>
                     <select class="custom-select col-md-5  m-auto" v-model="form.score[index]" required>
                            <option selected value="0" >ความถนัด</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                    </select>
                </div>
            </div>
            </div>
            <div class="col-md-3 offset-9">
            <div class="mt-4 ">
                    <!-- <button class="btn-outline-primary bold" @click="cheack()"> -->
                    <button class="btn-outline-primary bold" :loading="form.busy">
                      บันทึกข้อมูลผู้ใช้งาน
                    </button>
            </div>
            </div>
            </form>
    </div>     <!-- col-md-12 -->
</div>
</template>

<script>
import Form from 'vform'
import {mapActions, mapGetters} from 'vuex'
import ColumHeader from '~/components/ColumHeader'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

export default {
  middleware: 'auth',
 data: () => ({
    form: new Form({
      id:'',
      index:[],
      title: [ ],
      name: [],
      score: [],
    }),
  }),
  components:{
    ColumHeader,
  },
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
      ...mapGetters({
    users: 'profile/show',
    jobs:'jobs/jobs',
    types: 'jobs/types'
   
  }),
  },
  
  async created () {

      var vm = this
      this.fetchjob(),
      this.fetchtype(),
      await this.fetchshow(this.id),
  
      this.users.student.scores.map(function(value, key) {
      vm.form.index.push(value.id);
      if(value.joptype){
        vm.form.title.push(value.joptype.job.id);
        vm.form.name.push(value.joptype.id);
      }else {
        vm.form.title.push(5);
        vm.form.name.push(5);
      }
      vm.form.score.push(value.score);  
      });

  },
  methods: {
    cheack(){
     Swal.fire({
    title: 'ยืนยันการแก้ไขข้อมูลเรียบร้อย',
    text: "ข้อมูลของคุณจะเปลี่ยนแปลงยืนยันเพื่อดำเนินการต่อไป",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'ยกเลิก',
    confirmButtonText: 'ยืนยันการแก้ไข',
    }).then((result) => {
      if (result.value) {
        this.update()
        Swal.fire(
          'แก้ไขข้อมูลเรียบร้อย',
          'แก้ไขข้อมูลความถนัดเรียบร้อย',
          'success',
        )
      }
    })
   },
    async update() {
    
        const { data } = await this.form.put(`/api/updatescore/${this.form.id}`);
        console.log(data)
      //   if (data) {
      //   this.$router.push({
      //     name: "student",
      //   });
      // }
    } , 

    ...mapActions({
      fetchshow:'profile/show',
      fetchjob: 'jobs/fetchjob',
      fetchtype: 'jobs/fetchtype',

    })
   
  }
   
}


</script>
<style scoped>
.w-30{
    width: 30%;
}
.custom-select{
    border-radius: 2rem !important;
}
.form-control{
    border-radius: 2rem;
}
.btn-outline-primary {
    width: 80% ; 
    height: 50px; 
    float: right;
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
</style>
