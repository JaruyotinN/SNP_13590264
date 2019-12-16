<template>
	<div class="card mt-4">
	    <div class="col-12">
            <div class="row">
                <div class="col-2">
                    <div class="content-left mt-4">
                        <div class="img-circle">
                            <img :src="dairy.img" center alt="..." class="card-img-top"/>
                        </div>
                         <div class="center mt-3">
                            <p>{{ dairy.name }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <h5 class="mt-4 mb-4 p-1 bold" >{{dairy.description.substring(0,220)+"..."}}</h5>
                    <div class="fix-position">
                        <p>บันทึกวันที่ : {{dairy.date}} โดย {{dairy.name}} {{dairy.number}} , เวลา {{dairy.time}}</p>
                    </div> 
                </div>
            </div>
        </div>
	</div>
</template>

<script>
export default {
    props:['dairy']
}
</script>

<style scoped>
h5{
    line-height: 1.75rem;
}
p{
    font-size: 0.25rem;
}
.center{
    text-align: center;
}
.img-circle{
    margin: 0 auto;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden; 

}
.img-circle img{
    width: 100%;
}
.fix-position{
    bottom: 0px;
    right: 15px;
    position: absolute;
}
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
</style>