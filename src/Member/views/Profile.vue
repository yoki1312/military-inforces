<template>
  <div class="container mt-3">
    <b-card
            header-text-variant="h1"
            border-variant="warning"
            header="Profile"
            header-bg-variant="transparent"
            align="left"
        >
        <b-card-body>
            <b-row>
                <b-col sm="3" class="mb-3">Nama</b-col><b-col sm="9">: {{products.data[0].nama}}</b-col>
                <b-col sm="3" class="mb-3">No Hp</b-col><b-col sm="9">: {{products.data[0].no_hp}}</b-col>
                <b-col sm="3" class="mb-3">Email</b-col><b-col sm="9">: {{products.data[0].email}}</b-col>
                <b-col sm="3" class="mb-3">Asal Sekolah</b-col><b-col sm="9">: {{products.data[0].asal_sekolah}}</b-col>
                <b-col sm="3">Paket</b-col><b-col sm="9">: {{products.data[0].nama_paket}}</b-col>
            </b-row>

        </b-card-body>
    </b-card>

    <b-card
            style="margin-top:20px;"
            header-text-variant="h5"
            border-variant="warning"
            header="Ubah Password"
            header-bg-variant="transparent"
            align="left"
        >
        <b-card-body>
                <form>
                <b-row>
                  <div class="col-md-5">
                      <label for="password">Password</label>
                      <input type="password" id="password" class="form-control" v-model="password" required/>
                  </div>
                  <div class="col-md-5">
                      <label for="password">Ulangi Password</label>
                      <input type="password" id="password1" class="form-control" v-model="password1" required/>
                  </div>
                  <div class="col-md-2" style="margin-top:30px;">
                    <button class="form-control btn btn-success" type="submit" v-on:click.prevent = "ubahPassword()">
                        Simpan
                    </button>
                  </div>
                </b-row>
                </form>

        </b-card-body>
    </b-card>

</div>
</template>

<script>
import axios from 'axios';

export default {
data(){
    return{
      username: this.$session.get("username")?this.$session.get("username"):"",
      products:[],
      password:"",
      password1:"",
      id:this.$session.get("id")?this.$session.get("id"):""
    }
  },
  methods:{
     setProducts(data){
      this.products = data
    },
    ubahPassword(){
      console.log(this.id)
      if (this.password != '' && this.password1 != '') {
        if (this.password == this.password1) {
          axios.post('https://bimbelmilitaryinforce.com/api/member/profile/update_user', {
                    password : this.password,
                    id : this.id,
                  }, {
                headers: {
                  "Content-type": "text/plain",
                  },
              })
            .then( 
              (response) => {
                  const status = response.data.status
                  const message = response.data.message
                  
                  alert(message)
      
                  if (status == 1) {
                      window.location.reload()
                  } 
              }
            )
            .catch((error) => console.log(error));
        } else {
          alert("Password tidak sama");
        }
      } else {
        alert("Password harus di isi");
      }
    }
  },
  mounted(){
    axios.get('http://localhost/api2/military_inforces/member/profile/profile', {
      headers: {
        "Content-type": "application/json",
        }
    })
  .then( (response) =>
  {
    this.setProducts(response.data)
  })
  .catch((error) => console.log(error));
  }
}
</script>

<style>
.card-header {
    font-size: 2rem;
}
</style>