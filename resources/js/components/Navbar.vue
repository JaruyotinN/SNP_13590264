<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <router-link :to="{ name: user ? 'home' : 'welcome' }" class="navbar-brand">
         <img src="/uploads/images/comevents/inlearnship-02.png" center alt="..." class="img-size"/>
      </router-link>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false">
        <span class="navbar-toggler-icon" />
      </button>

      <div id="navbarToggler" class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <!-- <locale-dropdown /> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li> -->
        </ul>

        <ul class="navbar-nav ml-auto"  v-if="tab == 1">
          <!-- Authenticated -->
           <li v-if="user" class="nav-item">
             <router-link :to="{name:'student'}" class="nav-link" >หน้าหลัก</router-link>
            </li>
            <li v-if="user" class="nav-item">
             <router-link :to="{name:'dairy'}" class="nav-link" >บันทึกฝึกงาน</router-link>
            </li>
            <li v-if="user" class="nav-item">
             <router-link :to="{name:'status'}" class="nav-link">สถานะ</router-link>
            </li>
          <li v-if="user" class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark"
               href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            >
              <!-- <img :src="user.photo_url" class="rounded-circle profile-photo mr-1"> -->
              {{ user.name }} ({{user.role_name}})
            </a>
            <div class="dropdown-menu">
              <router-link :to="{ name: 'settings.profile' }" class="dropdown-item pl-3">
                <fa icon="cog" fixed-width />
                {{ $t('settings') }}
              </router-link>
              

                <button class="btn btn-primary bold dropdown-item" @click="setTab(2)">to company</button>

              <div class="dropdown-divider" />
              <a href="#" class="dropdown-item pl-3" @click.prevent="logout">
                <fa icon="sign-out-alt" fixed-width />
                {{ $t('logout') }}
              </a>
            </div>
          </li>

          <!-- Guest -->
          <template v-else>
            <li class="nav-item">
              <router-link :to="{ name: 'login' }" class="nav-link" active-class="active">
                {{ $t('login') }}
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'register' }" class="nav-link" active-class="active">
                {{ $t('register') }}
              </router-link>
            </li>
          </template>
        </ul>

         <ul class="navbar-nav ml-auto"  v-else-if="tab == 2">
          <!-- Authenticated -->
           <li v-if="user" class="nav-item">
             <router-link :to="{name:'company'}" class="nav-link" >หน้าหลัก company</router-link>
            </li>
            <li v-if="user" class="nav-item">
             <router-link :to="{name:'internrequest'}" class="nav-link" >คำร้องขอฝึกงาน</router-link>
            </li>
            <li v-if="user" class="nav-item">
             <router-link :to="{name:'list'}" class="nav-link">รายชื่อเด็กฝึกงาน</router-link>
            </li>
          <li v-if="user" class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark"
               href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            >company
            </a>
            <div class="dropdown-menu">
              <router-link :to="{ name: 'settings.profile' }" class="dropdown-item pl-3">
                <fa icon="cog" fixed-width />
                {{ $t('settings') }}
              </router-link>
              

                <button class="btn btn-primary bold dropdown-item" @click="setTab(1)">to Student</button>

              <div class="dropdown-divider" />
              <a href="#" class="dropdown-item pl-3" @click.prevent="logout">
                <fa icon="sign-out-alt" fixed-width />
                {{ $t('logout') }}
              </a>
            </div>
          </li>

          <!-- Guest -->
          <template v-else>
            <li class="nav-item">
              <router-link :to="{ name: 'login' }" class="nav-link" active-class="active">
                {{ $t('login') }}
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'register' }" class="nav-link" active-class="active">
                {{ $t('register') }}
              </router-link>
            </li>
          </template>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'


export default {
  components: {
    LocaleDropdown
  },

  data: () => ({
     tab:1,
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    },
     setTab(tab) {
      this.tab = tab
    },
  }
}
</script>

<style scoped>
.img-size{
    margin: 0 auto;
    height: 50px;

}
.img-size img{
    width: 100%;
}
.navbar{
  background-color: #0047BA !important;
}
.navbar-nav li>a{
  color: #ffffff !important;
}
.navbar-nav li>a:hover{
  color: #E7B223 !important;
}
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -.375rem 0;
}
</style>
