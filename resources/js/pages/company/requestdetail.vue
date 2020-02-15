<template>
   <div class="container" >    
    <ColumHeader title="Hello" showBack="student"/> 
    <pre>
      {{
        studentInfo
      }}
    </pre>
      <div class="row">
          
          <div class="col-md-12">
              <div class="btn-detail-style mt-3 mb-3">
                <button class="btn btn-primary bold" @click="cheack()">
                  สมัครฝึกงาน
                </button>
                <!-- <router-link class="btn btn-primary bold" :to="{name:'status'}">สมัครฝึกงาน</router-link> -->
						  </div>
            </div>
      </div>
  </div>
</template>

<script>
import ColumHeader from '~/components/ColumHeader'
import {mapActions, mapGetters} from 'vuex'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

export default {
  middleware: 'auth',
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      studentInfo:'comevents/showreqs',
      infos:'profile/userinfos',
    })
  },
data() {
  return {
    form:{
      question1:'',
      question2:'',
      event_id:'',
      stu_id:'',
    },
    }
},
  components:{
    ColumHeader,
  },
  methods: {
    ...mapActions({
      fetch:'comevents/showreqs',
      fetchprofile:'profile/fetch',
    }),
    cheack(){
     Swal.fire({
    title: 'ยืนยันการสมัครฝึกงาน',
    text: "หากยืนยันแล้วจะไม่สามารถแก้ไขได้",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'ยกเลิก',
    confirmButtonText: 'ยืนยันการสมัคร',
    }).then((result) => {
      if (result.value) {
        this.confirmJoin()
        Swal.fire(
          'สมัครการฝึกงานเรียบร้อย',
          'ผลการสมัครของคุณอยู่ในสถานะฝึกงาน',
          'success',
        )
      }
    })
   },
    async confirmJoin(){
      await this.join(this.form)
      this.$router.push({name:'status'})
    }
  },
  created(){
    this.fetch(this.id),
    this.fetchprofile()
  }
}
</script>
<style scoped>
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