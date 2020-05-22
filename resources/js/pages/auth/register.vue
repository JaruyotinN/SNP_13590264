<template>
<div class="container" > 
    <div class="col-md-10 m-auto">
    <div class="card">
      <div class="col-md-10 m-auto" >
        <form @submit.prevent="register(role)" @keydown="form.onKeydown($event)">
          <div class="mt-4 mb-4">
            <h5 class="bold">สมัครสมาชิก</h5>
          </div>
          <hr class="hr-orange">
       
            <div class="col-md-12">
                 <div class="row">
                  <div class="form-group col-md-6">
                      <label class="color-blue bold">Username</label>
                      <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name" required>
                      <has-error :form="form" field="name" />
                </div>

                  <div class="form-group col-md-6">
                      <label class="color-blue bold">Email</label>
                      <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email" required>
                      <has-error :form="form" field="email" />
                </div>

                <div class="form-group col-md-6">
                      <label class="color-blue bold">Password</label>
                      <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password" required>
                      <has-error :form="form" field="password" />
                </div>

                <div class="form-group col-md-6">
                 
                  <label class="color-blue bold">ผู้ใช้งาน</label><br>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" v-model="form.role" value="1">
                        <label class="form-check-label" for="inlineRadio1">อาจารย์</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" v-model="form.role"  id="inlineRadio2" value="2">
                        <label class="form-check-label" for="inlineRadio2">บริษัท</label>
                      </div>
                </div>
            </div>
            <!-- end row -->
          </div> 

          <div v-if="form.role == 1" required>
              <div class="mt-4 mb-4">
                <h5 class="bold">ข้อมูลของอาจารย์</h5>
              </div>
              <hr class="hr-orange">

              <div class="row"> 
                   <div class="form-group col-md-6">
                      <label class="color-blue bold">ชื่ออาจารย์</label>
                      <input v-model="form.tname" :class="{ 'is-invalid': form.errors.has('tname') }" class="form-control" type="text" name="tname">
                      <has-error :form="form" field="tname" />
                  </div>

                   <div class="form-group col-md-6">
                      <label class="color-blue bold">นามสกุลอาจารย์</label>
                     <input v-model="form.tsurname" :class="{ 'is-invalid': form.errors.has('tsurname') }" class="form-control" type="text" name="tsurname">
                      <has-error :form="form" field="tsurname" />
                  </div>
                  
                   <div class="form-group col-md-6">
                      <label class="color-blue bold">Email ของอาจารย์</label>
                     <input v-model="form.temail" :class="{ 'is-invalid': form.errors.has('temail') }" class="form-control" type="text" name="temail">
                      <has-error :form="form" field="temail" />
                  </div>

                   <div class="form-group col-md-6">
                      <label class="color-blue bold">หมายเลขโทรศัพท์</label>
                     <input v-model="form.tphonenumber" :class="{ 'is-invalid': form.errors.has('tphonenumber') }" class="form-control" type="text" name="tphonenumber">
                      <has-error :form="form" field="tphonenumber" />
                  </div>

                   <div class="form-group col-md-4">
                      <label class="color-blue bold">มหาวิทยาลัย</label>
                      <select class="custom-select  m-auto" v-model="form.uni_id" >
                            <option value="" disabled hidden>เลือกมหาวิทยาลัยของคุณ</option>
                            <option v-for="(uni, index) in university.university" :key="index" :value="uni.id">{{uni.name}} ({{uni.initial}})</option>
                      </select>
                  </div>
                   <div class="form-group col-md-4">
                      <label class="color-blue bold">คณะ</label>
                      <select class="custom-select  m-auto" v-model="form.faculty_id" >
                            <option value="" disabled hidden>เลือกคณะของคุณ</option>
                            <option v-for="(fac, index) in university.faculty" v-if="fac.uni_id == form.uni_id" :key="index" :value="fac.id">{{fac.name}}</option>
                      </select>
                  </div>

                  <div class="form-group col-md-4">
                      <label class="color-blue bold">สาขา</label>
                      <select class="custom-select  m-auto" v-model="form.major_id" >
                            <option value="" disabled hidden>เลือกสาขาของคุณ</option>
                            <option v-for="(maj, index) in university.major" v-if="maj.faculty_id == form.faculty_id" :key="index" :value="maj.id">{{maj.name}}</option>
                      </select>
                  </div>

                   <!-- <div class="form-group col-md-12">
                      <label class="color-blue bold">ภาพโปรไฟล์</label>
                      <div class="input-group mb-3">
                            <input class="form-control custom-file-input" type="file" name="image" @change="setImg">
                            <label class="custom-file-label" ></label>
                            <has-error :form="form" field="image" />
                      </div>
                  </div>            -->
             </div>
          </div>
           <div v-else-if="form.role == 2" required>
              <div class="mt-4 mb-4">
                <h5 class="bold">ข้อมูลของบริษัท</h5>
              </div>
              <hr class="hr-orange">
              <div class="row">
                
                  <div class="form-group col-md-4">
                      <label class="color-blue bold">ชื่อบริษัท</label>
                      <input v-model="form.cname" :class="{ 'is-invalid': form.errors.has('cname') }" class="form-control" type="text" name="cname">
                      <has-error :form="form" field="cname" />
                  </div>

                   <div class="form-group col-md-4">
                      <label class="color-blue bold">Email ของบริษัท</label>
                      <input v-model="form.cemail" :class="{ 'is-invalid': form.errors.has('cemail') }" class="form-control" type="text" name="cemail">
                      <has-error :form="form" field="cemail" />
                  </div>

                   <div class="form-group col-md-4">
                      <label class="color-blue bold">หมายเลขโทรศัพท์</label>
                      <input v-model="form.cphonenumber" :class="{ 'is-invalid': form.errors.has('cphonenumber') }" class="form-control" type="text" name="cphonenumber">
                      <has-error :form="form" field="cphonenumber" />
                  </div>

                  <div class="form-group col-md-12">
                      <label class="color-blue bold">ที่อยู่บริษัท</label>
                      <textarea v-model="form.address" type="text" rows="2" cols="100">

                      </textarea>
                  </div>
                  {{form.province_id}}
                  <div class="form-group col-md-6">
                      <label class="color-blue bold">จังหวัด</label>
                      <select class="custom-select  m-auto" v-model="form.province_id" >
                            <option value="" disabled hidden>เลือกจังหวัดของคุณ</option>
                            <option v-for="(loc, index) in location.province" :key="index" :value="loc.id">{{loc.name_th}}</option>
                      </select>
                  </div>

                  
                  <div class="form-group col-md-6">
                      <label class="color-blue bold">อำเภอ / เขต</label>
                      <select class="custom-select  m-auto" v-model="form.amphure_id" >
                            <option value="" disabled hidden>เลือกอำเภอ/เขตของคุณ</option>
                            <option v-for="(loc, index) in location.amphures" v-if="loc.province_id == form.province_id" :key="index" :value="loc.id" >{{loc.name_th}}</option>
                           
                      </select>
                  </div>

                  <!-- <div class="form-group col-md-6">
                      <label class="color-blue bold">ภาพโปรไฟล์บริษัท</label>
                      <div class="input-group mb-3">
                            <input class="form-control custom-file-input" type="file" name="image" @change="setImg">
                            <label class="custom-file-label" ></label>
                            <has-error :form="form" field="image" />
                      </div>
                  </div> 

                   <div class="form-group col-md-6">
                      <label class="color-blue bold">ไฟล์หนังสือรับรองนิติบุคคล</label>
                      <div class="input-group mb-3">
                            <input class="form-control custom-file-input" type="file" name="image" @change="setImg">
                            <label class="custom-file-label" ></label>
                            <has-error :form="form" field="image" />
                      </div>
                  </div>            -->

             </div>
           </div>

         <div class="col-md-6 m-auto" v-if="form.role != ''"> 
            <button class="btn-outline-primary bold mt-3 mb-3" :loading="form.busy">
                สมัครสมาชิก
            </button>
          </div>
        </form>
      </div>
    </div>      
    </div>
  </div>
</template>

<script>
import Form from 'vform'
import {mapActions, mapGetters} from 'vuex'
import LoginWithGithub from '~/components/LoginWithGithub'


export default {
  middleware: 'guest',

  components: {
    LoginWithGithub
  },

  metaInfo () {
    return { title: this.$t('register') }
  },

  data: () => ({
    form: new Form({
      tname: '',
      tsurname:'',
      temail:'',
      tphonenumber:'',
      uni_id:'',
      faculty_id:'',
      major_id:'',

      cname:'',
      cemail:'',
      cphonenumber:'',
      address:'',
      province_id:'',
      amphure_id:'',

      name:'',
      emil:'',
      password: '',

      role:'',
    }),
    mustVerifyEmail: false
  }),
  computed:{
    ...mapGetters({
      location:'location/province',
      university:'teacher/alluniversity',
      
    }),
  },
  methods: {
    async register (role) {
 
      // Register the user.
      // const { data } = await this.form.post('/api/register')
       const { data } = await this.form.post("/api/createuser");

      // Must verify email fist.
      if (data.status == 'success') {
        alert('register success!!!')
        // Log in the user.
        // const { data: { token } } = await this.form.post('/api/login')

        // // // Save the token.
        // this.$store.dispatch('auth/saveToken', { token })

        // // // Update the user.
        // await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
  
         this.$router.push({ name: 'login' })
        
      }else{
        alert('error!!')
      }
    },
      ...mapActions({
      fetchlocation:'location/fetch',
      fetchalluni: 'teacher/fetchalluni'
    })
  },
    created(){
     this.fetchlocation()
     this.fetchalluni()
    
  }
}
</script>

<style scoped>
textarea {
  padding : 1.5rem;
  width: 100%;
  overflow: auto;
  box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
  border-radius: 5px;
  outline: none !important; 
  border:none;
}
.textcustom p{
   padding: 10px 0  0 0 !important;
   color: gray;
   margin-block-start: 0rem;
   margin-block-end: 0rem;
} 
.textcustom label{
   font-size: 0.75rem;
   color: gray;
} 
.cmt-25{
  margin-top: 2.5rem;
}
.f025{
    font-size: 0.25rem;
}
.form-control{
    border-radius: 2rem;
    font-size: 0.80rem;
}
.img-circle{
    width: 125px;
    height: 125px;
    border-radius: 50%;
    overflow: hidden; 
    background-color: gray;
}
.img-circle img{
    width: 100%;
}
.btn-outline-primary {
    width: 80% ; 
    height: 50px; 
    float: right;
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
}
.custom-select{
    border-radius: 2rem !important;
    font-size: 0.80rem;
}
 
.card{
    padding :25px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}

 

</style>
