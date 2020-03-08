<template>
			<div class="card mt-4 h-95">
					  <div class="radio-img">
							<img :src="event.img" center  class="card-img-top"/>
						</div>
						<div class="top-box">
              <div class="col-12">
                  <div class="card-info">
                    <label class="bold mt-2 color-dblue">บริษัท{{ event.company.name }} </label>
                    <p class="mb-2 color-dblue">Division / หน่วยงาน</p>
                    <p>ประเภทงาน : {{ event.requirement }} </p>
                    <p>ตำแหน่งที่ต้องการ : {{ event.requirement }} </p>
                    <p>ระยะเวลา : {{ event.enddate }} </p>
                  </div> 
              </div>
            </div>
							<div class="low-box">
								<div class="col-12">
									<div class="card-info">
								<p class="mt-1"><i class="fa fa-map-marker fa-2x color-orange"></i> {{ event.company.address }} </p>
									</div>
								</div>
							</div>
              </div>
</template>

<script>
export default {
    props:['event']
}
</script>

<style scoped>
a{
  text-decoration: none;
}
label{
  margin: 0;
}
p{
  margin: 0;
  font-size: 0.75rem;
}
.h-95{
  height: 95%;
}
.card{
    padding-bottom: 10px;
    box-shadow: 0 1px 6px 0 rgba(0,0,0,0.5);
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