<template>
<div class="container" >
  <div  v-for="(info, index) in infos" :key="index" >
  <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
      <div class="mb-5"> 
        <router-link :to="{ name: 'company'}">ย้อนกลับ</router-link>
     </div>
      <div class="col-md-12">
          <div class="row">
                <div class="col-md-10">
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mt-4 bold">{{info.company.name}}</h4>
                    </div>
                </div>
                <div class="col-md-2">
                   <div class="img-circle" style="float:right;">
                            <img :src="info.company.logo">
                    </div>
                </div>
          </div>
      </div>
      <hr class="hr-yellow">
          <div class="card mt-5 mb-3">
                <div class="col-md-10 m-auto">
                        <h4 class="mb-5 mt-5 bold">สร้างข้อมูลพนักงานดูแลโครงการ</h4>   
                    <hr class="hr-orange">
                </div>
                <div class="col-md-10 mt-2 m-auto">
                   <div class="row" style="padding:20px;">
                     <input class="form-control" type="hidden" v-model="form.com_id = info.company.id">

                        <div class="col-md-4">
                            <p class="bold color-blue" >ชื่อพนักงาน</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" v-model="form.name" type="text" placeholder="ชื่อพนักงานรของคุณ" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <p class="bold color-blue" >นามสกุลพนักงาน</p>
                            <div class="mt-2 mb-3">
                                  <input class="form-control" v-model="form.surname" type="text" placeholder="นามสกุลพนักงานของคุณ" required>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <p class="bold color-blue" >เบอร์ติดต่อของพนักงาน</p>
                            <div class="mt-2 mb-3">
                                  <input class="form-control" v-model="form.phonenumber" type="text" placeholder="เบอร์ติดต่อของพนักงาน" required>
                              </div>
                        </div>

                       
                        <div class="col-md-6">
                            <p class="bold color-blue" >Email ของพนักงาน</p>
                            <div class="mt-2 mb-3">
                                  <input class="form-control" v-model="form.email" type="email" placeholder="Email ของพนักงาน" required>
                              </div>
                        </div>

                         <div class="col-md-6">
                            <p class="bold color-blue" >ตำแหน่งของพนักงาน</p>
                            <div class="mt-2 mb-3">
                                  <input class="form-control" v-model="form.career" type="text" placeholder="ตำแหน่งของพนักงานของคุณ" required>
                              </div>
                        </div>
   
       
            

                </div>
               
        </div>   <!-- col-md-12 -->
        </div> <!-- card -->
         <div class="col-md-6 m-auto">
            <button class="btn-outline-primary bold mb-3" :loading="form.busy">
                สร้างข้อมูลพนักงานดูแลโครงการ
            </button>
         </div>
    
  </form>
  </div>
</div>
</template>
<script>
import Form from "vform";
import {mapActions, mapGetters} from 'vuex'
export default {
  middleware: 'auth',
  data: () => ({
    form: new Form({
      name:'',
      surname:'',
      career:'',
      email:'',
      phonenumber:'',
      com_id:'',
      }),
    }),
  components:{
  },
  computed:{
    ...mapGetters({
      infos:'profile/userinfos',
    })
  },
 methods: {
    submitForm() {
        this.save();
    },
    async save() {
     
      const { data } = await this.form.post("/api/comstaff");

      if (data) {
        this.$router.push({
          name: "company",
        });
      }
    },
    
    ...mapActions({
      fetch:'profile/fetch',
    })
  },
  created(){
     this.fetch()
  }
}
</script>

<style scoped>
textarea {
  width: 100%;
  overflow: auto;
  padding : 1.5rem;
  box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
  border-radius: 5px;
  outline: none !important; 
  border:none;
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
.customebox{
  border-radius: 5px;
  background-color: #F5F5F5;
}
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
   
}
.form-control{
    border-radius: 2rem;
}
.btn-outline-primary {
    width: 70% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
    margin-left:auto;
    margin-right:auto;
    display:block;
}
.custom-select{
    border-radius: 2rem !important;
}

 
</style>
