<template>
  <div class="header">
    <b-navbar type="none" variant="none">
        <!-- <img src="../../assets/images/logo.png" alt="logo" width="10%" class="position-absolute" style="margin-top:70px;"> -->
        <b-navbar-nav class="ml-auto">
          
            <b-nav-item-dropdown :text="username" right class="mr-2">           
                    <!-- <li class="nav-item header">
                        <router-link class="nav-link" to="/member/profile">Profile</router-link>
                    </li> -->
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
      username: this.$session.get("username")?this.$session.get("username"):""
    }
  },
  methods : {
    logout: function () {
        this.$session.destroy()
        this.$router
                  .push({ path: '/' })
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

/* admin */
.table-admin{
    margin-top: 30px;
}
.table-admin h4{
    display: inline-block;
}
.tambah-data{
  display: inline-block;
  float: right;
  padding: 10px 20px;
  background: #ef800f;
  color: #fff;
  border-radius: 5px;
  margin-bottom: 30px;
}
.edit-opsi{
  padding: 5px 9px;
  font-size: 1.2rem;
  background: blue;
  color: #fff;
  border-radius: 3px;
  margin: 0 10px;
}
.delete-opsi{
  padding: 5px 9px;
  font-size: 1.2rem;
  background: red;
  color: #fff;
  border-radius: 3px;
  margin: 0 10px;
}
.edit-opsi:hover, .delete-opsi:hover{
  color: #333;
}

.add-page{
  margin-top: 30px;
}

.table td:last-child{
  white-space: nowrap
}

.btn-save{
    padding: 10px 25px;
    background-color: green;
    color: #fff;
    border-radius: 3px;
    border: 1px solid green;
    margin-right: 30px;
}
.btn-add-image-soal{
    margin-bottom: 60px;
    display: inline-block;
    padding: 10px 30px;
    color: #333;
    background-color: beige;
}
.add-page form{
  margin-top: 40px;
}

</style>
