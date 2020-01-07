<template>
			<div class="card mt-3"> 
             <div class="row">
                <div class="col-md-10">
                    <div class="img-circle mt-2 mr-3">
                        <img :src="card.img">
                    </div>
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <div class="f-1 bold m-0">
                          <label>{{card.name}}</label>
                          <label>|</label>
                          <label>{{card.university}}</label>
                        </div>
                        <div class="f-1 m-0">
                            <label class="m-0">ทักษะหลัก :</label>
                            <label>{{card.type}}</label>
                            <label>|</label>
                            <label>{{card.score}}</label>
                        </div>
                        <div class="f-075 m-0">
                            <label >ทักษะรอง :</label>
                            <label>{{card.type2}}</label>
                            <label>|</label>
                            <label>{{card.score2}}</label>
                        </div>
                    </div>

                </div>
                <div class="col-md-2 mt-4">
                    <router-link class="btn btn-primary bold" :to="{name:'edit'}">ส่งคำเชิญ</router-link>
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
    box-shadow: 0 1px 6px 0 rgba(0,0,0,0.5);
    border-radius: 5px;
}
.btn-primary {
    width: 100% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:white;
    background-color: #0047BA ;
    border: none;  
    box-shadow:none;
}
</style>