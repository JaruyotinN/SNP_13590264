<template>
	<div class="card mt-4">
	    <div class="col-12">
            <div class="row">
                <div class="col-2">
                    <div class="content-left mt-4">
                        <div class="img-circle">
                            <img :src="dairy.student.img" center alt="..." class="card-img-top"/>
                        </div>
                         <div class="center mt-3">
                            <p>{{ dairy.student.name }} {{ dairy.student.surname }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <h5 class="mt-4 p-1 bold">{{dairy.title}}</h5>
                    <h5 class=" mb-4 p-1" >{{dairy.description}}</h5>
                    <div class="fix-position">
                        <p>บันทึกวันที่ : {{dairy.created_at}} โดย {{dairy.student.name}} {{dairy.student.number}} </p>
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
    padding : 1.5rem;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
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