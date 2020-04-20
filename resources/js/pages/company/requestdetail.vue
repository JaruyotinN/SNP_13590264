<template>
   <div class="container" >    
     
    <ColumHeader title="ข้อมูลของนักศึกษา" showBack="internrequest"/> 
      <!-- <pre>{{showstudent}}</pre>  -->
        <h3>{{showstudent.student.name}} {{showstudent.student.surname}}</h3>
                <label>check : {{showstudent.check}} , interview : {{showstudent.interview}} , result : {{showstudent.result}}</label> 
      <form class="was-validated" @submit.prevent="update" @keydown="form.onKeydown($event)">
          <h4>มีการสอบสัมภาษณ์</h4>
          <input class="tgl tgl-flat" id="cb4" type="checkbox"  v-model="form.interview"/>
          <label class="tgl-btn" for="cb4"></label>{{form.interview}}
          <div class="form-group">
            <select class="custom-select" v-model="form.result" required> 
              <option value="0">รอการพิจารณา</option>
              <option value="1">ต้องการให้มาสัมภาษณ์</option>
              <option value="2">อยู่ในการพิจารณา</option>
              <option value="3">ผ่าน</option>
            </select>
            <div class="invalid-feedback">Example invalid custom select feedback</div>
          </div> 
          <label>inputinterview: {{form.interview}} , inputresult: {{ form.result }}</label> 
           <div class="btn-detail-style mt-3 mb-3">
                <button class="btn btn-primary bold" 
                :loading="form.busy">
                  ยืนยันการพิจารณา
                </button>
					</div>

    </form>
  </div>
</template>

<script>
import ColumHeader from '~/components/ColumHeader'
import {mapActions, mapGetters} from 'vuex'
import Form from "vform";

export default {
  middleware: 'auth',
  
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      showstudent:'comevents/showstudent_join',
    })
  },
data: () => ({
    form: new Form({
      interview:0,
      result:'',
      get:2,
    }),
  }),
  components:{
    ColumHeader,

  },
  methods: {
    ...mapActions({
      fetch:'comevents/showjoin',
    }),
  //   cheack(){
  //     this.update();
  //  },
    // async update(id){
    //   // this.form.event_id = this.comevent.id
    //   await this.update(this.form , id)
    //   // this.$router.push({name:'internrequest'})
    // },
    
    async update() {

      const { data } = await this.form.put(`/api/update/${this.id}`);
      this.fetch(this.id)
      // if (data) {
      //   this.$router.push({
      //     name: "admin.item.show",
      //     params: { id: this.show.id }
      //   });
      // }
    },
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

/* cheackbox */

.tgl {
  display: none;
}
.tgl, .tgl:after, .tgl:before, .tgl *, .tgl *:after, .tgl *:before, .tgl + .tgl-btn {
  box-sizing: border-box;
}
.tgl::-moz-selection, .tgl:after::-moz-selection, .tgl:before::-moz-selection, .tgl *::-moz-selection, .tgl *:after::-moz-selection, .tgl *:before::-moz-selection, .tgl + .tgl-btn::-moz-selection {
  background: none;
}
.tgl::selection, .tgl:after::selection, .tgl:before::selection, .tgl *::selection, .tgl *:after::selection, .tgl *:before::selection, .tgl + .tgl-btn::selection {
  background: none;
}
.tgl + .tgl-btn {
  outline: 0;
  display: block;
  width: 4em;
  height: 2em;
  position: relative;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.tgl + .tgl-btn:after, .tgl + .tgl-btn:before {
  position: relative;
  display: block;
  content: "";
  width: 50%;
  height: 100%;
}
.tgl + .tgl-btn:after {
  left: 0;
}
.tgl + .tgl-btn:before {
  display: none;
}
.tgl:checked + .tgl-btn:after {
  left: 50%;
}
.tgl-flat + .tgl-btn {
  padding: 2px;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
  background: #fff;
  border: 4px solid #f2f2f2;
  border-radius: 2em;
}
.tgl-flat + .tgl-btn:after {
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
  background: #f2f2f2;
  content: "";
  border-radius: 1em;
}
.tgl-flat:checked + .tgl-btn {
  border: 4px solid #7FC6A6;
}
.tgl-flat:checked + .tgl-btn:after {
  left: 50%;
  background: #7FC6A6;
}
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