<template>
    <div class="container table-admin">
      <h4>Daftar Harga Bimbingan</h4>
      <a href="/admin/add_harga_bimbingan" class="tambah-data">Tambah Bimbingan</a>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Bimbingan</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Image</th>
            <th>List</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <!-- {{history.data}}   -->
          <tr v-for="(item, index) in member.data" :key="index">
            <td>{{ index+1 }}</td>
            <td>{{ item.nama_paket }}</td>
            <td>{{ item.harga }}</td>
            <td>{{ item.deskripsi }}</td>
            <td>{{ item.path_foto }}</td>
            <td>{{ item.list_deskripsi_paket }}</td>
            <td>
                <button class="edit-opsi" @click="() => edit(item.id)"><i class="bx bx-edit"></i></button>
                <button  @click="() => hapus(item.id)" class="delete-opsi"><i class="bx bx-trash"></i></button>
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
      edit: function (id) {
        this.$router
                  .push({ path: '/admin/edit_harga_bimbingan/'+ id})
      },

      hapus: function (id) {
        axios.post('https://bimbel-militaryinforces.com/api/admin/landing_page/do_delete_paket', 
          {
            id : id,
          },
          {
            headers: {
              'Content-Type': 'multipart/form-data',
            }
          })
          .then( 
            (response) => {
                // console.log(response.data)
                const status = response.data.status
                const message = response.data.message
                
                alert(message)

                if (status == 1) {
                    location.reload();
                } 
            }
          )
          .catch((error) => console.log(error));
      }
  },
  mounted(){
    axios.get('https://bimbel-militaryinforces.com/api/admin/landing_page/all_paket', {
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
  