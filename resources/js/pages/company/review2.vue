<template>
<div class="container" >

    <div class="mb-5"> 
    <router-link :to="{ name: 'list'}">ย้อนกลับ</router-link>
     </div>
      <form @submit.prevent="cheack()" @keydown="form.onKeydown($event)">
   <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mb-2 bold">ประเมินนักศึกษาครั้งที่ 2</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                    <div class="col-md-8 textcustom mt-3">
                    <p class="bold">{{showstudent.student.name}} {{showstudent.student.surname}}</p>
                    <small>ตำแหน่ง : {{showstudent.jobtype}}</small>
                    </div>
                    <div class="col-md-4">
                   <div class="img-circle" style="float:right;">
                         <img src="/uploads/images/comevents/user.png" v-if="showstudent.student.img == null" />
                         <img v-else :src="showstudent.student.img">
                    </div>
                    </div>
                    </div>
                   
                </div>
            </div>
            <hr class="hr-yellow">
            <div class="row">
                <div class="col-md-12 center mt-5 mb-3">
                    <h3 class="mb-2 bold center color-dblue">สรุปการประเมินผลการฝึกการฝึกประสบการณ์วิชาชีพ</h3>
                    <h4 class="mb-2 bold center">(สำหรับผู้ควบคุมการฝึกงาน)</h4>
                </div>
                <div class="col-md-12" >
                    <div class="row" >
                        <div class="col-md-6">
                            <button class="btn btn-outline-warning fright bold" disabled> 
                                ประเมินครั้งที่ 1
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-outline-primary bold" disabled> 
                                ประเมินครั้งที่ 2
                        </button>
    
                    </div>
                 </div>
   
                    </div>
                 <div class="col-md-12 center mt-5 mb-5">
                    <h5 class="mb-4 bold center ">โปรดแสดงความคิดเห็นต่อการปฏิบัติงานของนักศึกษาตามเกณฑ์การประเมินต่อไปนี้</h5>
                    <h5 class="mb-2 center">5 = ดีมาก&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4 = ดี&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 = ปานกลาง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2 = น้อย&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1 = ปรับปรุง</h5>
                </div>
                <div class="col-md-12">
                 <div class="card">
                    <div class="col-md-10 m-auto">
                        <div class="table-responsive mt-5">
                        <table class="table mb-5" >
                        <thead class="color-dblue">
                            <tr>
                            <th class="w60">พฤติกรรมและเกณฑ์การประเมิน</th>
                            <th lass="center">5</th>
                            <th lass="center">4</th>
                            <th lass="center">3</th>
                            <th lass="center">2</th>
                            <th lass="center">1</th>
                            </tr>
                        </thead>
                        <tbody class="customwidth">
                            <tr>
                                <td><p class="bold color-blue">&nbsp;&nbsp;&nbsp;&nbsp;ด้านความรู้ความสามารถในการปฏิบัติงาน</p></td>
                            </tr>
                            <tr>
                                <td><p>1. มีความรู้ ความสามารถในสาขาวิชาชีพที่เรียน</p></td>
                                <td><input type="radio"  @change="total()" value="5" v-model="form.knowledge01"></td>
                                <td><input type="radio"  @change="total()" value="4" v-model="form.knowledge01"></td>
                                <td><input type="radio"  @change="total()" value="3" v-model="form.knowledge01"></td>
                                <td><input type="radio"  @change="total()" value="2" v-model="form.knowledge01"></td>
                                <td><input type="radio"  @change="total()" value="1" v-model="form.knowledge01"></td>
                            </tr>
                            <tr>
                                <td><p>2. ปฏิบัติงานครบถ้วนและถูกต้องตามที่ได้รับมอบหมาย</p></td>
                                <td><input type="radio"  @change="total()" value="5" v-model="form.knowledge02"></td>
                                <td><input type="radio"  @change="total()" value="4" v-model="form.knowledge02"></td>
                                <td><input type="radio"  @change="total()" value="3" v-model="form.knowledge02"></td>
                                <td><input type="radio"  @change="total()" value="2" v-model="form.knowledge02"></td>
                                <td><input type="radio"  @change="total()" value="1" v-model="form.knowledge02"></td>
                            </tr>
                            <tr>
                                <td><p>3. มีความสามารถในการแก้ปัญหางาน</p></td>
                                <td><input type="radio"  @change="total()" value="5" v-model="form.knowledge03"></td>
                                <td><input type="radio"  @change="total()" value="4" v-model="form.knowledge03"></td>
                                <td><input type="radio"  @change="total()" value="3" v-model="form.knowledge03"></td>
                                <td><input type="radio"  @change="total()" value="2" v-model="form.knowledge03"></td>
                                <td><input type="radio"  @change="total()" value="1" v-model="form.knowledge03"></td>
                            </tr>
                            <tr>
                                <td><p>4. ความสามารถในการเรียนรู้ พัฒนาตนเอง</p></td>
                                <td><input type="radio"  @change="total()" value="5" v-model="form.knowledge04"></td>
                                <td><input type="radio"  @change="total()" value="4" v-model="form.knowledge04"></td>
                                <td><input type="radio"  @change="total()" value="3" v-model="form.knowledge04"></td>
                                <td><input type="radio"  @change="total()" value="2" v-model="form.knowledge04"></td>
                                <td><input type="radio"  @change="total()" value="1" v-model="form.knowledge04"></td>
                            </tr>
                            <tr>
                                <td><p class="bold color-blue">&nbsp;&nbsp;&nbsp;&nbsp;ด้านความรับผิดชอบในการปฏิบัติงาน</p></td>
                            </tr>
                             <tr>
                                <td><p>1. การตรงต่อเวลาและมาปฏิบัติงานสม่ำเสมอ</p></td>
                                <td><input type="radio"  @change="total()" value="5" v-model="form.entrust01"></td>
                                <td><input type="radio"  @change="total()" value="4" v-model="form.entrust01"></td>
                                <td><input type="radio"  @change="total()" value="3" v-model="form.entrust01"></td>
                                <td><input type="radio"  @change="total()" value="2" v-model="form.entrust01"></td>
                                <td><input type="radio"  @change="total()" value="1" v-model="form.entrust01"></td>
                            </tr>
                            <tr>
                                <td><p>2. ตั้งใจ อดทน และมีความกระตือรือรันในการทำงาน</p></td>
                                <td><input type="radio"  @change="total()" value="5" v-model="form.entrust02"></td>
                                <td><input type="radio"  @change="total()" value="4" v-model="form.entrust02"></td>
                                <td><input type="radio"  @change="total()" value="3" v-model="form.entrust02"></td>
                                <td><input type="radio"  @change="total()" value="2" v-model="form.entrust02"></td>
                                <td><input type="radio"  @change="total()" value="1" v-model="form.entrust02"></td>
                            </tr>
                            <tr>
                                <td><p>3. มีความรับผิดชอบต่อหน้าที่ที่ได้รับมอบหมาย</p></td>
                                <td><input type="radio"  @change="total()" value="5" v-model="form.entrust03"></td>
                                <td><input type="radio"  @change="total()" value="4" v-model="form.entrust03"></td>
                                <td><input type="radio"  @change="total()" value="3" v-model="form.entrust03"></td>
                                <td><input type="radio"  @change="total()" value="2" v-model="form.entrust03"></td>
                                <td><input type="radio"  @change="total()" value="1" v-model="form.entrust03"></td>
                            </tr>
                            <tr>
                                <td><p class="bold color-blue">&nbsp;&nbsp;&nbsp;&nbsp;ด้านบุคลิกภาพและมนุษย์สัมพันธ์</p></td>
                            </tr>
                            <tr>
                                <td><p>1. แต่งกายสุภาพเรียบร้อยตามระเบียบของหน่วยงาน</p></td>
                                <td><input type="radio"  @change="total()" value="5" v-model="form.personality01"></td>
                                <td><input type="radio"  @change="total()" value="4" v-model="form.personality01"></td>
                                <td><input type="radio"  @change="total()" value="3" v-model="form.personality01"></td>
                                <td><input type="radio"  @change="total()" value="2" v-model="form.personality01"></td>
                                <td><input type="radio"  @change="total()" value="1" v-model="form.personality01"></td>
                            </tr>
                            <tr>
                                <td><p>2. ปฏิบัติงานกับผู้ร่วมงานได้ทุกระดับและยอมรับความคิดเห็นของผู้อื่น</p></td>
                                <td><input type="radio"  @change="total()" value="5" v-model="form.personality02"></td>
                                <td><input type="radio"  @change="total()" value="4" v-model="form.personality02"></td>
                                <td><input type="radio"  @change="total()" value="3" v-model="form.personality02"></td>
                                <td><input type="radio"  @change="total()" value="2" v-model="form.personality02"></td>
                                <td><input type="radio"  @change="total()" value="1" v-model="form.personality02"></td>
                            </tr>
                            <tr>
                                <td><p>3. มีบุคลิกภาพที่ดี มีมารยาท มีสัมมาคารวะและมีน้ำใจต่อเพื่อนร่วมงาน</p></td>
                                <td><input type="radio"  @change="total()" value="5" v-model="form.personality03"></td>
                                <td><input type="radio"  @change="total()" value="4" v-model="form.personality03"></td>
                                <td><input type="radio"  @change="total()" value="3" v-model="form.personality03"></td>
                                <td><input type="radio"  @change="total()" value="2" v-model="form.personality03"></td>
                                <td><input type="radio"  @change="total()" value="1" v-model="form.personality03"></td>
                            </tr>
                        </tbody>
                        </table>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label class="bold">สรุปคะแนนครั้งที่ 1 </label>
                            <label class="bold" style="float:right;">&nbsp;/&nbsp;50&nbsp;คะแนนน</label>
                            <label class="bold color-blue" style="float:right;" >&nbsp;{{score}}</label>
                        </div>
                        

                    </div>
                 </div>
                 <div class="card mt-3">
                    <div class="card-info">
                        <h5 class="bold mt-4 center">ความเห็นเกี่ยวกับด้านความรู้ความสามารถในการปฏิบัติงาน</h5>
                            <div class="col-md-10 m-auto">
                                <div class="row"> 
                                    <textarea class="form-control center mt-4 mb-3" v-model="form.cmknowledge" rows="3" rquired></textarea>  
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-info">
                        <h5 class="bold mt-4 center">ความเห็นเกี่ยวกับด้านความรับผิดชอบในการปฏิบัติงาน</h5>
                            <div class="col-md-10 m-auto">
                                <div class="row"> 
                                    <textarea class="form-control center mt-4 mb-3" v-model="form.cmentrust" rows="3" required></textarea>  
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-info">
                        <h5 class="bold mt-4 center">ความเห็นเกี่ยวกับด้านบุคลิกภาพและมนุษย์สัมพันธ์</h5>
                            <div class="col-md-10 m-auto">
                                <div class="row"> 
                                    <textarea class="form-control center mt-4 mb-3" v-model="form.cmpersonality" rows="3" required></textarea>  
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-info">
                        <h5 class="bold mt-4 center">ความคิดเห็นเพิ่มเติมเกี่ยวกับต่อนักศึกษา</h5>
                            <div class="col-md-10 m-auto">
                                <div class="row"> 
                                    <textarea class="form-control center mt-4 mb-3" v-model="form.reviews_note" rows="3" required></textarea>  
                                </div>
                            </div>
                    </div>
                </div>
                  <input class="form-control" type="hidden" v-model="form.get = 2">
                 <input class="form-control" type="hidden" v-model="form.comevent_joins_id = showstudent.id">
                 <input class="form-control" type="hidden" v-model="form.stu_id = showstudent.student.id">
                 <div class="mt-3 mb-3 center">
                    <button class="btn-outline-primary bold" :loading="form.busy" >บันทึกการประเมิน</button>
                </div>
                </div>      
            </div>     
  </div>
  </form> 
</div>
</template>

<script>
import Form from 'vform'
import {mapActions, mapGetters} from 'vuex'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

export default {
middleware: 'auth',
data: () => ({
    form: new Form({
      knowledge01:0,
      knowledge02:0,
      knowledge03:0,
      knowledge04:0,
      entrust01:0,
      entrust02:0,
      entrust03:0,
      personality01:0,
      personality02:0,
      personality03:0,
      reviews_note:'',
      cmknowledge:'',
      cmentrust:'',
      cmpersonality:'',
      stu_id:'',
      comevent_joins_id:'',
      get:'',
    }),
    score:0,
  }),
  methods: {
   ...mapActions({
     fetch:'comevents/showjoin',
   }),
    total() {
        return this.score = parseInt(this.form.knowledge01) + parseInt(this.form.knowledge02) + parseInt(this.form.knowledge03) + parseInt(this.form.knowledge04) + parseInt(this.form.entrust01) 
        + parseInt(this.form.entrust02) + parseInt(this.form.entrust03) + parseInt(this.form.personality01) + parseInt(this.form.personality02) + parseInt(this.form.personality03);
    },
   cheack(){
     Swal.fire({
    title: 'ยืนยันบันทึกการประเมิน',
    text: "หากยืนยันแล้วจะไม่สามารถแก้ไขได้",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'ยกเลิก',
    confirmButtonText: 'บันทึก',
    }).then((result) => {
      if (result.value) {
        this.submit()
        Swal.fire(
          'บันทึกข้อมูลเรียบร้อย',
          'บันทึกสรุปการประเมินผลการฝึกการฝึกประสบการณ์วิชาชีพ',
          'success',
        )
      }
    })
   },
    async submit() {
      
      const { data } = await this.form.post("/api/review");
      console.log(data);
      if (data) {
        this.$router.push({
          name: "list",
        });
      }
    },
  },
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      showstudent:'comevents/showstudent_join',
    })
  },
  created(){
    this.fetch(this.id)
  }
}
</script>

<style scoped>
.customwidth p{
    margin-top: 0.5rem ;
    margin-bottom: 0.5rem ;
}
.textcustom p{
   margin-block-start: 0rem;
   margin-block-end: 0rem;
} 
.img-circle{
    width: 75px;
    height: 75px;
    border-radius: 50%;
    overflow: hidden; 
    float: left;
}
.img-circle img{
    width: 100%;
}
.btn-outline-primary {
    width: 40% ; 
    height: 50px; 
    align-content: left;
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
.btn-outline-warning{
    width: 40% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:gray;
    border: 2px solid gray ;
    box-shadow:none;
}
.btn-outline-warning:hover {
    color: #212529;
    background-color: #FFB105;;
    border-color: #FFB105;;
}
.fright{
    float: right;
}

.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
textarea {
  overflow: auto;
  padding : 1.5rem;
  box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
  border-radius: 5px;
  outline: none !important; 
}
</style>