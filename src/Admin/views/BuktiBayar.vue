<template>
  <div class="container mt-3">
    <h4>Bukti Pembayaran</h4>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Transfer By</th>
          <th>Foto</th>
          <!-- <th>Asal Sekolah</th>
          <th>Aksi</th> -->
        </tr>
      </thead>
      <tbody>
        <!-- {{history.data}} -->
        <tr v-for="(item, index) in member.data" :key="index">
          <td>{{ index+1 }}</td>
          <td>{{ item.nama }}</td>
          <td>{{ item.transfer_by }}</td>
          <td><img :src="'https://bimbelmilitaryinforce.com/api/images/bukti_bayar/living_1690880475.png'" width="100px"></td>
          <!-- <td>{{ item.path_foto }}</td> -->
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';

export default {
data(){
    return{
      username: this.$session.get("username")?this.$session.get("username"):"",
      member:[],
    }
  },
  methods:{
     setMember(data){
      this.member = data
    },
    detail: function (id) {
      this.$router
                .push({ path: '/admin/detail_member/'+ id })
    }
  },
  mounted(){
    axios.get('https://bimbelmilitaryinforce.com/api/admin/member/all_bukti_bayar', {
      headers: {
        "Content-type": "application/json",
        }
    })
  .then( (response) => {
    console.log(response.data)
    this.setMember(response.data)
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
