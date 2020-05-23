<template>
<div class="container" >
  <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
      <div class="mb-5"> 
        <router-link :to="{ name: 'teacher'}">ย้อนกลับ</router-link>
     </div> 
          <div class="card mt-5 mb-3">
                <div class="col-md-10 m-auto">
                    <h4 class="mb-5 mt-5 bold">แก้ไขข้อมูลอาจารย์</h4>   
                    <hr class="hr-orange">
              
                <div class="row mt-5 mb-5">
                  <div class="col-md-3">
                      <div class="img-circle center">     
                          <img :src="form.img"/>
                      </div>
                      <div class="center mt-2">
                          <a class="f025" href="#">
                          <input type="file" name="image" @change="setImg" />
                          </a>
                      </div>
                  </div>
                <div class="col-md-9">
                     <input class="form-control" type="hidden" v-model="form.id = user.teacher.id">
                    <div class="row">
                        <div class="col-md-6">
                            <p>ชื่อ</p>
                            <div class="mt-2 mb-3">
                                <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name"  placeholder="โปรดใส่ชื่อของคุณ">
                                <has-error :form="form" field="name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>นามสกุล</p>
                            <div class="mt-2 mb-3">
                                 <input v-model="form.surname" :class="{ 'is-invalid': form.errors.has('surname') }" class="form-control" type="text" name="surname"  placeholder="โปรดใส่ชื่อของนามสกุลของคุณ">
                                <has-error :form="form" field="surname" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>Email</p>
                            <div class="mt-2 mb-3">
                                 <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="text" name="email"  placeholder="โปรดใส่ Email ของคุณ">
                                <has-error :form="form" field="email" />
                            </div>
                        </div>
                         <div class="col-md-6">
                            <p>เบอร์โทรศัพท์</p>
                            <div class="mt-2 mb-3">
                                 <input v-model="form.phonenumber" :class="{ 'is-invalid': form.errors.has('phonenumber') }" class="form-control" type="text" name="phonenumber" step=".01" placeholder="โปรดใส่เกรดเฉลี่ย">
                                <has-error :form="form" field="phonenumber" />
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
              </div>  <!-- row -->

        </div> <!-- card -->
         <div class="col-md-6 m-auto">
            <button class="btn-outline-primary bold mb-3" :loading="form.busy">
               แก้ไขข้อมูลอาจารย์
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
      surname:'',
      email:'',
      img:'',
      phonenumber:'',
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
    })
  },
 methods: {
    setImg(e) {
      this.image = e.target.files[0];
    },
    submitForm() {
    Swal.fire({
    title: 'ยืนยันแก้ไขข้อมูล',
    text: "ต้องการแก้ไขข้อมูลอาจารย์?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'ยกเลิก',
    confirmButtonText: 'ยืนยันข้อมูล',
    }).then((result) => {
      if (result.value) {
        this.save()
        Swal.fire(
          'ดำเนินการแก้ไข',
          'แก้ไขข้อมูลอาจารย์เรียบร้อย',
          'success',
        )
      }
    })
    },
    async save() {
        
         if (this.image) {
        this.form.img = await this.upImg({
          image: this.image,
          path: "updateteacher"
        });
        }
       const { data } = await this.form.put(`/api/updateteacher/${this.form.id}`);
       this.$router.push({
          name: "teacher",
        });
  
    },
    
    ...mapActions({
        fetchshow:'profile/show',

    })
  },
   async created(){
     await this.fetchshow(this.id),
     this.form.keys().forEach(key => {
     this.form[key] = this.user.teacher[key]
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
.form-control{
    border-radius: 2rem;
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
