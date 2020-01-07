<template>
   <div class="container" >
            <div class="card mt-5">
                <div class="col-md-12 mt-2">
                 <ColumHeader  title='สร้างแบบฟอร์ม'/>
                 <div class="row" style="padding:20px;">
                        <div class="col-md-6">
                            <p>บริษัท</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" type="text" placeholder="ชื่อบริษัทของคุณ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>หน่วยงาน / แผนก</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" type="text" placeholder="หน่วยงานหรือแผนกของคุณ">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>ผู้ดูแล</p>
                             <div class="input-group mt-2 mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>จำนวน</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                             </div>
                        </div>
                        <div class="col-md-4">
                            <p>จำนวน</p>
                             <div class="input-group mt-2 mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>จำนวน</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                             </div>
                        </div>
                        <div class="col-md-4">
                            <p>วันปิดรับ</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>หมวดหมู่ที่เกี่ยวข้อง</p>
                            <div class="mt-2 mb-3">
                                <textarea rows="4" cols="50">

                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>ตำแหน่งที่ต้องการ</p>
                            <div class="mt-2 mb-3">
                               <textarea rows="4" cols="50">

                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p>ประวัติและผลงาน</p>
                            <div class="mt-2 mb-3">
                               <textarea rows="4" cols="100">

                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="btn-detail-style btn-primary mt-3 mb-3" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <p>คำถามเด็กฝึกงาน 01</p>
                            </div>
                        </div>
                            <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </div>

                    </div>
                </div>
        </div>   <!-- card -->
</div>  <!-- container -->
   </div>
</template>

<script>
import ColumHeader from '~/components/ColumHeader'

export default {
    props:['post'],
data() {
},
    components:{
    ColumHeader,

    }
    
}

</script>
<style scoped>
.card{
    padding-bottom: 10px;
    box-shadow: 0 1px 6px 0 rgba(0,0,0,0.5);
    border-radius: 5px;
   
}
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
.custom-select{
    border-radius: 2rem !important;
}
</style>

