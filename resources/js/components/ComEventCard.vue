<template>
			<div class="card mt-4 h-95">
					  <div class="radio-img">
							<img :src="event.img" center  class="card-img-top"/>
						</div>
						<div class="top-box">
              <div class="col-12">
                  <div class="card-info">
                    <p class="bold mt-2 color-dblue">บริษัท{{ event.company.name }} </p>
                    <p class="mb-2 color-dblue">{{ event.division }}</p>
                    <input class="form-control" type="hidden" v-model="comeventjob = event.job_id">  
                    <label>ประเภทงาน : </label>
                    <label v-for="cj in comeventjob.split(',')"  v-bind:key="cj.id">
                      <label v-for="(job, index) in jobs" :key="index" v-if="cj == job.id" >{{job.title}}</label>
                      {{jobs.title}}
                    </label>
                   <br>
                    <label>ตำแหน่งที่ต้องการ : {{event.requirement}}</label>
 
                    <label>ระยะเวลา : {{moment(event.enddate)}} </label><br>
                  </div> 
              </div>
            </div>
							<div class="low-box">
								<div class="col-12">
									<div class="card-info">
								<label class="mt-1"><i class="fa fa-map-marker fa-2x color-orange"></i> {{ event.company.address }} </label>
									</div>
								</div>
							</div>
              </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex'
import * as moment from 'moment';

export default {
    props:['event'],
    data() {
      return{
        comeventjob: "",
      }
    },
    computed: {
      ...mapGetters({
        jobs: 'jobs/jobs',
      }),
       
    },
    methods: {
      ...mapActions({
        fetch : 'jobs/fetchjob'
      }),
     moment: function (value) {
          return moment(String(value)).format('LL')
      },
      
    },
    created(){
      this.fetch()
    },
}
</script>

<style scoped>
a{
  text-decoration: none;
}
label{
  margin: 0;
  font-size: 0.75rem;
}
p{
  margin: 0;
}
.display-inline{
  display: inline;
}
.h-95{
  height: 95%;
}
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
   
}
.radio-img{
  height: 165px;
  box-sizing: border-box;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  overflow: hidden;
}
.radio-img img {
    width: 100%;
}
.top-box{
  border-bottom: 0.05em #E4E4E4 solid;
}
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
</style>