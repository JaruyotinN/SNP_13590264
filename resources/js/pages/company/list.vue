<template>
<div class="container" >
   <div class="col-md-12">
            <div class="row">
                <div class="col-md-10">
                    <div class="mb-3 ml-3 mt-2" style="float: left">
                        <h4 class="mb-2 bold">บันทึกฝึกงาน </h4>
                    </div>
                </div>
                <div class="col-md-2">
                   <div class="img-circle" style="float:right;">
                            <img src="https://scontent.fbkk13-1.fna.fbcdn.net/v/t1.0-9/p960x960/51248284_779547722411675_3427955334721830912_o.png?_nc_cat=108&_nc_eui2=AeH9XH2PPZuSeGLO1nuw_wlrNgVQ8my7ji7dgg_Y1SSpZ98ttqIoVNRtvXwkI2F5kH7rRL7kuYJiCgOBrhUs-_rV-2nYOTbkgZ-l2ecVyeG2Vw&_nc_oc=AQmAvGTU0GD3wgF7XAx6aaR39_lpKs9xK-sarkzzNfpqpnZ2DVxBokWJwcHMDMsURE8&_nc_ht=scontent.fbkk13-1.fna&oh=eaca2f6ab9b3f4fee1744560e9923c3f&oe=5E79F2EF">
                    </div>
                </div>
            </div>

              <ul class="nav ml-3">
                <li>
                   <div class="dropdown show">
                      <a  href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ดำเนินการอยู่
                      </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </li>
                <p>&nbsp;&nbsp;|&nbsp;&nbsp;</p>
                <li>
                   <div class="dropdown show">
                      <a  href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ประเมินนักศึกษาฝึกงาน
                      </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </li>
                 <p>&nbsp;&nbsp;|&nbsp;&nbsp;</p>
                 <li>จบฝึกงาน</li>
              </ul>
            </div>
             <hr>
             <div class="row">
               <div class="col-md-4 mb-2" v-for="(list, index) in lists" :key="index">
                <!-- <router-link :to="{name:'detail'}"> -->
                <ComListCard :list="list"/>
                <!-- </router-link> -->

              </div>
             </div>
             

</div>
</template>

<script>
import ComListCard from '~/components/ComListCard'
export default {
    
data() {
  return {
    lists: [
     {
      img:'https://picsum.photos/id/237/200/300',
      name:'นายณัทกฤช จารุโยธิน',
      division:'Future Trends',
      university:'ศิลปากร' ,
    },
    {
      img:'https://picsum.photos/id/137/200/300',
      name:'นายณัฐพล ปัญญาดี',
      division:'Future Trends',
      university:'ศิลปากร' ,
    },
    ]
  }
  },
   components:{
  ComListCard
   
  }
}
</script>

<style scoped>
.img-circle{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden; 
    float: left;
}
.img-circle img{
    width: 100%;
}
.n-setup a{
    color: gray;
    padding-right: 15px;
}
.n-setup a:hover{
    text-decoration: none;
    color: #0047BA !important;
}
.active a{ 
  color: #0047BA !important;
 }


</style>