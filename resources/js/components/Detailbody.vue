<template>
<div class="row">

    <div class="col-md-6">
        <div class="mt-4">
            <div class="radio-img d-flex">
		        <img :src="body.img" center alt="..." class="card-img-top"/>
		    </div>
        </div>
    </div>
  
    <div class="col-md-6" >
        <div class="card mt-4">
             <div class="col-12">
                  <div class="card-info">
                    <h4 class="bold mt-3 color-blue">ข้อมูลการฝึกงาน</h4>
                    <label>บริษัท : </label><label class="bold"> &nbsp{{ body.company.name }}</label>
                     &nbsp &nbsp &nbsp
                    <label>หน่วยงาน : </label><label class="bold"> &nbsp {{ body.division }}</label><br>
                    <label>จำนวนที่เปิดรับ : </label><label class="bold"> &nbsp{{ body.quantity }} ตำแหน่ง</label><br>
                    <label>ตำแหน่งที่ต้องการ : </label><label class="bold"> &nbsp{{ body.requirement }}</label><br>
                    <label>วันที่ทำการ : </label><label class="bold"> &nbsp จ-ศ</label><br>
                    <label>สถานที่ : {{ body.company.address }}</label>
                    <hr class="hr-orange mt-3 mb-3">
                    <h5 class="bold">ข้อมูลเพิ่มเติม</h5>
                    <p>&nbsp&nbsp{{ body.desciption }}</p>
                  </div> 
              </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props:['body']
}
</script>

<style scoped>
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.radio-img{
  box-sizing: border-box;
  border-radius: 5px;
  overflow: hidden;
  box-shadow: 0 1px 6px 0 rgba(0,0,0,0.5);
}
.radio-img img {
    width: 100%;
}
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
</style>