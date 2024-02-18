<template>
  <div class="container mt-3">
    <h3>Soal Ujian</h3> 

    <b-row>
        <b-col sm="3" class="mb-3">Paket</b-col><b-col sm="9">: Pengantar Ilmu Politik</b-col>
        <b-col sm="3" class="mb-3">jumlah Soal</b-col><b-col sm="9">: 5</b-col>
        <b-col sm="3" class="mb-3">Waktu</b-col><b-col sm="9">: 10 Menit</b-col>
    </b-row>
    <!-- {{jadwal.data}} -->

    <button v-if="jadwal.data" class="btn btn-success" v-on:click.prevent = "returnUjian()"> Lanjutkan Ujian </button>
    <button v-else class="btn btn-success" v-on:click.prevent = "getPertanyaan()"> Mulai Ujian </button>
    <!-- <b-table
      id="table-transition-example"
      :items="Jadwal.data"
      :fields="fields"
      striped
      small
      primary-key="tanggal"
      :tbody-transition-props="transProps"
    ></b-table> -->  
</div>
</template>

<script>
import axios from 'axios';

export default {
data(){
    return{
      username: this.$session.get("username")?this.$session.get("username"):"",
      jadwal:[],
    }
  },
  methods:{
     getPertanyaan(){
        axios.get('http://localhost/api2/military_inforces/member/member/set_ujian', {
          headers: {
            "Content-type": "application/json",
            }
        })
      .then( 
        (response) => console.log(response.data.message),
      this.$router
                .push({ path: '/member/ujian' })
                .then(() => { this.$router.go() })
      )
      .catch((error) => console.log(error));
     },
     returnUjian(){
      this.$router
                .push({ path: '/member/ujian' })
                .then(() => { this.$router.go() })
     },
     setJadwal(data){
      this.jadwal = data
    }
  },
  mounted(){
    axios.get('http://localhost/api2/military_inforces/member/member/cek_ujian', {
      headers: {
        "Content-type": "application/json",
        }
    })
  .then( (response) =>this.setJadwal(response.data))
  .catch((error) => console.log(error));
  }
}
</script>

<style>

</style>