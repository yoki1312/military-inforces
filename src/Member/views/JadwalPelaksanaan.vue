<template>
  <div class="container mt-3">
    <h3>Jadwal Pelaksanaan</h3>
    <b-table
      id="table-transition-example"
      :items="Jadwal.data"
      :fields="fields"
      striped
      small
      primary-key="tanggal"
      :tbody-transition-props="transProps"
    ></b-table>

</div>
</template>

<script>
import axios from 'axios';

export default {
data(){
    return{
      username: this.$session.get("username")?this.$session.get("username"):"",
      Jadwal:[],
      transProps: {
          // Transition name
          name: 'flip-list'
        },
        fields: [
        {key : "hari", sortable: true},
        {key : "tanggal", sortable: true},
        {key : "keterangan", sortable: true}
        ]
    }
  },
  methods:{
     setJadwal(data){
      this.Jadwal = data
    }
  },
  mounted(){
    axios.get('http://localhost/api2/military_inforces/member/member/jadwal_pelaksanaan', {
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