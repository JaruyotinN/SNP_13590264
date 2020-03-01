<template>
   <div class="container" >    
    <ColumHeader title="Hello" showBack="student"/> 
      <pre>{{showstudent}}</pre>
  </div>
</template>

<script>
import ColumHeader from '~/components/ColumHeader'
import {mapActions, mapGetters} from 'vuex'

export default {
  middleware: 'auth',
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      showstudent:'comevents/showstudent_join',
    })
  },
data() {
  return {
   
    }
},
  components:{
    ColumHeader,

  },
  methods: {
    ...mapActions({
      fetch:'comevents/showjoin',
    }),
  },
  created(){
    this.fetch(this.id)
  }
}
</script>

<style scoped>
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