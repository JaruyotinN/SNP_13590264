<template>
   <div class="container" > 
       <!-- <pre>{{user}}</pre> -->
        <div class="col-md-12">
        <form @submit.prevent="update" @keydown="form.onKeydown($event)">
        <ColumHeader title='แก้ไขข้อมูลผู้ใช้งาน' showBack="student"/>
            <div class="row">
                <div class="col-md-3">
                    <div class="img-circle center">     
                        <img :src="form.img"/>
                    </div>
                    <div class="center mt-2">
                        <a class="f025" href="#">แก้ไขรูปโปรไฟล์</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <p>ชื่อ</p>
                            <div class="mt-2 mb-3">
                                <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name"  placeholder="โปรดใส่ชื่อของคุณ">
                                <has-error :form="form" field="name" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>นามสกุล</p>
                            <div class="mt-2 mb-3">
                                 <input v-model="form.surname" :class="{ 'is-invalid': form.errors.has('surname') }" class="form-control" type="text" name="surname"  placeholder="โปรดใส่ชื่อของนามสกุลของคุณ">
                                <has-error :form="form" field="surname" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>รหัสนักศึกษา</p>
                            <div class="mt-2 mb-3">
                                 <input v-model="form.number" :class="{ 'is-invalid': form.errors.has('number') }" class="form-control" type="text" name="number"  placeholder="โปรดใส่ชื่อรหัสนักศึกษา">
                                <has-error :form="form" field="number" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>มหาวิทยาลัย</p>
                            <div class="mt-2 mb-3">
                                <input v-model="form.major.faculty.university.name" :class="{ 'is-invalid': form.errors.has('university') }" class="form-control" type="text" name="university"  placeholder="มหาวิทยาลัย">
                                <has-error :form="form" field="university" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>คณะ</p>
                            <div class="mt-2 mb-3">
                                <input v-model="form.major.faculty.name" :class="{ 'is-invalid': form.errors.has('faculty') }" class="form-control" type="text" name="faculty"  placeholder="คณะ">
                                <has-error :form="form" field="faculty" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>สาขา / เอก</p>
                            <div class="mt-2 mb-3">
                                <input v-model="form.major.name" :class="{ 'is-invalid': form.errors.has('major') }" class="form-control" type="text" name="major"  placeholder="สาขา / เอก">
                                <has-error :form="form" field="major" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
              <div class="col-md-3 offset-9">
                <div class="btn-detail-style mt-3 mb-3">
                    <router-link class="btn btn-primary bold" :to="{name:'student'}">บันทึกข้อมูลผู้ใช้งาน</router-link>
                </div>
              </div>
        <ColumHeader title="แก้ไขข้อมูล Resume / Portfolio"/>
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
        </div>
               <div class="col-md-3 offset-9">
                <div class="btn-detail-style mt-3 mb-3">
                    <router-link class="btn btn-primary bold" :to="{name:'student'}">บันทึกข้อมูล</router-link>
                </div>
              </div>
        <ColumHeader title="แก้ไขข้อมูลความถนัด"/>
       <h5 class="bold center">**ความถนัดสามารถเลือกได้สูงสุด 4 ประเภทจากคะแนนทั้งหมด 15 คะแนน**</h5>
            <div class="row mt-3">
                <div class="col-md-6">
                    <p>หมวดหมู่ที่ 1</p>
                     <div class="input-group mt-2 mb-3">
                        <select class="custom-select mr-1 w-30" id="inputGroupSelect01">
                            <option selected>หมวดหมู่</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select mr-2 w-30" id="inputGroupSelect01">
                            <option selected>เลือกหมวด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>ความถนัด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>หมวดหมู่ที่ 2</p>
                     <div class="input-group mt-2 mb-3">
                        <select class="custom-select mr-1 w-30" id="inputGroupSelect01">
                            <option selected>หมวดหมู่</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select mr-2 w-30" id="inputGroupSelect01">
                            <option selected>เลือกหมวด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>ความถนัด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>หมวดหมู่ที่ 3</p>
                     <div class="input-group mt-2 mb-3">
                        <select class="custom-select mr-1 w-30" id="inputGroupSelect01">
                            <option selected>หมวดหมู่</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select mr-2 w-30" id="inputGroupSelect01">
                            <option selected>เลือกหมวด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>ความถนัด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>หมวดหมู่ที่ 4</p>
                     <div class="input-group mt-2 mb-3">
                        <select class="custom-select mr-1 w-30" id="inputGroupSelect01">
                            <option selected>หมวดหมู่</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select mr-2 w-30" id="inputGroupSelect01">
                            <option selected>เลือกหมวด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>ความถนัด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>
              <div class="col-md-3 offset-9">
                <div class="btn-detail-style mt-3 mb-3">
                    <v-button
                    :loading="form.busy"
                    id="createbtn"
                    class="btn btn-primary bold"
                    >{{ id ? "update" : "save" }}</v-button>
                </div>
              </div>
        </form>
        
        
  </div>
   </div>
</template>

<script>
import Form from 'vform'
import {mapActions, mapGetters} from 'vuex'
import ColumHeader from '~/components/ColumHeader'

export default {
  middleware: 'auth',
 data: () => ({
    form: new Form({
      name: "",
      surname: "",
      number: "",
      major:"",
      university:"",
      faculty:"",
      img:"",
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
.f025{
    font-size: 0.25rem;
}
.form-control{
    border-radius: 2rem;
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
.custom-select{
    border-radius: 2rem !important;
}
.form-control{
    border-radius: 2rem;
}
</style>