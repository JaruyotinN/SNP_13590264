<template>
			<div class="card mt-4 h-100">
					  <div class="radio-img">
							<img :src="test.img" center  class="card-img-top"/>
						</div>
						<div class="top-box">
              <div class="col-12">
                  <div class="card-info">
                    <h5 class="bold mt-2"> {{ test.company.name }} </h5>
                   
                    <p>ตำแหน่งที่ต้องการ : {{ test.requirement }} </p>
                    <p>สิ้นสุดเมื่อ : {{ test.enddate }} </p>
                  </div> 
              </div>
            </div>
							<div class="low-box">
								<div class="col-12">
									<div class="card-info">
								<p class="mt-1">ที่อยู่ : {{ test.company.address }} </p>
									</div>
								</div>
							</div>
              </div>
</template>

<script>
export default {
    props:['test']
}
</script>

<style scoped>
a{
  text-decoration: none;
}
p{
  margin: 0;
  font-size: 0.75rem;
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