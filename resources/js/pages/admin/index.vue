<template>
<div class="container" >
    <form @submit.prevent="save" @keydown="form.onKeydown($event)">
    <div class="col-md-12">
              <div class="mb-3"> 
                    <router-link :to="{ name: 'admin'}">ย้อนกลับ</router-link>
              </div>
              <div class="row">
                  <div class="col-md-10">
                      <div class="mb-3 ml-3 mt-2">
                          <h4 class="mb-2 bold">เพิ่มผู้ใช้งาน</h4>
                      </div>
                  </div>
              </div>
              <hr class="hr-yellow" >
                 <div class="card mt-4">
                 <div class="row" style="padding:20px;">
                        <div class="col-md-12">
                            <p class="bold" >หัวข้อบันทึกฝึกงาน</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" v-model="form.title" type="text" placeholder="">
                            </div>
                        </div>    
                        <div class="col-md-12">
                            <p class="bold" >เนื้อหารายละเอียดบันทึกฝึกงาน</p>
                            <div class="mt-2 mb-3">
                                <div class>
                                 <textarea v-model="form.description" type="text" rows="4" cols="100">

                                </textarea>
                              </div>
                            </div>
                        </div>  
                </div>
                </div>
        </div>  
      
        <div class="col-md-6 m-auto">
            <button class="btn-outline-primary bold mb-3" :loading="form.busy">
                สร้างแบบฟอร์มประกาศรับนักศึกษาฝึกงาน
            </button>
         </div>
    </form>
</div>
</template>
<script>
import Form from "vform";
import {mapActions, mapGetters} from 'vuex'
export default {

data() {
  return {
     form:{
      title:'',
      description:'',
      stu_id:'',
    },
    }
},
  computed:{
    ...mapGetters({
    
    })
  },
  components:{
    
  },
   methods: {
    ...mapActions({
      
    }),
    async save() {
     
      const { data } = await this.form.post("/api/comevents");

    //   if (data) {
    //     this.$router.push({
    //       name: "admin",
    //     });
    //   }
    },
  },
   created(){
   
  }
}
</script>


<style scoped>
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
textarea {
  padding : 1.5rem;
  width: 100%;
  overflow: auto;
  box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
  border-radius: 5px;
  outline: none !important; 
  border:none;
}
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.form-control{
  border-radius: 5px;
  box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
  outline: none !important; 
  border:none;
}
.btn-outline-primary {
    width: 40% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
}

.custom-select{
    border-radius: 2rem !important;
}
</style>
