<template>
   <div class="container" >
      <div class="col-md-12">
           <h5 class="bold center">**ความถนัดสามารถเลือกได้สูงสุด 4 ประเภทจากคะแนนทั้งหมด 15 คะแนน**</h5>
            <div class="row mt-3">
                <div class="col-md-6">
                    <p>หมวดหมู่ที่ 1</p>
                     <div class="input-group mt-2 mb-3">
                        <select class="custom-select mr-1 w-30" id="inputGroupSelect01">
                            <option selected>หมวดหมู่</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select mr-2 w-30" id="inputGroupSelect01">
                            <option selected>เลือกหมวด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>ความถนัด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>หมวดหมู่ที่ 2</p>
                     <div class="input-group mt-2 mb-3">
                        <select class="custom-select mr-1 w-30" id="inputGroupSelect01">
                            <option selected>หมวดหมู่</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select mr-2 w-30" id="inputGroupSelect01">
                            <option selected>เลือกหมวด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>ความถนัด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>หมวดหมู่ที่ 3</p>
                     <div class="input-group mt-2 mb-3">
                        <select class="custom-select mr-1 w-30" id="inputGroupSelect01">
                            <option selected>หมวดหมู่</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select mr-2 w-30" id="inputGroupSelect01">
                            <option selected>เลือกหมวด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>ความถนัด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>หมวดหมู่ที่ 4</p>
                     <div class="input-group mt-2 mb-3">
                        <select class="custom-select mr-1 w-30" id="inputGroupSelect01">
                            <option selected>หมวดหมู่</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select mr-2 w-30" id="inputGroupSelect01">
                            <option selected>เลือกหมวด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>ความถนัด</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>
              <div class="col-md-3 offset-9">
                <div class="btn-detail-style mt-3 mb-3">
                    <v-button
                    :loading="form.busy"
                    id="createbtn"
                    class="btn btn-primary bold"
                    >{{ id ? "update" : "save" }}</v-button>
                    <router-link class="btn btn-primary bold" :to="{name:'student'}">บันทึกความถนัด</router-link>
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
.w-30{
    width: 30%;
}
.custom-select{
    border-radius: 2rem !important;
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
</style>
