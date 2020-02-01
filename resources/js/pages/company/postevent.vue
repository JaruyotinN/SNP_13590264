<template>
<div class="container"  >
  <div  v-for="(info, index) in infos" :key="index" >
  <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
    <ColumHeader title='บริษัท ไลค์มี จำกัด' showBack="company" img="/uploads/images/comevents/likeme.jpg"/>
    <div class="card mt-5">
                <div class="col-md-12 mt-2">
                 <ColumHeader  title='สร้างแบบฟอร์ม'/>
                 <div class="row" style="padding:20px;">
                        <div class="col-md-6" >
                           <input class="form-control" type="hidden" v-model="form.com_id = info.com_id">
                            <p>บริษัท</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" type="text" v-bind:value="info.company.name" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>หน่วยงาน / แผนก</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" type="text" placeholder="หน่วยงานหรือแผนกของคุณ">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>ผู้ดูแล</p>
                             <div class="input-group mt-2 mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>เลือกผู้ดูแล</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                             </div>
                        </div>

                        <div class="col-md-4">
                            <p>จำนวน</p>
                             <div class="input-group mt-2 mb-3">
                                <select v-model="form.quantity" class="custom-select" id="inputGroupSelect01">
                                    <option selected>จำนวน</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                             </div>
                        </div>
                        <div class="col-md-4">
                            <p>วันปิดรับ</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" v-model="form.enddate" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>หมวดหมู่ที่เกี่ยวข้อง</p>
                            <div class="mt-2 mb-3">
                                <textarea rows="4" cols="50">

                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>ตำแหน่งที่ต้องการ</p>
                            <div class="mt-2 mb-3">
                               <textarea v-model="form.requirement" rows="4" cols="50">

                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p>ประวัติและผลงาน</p>
                            <div class="mt-2 mb-3">
                               <textarea v-model="form.desciption" rows="4" cols="100">

                                </textarea>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <p>ประวัติและผลงาน</p>
                            <div class="mt-2 mb-3">
                                <div class>
                                  <input class="form-control" type="file" name="image" @change="setImg" />
                                  <has-error :form="form" field="image" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <div class="btn-detail-style btn-primary mt-3 mb-3" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <p>คำถามเด็กฝึกงาน 01</p>
                            </div>
                        </div>
                            <div class="collapse" id="collapseExample">
                            <p>Q1</p>
                            <textarea v-model="form.question1" rows="4" cols="100">

                            </textarea>
                            <p>Q2</p>
                            <textarea v-model="form.question2" rows="4" cols="100">

                            </textarea>
                          </div>

                </div>
               
        </div>   <!-- card -->
        <div class="form-group row">
          <div class="col-md-7 offset-md-5 d-flex">
            <!-- Submit Button -->
            <v-button
            
              :loading="form.busy"
              id="createbtn"
              style="width:130px;"
              class="text-white colorr"
            >บันทึก</v-button>
          </div>
        </div>
    </div>
    
  </form>
  </div>
</div>
</template>
<script>
import ColumHeader from '~/components/ColumHeader';
import Form from "vform";
import {mapActions, mapGetters} from 'vuex'
export default {
  middleware: 'auth',
  data: () => ({
    form: new Form({
      desciption:'',
      quantity:'',
      requirement:'',
      img: "",
      question1:'',
      question2:'',
      invite:5,
      enddate:'',
      com_id:'',
      }),
      image: "",
    }),
  components:{
    ColumHeader,
  },
  computed:{
    ...mapGetters({
      infos:'profile/userinfos'
      
      // comevent:'comevents/show',
     
    })
  },
 methods: {
    setImg(e) {
      this.image = e.target.files[0];
    },
    submitForm() {
        this.save();
    },
    getData() {
        axios.get('/some-url')
            .then(data => {
                this.form.com_id = data.email;
            });
    },
    async save() {
      this.form.img = await this.upImg({
        image: this.image,
        path: "comevents"
      });

      const { data } = await this.form.post("/api/comevents");

      if (data) {
        this.$router.push({
          name: "company",
        });
      }
    },
    
    ...mapActions({

      // fetch: "item/show"
      fetch:'profile/fetch'
    })
  },
  created(){
     this.fetch()
  }
}
</script>

<style scoped>
.card{
    padding-bottom: 10px;
    box-shadow: 0 1px 6px 0 rgba(0,0,0,0.5);
    border-radius: 5px;
   
}
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
.custom-select{
    border-radius: 2rem !important;
}
</style>
