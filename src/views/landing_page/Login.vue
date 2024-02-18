<template>
<div class="Login">
    <Header />
    <Navbar />

    <section class="head-breadcrumb">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <b-breadcrumb :items="items"></b-breadcrumb>
          </div>
        </div>
      </div>
    </section>
    <section class="body-skedinasan">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <h1>Login</h1>
            <form name="login-form">
                <div class="mb-3">
                    <label for="username">Email/Username </label>
                    <input type="text" id="username" class="form-control" v-model="input.username" />
                </div>
                <div class="mb-3">
                    <label for="password">Password </label>
                    <input type="password" id="password" class="form-control" v-model="input.password" />
                </div>
                <button class="btn-daftar" type="submit" v-on:click.prevent = "login()">
                    Login
                </button>

                <!-- <p>Username is: {{input.username}}</p>
                <p>Password is: {{input.password}}</p> -->
            </form>
          </div>
          
        </div>
      </div>
    </section>

    <Footer />
  </div>
</template>

<script>
import axios from 'axios';
// @ is an alias to /src
import Header from '@/components/landing_page/Header.vue'
import Navbar from '@/components/landing_page/Navbar.vue'
import Footer from '@/components/landing_page/Footer.vue'

export default {
  name: 'Login',
  components: {
    Header,
    Navbar,
    Footer
  },
  data() {
    return {
      items: [
        {
          text: 'Beranda',
          href: '/'
        },
        {
          text: 'Login',
          active: true
        }
      ],
      input:{
        username: "",
        password: ""
      }
    }
  },
  methods:{
    login(){
      if (this.input.username != '' && this.input.password != '') {
            axios.post('https://bimbel-militaryinforces.com/api/auth/login', {
                  username : this.input.username,
                  password : this.input.password,
                }, {
              headers: {
                "Content-type": "text/plain",
                },
            })
          .then( 
            (response) => {
                console.log(response.data.data['role_id'])
                const status = response.data.status
                const message = response.data.message
                const role_id = response.data.data['role_id']
                const nama = response.data.data['nama']
                const id = response.data.data['id']
    
                alert(message)
    
                if (status == 1) {
                    this.$session.start()
                    this.$session.set("username", this.input.username)
                    this.$session.set("role_id", role_id)
                    this.$session.set("nama", nama)
                    this.$session.set("id", id)

                    if (role_id == 2){
                      this.$router
                      .push({ path: '/member' })
                      .then(() => { this.$router.go() })
                    } else {
                      this.$router
                      .push({ path: '/admin' })
                      .then(() => { this.$router.go() })
                    }
                    
                    
                } 
            }
          )
          .catch((error) => console.log(error));
        } else {
            alert('Data Tidak Lengkap')
        }
      //make sure username OR password are not empty
      // if(this.input.username != "" || this.input.password != ""){
      //   console.log("authenticated")
      //   this.$session.start()
      //         this.$session.set("username", this.input.username)
      //         console.log(this.$session.get("username")); 
      //         this.$router
      //           .push({ path: '/member' })
      //           .then(() => { this.$router.go() })
      //       //   Vue.http.headers.common['Authorization'] = 'Bearer ' + this.input.username
      //       //   this.$router.push('/panel/search')
      // }else{
      //   console.log("Username and Password can not be empty")
      // }
    }
  }
}
</script>
