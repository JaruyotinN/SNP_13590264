<template>
<div class="row">
     <div class="col-md-12">
        <div class="card mt-4">
            <table class="table" >
                <tbody>
                    <tr>
                        <td class="w80"><label>คำรองขอส่งตัว</label></td>
                        <td> <a class="btn custome"
                       href="/create">ดาวน์โหลดไฟล์</a>
                       </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>
<script>
export default {

}
</script>

<style scoped>
.w80{
    width: 80%;
}
.custome{
    width: 100% ; 
    height: 50px; 
    line-height: 35px;
    border-radius: 2rem; 
    color:white;
    background-color: #0047BA ;
    border: none;  
    box-shadow:none;
}
.card{
    height: 250px;
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.btn-detail-style .btn-primary{ 
    background-color: #0047BA ;
    border:none; 
    border-radius: 30px;
    width: 80%;
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