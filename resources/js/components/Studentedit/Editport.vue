<template>
   <div class="container" >
     <div class="col-md-12">
        <div class="row">
                   <div class="col-md-4">
                        <p>Portfolio</p>
                        <div class="mt-2 mb-3">
                            <input class="form-control" type="text" placeholder="port">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p>Resume</p>
                        <div class="mt-2 mb-3">
                            <input class="form-control" type="text" placeholder="resume">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p>URL สำหรับผลงาน</p>
                        <div class="mt-2 mb-3">
                            <input class="form-control" type="text" placeholder="">
                        </div>
                    </div>
        </div>
               <div class="col-md-3 offset-9">
                <div class="btn-detail-style mt-3 mb-3">
                    <router-link class="btn btn-primary bold" :to="{name:'student'}">บันทึกข้อมูล</router-link>
                </div>
              </div>
    </div> <!-- col-md-12 -->
</div>  <!-- container -->
   
</template>

<script>

export default {
  middleware: 'auth',
data() {
  return {
     heads: [
    {
    },
    ],
    }
},
}
</script>
<style scoped>
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
</style>

