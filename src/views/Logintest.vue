<template>
  <form name="login-form" style="background:white;">
          <div class="mb-3">
             <label for="username">Username: </label>
             <input type="text" id="username" v-model="input.username" />
         </div>
        <div class="mb-3">
            <label for="password">Password: </label>
            <input type="password" id="password" v-model="input.password" />
        </div>
          <button class="btn btn-outline-dark" type="submit" v-on:click.prevent = "login()">
            Login
          </button>

          <p>Username is: {{input.username}}</p>
          <p>Password is: {{input.password}}</p>
        </form>
</template>

<script>
// import router from 'vue-router'
export default {
  name: 'Logintest',
  data(){
    return{
        input:{
            username: "",
            password: ""
        }
    }
  },
  methods:{
    login(){
      //make sure username OR password are not empty
      if(this.input.username != "" || this.input.password != ""){
        console.log("authenticated")
        this.$session.start()
              this.$session.set("username", this.input.username)
              console.log(this.$session.get("username")); 
              this.$router
                .push({ path: '/member' })
                .then(() => { this.$router.go() })
            //   Vue.http.headers.common['Authorization'] = 'Bearer ' + this.input.username
            //   this.$router.push('/panel/search')
      }else{
        console.log("Username and Password can not be empty")
      }
    }
  },
}
</script>

<style>
</style>