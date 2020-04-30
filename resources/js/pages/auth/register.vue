<template>
<div class="container" > 
    <div class="col-md-10 m-auto">
    <div class="card">
      <div class="col-md-10 m-auto" >
        <form @submit.prevent="register" @keydown="form.onKeydown($event)">
          <div class="mt-4 mb-4">
            <h5 class="bold">สมัครสมาชิก</h5>
          </div>
          <hr class="hr-orange">
       
            <div class="col-md-12">
                 <div class="row">
                  <div class="form-group col-md-6">
                      <label class="color-blue bold">Username</label>
                      <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
                      <has-error :form="form" field="name" />
                </div>

                  <div class="form-group col-md-6">
                      <label class="color-blue bold">Email</label>
                      <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
                      <has-error :form="form" field="email" />
                </div>

                <div class="form-group col-md-6">
                      <label class="color-blue bold">Password</label>
                      <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
                      <has-error :form="form" field="password" />
                </div>

                <div class="form-group col-md-6">
                  <label class="color-blue bold">ผู้ใช้งาน</label><br>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" v-model="role" value="teacher">
                        <label class="form-check-label" for="inlineRadio1">อาจารย์</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" v-model="role"  id="inlineRadio2" value="company">
                        <label class="form-check-label" for="inlineRadio2">บริษัท</label>
                      </div>
                </div>
            </div>
            <!-- end row -->
          </div> 

          <div v-if="role == 'teacher'">
              <div class="mt-4 mb-4">
                <h5 class="bold">ข้อมูลของอาจารย์</h5>
              </div>
              <hr class="hr-orange">
              <div class="row">
                   <div class="form-group col-md-6">
                      <label class="color-blue bold">ชื่ออาจารย์</label>
                      <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
                      <has-error :form="form" field="name" />
                  </div>

                   <div class="form-group col-md-6">
                      <label class="color-blue bold">นามสกุลอาจารย์</label>
                     <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
                      <has-error :form="form" field="name" />
                  </div>
                  
                   <div class="form-group col-md-6">
                      <label class="color-blue bold">Email ของอาจารย์</label>
                     <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
                      <has-error :form="form" field="name" />
                  </div>

                   <div class="form-group col-md-6">
                      <label class="color-blue bold">มหาวิทยาลัย</label>
                      <select class="custom-select  m-auto" v-model="form.job" >
                            <option value="" disabled hidden>เลือกหมวดหมู่การฝึกงาน</option>
                            <!-- <option v-for="(job, index) in jobs" :key="index" :value="job.id">{{job.title}}</option> -->
                      </select>
                  </div>
                   <div class="form-group col-md-6">
                      <label class="color-blue bold">คณะ</label>
                      <select class="custom-select  m-auto" v-model="form.job" >
                            <option value="" disabled hidden>เลือกหมวดหมู่การฝึกงาน</option>
                            <!-- <option v-for="(job, index) in jobs" :key="index" :value="job.id">{{job.title}}</option> -->
                      </select>
                  </div>

                   <div class="form-group col-md-6">
                      <label class="color-blue bold">สาขา</label>
                      <select class="custom-select  m-auto" v-model="form.job" >
                            <option value="" disabled hidden>เลือกหมวดหมู่การฝึกงาน</option>
                            <!-- <option v-for="(job, index) in jobs" :key="index" :value="job.id">{{job.title}}</option> -->
                      </select>
                  </div>

                   <div class="form-group col-md-12">
                      <label class="color-blue bold">ภาพโปรไฟล์</label>
                      <div class="input-group mb-3">
                            <input class="form-control custom-file-input" type="file" name="image" @change="setImg">
                            <label class="custom-file-label" ></label>
                            <has-error :form="form" field="image" />
                      </div>
            </div>           
             </div>
          </div>
           <div v-else-if="role == 'company'">
              <div class="mt-4 mb-4">
                <h5 class="bold">ข้อมูลของบริษัท</h5>
              </div>
              <hr class="hr-orange">
              <div class="row">
                  <div class="form-group col-md-6">
                      <label class="color-blue bold">ชื่อบริษัท</label>
                      <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
                      <has-error :form="form" field="name" />
                  </div>

                   <div class="form-group col-md-6">
                      <label class="color-blue bold">หมายเลขโทรศัพท์</label>
                      <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
                      <has-error :form="form" field="name" />
                  </div>

                  <div class="form-group col-md-12">
                      <label class="color-blue bold">ที่อยู่บริษัท</label>
                      <textarea v-model="form.description" type="text" rows="4" cols="100">

                      </textarea>
                  </div>
                  
                  <div class="form-group col-md-6">
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
                  </div>           
             </div>
           </div>

          <div class="form-group row">
            <div class="col-md-7 offset-md-3 d-flex">
              <!-- Submit Button -->
              <v-button :loading="form.busy">
                {{ $t('register') }}
              </v-button>

            </div>
          </div>
        </form>
      </div>
    </div>      
    </div>
  </div>
</template>

<script>
import Form from 'vform'
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
      name: '',
      email: '',
      password: '',
      role:1,
      password_confirmation: ''
    }),
    role:'',
    mustVerifyEmail: false
  }),

  methods: {
    async register () {
      // Register the user.
      const { data } = await this.form.post('/api/register')

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true
      } else {
        // Log in the user.
        const { data: { token } } = await this.form.post('/api/login')

        // Save the token.
        this.$store.dispatch('auth/saveToken', { token })

        // Update the user.
        await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
        this.$router.push({ name: 'home' })
      }
    }
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
.form-control{
    border-radius: 2rem;
}
.card{
    padding :25px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}

 

</style>
