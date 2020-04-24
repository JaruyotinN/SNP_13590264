<template>
    <div class="col-md-12">
       <ColumHeader title="แก้ไขข้อมูลความถนัด"/>
       <form @submit.prevent="update(1)" @keydown="form.onKeydown($event)">
        <h5 class="bold center">**ความถนัดสามารถเลือกได้สูงสุด 4 ประเภทจากคะแนนทั้งหมด 15 คะแนน**</h5>
        <div class="row">
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
            <div class="mt-4 ">
                    <!-- <button class="btn-outline-primary bold" @click="cheack()"> -->
                    <button class="btn-outline-primary bold" :loading="form.busy">
                      บันทึกข้อมูลผู้ใช้งาน
                    </button>
            </div>
            </form>
    </div>     <!-- col-md-12 -->
</template>

<script>
import Form from 'vform'
import {mapActions, mapGetters} from 'vuex'
import ColumHeader from '~/components/ColumHeader'

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
    // Fill the form with user data.
   var vm = this
    this.fetchjob(),
    this.fetchtype(),
    await this.fetchshow(this.id),
    // this.form.keys().forEach(key => {
    //   this.form[key] = this.users.student.scores[key]
    // })
    //  this.users.student.scores.forEach(key => {
    //   this.form.title[key] = this.users.student.scores[key].joptype.job.id
    // })
  //    $.each(this.users.student.scores, function(key, value) {
  //   //  this.form.title.push(value.joptype.job.id);
     
  //  });
  this.users.student.scores.map(function(value, key) {
  vm.form.index.push(value.id);
    if(value.joptype){
      console.log('if');
         vm.form.title.push(value.joptype.job.id);
          vm.form.name.push(value.joptype.id);
    }else{
      console.log('else');
      vm.form.title.push(5);
       vm.form.name.push(5);
       
    }
vm.form.score.push(value.score);
        
        // if(value.jobtype){
        //   console.log("jobtype");
        //    vm.form.title.push(value.joptype.job.id);
        //   vm.form.name.push(value.joptype.id);
        //     vm.form.score.push(value.score);
        // } else {
        
        // }
      

   });
  //  console.log(this.users.student.scores)
  },
  methods: {
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
.btn-detail-style .btn-primary{ 
    background-color: #0047BA ;
    border:none; 
    border-radius: 30px;
    width: 100%;
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
