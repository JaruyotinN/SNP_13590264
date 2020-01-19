<template>
   <div class="container" >
     <Dairyheader />
      <div class="row">
          <div class="col-md-12" v-for="(dairy, index) in dairys" :key="index">
          <Dairycard :dairy="dairy"/>
          </div>
      </div>
  </div>
</template>

<script>
import Dairyheader from '~/components/Dairyheader'
import Dairycard from '~/components/Dairycard'
import { mapGetters, mapActions } from "vuex";

export default {
  middleware: 'auth',
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
      interndairy:'interndairy/show'
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
      fetch:'interndairy/show',
    }),
  },
  created(){
    this.fetch(this.id)
  }
}
</script>

