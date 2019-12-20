<template>
   <div class="container" >
      <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="img-circle center">
                        <img src="">
                    </div>
                    <div class="center mt-2">
                        <a class="f025" href="#">แก้ไขรูปโปรไฟล์</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <p>ชื่อ</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" type="text" placeholder="โปรดใส่ชื่อของคุณ">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>นามสกุล</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" type="text" placeholder="โปรดใส่นามสกุลของคุณ">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>รหัสนักศึกษา</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" type="text" placeholder="โปรดใส่รหัสนักศึกษา">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>มหาวิทยาลัย</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" type="text" placeholder="โปรดใส่มหาวิทยาลัย">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>คณะ</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" type="text" placeholder="โปรดใส่คณะของคุณ">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>สาขา / เอก</p>
                            <div class="mt-2 mb-3">
                                <input class="form-control" type="text" placeholder="โปรดใส่ สาขา / เอก ของคุณ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
              <div class="col-md-3 offset-9">
                <div class="btn-detail-style mt-3 mb-3">
                    <router-link class="btn btn-primary bold" :to="{name:'student'}">บันทึกข้อมูลผู้ใช้งาน</router-link>
                </div>
              </div>
      </div>     <!-- col-md-12 -->
  </div>
</template>

<script>

export default {
  middleware: 'auth',
data() {
  return {
     heads: [
    {
    },
    ],
    }
},
}
</script>
<style scoped>
.f025{
    font-size: 0.25rem;
}
.form-control{
    border-radius: 2rem;
}
.img-circle{
    width: 125px;
    height: 125px;
    border-radius: 50%;
    overflow: hidden; 
    background-color: gray;
}
.img-circle img{
    width: 100%;
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
</style>
