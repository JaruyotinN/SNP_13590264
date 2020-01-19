<template>
   <div class="container" >
     <Dairyheader />
      <div class="row">
          <div class="col-md-12" v-for="(dairy, index) in interndairys" :key="index">
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
  methods: {
    ...mapActions({
      fetch:'interndairys/fetch',
    }),
  },
  data() {
    return {
      
      }
  },
  components:{
    Dairyheader,
    Dairycard,
  },
  computed:{
    id(){
      return parseInt(this.$route.params.id)
    },
    ...mapGetters({
       interndairys:'interndairys/interndairys'
    })
  },
  created(){
     this.fetch()
  }
}
</script>

