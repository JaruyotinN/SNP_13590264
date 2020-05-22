<template>
<div class="container" >
 
  <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
      <div class="mb-5"> 
        <router-link :to="{ name: 'staffs'}">ย้อนกลับ</router-link>
     </div>
          <div class="card mt-5 mb-3">
                <div class="col-md-10 m-auto">
                        <h4 class="mb-5 mt-5 bold">แก้ไขข้อมูลพนักงานดูแลโครงการ</h4>   
                    <hr class="hr-orange">
                </div>
                <div class="col-md-10 mt-2 m-auto">
                   <div class="row" style="padding:20px;">
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
                แก้ไขข้อมูลพนักงานดูแลโครงการ
            </button>
         </div>
    
  </form>
  </div>
 
</template>
<script>
import Form from "vform";
import {mapActions, mapGetters} from 'vuex'
export default {
  middleware: 'auth',
  data: () => ({
    form: new Form({
      id:'',
      name:'',
      surname:'',
      career:'',
      email:'',
      phonenumber:'',
      }),
    }),
  components:{
  },
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      staff : 'comevents/showstaff'
    })
  },
 methods: {
    submitForm() {
        this.save();
    },
    async save() {
     
       const { data } = await this.form.put(`/api/comstaff/${this.form.id}`);
        console.log(data)
        if (data) {
        this.$router.push({
          name: "staffs",
        });
        }
    },
    
    ...mapActions({
      fetch:'comevents/showstaff',

    })
  },
   async  created(){
     await this.fetch(this.id),
     this.form.keys().forEach(key => {
     this.form[key] = this.staff[key]
    })
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
.btn-outline-primary:hover {
    color: #fff !important;
    background-color: #133CBA;
    border-color: #133CBA;
}
.custom-select{
    border-radius: 2rem !important;
}

 
</style>
