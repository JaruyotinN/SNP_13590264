<template>
<div class="container" >
      <ColumHeader title='เพิ่มบันทึกฝึกงาน ' showBack="student" description="รายละเอียดในบันทึกฝึกงานไม่สามารถแก้ไขในภายหลัง"/>
                <div class="col-md-12 mt-2">
                 <div class="row" style="padding:20px;">
                        <div class="col-md-4">
                            <p>หัวข้อ</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" v-model="form.title" type="text" placeholder="">
                            </div>
                        </div>        
                        <div class="col-md-12">
                            <p>เนื้อหา</p>
                            <div class="mt-2 mb-3">
                                <div class>
                                 <textarea v-model="form.description" type="text" rows="4" cols="100">

                                </textarea>
                              </div>
                            </div>
                        </div>  
                </div>
        </div>   <!-- card -->
        <div class="btn-detail-style mt-3 mb-3">
          <button class="btn btn-primary bold" @click="submit()">
                  บันทึก
          </button>
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
      user: 'auth/user'
    })
  },
  components:{
    ColumHeader,
  },
   methods: {
    ...mapActions({
      makedairys:'interndairys/makedairys'
    }),
    async submit(){
      this.form.stu_id = this.user.student_info.id
      await this.makedairys(this.form)
      this.$router.push({name:'dairy'})
    }
  },
}
</script>


<style scoped>
.card{
    padding-bottom: 10px;
    box-shadow: 0 1px 6px 0 rgba(0,0,0,0.5);
    border-radius: 5px;
   
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
.custom-select{
    border-radius: 2rem !important;
}
</style>
