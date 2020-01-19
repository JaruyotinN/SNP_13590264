<template>
   <div class="container" >
    
          <!-- <ColumHeader :title="comevent.company.name" showBack="student" description="lqwdfeqeqeqe"/> -->
          <ColumHeader :title="comevent.company.name" showBack="student"/> 
          <!-- <Detailheader title="diary" showBack="dairy"/> -->

      <div class="row">
          <div class="col-md-12">
                <Detailbody :body="comevent"/>
          
          <div class="card mt-4">
             <div class="col-12">
                  <div class="card-info">
                    <h5 class="bold mt-3">คำถามเด็กฝึกงาน</h5>
                    <div class="form-group">
                         <p>{{ comevent.question1 }}</p>
                        <textarea class="form-control" v-model="form.question1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                         <p>{{ comevent.question2 }}</p>
                        <textarea class="form-control" v-model="form.question2" rows="3"></textarea>
                    </div>
                  </div> 
              </div>
        </div>
              <div class="btn-detail-style mt-3 mb-3">
                <button class="btn btn-primary bold" @click="confirmJoin()">
                  สมัครฝึกงาน
                </button>
                <!-- <router-link class="btn btn-primary bold" :to="{name:'status'}">สมัครฝึกงาน</router-link> -->
						  </div>
            </div>
      </div>
  </div>
</template>

<script>
import ColumHeader from '~/components/ColumHeader'
import Detailbody from '~/components/Detailbody'
import Detailquestion from '~/components/Detailquestion'
import {mapActions, mapGetters} from 'vuex'
export default {
  middleware: 'auth',
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      comevent:'comevents/show'
    })
  },
data() {
  return {
    form:{
      question1:'',
      question2:'',
      event_id:''
    },
    bodys:[
    { 
      img:'https://scontent.fbkk13-1.fna.fbcdn.net/v/t1.0-9/p960x960/51248284_779547722411675_3427955334721830912_o.png?_nc_cat=108&_nc_eui2=AeH9XH2PPZuSeGLO1nuw_wlrNgVQ8my7ji7dgg_Y1SSpZ98ttqIoVNRtvXwkI2F5kH7rRL7kuYJiCgOBrhUs-_rV-2nYOTbkgZ-l2ecVyeG2Vw&_nc_oc=AQmAvGTU0GD3wgF7XAx6aaR39_lpKs9xK-sarkzzNfpqpnZ2DVxBokWJwcHMDMsURE8&_nc_ht=scontent.fbkk13-1.fna&oh=eaca2f6ab9b3f4fee1744560e9923c3f&oe=5E79F2EF',
      name:'ไลค์ มี จำกัด',
      subname:'Future Trends',
      quantity:'6',
      requirement:'Graphic Desinger, illustrator , Motion Grapihc',
      worktime:'จ-ศ',
      address:'126/5 อาคาร ไทยศรี ชั้น2 ถนนกรุงธนบุรี แขวงบางลำภูล่าง เขตคลองสาน กรุงเทพมหานคร 10600',
      description:'บริษัท ไลค์มี จำกัดนั้นเป็นบริษัทที่มีแบร์ดหลากหลาย ทั้ง InfographicThailand , AomMoeny , ถุงเงิน Family , Future Trends',
    },
    ],
    questions: [
    {
      text:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius vehicula mauris, ut accumsan augue imperdiet vel. Phasellus neque est, commodo at condimentum eget, congue ut tortor. Pellentesque nec nisi mauris. In euismod feugiat odio, ut euismod quam mollis et. Curabitur pharetra nibh quis elit tincidunt malesuada. Nunc suscipit, odio non imperdiet ornare',
    },
    {
      text:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius vehicula mauris, ut accumsan augue imperdiet vel. Phasellus neque est, commodo at condimentum eget, congue ut tortor. Pellentesque nec nisi mauris. In euismod feugiat odio, ut euismod quam mollis et. Curabitur pharetra nibh quis elit tincidunt malesuada. Nunc suscipit, odio non imperdiet ornare',
    },
    ],
     heads: [
    {
      name:'บริษัท ไลค์มี จำกัด',
    },
    ],
    }
},
  components:{
    ColumHeader,
    Detailbody,
    Detailquestion,
  },
  methods: {
    ...mapActions({
      fetch:'comevents/show',
      join:'comevents/join'
    }),
    async confirmJoin(){
      console.log('dqdwq')
      this.form.event_id = this.comevent.id
      await this.join(this.form)
      this.$router.push({name:'status'})

    }
  },
  created(){
    this.fetch(this.id)
  }
}
</script>
<style scoped>
.btn-detail-style .btn-primary{ 
    background-color: #0047BA ;
    border:none; 
    border-radius: 30px;
    width: 80%;
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