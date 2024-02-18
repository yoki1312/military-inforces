<template>
    <div class="container table-admin">
      <h4>Daftar Soal</h4>
      <a href="/admin/add_soal" class="tambah-data">Tambah Soal</a>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Nama Soal</th>
            <th>Jawaban A</th>
            <th>Jawaban B</th>
            <th>Jawaban C</th>
            <th>Jawaban D</th>
            <!-- <th>Jawaban E</th> -->
            <th>Jawaban Benar</th>
            <th>Score</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in soal.data" :key="index">
            <td>{{ index+1 }}</td>
            <td>{{ item.nama_category }}</td>
            <td>{{ item.text_pertanyaan }}</td>
            <td>{{ item.a }}</td>
            <td>{{ item.b }}</td>
            <td>{{ item.c }}</td>
            <td>{{ item.d }}</td>
            <!-- <td>{{ item.e }}</td> -->
            <td>{{ item.kunci_jawaban }}</td>
            <td>{{ item.score }}</td>
            <td>
                <button class="edit-opsi" @click="() => edit(item.id)"><i class="bx bx-edit"></i></button>
                <button class="delete-opsi" @click="() => hapus(item.id)"><i class="bx bx-trash"></i></button>
                <!-- <a href="" class="edit-opsi" @click="() => edit(item.id)"><i class="bx bx-edit"></i></a> -->
                <!-- <a href="" class="delete-opsi"><i class="bx bx-trash"></i></a> -->
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
          soal:[],
          perPage: 3,
        currentPage: 1,
        rows: 12
        }
      },
      methods:{
        setSoal(data){
          this.soal = data
        },
        edit: function (id) {
          this.$router
                    .push({ path: '/admin/edit_soal/'+ id})
        },
        hapus: function (id) {
          axios.post('https://bimbel-militaryinforces.com/api/admin/soal/do_delete_soal', 
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
        axios.get('https://bimbel-militaryinforces.com/api/admin/soal/all_soal', {
          headers: {
            "Content-type": "application/json",
            }
        })
      .then( (response) => {
        console.log(response.data)
        this.setSoal(response.data)
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
  