<template>
<div class="row">
    <div class="col-md-6">
        <div class="mt-4">
            <div class="radio-img">
		        <img :src="body.img" center alt="..." class="card-img-top"/>
		    </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mt-4">
             <div class="col-12">
                  <div class="card-info">
                    <h5 class="bold mt-3">ข้อมูลการฝึกงาน</h5>
                    <label>บริษัท : </label><label class="bold"> &nbsp{{ body.name }}</label><br>
                    <label>หน่วยงาน : </label><label class="bold"> &nbsp{{ body.subname }}</label><br>
                    <label>จำนวนที่เปิดรับ : </label><label class="bold"> &nbsp{{ body.quantity }}</label><br>
                    <label>ตำแหน่งที่ต้องการ : </label><label class="bold"> &nbsp{{ body.requirement }}</label><br>
                    <label>วันที่ทำการ : </label><label class="bold"> &nbsp{{ body.worktime }}</label><br>
                    <label>สถานที่ : {{ body.address }}</label>
                    <h5 class="bold">ข้อมูลการฝึกงาน</h5>
                    <p>&nbsp&nbsp{{ body.description }}</p>
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
    box-shadow: 0 1px 6px 0 rgba(0,0,0,0.5);
    border-radius: 5px;
}
.radio-img{
  box-sizing: border-box;
  height: 500px;
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