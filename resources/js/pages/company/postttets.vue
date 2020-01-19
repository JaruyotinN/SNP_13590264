<template>
  <div>
    <div class="clearfix">
        <img src="/icon/left-arrow.png" width="40" style="margin-top:rem(10);" />
      </router-link>
      <h1 class="float-left ml-4">Create Item</h1>
    </div>
    <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
      <!-- Name -->
      <div class="row">
        <div class="form-group col-md-6">
          <label class>Title</label>
          <div class>
            <input
              v-model="form.name"
              :class="{ 'is-invalid': form.errors.has('name') }"
              class="form-control"
              type="text"
              name="name"
            />
            <has-error :form="form" field="name" />
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <label class>Description</label>
          <div class>
            <textarea
              v-model="form.description"
              :class="{ 'is-invalid': form.errors.has('description') }"
              class="form-control"
              type="text"
              name="description"
            />
            <has-error :form="form" field="description" />
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-3">
          <label class>Image</label>
          <div class>
            <input class="form-control" type="file" name="image" @change="setImg" />
            <has-error :form="form" field="image" />
          </div>
        </div>

        <div class="form-group col-md-3">
          <label>Audio</label>
          <div class>
            <input class="form-control" type="file" name="image" @change="setFile" />
            <has-error :form="form" field="file" />
          </div>
        </div>
      </div>

      <!-- description -->
      <!-- <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">description</label>
        <div class="col-md-7">
          <textarea
            v-model="form.description"
            :class="{ 'is-invalid': form.errors.has('description') }"
            class="form-control"
            type="text"
            name="description"
          />
          <has-error :form="form" field="description" />
        </div>
      </div>-->

      <div class="form-group row">
        <div class="col-md-7 offset-md-5 d-flex">
          <!-- Submit Button -->
          <v-button
            :loading="form.busy"
            id="createbtn"
            style="width:130px;"
            class="text-white colorr"
          >{{ id ? "update" : "save" }}</v-button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import Form from "vform";
import { mapActions, mapGetters } from "vuex";

export default {
  data: () => ({
    form: new Form({
      room_id: "",
      name: "",
      description: "",
      image_url: "",
      file_url: ""
    }),
    image: "",
    file: ""
  }),
  computed: {
    room_id() {
      return parseInt(this.$route.query.room_id);
    },
    ...mapGetters({
    
    }),
    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    setImg(e) {
      this.image = e.target.files[0];
    },
    setFile(e) {
      this.file = e.target.files[0];
    },
    submitForm() {
      if (this.id) {
        this.update();
      } else {
        this.save();
      }
    },
    async save() {
      this.form.image_url = await this.upImg({
        image: this.image,
        path: "items"
      });

      this.form.file_url = await this.uploadFile({
        file: this.file,
        path: "items"
      });

      this.form.room_id = this.room_id;

      const { data } = await this.form.post("/api/items");

      if (data) {
        this.$router.push({
          name: "admin.room.show",
          params: { id: this.room_id }
        });
      }
    },
  
    ...mapActions({
      fetch: "item/show"
    })
  },
  async created() {
    if (this.id) {
      await this.fetch(this.id);
      this.form.keys().forEach(key => {
        this.form[key] = this.show[key];
      });
    }
  }
};