<template>
    <div class="container add-page">
        <form>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Masukan Nama Kategori Soal</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="" placeholder="Kategori Soal" rows="5" v-model="input.nama_category"></textarea>
                </div>
            </div>
            <div class="text-right mt-5">
                <button class="btn-save" v-on:click.prevent = "saveEdit()">Simpan</button>
                <a class="btn-kembali" href="/admin/input_kategori">Kembali</a>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
      data(){
        return{
          username: this.$session.get("username")?this.$session.get("username"):"",
          category:[],
          id : this.$route.params.id_category,
          input: {
                nama_category : ""
            }
        }
      },
      methods:{
        setCategory(data){
          this.category = data
        },
        saveEdit(){
            if (this.input.text_pertanyaan != '') {
                axios.post('https://bimbel-militaryinforces.com/api/admin/landing_page/do_edit_category', {
                    id : this.id,
                    nama_category : this.input.nama_category,
                    }, {
                headers: {
                    "Content-type": "text/plain",
                    // "Access-Control-Allow-Origin": "*",
                    },
                })
            .then( 
                (response) => {
                    // console.log(response.data)
                    const status = response.data.status
                    const message = response.data.message
                    
                    alert(message)
        
                    if (status == 1) {
                        this.$router
                        .push({ path: '/admin/input_kategori' })
                    } 
                }
            )
            .catch((error) => console.log(error));
            } else {
                alert('Data Tidak Lengkap')
            }
        },
      },
      mounted(){
        axios.post('https://bimbel-militaryinforces.com/api/admin/landing_page/category_by_id', 
        {
                id : this.id,
            },
            {
            headers: {
                "Content-type": "text/plain",
                }
            })
        .then( (response1) => {
            console.log(response1.data)
            this.setCategory(response1.data.data[0])
            // this.input.id = response1.data.data[0].id
            this.input.nama_category = response1.data.data[0].nama_category
        })
        .catch((error) => console.log(error));
      }
    }
</script>