<template>
						<div class="card mt-4">
					  <div class="radio-img">
							<img :src="test.img" center alt="..." class="card-img-top"/>
						</div>
						<div class="top-box">
              <div class="col-12">
                  <div class="card-info">
                    <h5 class="bold"> {{ test.name }} </h5>
                    <p>ประเภทงาน : {{ test.type }} </p>
                    <p>ตำแหน่งที่ต้องการ : {{ test.description }} </p>
                  </div> 
              </div>
            </div>
							<div class="low-box">
								<div class="col-12">
									<div class="card-info">

								<p class="mt-1">ที่อยู่ : {{ test.place }} </p>
									</div>
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
  box-sizing: border-box;
  height: 300px;
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