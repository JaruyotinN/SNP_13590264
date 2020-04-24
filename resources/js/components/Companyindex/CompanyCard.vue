<template>
			<div class="card mt-3 mb-2"> 
        {{card}}
             <div class="row">
                <div class="col-md-6">
                    <div class="img-circle ml-3 mt-2 mr-3">
                        <!-- <img :src="card.student.img"> -->
                    </div>
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <div class="f-1 bold m-0">
                          <!-- <label>{{card.student.name}}</label> -->
                          <label>|</label>
                          <!-- <label>{{card.major.faculty.university.name}}</label> -->
                        </div>
                        <!-- <div class="f-1 m-0">
                            <label class="m-0">ทักษะหลัก :</label>
                            <label>{{card.student.scores.joptype.name}}</label>
                            <label>|</label>
                            <label>{{card.student.scores.score}}</label>
                        </div>
                        <div class="f-075 m-0">
                            <label >ทักษะรอง :</label>
                            <label>{{card.student.scores.joptype.name}}</label>
                            <label>|</label>
                            <label>{{card.student.scores.score}}</label>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="mb-3 mt-2 mr-3" style="float: left">
                        <div class="f-1">
                          <label>resume</label>
                          <br>
                          <i class="ml-1 fa fa-file fa-3x color-dblue" ></i>
                        </div>
                    </div>
                    <div class="mb-3 mr-3 mt-2" style="float:left">
                        <div class="f-1">
                          <label>portfoilo</label>
                           <br>
                          <i class="ml-1 fa fa-file fa-3x color-dblue" ></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <router-link class="btn btn-primary bold" :to="{name:'edit'}"> 
                      <i class="fa fa-envelope-open fa-2x"></i>
                       <p>ส่งคำเชิญ</p>
                    </router-link>
                </div>
            </div>
    </div>
</template>

<script>
export default {
    props:['card']
}
</script>

<style scoped>
a{
  text-decoration: none;
}
.f-075{
  font-size: 0.75rem !important;
}
.f-1{
  font-size: 1rem !important;
}
.f-125{
  font-size: 1.25rem !important;
}
.img-circle{
    width: 80px;
    height: 80px;
    border-radius: 50%;
    overflow: hidden; 
    float: left;
}
.img-circle img{
    width: 100%;
}
.card{
    padding: 20px 20px 10px 20px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.btn-primary {
    display: block;
    margin: 0 auto;
    width: 75% ; 
    padding-top: 10px;
    height: 75%; 
    line-height: 25px;
    border-radius: 5px;
    color:white;
    background-color: #0A63B3;
    border: none;  
    box-shadow:none;
}
</style>