<template>
 <div class="container" > 
    <div class="col-md-10 m-auto">
    <div class="card">
      <div class="col-md-10 m-auto" >
        <form @submit.prevent="login()" @keydown="form.onKeydown($event)">
          <div class="mt-4 mb-4">
            <h5 class="bold">เข้าสู่ระบบ</h5>
          </div>
          <hr class="hr-orange">
       
            <div class="col-md-12">
                 <div class="row">

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

              
            </div>
            <!-- end row -->
          </div> 

          <div class="col-md-6 m-auto">
            <button class="btn-outline-primary bold mt-3 mb-3" :loading="form.busy">
                เข้าสู่ระบบ
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
import { mapGetters } from 'vuex'


export default {
  middleware: 'guest',

  components: {
  },

  metaInfo () {
    return { title: this.$t('login') }
  },

  data: () => ({
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false
  }),
   computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async login () {
      // Submit the form.
      const { data } = await this.form.post('/api/login')

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')

      // Redirect home.
      if(this.user.role == 1)
      {
           this.$router.push({ name: 'student' })

      } else if(this.user.role == 2)
      {
           this.$router.push({ name: 'teacher' })
      } else if(this.user.role == 3)
      {
           this.$router.push({ name: 'company' })
      }
     
    }
  }
}
</script>
<style scoped>
 
.form-control{
    border-radius: 2rem;
}
.card{
    padding :25px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.btn-outline-primary {
    width: 60% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    display:block;
    margin-left: auto;
    margin-right: auto;
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

