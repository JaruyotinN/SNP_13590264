<template>
<div class="row">
    <div class="col-md-6">
        <div class="card mt-4">
           <div class="col-12">
                  <div class="card-info">
                    <h4 class="bold mt-3">ข้อมูลการฝึกงาน</h4>
                    <label>ชื่อ : </label><label class="bold"> &nbsp{{ body.name }} {{ body.surname }}</label><br>
                    <label>เบอร์ติดต่อ : </label><label class="bold"> &nbsp{{ body.pnum }}</label><br>
                    <label>มหาวิทยาลัย : </label><label class="bold"> &nbsp{{ body.university }}</label><br>
                    <label>คณะ : </label><label class="bold"> &nbsp{{ body.faculty }}</label><br>
                    <label>สาขา : </label><label class="bold"> &nbsp{{ body.major }}</label><br>
                  </div> 
              </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mt-4">
             <div class="col-12">
                  <div class="card-info">
                    <h4 class="bold mt-3">ข้อมูลการฝึกงาน</h4>
                    <label>บริษัท : </label><label class="bold"> &nbsp{{ body.cname }}</label><br>
                    <label>หน่วยงาน : </label><label class="bold"> &nbsp{{ body.csubname }}</label><br>
                    <label>ผู้ดูแล : </label><label class="bold"> &nbsp{{ body.cstaff }}</label><br>
                    <label>ตำแหน่ง: </label><label class="bold"> &nbsp{{ body.cstaffjob }}</label><br>
                    <label>สถานที่ : {{ body.caddress }}</label>
                  </div> 
              </div>
        </div>
    </div>
     <div class="col-md-12">
        <div class="card mt-4">
             <div class="col-12">
                  <div class="card-info">
                    <h4 class="bold mt-3">ข้อมูลอาจารย์ที่ปรึกาา</h4>
                    <label>ชื่อ : </label><label class="bold"> &nbspอาจารย์{{ body.tname }}&nbsp{{ body.tsurname }}</label><br>
                    <label>เบอร์ติดต่อ : </label><label class="bold"> &nbsp{{ body.tpnum }}</label><br>
                  </div> 
              </div>
        </div>
    </div>
    <div class="col-md-12">
    <div class="btn-detail-style mt-3 mb-3">
       <button class="btn btn-primary bold" :to="{name:'student'}" @click="$emit('next', 4)">ยืนยันบริษัทฝึกงาน</button>
	</div>
    </div>
</div>
</template>

<script>
export default {
    props:['body'],
}
</script>

<style scoped>
.card{
    padding-bottom: 10px;
    box-shadow: 0 1px 6px 0 rgba(0,0,0,0.5);
    border-radius: 5px;
}
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
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