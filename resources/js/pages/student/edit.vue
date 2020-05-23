<template>
<div class="container" > 
     <div class="mb-5"> 
        <router-link :to="{ name: 'student'}">ย้อนกลับ</router-link>
     </div>
     <div class="card mt-5">
        <form @submit.prevent="update(1)" @keydown="form.onKeydown($event)">
            <div class="col-md-12">
              <div class="mt-4 mb-4">
                  <h5 class="bold">แก้ไขข้อมูลผู้ใช้งาน</h5>
              </div>
              <hr class="hr-orange">
              <div class="row mt-5">
                  <div class="col-md-3">
                      <div class="img-circle center">     
                          <img :src="form.img"/>
                      </div>
                      <div class="center mt-2">
                          <a class="f025" href="#">
                          <input type="file" name="image" @change="setImg" />
                          </a>
                          <!-- <a class="f025" href="#">แก้ไขรูปโปรไฟล์</a> -->
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
                            <p>เกรดเฉลี่ย</p>
                            <div class="mt-2 mb-3">
                                 <input v-model="form.grade" :class="{ 'is-invalid': form.errors.has('grade') }" class="form-control" type="number" name="grade" step=".01" placeholder="โปรดใส่เกรดเฉลี่ย">
                                <has-error :form="form" field="grade" />
                            </div>
                        </div>
                         <div class="col-md-4">
                            <p>เบอร์โทรศัพท์</p>
                            <div class="mt-2 mb-3">
                                 <input v-model="form.phonenumber" :class="{ 'is-invalid': form.errors.has('phonenumber') }" class="form-control" type="text" name="number"  placeholder="โปรดใส่ข้อมูลติดต่อ">
                                <has-error :form="form" field="phonenumber" />
                            </div>
                        </div>
                         <div class="col-md-4">
                            <p>หลักสูตรฝึกงาน</p>
                            <div class="mt-2 mb-3">
                                <select class="custom-select" v-model="form.course_id" required>
                                    <option v-for="(course, index) in courses" :key="index" :value="course.id" v-if="course.faculty_id == form.major.faculty.id">{{course.name}} {{course.description}}</option>
                                </select>
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
                
              </div>  <!-- row -->

              <div class="col-md-3 offset-9">
                  <input class="form-control" type="hidden" v-model="form.get = 1">
                  <input class="form-control" type="hidden" v-model="form.id = user.student.id">
                  <div class="mt-4 ">
                    <!-- <button class="btn-outline-primary bold" @click="cheack()"> -->
                    <button class="btn-outline-primary bold" :loading="form.busy">
                      บันทึกข้อมูลผู้ใช้งาน
                    </button>
                  </div>
              </div>
              </div>
        </form>
      </div> <!-- card -->
      
      <!-- edit profile -->
      <div class="card mt-5">
        <form @submit.prevent="update(2)" @keydown="form2.onKeydown($event)">
        <div class="col-md-12">
            <div class="mt-4 mb-4">
                <h5 class="bold">แก้ไขข้อมูล Resume / Portfolio</h5>
            </div>
            <hr class="hr-orange">
            <div class="row mt-5"> 
                <div class="col-md-4">
                    <div class="center textcustom">
                      <i class="fa fa-file-image-o fa-3x color-dblue"></i>
                      <p>Resume</p>
                      <label>เฉพาะไฟล์ pdf / ขนาดไฟล์ห้ามเกิน 2 Mb.</label><br>
                      <a href="" v-if="form2.cv != null" v-on:click.stop.prevent="openWindow(form2.cv)">Resume ของคุณ</a>
                      <br>

                      <div class="mt-3 upload-btn-wrapper">
                        <button class="btn"><i class="fa fa-plus-circle"></i> อัพโหลด Resume</button>
                        <input accept="application/pdf"  type="file" @change="setCV" />
                        <has-error :form="form" field="file" />
                      </div>
                    </div>
                    

                </div>
                <div class="col-md-4">
                    <div class="center textcustom">
                      <i class="fa fa-file-pdf-o fa-3x color-dblue"></i>
                      <p>Portfolio</p>
                      <label>เฉพาะไฟล์ pdf / ขนาดไฟล์ห้ามเกิน 2 Mb.</label><br>
                      <a href=""  v-if="form2.port != null" v-on:click.stop.prevent="openWindow(form2.port)">Portfolio ของคุณ</a>
                      <br>
        
                      <div class="mt-3 upload-btn-wrapper">
                          <button class="btn"><i class="fa fa-plus-circle"></i> อัพโหลด Portfolio</button>
                          <input accept="application/pdf" type="file" @change="setPort" />
                          <has-error :form="form" field="file" />
                      </div>
                    </div>
                </div>

                 <div class="col-md-4">
                    <div class="center textcustom">
                      <i class="fa fa-file-o fa-3x color-dblue"></i>
                      <p>Transcript</p>
                      <label>เฉพาะไฟล์ pdf / ขนาดไฟล์ห้ามเกิน 2 Mb.</label><br>
                      <a href=""  v-if="form2.transcript != null" v-on:click.stop.prevent="openWindow(form2.transcript)">Transcript ของคุณ</a>
                      <br>
                      <div class="mt-3 upload-btn-wrapper">
                          <button class="btn"><i class="fa fa-plus-circle"></i> อัพโหลด Transcript</button>
                          <input accept="application/pdf" type="file" @change="setTS" />
                          <has-error :form="form" field="file" />
                      </div>
                    </div>
                </div>
                <div class="col-md-10 m-auto ">
                  <div class="row mt-5">
                    <div class="col-md-4 mx-auto ">
                      <div class="center textcustom">
                          <i class="fa fa-file-code-o fa-3x color-dblue"></i>
                          <p>URL สำหรับผลงาน 1</p>
                          <label>เพิ่ม URL สำหรับผลงานของคุณ</label><br>
                          <div class="mb-3 cmt-25">
                              <input v-model="form2.url_port" :class="{ 'is-invalid': form2.errors.has('url_port') }" class="form-control" type="text" name="url_port"  placeholder="ใส่ Link URL ผลงานของคุณ">
                              <has-error :form="form2" field="url_port" />
                          </div>
                      </div>
                    </div>

                      <div class="col-md-4 mx-auto">
                      <div class="center textcustom">
                          <i class="fa fa-file-code-o fa-3x color-dblue"></i>
                          <p>URL สำหรับผลงาน 2</p>
                          <label>เพิ่ม URL สำหรับผลงานของคุณ</label><br>
                          <div class="mb-3 cmt-25">
                              <input v-model="form2.url_port2" :class="{ 'is-invalid': form2.errors.has('url_port2') }" class="form-control" type="text" name="url_port2"  placeholder="ใส่ Link URL ผลงานของคุณ">
                              <has-error :form="form2" field="url_port" />
                          </div>
                      </div>
                    </div>                             
                  </div>                
                </div>

                <div class="col-md-3 offset-9">
                  <input class="form2-control" type="hidden" v-model="form2.id = user.student.id">
                  <input class="form-control" type="hidden" v-model="form2.get = 2">
                  <div class="mt-4 ">
                    <!-- <button class="btn-outline-primary bold" @click="cheack()"> -->
                    <button class="btn-outline-primary bold" :loading="form2.busy">
                      บันทึกข้อมูลผู้ใช้งาน
                    </button>
                  </div>
                </div>
            </div>
          </div>
        </form>
      </div>

      <Editscore/>
 
</div>
</template>

<script>
import Form from 'vform'
import {mapActions, mapGetters} from 'vuex'
import ColumHeader from '~/components/ColumHeader'
import Editscore from '~/components/Studentedit/Editscore'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

export default {
  middleware: 'auth',
 data: () => ({
    form: new Form({
      id:'',
      name: "",
      surname: "",
      phonenumber: "",
      grade:"",
      course_id:"",
      number: "",
      major:"",
      university:"",
      faculty:"",
      img:"",
    }),
    form2: new Form({
      id:'',
      port: "",
      cv:"",
      transcript:"",
      url_port:"",
      url_port2:"",
    }),
    
    image: "",
    filecv: "",
    filets:"",
    fileport: "",
  }),
  components:{
    ColumHeader,
    Editscore,
    
  },
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
       ...mapGetters({
    user: 'profile/show',
    courses: 'profile/courses'
   
  }),
  },
  
  async created () {
    // Fill the form with user data.
    await this.fetchshow(this.id),
    await this.fetchcourses(),
    this.form.keys().forEach(key => {
      this.form[key] = this.user.student[key]
    })
     this.form2.keys().forEach(key => {
      this.form2[key] = this.user.student[key]
    })
     
  },
  methods: {
    ...mapActions({
      fetchshow:'profile/show',
      fetchcourses:'profile/fetchcourses',
     
    }),
    openWindow: function (link) {
         window.open(link);
    },
    setImg(e) {
      this.image = e.target.files[0];
    },
    setCV(e) {
      var FileSize = e.target.files[0].size / 1024 / 1024; // in MB
      var FileExtention = e.target.files[0].name.split('.').pop();
      var status = 0;
      if(FileSize <= 2 ){
        console.log("size ok")
      } else {
         status = 1;
         console.log("too big");
         Swal.fire(
            
            'ไฟล์ขนาดใหญ่เกินไป',
            'ไฟล์ของคุณมีขนาดใหญ่เกินไป ลองใหม่อีกครั้ง',
            'error',
          )
      }
      if(FileExtention == 'pdf' ){
        console.log("file is pdf")
      } else {
        status = 1;
         console.log("not pdf");
         Swal.fire(
            
            'คุณอัพโหลดไฟล์ผิดประเภท',
            'กรุณาอัพโหลดไฟล์ .pdf ลองใหม่อีกครั้ง',
            'error',
          )
      }
      if(status==0){
        console.log("filecv is set")
        this.filecv = e.target.files[0];
      }
      
    },
    setTS(e) {
      var FileSize = e.target.files[0].size / 1024 / 1024; // in MB
      var FileExtention = e.target.files[0].name.split('.').pop();
      var status = 0;
      if(FileSize <= 2){
        console.log("size ok")
      } else {
         console.log("too big");
         status = 1;
         Swal.fire(
            
            'ไฟล์ขนาดใหญ่เกินไป',
            'ไฟล์ของคุณมีขนาดใหญ่เกินไป ลองใหม่อีกครั้ง',
            'error',
            //เหลือ Set Port
          )
      } 
      if(FileExtention == 'pdf' ){
        console.log("file is pdf")
      } else {
        status = 1;
         console.log("not pdf");
         Swal.fire(
            
            'คุณอัพโหลดไฟล์ผิดประเภท',
            'กรุณาอัพโหลดไฟล์ .pdf ลองใหม่อีกครั้ง',
            'error',
          )
      }
      if(status==0){
        console.log("filets is set")
        this.filets = e.target.files[0];
      }
      
    },
     setPort(e) {
      var FileSize = e.target.files[0].size / 1024 / 1024; // in MB
      var FileExtention = e.target.files[0].name.split('.').pop();
      var status = 0;
      if(FileSize <= 2 ){
        console.log("size ok")
      } else {
         status = 1;
         console.log("too big");
         Swal.fire(
            
            'ไฟล์ขนาดใหญ่เกินไป',
            'ไฟล์ของคุณมีขนาดใหญ่เกินไป ลองใหม่อีกครั้ง',
            'error',
          )
      }
      if(FileExtention == 'pdf' ){
        console.log("file is pdf")
      } else {
        status = 1;
         console.log("not pdf");
         Swal.fire(
            
            'คุณอัพโหลดไฟล์ผิดประเภท',
            'กรุณาอัพโหลดไฟล์ .pdf ลองใหม่อีกครั้ง',
            'error',
          )
      }
      if(status==0){
        console.log("fileport is set")
        this.fileport = e.target.files[0];
      }
     
    },
    async update(useform) {
    
    let checkform = useform == 1 ? true : false;
    
    if(checkform) {

        if (this.image) {
        this.form.img = await this.upImg({
          image: this.image,
          path: "updateprofile"
        });
        }
        const { data } = await this.form.put(`/api/updateprofile/${this.form.id}`);
        console.log(data)
        if (data) {
        this.$router.push({
          name: "student",
        });
      }

    } else {

        if (this.filecv) {
        this.form2.cv = await this.uploadCv({
        file: this.filecv,
        path: "updateprofile"
        });
      }
        if (this.fileport) {
        this.form2.port = await this.uploadFile({
        file: this.fileport,
        path: "updateprofile"
        });
      }
       if (this.filets) {
        this.form2.transcript = await this.uploadTranscript({
        file: this.filets,
        path: "updateprofile"
        });
      } 
        
        const { data } = await this.form2.put(`/api/updateprofile/${this.form2.id}`);
        console.log(data)
        
    }
    },
  }  
}

</script>
<style scoped>
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
.btn-outline-primary:hover {
    color: #fff !important;
    background-color: #133CBA;
    border-color: #133CBA;
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

/* upload btn */
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
  width: 100%;
}

.btn {
  width: 80%;
  height: calc(1.5em + 0.75rem + 2px);
  color: #0A63B3;
  background-color: #FFB105;
  padding: 8px 20px;
  border-radius: 2rem;
  font-size: 0.75rem;
}

.btnactive{
  background-color: #0A63B3;
  color: #FFB105;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0; 
}

</style>
