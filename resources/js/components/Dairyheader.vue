<template>
 <div class="col-md-12">
            <div class="row">
                <div class="col-md-10">
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mb-2 bold">บันทึกฝึกงาน </h4>
                    </div>
                </div>
                <div class="col-md-2 mt-4">
                    <router-link class="btn btn-primary bold" :to="{name:'postdairy', params: {id: users.id} }">เพิ่มบันทึกฝึกงาน</router-link>
                </div>
            </div>
            <ul class="nav">
                <li class="n-setup bold active">
                    <router-link :to="{name:'student'}">บันทึกทั้งหมด</router-link>
                </li>
                <li class="n-setup">
                    <router-link :to="{name:'student'}">บันทึกของตนเอง</router-link>
                </li>
            </ul>
             <hr>
</div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
   
   export default {
    methods:{
    ...mapActions({
    fetch: 'auth/fetchUser',
    })
    },  
    computed:{
    ...mapGetters({
      users:'auth/user'
    }),
    },
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

.n-setup a{
    color: gray;
    padding-right: 15px;
}
.n-setup a:hover{
    text-decoration: none;
    color: #0047BA !important;
}
.active a{ 
  color: #0047BA !important;
 }

</style>