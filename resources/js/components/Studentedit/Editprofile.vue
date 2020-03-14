<template>
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
                                <input disabled v-model="form.major.faculty.university.name" :class="{ 'is-invalid': form.errors.has('university') }" class="form-control" type="text" name="university"  placeholder="มหาวิทยาลัย">
                                <has-error :form="form" field="university" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>คณะ</p>
                            <div class="mt-2 mb-3">
                                <input disabled  v-model="form.major.faculty.name" :class="{ 'is-invalid': form.errors.has('faculty') }" class="form-control" type="text" name="faculty"  placeholder="คณะ">
                                <has-error :form="form" field="faculty" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>สาขา / เอก</p>
                            <div class="mt-2 mb-3">
                                <input disabled v-model="form.major.name" :class="{ 'is-invalid': form.errors.has('major') }" class="form-control" type="text" name="major"  placeholder="สาขา / เอก ">
                                <has-error :form="form" field="major" />
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            {{user.student.id}}
             <input class="form-control" type="hidden" v-model="form.id = user.student.id">
              <div class="col-md-3 offset-9">
                <div class="btn-detail-style mt-3 mb-3">
                    <button class="btn btn-primary bold" 
                    :loading="form.busy">
                    บันทึกข้อมูลผู้ใช้งาน
                    </button>
                </div>
              </div>
        </form>
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
      get:1,
      name: "",
      surname: "",
      number: "",
      major:"",
      university:"",
      faculty:"",
      img:"",
      id:'',
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
    ...mapActions({
      fetchshow:'profile/show'
    }),
    async update() {

     const { data } = await this.form.put(`/api/updateprofile/${this.form.id}`);
     console.log(data)
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
</style>
