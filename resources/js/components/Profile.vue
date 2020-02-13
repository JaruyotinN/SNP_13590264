<template>
<div class="col-md-12">
            <div class="row">
                <div class="col-md-10">
                    <div class="img-circle ">
                        <img src="/uploads/images/comevents/profile.JPG">
                    </div>
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mb-2 bold">นายณัทกฤช จารุโยธิน</h4>
                        <p class="m-0">มหาวิทยาลัยศิลปากร คณะเทคโนโลยีสารสนเทศและการสื่อสาร</p>
                        <p class="m-0">สาขา ออกแบบเว็บและสื่อโต้ตอบ รหัส 13590264</p>
                    </div>
                </div>
                <div class="col-md-2 mt-4">
                    <router-link class="btn btn-primary bold" :to="{ name:'edit', query: { id:user.id}}">แก้ไข้อมูล</router-link>
                    <!-- <router-link class="btn btn-primary bold" :to="{name:'edit', params:{id:user.id}}">แก้ไข้อมูล</router-link> -->
                </div>
            </div>
            <hr>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
    export default {
    computed: mapGetters({
    user: 'auth/user'
  }),
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
.btn-primary {
    width: 100% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:white;
    background-color: #0047BA ;
    border: none;  
    box-shadow:none;
}

</style>