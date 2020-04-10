<template>
  <div>
    <input type="text" v-model="name" placeholder="input name">
    <button @click="add()">ADD User</button> <br>
    <hr>
    search: <input type="text" v-model="search">
    <div v-for="(e, key) in listFilter">
      {{ e.name }} <button @click="del(key)">x</button>
    </div>
  </div>
</template>

<script>
export default {
  components: {
  },
  data () {
    return {
      list: [
        {
          name: 'mint'
        },
        {
          name: 'tak'
        }
      ],
      search: '',
      name: ''
    }
  },
  computed: {
    listFilter () {
      let text = this.search.trim()
      return this.list.filter(item => {
        return item.name.indexOf(text) > -1
      })
    }
  },
  methods: {
    add () {
      this.list.push({ name: this.name })
    },
    del (id) {
      console.log(id)
      this.list.splice(id, 1)
    }
  }
}
</script>

<style>
</style>