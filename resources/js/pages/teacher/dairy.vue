<template>
<div class="container" >
  <div class="col-12">
      <div class="row">
                <div class="col-md-10">
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mb-2 bold">บันทึกฝึกงานของนักศึกษา</h4>
                    </div>
                </div>
                <div class="col-md-2 mt-4">
                    <router-link class="btn btn-outline-primary bold" :to="{name:'postdairy', params: {id: 1} }">เพิ่มบันทึกฝึกงาน</router-link>
                </div>
            </div>
             <hr class="hr-yellow">
 
    
    
  </div>
</div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  middleware: 'auth',
  methods: {
    ...mapActions({
      
    }),
  },
  data() {
    return {
      
      }
  },
 
  computed:{
  
    ...mapGetters({
       
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
.img-circle{
    margin: 0 auto;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden; 

}
.img-circle img{
    width: 100%;
}
.card{
    padding : 1.5rem;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
 

</style>
