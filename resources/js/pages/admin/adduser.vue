<template>
<div class="container" >
    <form @submit.prevent="save" @keydown="form.onKeydown($event)">
    <div class="col-md-12">
              <div class="mb-3"> 
                    <router-link :to="{ name: 'admin'}">ย้อนกลับ</router-link>
              </div>
              <div class="row">
                  <div class="col-md-10">
                      <div class="mb-3 ml-3 mt-2">
                          <h4 class="mb-2 bold">เพิ่มผู้ใช้งาน</h4>
                      </div>
                  </div>
              </div>
              <hr class="hr-yellow" >
            <!-- <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
            <div class="col-md-7">
              <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" >
              <has-error :form="form" field="name" />
            </div>
          </div> -->
            <!-- <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
            <div class="col-md-7">
              <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
              <has-error :form="form" field="email" />
            </div>
          </div> -->
        <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('Start at') }}</label>
            <div class="col-md-7">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">SU</span>
                </div>
                <input v-model="form.start" :class="{ 'is-invalid': form.errors.has('start') }" class="form-control" type="text" name="start">
              <has-error :form="form" field="start" />
                <div class="input-group-append">
                    <span class="input-group-text">@inleanship.com</span>
                </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('End at') }}</label>
            <div class="col-md-7">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">SU</span>
                </div>
                <input v-model="form.end" :class="{ 'is-invalid': form.errors.has('end') }" class="form-control" type="text" name="end">
              <has-error :form="form" field="end" />
                <div class="input-group-append">
                    <span class="input-group-text">@inleanship.com</span>
                </div>
                </div>
            </div>
        </div>


                     <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('faculty_id') }}</label>
            <div class="col-md-7">
              <input v-model="form.faculty_id" :class="{ 'is-invalid': form.errors.has('faculty_id') }" class="form-control" type="number" name="faculty_id">
              <has-error :form="form" field="faculty_id" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('major_id') }}</label>
            <div class="col-md-7">
              <input v-model="form.major_id" :class="{ 'is-invalid': form.errors.has('major_id') }" class="form-control" type="number" name="major_id">
              <has-error :form="form" field="major_id" />
            </div>
          </div>

          
                 <!-- <div class="card mt-4">
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
                </div> -->
        </div>  
      
        <div class="col-md-6 m-auto">
            <button class="btn-outline-primary bold mb-3" :loading="form.busy">
                เพิ่มผู้ใช้
            </button>
         </div>
    </form>
</div>
</template>
<script>
import Form from "vform";
import {mapActions, mapGetters} from 'vuex'
export default {

data: () => ({
    form: new Form({
      start:'',
      end:'',
      role:1,
     major_id:'',
      faculty_id:'',
      password_confirmation: ''
    }),
  }),
  computed:{
    ...mapGetters({
    
    })
  },
  components:{
    
  },
   methods: {
    ...mapActions({
      
    }),
    async save() {
     
      const { data } = await this.form.post("/api/adduser");

    //   if (data) {
    //     this.$router.push({
    //       name: "admin",
    //     });
    //   }
    },
  },
   created(){
   
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
  padding : 1.5rem;
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
