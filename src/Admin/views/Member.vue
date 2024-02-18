<template>
  <div>
    <h1>Daftar Member</h1>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>No Hp</th>
          <th>Email</th>
          <th>Asal Sekolah</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <!-- {{history.data}} -->
        <tr v-for="(item, index) in member.data" :key="index">
          <td>{{ index+1 }}</td>
          <td>{{ item.nama }}</td>
          <td>{{ item.no_hp }}</td>
          <td>{{ item.email }}</td>
          <td>{{ item.asal_sekolah }}</td>
          <td>
            <span>
              <button class="badge badge-info" @click="() => detail(item.id)">Detail</button>
            </span>
            <!-- <span v-show="!editing[index]">
              <button class="icon-A" @click="() => editItem(index)">A</button>
            </span>
            <span v-show="editing[index]">
              <button class="icon-B" @click="() => saveItem(index)">B</button>
            </span> -->
          </td>
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
    axios.get('https://bimbelmilitaryinforce.com/api/admin/member/all', {
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
