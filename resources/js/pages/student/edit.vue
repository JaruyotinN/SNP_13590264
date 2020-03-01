<template>
   <div class="container" > 
        <div class="col-md-12">
            <Editprofile/>
            <Editport />
            <Editscore />
        </div>
   </div>
</template>

<script>
import ColumHeader from '~/components/ColumHeader'
import Editprofile from '~/components/Studentedit/Editprofile'
import Editport from '~/components/Studentedit/Editport'
import Editscore from '~/components/Studentedit/Editscore'

export default {
  middleware: 'auth',
  components:{
    ColumHeader,
    Editprofile,
    Editport,
    Editscore,
  },
  computed:{
  },
  methods: {
  }
   
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
.custom-select{
    border-radius: 2rem !important;
}
.form-control{
    border-radius: 2rem;
}
</style>