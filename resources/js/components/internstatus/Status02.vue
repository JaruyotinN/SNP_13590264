<template>
<div class="col-md-12">
    <div class="row">
         <div class="col-md-6">
            <h>บริษัท</h>
            <div class="mt-2 mb-3">
            <input class="form-control" type="text" placeholder="Comapany" value="บริษัท ไลค์มี จำกัด">
            </div>
        </div>
        <div class="col-md-6">
            <h>หน่วยงาน</h>
            <div class="mt-2 mb-3">
            <input class="form-control" type="text" placeholder="Comapany" value="Future Trends">
            </div>
        </div>
         <div class="col-md-6">
            <h>ผู้ดูแล</h>
            <div class="mt-2 mb-3">
            <input class="form-control" type="text" placeholder="Comapany" value="นางโลเล็ม ยิปซั่ม">
            </div>
        </div>
        <div class="col-md-6">
            <h>ตำแหน่งผู้ดูแล</h>
            <div class="mt-2 mb-3">
            <input class="form-control" type="text" placeholder="Comapany" value="Content Creator">
            </div>
        </div>
    </div>
    <div class="btn-detail-style mt-3 mb-3">
         <button class="btn btn-primary bold" :to="{name:'student'}" @click="$emit('next', 3)">ดำเนินการขั้นต่อไป</button>
       
	</div>

</div>
</template>

<script>
    export default {
       
    }
</script>

<style  scoped>
.form-control{
    border-radius: 2rem;
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
