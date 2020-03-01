<template>
     <div class="col-md-12">
        <form @submit.prevent="update" @keydown="form.onKeydown($event)">
        <ColumHeader title='แก้ไขข้อมูล Resume / Portfolio'/>
        <div class="row">
            <div class="col-md-4">
                <p>Portfolio</p>
                <div class="mt-2 mb-3">
                    <input v-model="form.port" :class="{ 'is-invalid': form.errors.has('port') }" class="form-control" type="text" name="port"  placeholder="port">
                    <has-error :form="form" field="port" />
                </div>
            </div>
            <div class="col-md-4">
                <p>Resume</p>
                <div class="mt-2 mb-3">
                    <input v-model="form.cv" :class="{ 'is-invalid': form.errors.has('cv') }" class="form-control" type="text" name="cv"  placeholder="cv">
                    <has-error :form="form" field="port" />
                </div>
            </div>
            <div class="col-md-4">
                <p>URL สำหรับผลงาน</p>
                <div class="mt-2 mb-3">
                    <input v-model="form.url_port" :class="{ 'is-invalid': form.errors.has('url_port') }" class="form-control" type="text" name="url_port"  placeholder="url_port">
                    <has-error :form="form" field="url_port" />
                </div>
            </div>
            <div class="col-md-3 offset-9">
                <div class="btn-detail-style mt-3 mb-3">
                    <router-link class="btn btn-primary bold" :to="{name:'student'}">บันทึกข้อมูล</router-link>
                </div>
            </div>
        </div>
        </form>
    </div> <!-- col-md-12 -->  
</template>

<script>
import Form from 'vform'
import {mapActions, mapGetters} from 'vuex'
import ColumHeader from '~/components/ColumHeader'

export default {
  middleware: 'auth',
 data: () => ({
    form: new Form({
      port: "",
      cv:"",
      url_port:"",
    }),
    image: "",
    file: ""
  }),
  components:{
    ColumHeader,
  },
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
       ...mapGetters({
    user: 'profile/show'
   
  }),
  },
  
  async created () {
    // Fill the form with user data.
    await this.fetchshow(this.id),
    this.form.keys().forEach(key => {
      this.form[key] = this.user.student[key]
    })
     
  },
  methods: {
    async update () {
      const { data } = await this.form.patch('/api/settings/profile')
      this.$store.dispatch('auth/updateUser', { user: data })
    },
    ...mapActions({
      fetchshow:'profile/show'
    })
   
  }
   
}


</script>
<style scoped>
.form-control{
    border-radius: 2rem;
}
.btn-detail-style .btn-primary{ 
    background-color: #0047BA ;
    border:none; 
    border-radius: 30px;
    width: 100%;
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

