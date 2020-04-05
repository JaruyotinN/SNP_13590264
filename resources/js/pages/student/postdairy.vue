<template>
<div class="container" >
    <div class="col-md-12">
              <div class="mb-3"> 
                      <router-link to="dairy">ย้อนกลับ</router-link>
              </div>
              <div class="row">
                  <div class="col-md-10">
                      <div class="mb-3 ml-3 mt-2">
                          <h4 class="mb-2 bold">เพิ่มบันทึกฝึกงาน</h4>
                            <p class="center color-orange">
                               <p class="color-orange" >*** รายละเอียดในบันทึกฝึกงานไม่สามารถแก้ไขในภายหลัง ***</p>
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
         <div  v-for="(info, index) in infos" :key="index">
            <input class="form-control" type="hidden" v-model="form.stu_id = info.student.id">
        </div>
      
        <div class="center mt-3 mb-3">
          <button class="btn btn-outline-primary bold" @click="submit()">
                  บันทึกฝึกงาน
          </button>
			</div>
      </div>
</div>
</template>
<script>
import Form from "vform";
import ColumHeader from '~/components/ColumHeader'
import {mapActions, mapGetters} from 'vuex'
export default {
middleware: 'auth',
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
    id(){
      return parseInt(this.user.id)
    },
    ...mapGetters({
      infos:'profile/userinfos',
    })
  },
  components:{
    ColumHeader,
  },
   methods: {
    ...mapActions({
      makedairys:'interndairys/makedairys',
      fetchprofile:'profile/fetch',
    }),
    async submit(){
      await this.makedairys(this.form)
      this.$router.push({name:'dairy'})
    }
  },
   created(){
    this.fetchprofile()
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
