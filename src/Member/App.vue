<template>
  <div id="app">
    <Header />
    <Sidebar />
    <div class="content">
      <div class="container">
        <router-view/>
      </div>
    </div>

  </div>
</template>


<script>

import Header from './../components/member/Header.vue';
import Sidebar from './../components/member/Sidebar.vue';

export default  {
  name : 'App',
  components: {
    Header,
    Sidebar,
  },
  data(){
    return{
      username: this.$session.get("username")?this.$session.get("username"):""
    }
  },
  methods:{
    cekLogin : function (){
      if (this.$session.get("username") && this.$session.get("role_id") == 2){
        console.log('member')
      } else {
      this.logout()
      }
    },
    logout: function () {
      this.$session.destroy()
      this.$router
                .push({ path: '/login' })
                .then(() => { this.$router.go() })
    }
  },
  beforeMount() {
   this.cekLogin()
},
  
}
</script>

<style>
.container {
  margin-left: 0px;
}
</style>