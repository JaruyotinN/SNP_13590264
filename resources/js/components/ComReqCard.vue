<template>
	<div class="card mt-4">
	    <div class="col-12">
           <div class="table-responsive-md">
                <table class="table table-borderless ">
                    <thead>
                        <tr>
                          <th style="width: 15%"></th>
                          <th style="width: 25%"></th>
                          <th style="width: 15%"></th>
                          <th style="width: 20%"></th>
                          <th style="width: 25%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td> 
                            <div class="img-circle">
                                <img :src="event.student.img" center alt="..." class="card-img-top"/>
                            </div>
                        </td>
                        <td>
                            <p class="mt-4 p-1">{{event.student.name}} {{event.student.surname}}</p>
                        </td>
                        <td>
                            <p class="mt-4 p-1 bold">link</p>
                        </td>
                        <td>
                            <label> {{event.student.cv}}</label>
                            <label> {{event.student.port}}</label>
                        </td>
                        <td>   
                            <form class="was-validated" @submit.prevent="update" @keydown="form.onKeydown($event)">
                             <!-- <router-link :to="{name:'getstudent', params:{id:event.student.comevent_joins.id }}" @click="update(event.student.comevent_joins.id)" >
                                  <p class="mt-4 p-1 bold">ข้อมูลเพิ่มเติม</p>
                            </router-link> -->
                            {{event.id}}
                             <input class="form-control" type="hidden" v-model="form.id = event.id">
                            <v-button
                            :loading="form.busy"
                            id="createbtn"
                            style="width:130px;"
                            class="text-white colorr"
                            >ข้อมูลเพิ่มเติม</v-button>
                            </form>
                        </td>
                        </tr>
                    </tbody>
                    </table>

            </div>
        </div>
	</div>
</template>

<script>
import Form from "vform";

export default {
    props:['event'],
    data: () => ({
    form: new Form({
      check:1,
      get:1,
      id:"",
    }),
    }),
     methods: {
    async update() {
      const { data } = await this.form.put(`/api/update/${this.form.id}`);
      console.log(data);

       if (data) {
        this.$router.push({
          name: "getstudent",
          params: { id: this.form.id }
        });
      }
    },
  },

}
</script>

<style scoped>
.center{
    text-align: center;
}
.img-circle{
    margin: 0 auto;
    width: 75px;
    height: 75px;
    border-radius: 50%;
    overflow: hidden; 

}
.img-circle img{
    width: 100%;
}
.card{
    padding-bottom: 10px;
    box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
    border-radius: 5px;
}
.card-info{
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
</style>