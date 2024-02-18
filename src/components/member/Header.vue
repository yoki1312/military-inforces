<template>
  <div class="header">
    <b-navbar type="none" variant="none">
        <!-- <img src="../../assets/images/logo.png" alt="logo" width="10%" class="position-absolute" style="margin-top:70px;"> -->
        <b-navbar-nav class="ml-auto">
          
            <b-nav-item-dropdown :text="nama" right class="mr-2">           
                    <li class="nav-item header">
                        <router-link class="nav-link" to="/member/profile">Profile</router-link>
                    </li>
                    <li class="nav-item header">
                        <!-- <router-link :to="{path : '/'}"><button>Sign Out</button></router-link> -->
                        <button class="btn btn-link"  @click="logout">Sign Out</button>
                        <!-- <a class="btn btn-danger" href="#" @click="logout">Sign Out</a> -->
                    </li>
                </b-nav-item-dropdown>

        </b-navbar-nav>
    </b-navbar>
  </div>
</template>

<script>
export default {
  name : 'Header',
  data(){
    return{
      username: this.$session.get("username")?this.$session.get("username"):"",
      nama: this.$session.get("nama")?this.$session.get("nama"):"",
      role_id: this.$session.get("role_id")?this.$session.get("role_id"):""
    }
  },
  methods : {
    logout: function () {
        this.$session.destroy()
        this.$router
                  .push({ path: '/login' })
                  .then(() => { this.$router.go() })
      }
  }
}
</script>

<style>
.header {
  background-color: #EF800F;
  padding : 5px;
}
.navbar-nav .dropdown-menu {
  background: #EF800F;
}

.nav-item .header {
  background: none;
  padding: 2px;;
}

.nav-item .header .btn-link {
  text-decoration: none;
  color: #000000;
}

.nav-item .header :hover {
  background: #ffffff;
  padding-left: 40px;
  padding-right: 40px;
}

.nav-item .header .nav-link{
  border-bottom: 1px solid;
}

</style>
