<template>
  <div class="container">
    <card title="home">
      login
      <div class="row">
        <div class="col-md-6" v-for="(test, index) in tests" :key="index">
          <test-card :test="test"/>
        </div>
        
      </div>

    </card>
  </div>
  
 
</template>

<script>
import TestCard from '~/components/TestCard'

export default {
  middleware: 'auth',
data() {
  return {
    tests: [
    {
      name:'it',
      image_url:'https://picsum.photos/id/237/200/300'
    },
    {
      name:'it2',
      image_url:'https://picsum.photos/id/222/200/300'
    }
     
    ]
  }
},
  metaInfo () {
    return { title: 'home' }
  },
  components:{
    TestCard
  }
}
</script>
