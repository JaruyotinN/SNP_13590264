<template>
<div class="container" >

    <div class="mb-5"> 
    <router-link :to="{ name: 'list'}">ย้อนกลับ</router-link>
     </div>
      <form @submit.prevent="submit()" @keydown="form.onKeydown($event)">
   <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mb-2 bold">ประเมินนักศึกษา</h4>
                        <label>comeventjoin_id : {{showstudent.id}} / {{form.comevent_joins_id}}</label>
                        <label>student_id : {{showstudent.student.id}} / {{form.stu_id}} </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                    <div class="col-md-8 textcustom mt-3">
                    <p class="bold">{{showstudent.student.name}} {{showstudent.student.surname}}</p>
                    <p>ตำแหน่ง : {{showstudent.jobtype}} </p>
                    </div>
                    <div class="col-md-4">
                   <div class="img-circle" style="float:right;">
                            <img :src="showstudent.student.img">
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
                <div class="col-md-12" v-if="showstudent.comeventjoin.sturev02_id != null">
                    <div class="row" v-if="showstudent.comeventjoin.sturev01_id == id" >
                        <div class="col-md-6">
                            
                                <router-link  class="btn btn-outline-active bold" :to="{name:'detailreview', params:{id:showstudent.comeventjoin.sturev01_id}}">ผลประเมินผลครั้งที่ 1</router-link>
                        </div>
                        <div class="col-md-6">
                                <router-link  class="btn btn-outline-warning bold" :to="{name:'detailreview', params:{id:showstudent.comeventjoin.sturev02_id}}">ผลประเมินผลครั้งที่ 2</router-link>
                        </div>
                    </div>
                    <div class="row" v-else>
                        <div class="col-md-6">
                            
                                <router-link  class="btn btn-outline-warning fright bold" :to="{name:'detailreview', params:{id:showstudent.comeventjoin.sturev01_id}}">ผลประเมินผลครั้งที่ 1</router-link>
                        </div>
                        <div class="col-md-6">
                                <router-link  class="btn btn-outline-primary bold" :to="{name:'detailreview', params:{id:showstudent.comeventjoin.sturev02_id}}">ผลประเมินผลครั้งที่ 2</router-link>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-12" v-else>
                    <div class="col-md-6 m-auto">
                            <button class="btn-outline-ct bold"> 
                                ประเมินครั้งที่ 1
                            </button>
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
                            <th lass="center">คะแนน</th>
                            </tr>
                        </thead>
                        <tbody class="customwidth">
                            <tr>
                                <td><p class="bold color-blue">&nbsp;&nbsp;&nbsp;&nbsp;ด้านความรู้ความสามารถในการปฏิบัติงาน</p></td>
                            </tr>
                            <tr>
                                <td><p>1. มีความรู้ ความสามารถในสาขาวิชาชีพที่เรียน</p></td>
                                <td><p>{{form.knowledge01}}</p></td>
                            </tr>
                            <tr>
                                <td><p>2. ปฏิบัติงานครบถ้วนและถูกต้องตามที่ได้รับมอบหมาย</p></td>
                               <td><p>{{form.knowledge02}}</p></td>
                                
                            </tr>
                            <tr>
                                <td><p>3. มีความสามารถในการแก้ปัญหางาน</p></td>
                                <td><p>{{form.knowledge03}}</p></td>
                               
                            </tr>
                            <tr>
                                <td><p>4. ความสามารถในการเรียนรู้ พัฒนาตนเอง</p></td>
                               <td><p>{{form.knowledge04}}</p></td>
                               
                            </tr>
                            <tr>
                                <td><p class="bold color-blue">&nbsp;&nbsp;&nbsp;&nbsp;ด้านความรับผิดชอบในการปฏิบัติงาน</p></td>
                            </tr>
                             <tr>
                                <td><p>1. การตรงต่อเวลาและมาปฏิบัติงานสม่ำเสมอ</p></td>
                                <td><p>{{form.entrust01}}</p></td>
                               
                            </tr>
                            <tr>
                                <td><p>2. ตั้งใจ อดทน และมีความกระตือรือรันในการทำงาน</p></td>
                                 <td><p>{{form.entrust02}}</p></td>
                                
                            </tr>
                            <tr>
                                <td><p>3. มีความรับผิดชอบต่อหน้าที่ที่ได้รับมอบหมาย</p></td>
                                 <td><p>{{form.entrust03}}</p></td>
                               
                            </tr>
                            <tr>
                                <td><p class="bold color-blue">&nbsp;&nbsp;&nbsp;&nbsp;ด้านบุคลิกภาพและมนุษย์สัมพันธ์</p></td>
                            </tr>
                            <tr>
                                <td><p>1. แต่งกายสุภาพเรียบร้อยตามระเบียบของหน่วยงาน</p></td>
                                <td><p>{{form.personality01}}</p></td>
                              
                            </tr>
                            <tr>
                                <td><p>2. ปฏิบัติงานกับผู้ร่วมงานได้ทุกระดับและยอมรับความคิดเห็นของผู้อื่น</p></td>
                                <td><p>{{form.personality02}}</p></td>
                               
                            </tr>
                            <tr>
                                <td><p>3. มีบุคลิกภาพที่ดี มีมารยาท มีสัมมาคารวะและมีน้ำใจต่อเพื่อนร่วมงาน</p></td>
                                <td><p>{{form.personality03}}</p></td>
                                
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
                                    <p class="center mt-3"> {{form.cmknowledge}}</p> 
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-info">
                        <h5 class="bold mt-4 center">ความเห็นเกี่ยวกับด้านความรับผิดชอบในการปฏิบัติงาน</h5>
                            <div class="col-md-10 m-auto">
                                <div class="row">
                                     <p class="center mt-3">{{form.cmentrust}}</p> 
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-info">
                        <h5 class="bold mt-4 center">ความเห็นเกี่ยวกับด้านบุคลิกภาพและมนุษย์สัมพันธ์</h5>
                            <div class="col-md-10 m-auto">
                                <div class="row"> 
                                    <p class="center mt-3">{{form.cmpersonality}}</p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-info">
                        <h5 class="bold mt-4 center">ความคิดเห็นเพิ่มเติมเกี่ยวกับต่อนักศึกษา</h5>
                            <div class="col-md-10 m-auto">
                                <div class="row"> 
                                    <p class="center mt-3">{{form.reviews_note}}</p>
                                </div>
                            </div>
                    </div>
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
    }),
    score:0,
  }),
  methods: {
   ...mapActions({
     fetch:'comevents/showdetailreview',
   }),
    total() {
        return this.score = parseInt(this.form.knowledge01) + parseInt(this.form.knowledge02) + parseInt(this.form.knowledge03) + parseInt(this.form.knowledge04) + parseInt(this.form.entrust01) 
        + parseInt(this.form.entrust02) + parseInt(this.form.entrust03) + parseInt(this.form.personality01) + parseInt(this.form.personality02) + parseInt(this.form.personality03);
    },
  },
    async created () {
    
    await this.fetch(this.id),
    this.form.keys().forEach(key => {
      this.form[key] = this.showstudent[key]
    }),
    await this.total()
     
  },
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      showstudent:'comevents/showdetailreview',
    })
  },

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
.btn-outline-active {
    width: 40% ; 
    height: 50px; 
    float: right;
    align-content: left;
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
}
.btn-outline-ct{
    width: 40% ; 
    height: 50px; 
    margin-left:auto;
    margin-right:auto;
    display:block;
    text-align: center;
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
}
.btn-outline-active {
    width: 40% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:#133CBA;
    border: 2px solid #133CBA ;
    box-shadow:none;
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