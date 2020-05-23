<template>
<div class="container" >
  <form @submit.prevent="cheack" @keydown="form.onKeydown($event)">
      <div class="mb-5"> 
        <router-link :to="{ name: 'company'}">ย้อนกลับ</router-link>
     </div> 
          <div class="card mt-5 mb-3">
                <div class="col-md-10 m-auto">
                    <h4 class="mb-5 mt-5 bold">แก้ไขข้อมูลบริษัท</h4>   
                    <hr class="hr-orange">
              
                <div class="row mt-5 mb-5">
                  <div class="col-md-3">
                      <div class="img-circle center">     
                          <img :src="form.logo"/>
                      </div>
                      <div class="center mt-2">
                          <a class="f025" href="#">
                          <input type="file" name="image" @change="setImg" />
                          </a>
                      </div>
                  </div>
                <div class="col-md-9">

                     <input class="form-control" type="hidden" v-model="form.id = user.company.id">
                    <div class="row">
                        <div class="col-md-4">
                            <p>ชื่อ</p>
                            <div class="mt-2 mb-3">
                                <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name"  placeholder="โปรดใส่ชื่อของคุณ">
                                <has-error :form="form" field="name" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>Email</p>
                            <div class="mt-2 mb-3">
                                 <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="text" name="email"  placeholder="โปรดใส่ Email ของคุณ">
                                <has-error :form="form" field="email" />
                            </div>
                        </div>
                         <div class="col-md-4">
                            <p>เบอร์โทรศัพท์</p>
                            <div class="mt-2 mb-3">
                                 <input v-model="form.phonenumber" :class="{ 'is-invalid': form.errors.has('phonenumber') }" class="form-control" type="text" name="phonenumber" step=".01" placeholder="โปรดใส่เกรดเฉลี่ย">
                                <has-error :form="form" field="phonenumber" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>จังหวัด</p>
                            <div class="mt-2 mb-3">
                                <select class="custom-select form-control" v-model="form.province_id" required>
                                    <option v-for="(loc, index) in location.province" :key="index" :value="loc.id">{{loc.name_th}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>อำเภอ</p>
                            <div class="mt-2 mb-3">
                                <select class="custom-select form-control" v-model="form.amphure_id" required>
                                    <option v-for="(loc, index) in location.amphures" v-if="loc.province_id == form.province_id" :key="index" :value="loc.id" >{{loc.name_th}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p>ที่อยู่</p>
                            <div class="mt-2 mb-3 ">
                               <textarea class="" v-model="form.address" rows="2" cols="100" required>
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
              </div>  <!-- row -->

        </div> <!-- card -->
         <div class="col-md-6 m-auto">
            <button class="btn-outline-primary bold mb-3" :loading="form.busy">
               แก้ไขข้อมูลบริษัท
            </button>
         </div>
    
  </form>
  </div>
 
</template>
<script>
import Form from "vform";
import {mapActions, mapGetters} from 'vuex'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
export default {
  middleware: 'auth',
  data: () => ({
    form: new Form({
      id:'',
      name:'',
      email:'',
      logo:'',
      phonenumber:'',
      address:'',
      province_id:'',
      amphure_id:'',
      }),
      image:'',
    }),
  components:{
  },
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
        user: 'profile/show',
        location : 'location/authprovince',
    })
  },
 methods: {
    setImg(e) {
      this.image = e.target.files[0];
    },
    submitForm() {
        this.save();
        this.fetchauth()
    },
    cheack(){
     Swal.fire({
    title: 'ยืนยันแก้ไขข้อมูล',
    text: "คุณต้องการเปลี่ยนแปลงข้อมูลบริษัทหรือไม่?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'ยกเลิก',
    confirmButtonText: 'บันทึก',
    }).then((result) => {
      if (result.value) {
        this.save()
        Swal.fire(
          'บันทึกข้อมูลเรียบร้อย',
          'แก้ไขข้อมูลบริษัทเรียบร้อย',
          'success',
        )
      }
    })
   },
    async save() {
        
         if (this.image) {
        this.form.logo = await this.upImg({
          image: this.image,
          path: "updatecompany"
        });
        }
        const { data } = await this.form.put(`/api/updatecompany/${this.form.id}`);

    },
    
    ...mapActions({
        fetchshow:'profile/show',
        fetchauth : 'location/fetchauth'
    })
  },
   async created(){
     await this.fetchauth(),  
     await this.fetchshow(this.id),
     this.form.keys().forEach(key => {
     this.form[key] = this.user.company[key]
    })
  }
}
</script>

<style scoped>

textarea {
  width: 100%;
  overflow: auto;
  padding : 1.5rem;
  box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
  border-radius: 5px;
  outline: none !important; 
  border:none;
  font-size: 0.80rem;
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
.customebox{
  border-radius: 5px;
  background-color: #F5F5F5;
}
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
   
}

.btn-outline-primary {
    width: 70% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
    margin-left:auto;
    margin-right:auto;
    display:block;
}
.btn-outline-primary:hover {
    color: #fff !important;
    background-color: #133CBA;
    border-color: #133CBA;
}
.custom-select{
    border-radius: 2rem !important;
}

 
</style>
