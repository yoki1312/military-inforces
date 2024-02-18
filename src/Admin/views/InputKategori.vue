<template>
    <div class="container table-admin">
      <h4>Daftar Nama Kategori soal</h4>
      <a href="/admin/add_kategori" class="tambah-data">Tambah Kategori</a>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in category.data" :key="index">
            <td>{{ index+1 }}</td>
            <td>{{ item.nama_category }}</td>
            <td>
                <button class="edit-opsi" @click="() => edit(item.id)"><i class="bx bx-edit"></i></button>
                <button class="delete-opsi" @click="() => hapus(item.id)"><i class="bx bx-trash"></i></button>
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
          category:[],
        }
      },
      methods:{
        setCategory(data){
          this.category = data
        },
        edit: function (id) {
          this.$router
                    .push({ path: '/admin/edit_kategori/'+ id})
        },
        hapus: function (id) {
          axios.post('https://bimbel-militaryinforces.com/api/admin/landing_page/do_delete_category', 
            {
                  id : id,
              },
              {
                headers: {
                  "Content-type": "text/plain",
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
        axios.get('https://bimbel-militaryinforces.com/api/admin/landing_page/all_category', {
          headers: {
            "Content-type": "application/json",
            }
        })
      .then( (response) => {
        console.log(response.data)
        this.setCategory(response.data)
      })
      .catch((error) => console.log(error));
      }
    }
  </script>
  
  <style>
  </style>
  