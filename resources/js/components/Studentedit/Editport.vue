<template>
     <div class="col-md-12">
        <form @submit.prevent="editport" @keydown="form2.onKeydown($event)">
        <ColumHeader title='แก้ไขข้อมูล Resume / Portfolio'/>
        <div class="row">
            <div class="col-md-4">
                <p>Portfolio</p>
                <div class="mt-2 mb-3">
                    <input v-model="form2.port" :class="{ 'is-invalid': form2.errors.has('port') }" class="form2-control" type="text" name="port"  placeholder="port">
                    <has-error :form2="form2" field="port" />
                </div>
            </div>
            <div class="col-md-4">
                <p>Resume</p>
                <div class="mt-2 mb-3">
                    <input v-model="form2.cv" :class="{ 'is-invalid': form2.errors.has('cv') }" class="form2-control" type="text" name="cv"  placeholder="cv">
                    <has-error :form2="form2" field="port" />
                </div>
            </div>
            <div class="col-md-4">
                <p>URL สำหรับผลงาน</p>
                <div class="mt-2 mb-3">
                    <input v-model="form2.url_port" :class="{ 'is-invalid': form2.errors.has('url_port') }" class="form2-control" type="text" name="url_port"  placeholder="url_port">
                    <has-error :form2="form2" field="url_port" />
                </div>
            </div>
             <input class="form2-control" type="hidden" v-model="form2.id = user.student.id">
              <div class="col-md-3 offset-9">
                <div class="btn-detail-style mt-3 mb-3">
                    <button class="btn btn-primary bold" 
                    :loading="form2.busy">
                    บันทึกข้อมูลผู้ใช้งาน
                    </button>
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
    form2: new Form({
      port: "",
      cv:"",
      url_port:"",
      get:2,
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
    // Fill the form2 with user data.
    await this.fetchshow(this.id),
    this.form2.keys().forEach(key => {
      this.form2[key] = this.user.student[key]
    })
     
  },
  methods: {
    ...mapActions({
      fetchshow:'profile/show'
    }),
     async editport() {

     const { data } = await this.form2.put(`/api/updateprofile/${this.form2.id}`);
     console.log(data)
     this.fetch()
      if (data) {
        this.$router.push({
          name: "student",
        });
      }
    },
  }
   
}


</script>
<style scoped>
.form2-control{
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

