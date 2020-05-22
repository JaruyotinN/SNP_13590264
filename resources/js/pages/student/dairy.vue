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
                    <router-link class="btn btn-outline-primary bold" :to="{name:'postdairy', params: {id: users.id} }">เพิ่มบันทึกฝึกงาน</router-link>
                </div>
            </div>
             <hr class="hr-yellow">
            <div v-if="interndairys.length">
            <div class="card mt-4" v-for="(dairy, index) in interndairys" :key="index" >
              <div class="col-12">
                   <div class="row">
                        <div class="col-2">
                            <div class="content-left mt-4">
                                <div class="img-circle">
                                    <img src="/uploads/images/comevents/user.png" v-if="dairy.student.img == null" center alt="..." class="card-img-top"/>
                                    <img :src="dairy.student.img" v-else center alt="..." class="card-img-top"/>
                                </div>
                                <div class="center mt-3">
                                    <p>{{ dairy.student.name }} {{ dairy.student.surname }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-10">
                            <h5 class="mt-4 p-1 bold">{{dairy.title}}</h5>
                            <h5 class=" mb-4 p-1" >{{dairy.description}}</h5>
                            <div class="fix-position">
                                <p>บันทึกวันที่ : {{dairy.created_at}} โดย {{dairy.student.name}} {{dairy.student.number}} </p>
                            </div> 
                        </div>
                    </div>
              </div>            
	        </div>
            </div>
            <div class="row" v-else > 
                <div class="col-md-12 center mt-5">
                    <h3 class="bold color-dblue">ยังไม่มีข้อมูลบันทึกฝึกงานของนักศึกษา</h3>
                </div>
            </div>
    
    
  </div>
</div>
</template>

<script>
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
.btn-outline-primary:hover {
    color: #fff !important;
    background-color: #133CBA;
    border-color: #133CBA;
}
.btn-outline-secondary {
    width: 40% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    border: 2px solid ;
    box-shadow:none;
}
h5{
    line-height: 1.75rem;
}
p{
    font-size: 0.25rem;
}
.center{
    text-align: center;
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
.fix-position{
    bottom: 0px;
    right: 15px;
    position: absolute;
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
