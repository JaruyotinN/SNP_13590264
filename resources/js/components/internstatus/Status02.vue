<template>
<div class="col-md-12">
    <form @submit.prevent="update" @keydown="form.onKeydown($event)">
    <div class="row">   
         <div class="col-md-6">
            <h>บริษัท</h>
            <div class="mt-2 mb-3">
            <input class="form-control" type="text" placeholder="Comapany" value="บริษัท ไลค์มี จำกัด">
            </div>
        </div>
        <div class="col-md-6">
            <h>หน่วยงาน</h>
            <div class="mt-2 mb-3">
            <input class="form-control" type="text" placeholder="Comapany" value="Future Trends">
            </div>
        </div>
         <div class="col-md-6">
            <h>ผู้ดูแล</h>
            <div class="mt-2 mb-3">
            <input class="form-control" type="text" placeholder="Comapany" value="นางโลเล็ม ยิปซั่ม">
            </div>
        </div>
        <div class="col-md-6">
            <h>ตำแหน่งผู้ดูแล</h>
            <div class="mt-2 mb-3">
            <input class="form-control" type="text" placeholder="Comapany" value="Content Creator">
            </div>
        </div>
    </div>
    <div class="" v-for="(user, index) in users" :key="index" :class="{ active: index == 0 }">
         <p>stu : id {{user.student.id}}</p> <input class="form-control" type="hidden" v-model="form.id = user.student.id">
    </div>
  
   <div class="btn-detail-style mt-3 mb-3">
        <button class="btn btn-primary bold" :loading="form.busy">ดำเนินการขั้นต่อไป</button>
	</div>
    </form>

</div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Form from "vform";

   export default {
  middleware: 'auth',
  data: () => ({
    form: new Form({
      id:'',
      get:4,
    }),
  }),
  methods: {
   ...mapActions({
     userjoin:'comevents/userjoin',
     fetch:'profile/fetch'
   }),
      async update() {

     const { data } = await this.form.put(`/api/updateprofile/${this.form.id}`);
     console.log(data)
     this.fetch()
      // if (data) {
      //   this.$router.push({
      //     name: "admin.item.show",
      //     params: { id: this.show.id }
      //   });
      // }
    },
  },
  created(){
    this.userjoin()
    
  },
  computed:{
  ...mapGetters({
      users:'profile/userinfos',
      userjoins:'comevents/userjoins',
    }),
  },
   }
</script>

<style  scoped>
.form-control{
    border-radius: 2rem;
}
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
