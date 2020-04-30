<template>
  <div class="container">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-10">
          <div class="mb-3 ml-3 mt-2" style="float: left">
            <h4 class="mb-2 bold">คำร้องขอฝึกงาน</h4>
            <p class="bold color-blue" v-if="tab == 1">รอพิจารณา</p>
            <p class="bold color-blue" v-if="tab == 2">อยู่ในการพิจารณา</p>
          </div>
        </div>

        <div class="col-md-2" v-for="(info, index) in infos" :key="index">
          <div class="img-circle" style="float:right;">
            <img :src="info.company.logo" />
          </div>
        </div>
      </div>

      <div class="input-group mt-2 mb-3 m-auto">
        <select class="custom-select col-md-3 m-auto" v-model="status">
          <option value="all" selected>สถานะทั้งหมด</option>
          <option value="0">รอการพิจารณา</option>
          <option value="1">ต้องการให้มาสัมภาษณ์</option>
          <option value="2">อยู่ในการพิจารณา</option>
          <option value="50">เชิญเข้าร่วมฝึกงาน</option>
          <option value="3">ผ่านการพิจราณา</option>
          <option value="99">ไม่ผ่านการพิจารณา</option>
        </select>
        <select
          class="custom-select col-md-3 m-auto"
          v-model="reqtype"
          required
        >
          <option value="all" selected>ตำแหน่งการฝึกงานทั้งหมด</option>
          <option v-for="(type, index) in comjob" :key="index" :value="type">{{
            type
          }}</option>
        </select>
      </div>
    </div>
 
    <hr class="hr-yellow" />
    <div class="col-md-12" v-for="(stu, index) in studentjoins" :key="index">
      <div
        class="card mt-3 mb-2"
        v-if="
          (stu.result == status || status == 'all') &&
            (stu.jobtype == reqtype || reqtype == 'all')
        "
      >
        <div class="row">
          <div class="col-md-6">
            <div class="img-circle mb-3 ml-3 mt-2 float: left">
              <img :src="stu.student.img" />
            </div>
            <div class="mb-3 mt-2 ml-3" style="float: left">
              <div class="f-1 bold m-0">
                <label class="color-blue"
                  >{{ stu.student.name }} {{ stu.student.surname }}
                </label>
                <label>|</label>
                <label>{{ stu.student.major.faculty.university.name }}</label>
              </div>
              <div class="f-075 m-0">
                <label>{{ stu.student.major.faculty.name }} </label>
                <label>สาขา </label>
                <label>{{ stu.student.major.name }}</label>
              </div>
              <div class="f-075 m-0">
                <label>โครงการ : </label>
                <label class="color-blue">{{ stu.comevent.division }}</label>
                <label>|</label>
                <label>ตำแหน่ง : </label>
                <label class="color-blue">{{ stu.jobtype }}</label>
              </div>
              <div class="f-075 m-0">
                <label class="color-dblue bold" v-if="stu.result == 0"
                  >สถานะ : รอการพิจารณา
                </label>
                <label class="color-dblue bold" v-if="stu.result == 1"
                  >สถานะ : ต้องการให้มาสัมภาษณ์
                </label>
                <label class="color-dblue bold" v-if="stu.result == 2"
                  >สถานะ : อยู่ในการพิจารณา
                </label>
                <label class="color-dblue bold" v-if="stu.result == 3"
                  >สถานะ : ผ่านการพิจราณา
                </label>
                <label class="color-dblue bold" v-if="stu.result == 50"
                  >สถานะ : เชิญเข้าร่วมฝึกงาน
                </label>
                <label class="color-dblue bold" v-if="stu.result == 99"
                  >สถานะ : ไม่ผ่าน
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3 mt-2 mr-3" style="float: left">
              <div class="f-1" v-if="stu.student.port != null">
                <a
                  class="mb05"
                  href=""
                  v-on:click.stop.prevent="openWindow(stu.student.port)"
                  >Portfolio</a
                >
                <br />
                <i class="ml-1 fa fa-file-image-o fa-3x color-dblue"></i>
              </div>
              <div class="f-1" v-else>
                <label>Portfolio</label>
                <br />
                <i class="ml-1 fa fa-file-image-o fa-3x color-gray"></i>
              </div>
            </div>
            <div class="mb-3 mr-3 mt-2" style="float:left">
              <div class="f-1" v-if="stu.student.cv != null">
                <a
                  class="mb05"
                  href=""
                  v-on:click.stop.prevent="openWindow(stu.student.cv)"
                  >Resume</a
                >
                <br />
                <i class="ml-1 fa fa-file-pdf-o fa-3x color-dblue"></i>
              </div>
              <div class="f-1" v-else>
                <label>Resume</label>
                <br />
                <i class="ml-1 fa fa-file-pdf-o fa-3x color-gray"></i>
              </div>
            </div>
            <form
              @submit.prevent="update(stu.id)"
              @keydown="form.onKeydown($event)"
            >
              <div class="col-md-6 mt-3" style="float:right">
                <button class="btn-outline-primary bold" :loading="form.busy">
                  <i class="fa fa-info fa-lg"></i> พิจารณาคำร้อง
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Form from "vform";
import { mapActions, mapGetters } from "vuex";

export default {
  data: () => ({
    form: new Form({
      check: 1,
      get: 1,
      id: ""
    }),
     form2: new Form({
      result: '',
      jobtype: '',
    }),
    tab: 1,
    comeventjob: "",
    status: "all",
    reqtype: "all",
    countdata: 0,
  }),
  methods: {
    setTab(tab) {
      this.tab = tab;
    },
    // count() {
    //   console.log(this.studentjoins);
    //   var vm = this;
    //   vm.countdata = 0;
    //   this.studentjoins.map(function(value, key) {
    //     console.log(value);
    //     if (
    //       (value.result == this.status || this.status == "all") &&
    //       (value.jobtype == this.reqtype || thi.sreqtype == "all")
    //     ) {
    //       this.countdata++;
    //     }
    //   });
    //   return this.countdata;
    // },
    ...mapActions({
      fetch: "profile/fetch",
      fetchstudentjoin: "comevents/fetchstudentjoin",
      fetchcomjob: "comevents/fetchcomjob"
    }),
    openWindow: function(link) {
      window.open(link);
    },
    async update(id) {
      this.form.id = id;
      const { data } = await this.form.put(`/api/update/${this.form.id}`);
      console.log(data);

      if (data) {
        this.$router.push({
          name: "getstudent",
          params: { id: this.form.id }
        });
      }
    }
  },

  computed: {
    ...mapGetters({
      infos: "profile/userinfos",
      studentjoins: "comevents/studentjoins",
      comjob: "comevents/comjob"
    })
  },
  created() {
    this.fetchstudentjoin()
    this.fetch()
    this.fetchcomjob()
    // this.count()
    // this.form2.keys().forEach(key => {
    //   this.form2[key] = this.studentjoins[key]
    //   console.log(studentjoins);

    // })
    //  this.studentjoins.forEach(key => {
    //     console.log(studentjoins);
    //     if (
    //       (studentjoins.result == this.status || this.status == "all") &&
    //       (studentjoins.jobtype == this.reqtype || this.reqtype == "all")
    //     ) {
    //       this.countdata++;
    //     }
      
    // })
  }
};
</script>

<style scoped>
li {
  margin-right: 1rem;
}
a {
  margin-bottom: 0.5rem;
  display: inline-block;
}
color-gray {
  color: gainsboro;
}
.f-075 {
  font-size: 0.75rem !important;
}
.f-1 {
  font-size: 1rem !important;
}
.f-125 {
  font-size: 1.25rem !important;
}
.img-circle {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  overflow: hidden;
  float: left;
}
.img-circle img {
  width: 100%;
}
.n-setup a {
  color: gray;
  padding-right: 15px;
}
.n-setup a:hover {
  text-decoration: none;
  color: #0047ba !important;
}
.active a {
  color: #0047ba !important;
}
.card {
  padding: 20px 20px 10px 20px;
  box-shadow: rgb(225, 225, 225) 0px 0px 10px 0px;
  border-radius: 5px;
}
.btn-outline-primary {
  width: 70%;
  height: 50px;
  line-height: 35px;
  border-radius: 2rem;
  color: #133cba;
  border: 2px solid #133cba;
  box-shadow: none;
  margin-left: auto;
  margin-right: auto;
  display: block;
}
</style>
