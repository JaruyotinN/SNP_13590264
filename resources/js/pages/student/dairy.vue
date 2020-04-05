<template>
   <div class="container" >
    <div class="col-12">
      <div class="row">
                <div class="col-md-10">
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mb-2 bold">บันทึกฝึกงาน </h4>
                    </div>
                </div>
                <div class="col-md-2 mt-4">
                    <router-link class="btn btn-outline-primary bold" :to="{name:'postdairy', params: {id: users.id} }">เพิ่มบันทึกฝึกงาน</router-link>
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
             <hr class="hr-yellow">
    </div>
      <div class="row">
          <div class="col-md-12" v-for="(dairy, index) in interndairys" :key="index">
          <Dairycard :dairy="dairy"/>
          </div>
      </div>
      </div>
  </div>
</template>

<script>
import Dairyheader from '~/components/Dairyheader'
import Dairycard from '~/components/Dairycard'
import { mapGetters, mapActions } from "vuex";

export default {
  middleware: 'auth',
  methods: {
    ...mapActions({
      fetch:'interndairys/fetch',
    }),
  },
  data() {
    return {
      
      }
  },
  components:{
    Dairyheader,
    Dairycard,
  },
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
       interndairys:'interndairys/interndairys',
       users:'auth/user',
    })
  },
  created(){
     this.fetch()
  }
}
</script>

<style  scoped>
.btn-outline-primary {
    width: 100% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
    /* font-size: 0.75rem; */
}
.btn-outline-secondary {
    width: 40% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    border: 2px solid ;
    box-shadow:none;
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
