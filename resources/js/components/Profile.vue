<template>
<div class="col-md-12">
            <div class="row" v-for="(user, index) in users" :key="index" :class="{ active: index == 0 }">
                <div class="col-md-10">
                    <div class="img-circle">
                        <img src="/uploads/images/comevents/user.png" v-if="user.student.img == null" />
                        <img v-else :src="user.student.img">
                    </div> 
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mb-2 bold">{{user.student.name}} {{user.student.surname}}</h4>
                        <p class="m-0">{{user.student.major.faculty.university.name}} คณะ {{user.student.major.faculty.name}}</p>
                        <label class="m-0">สาขา {{ user.student.major.name}}</label>
                        <label class="m-0">รหัส {{user.student.number}}</label>
                    </div>
                </div>
                <div class="col-md-2 mt-4">
                    <router-link class="btn btn-outline-primary bold" :to="{name:'edit', params:{id:user.user_id}}">แก้ไข้อมูลส่วนตัว</router-link>
                </div>
            </div>
            <hr class="hr-yellow">
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex'
export default {
    
data() {
  return {
   
  }
  },
  computed:{
    ...mapGetters({
      users:'profile/userinfos'
    })
  },
  methods: {
    ...mapActions({
      fetch:'profile/fetch'
    })
  },
  created(){
     this.fetch()
  }
}
</script>

<style  scoped>
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
.btn-outline-primary {
    width: 100% ; 
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

</style>