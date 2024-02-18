<template>
  <div class="container mt-3">
    <h3>Riwayat Ujian</h3>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Ujian</th>
          <th>Waktu Mulai</th>
          <th>Jumlah Soal</th>
          <th>Nilai</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <!-- {{history.data}} -->
        <tr v-for="(item, index) in history.data" :key="index">
          <td>{{ index+1 }}</td>
          <td>{{ item.tanggal_ujian }}</td>
          <td>{{ item.start_time }}</td>
          <td>{{ item.total_number }}</td>
          <td>{{ item.nilai }}</td>
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
      history:[],
      transProps: {
          // Transition name
          name: 'flip-list'
        },
        fields: [
        {key : "tanggal_ujian", sortable: true, label:"Tanggal Ujian"},
        {key : "start_time", sortable: true,label:"Waktu Mulai"},
        {key : "total_number", sortable: true,label:"Jumlah Soal"},
        {key : "nilai", sortable: true,label:"Nilai"}
        ]
    }
  },
  methods:{
     setHistory(data){
      this.history = data
    },
    detail: function (id) {
      this.$router
                .push({ path: '/member/detail_history/'+ id })
                // .then(() => { this.$router.go() })
    }
  },
  mounted(){
    axios.get('http://localhost/api2/military_inforces/member/member/history_ujian', {
      headers: {
        "Content-type": "application/json",
        }
    })
  .then( (response) => {
    console.log(response.data)
    this.setHistory(response.data)
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