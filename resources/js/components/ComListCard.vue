<template>
			<div class="card mt-4 h-100">
					  <div class="radio-img">
							<img :src="list.img" center  class="card-img-top"/>
						</div>
			<div class="top-box">
              <div class="col-12">
                  <div class="card-info">
                    <h5 class="bold mt-2"> {{ list.name }} </h5>     
                    <p>หน่วยงานที่รับ : {{ list.division }} </p>
                    <p>มหาวิทยาลัย: {{ list.university }} </p>
                  </div> 
              </div>
            </div>
              </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
  export default {
  middleware: 'auth',
  methods: {
   ...mapActions({
     userjoin:'comevents/userjoin',
   }),
  },
  created(){
    this.userjoin()
  },
  computed:{
  ...mapGetters({
      userjoins:'comevents/userjoins',
    }),
  },
   }
</script>

<style scoped>
a{
  text-decoration: none;
}
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
  height: 165px;
  box-sizing: border-box;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  overflow: hidden;
}
.radio-img img {
    width: 100%;
}
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
</style>