<template>
    <div class="container add-page mt-3">
        <form>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Masukan Nama Kategori Soal</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="" placeholder="Kategori Soal" rows="5" v-model="input.category"></textarea>
                </div>
            </div>
            <div class="text-right mt-5">
                <button class="btn-save" v-on:click.prevent = "add()">Simpan</button>
                <a class="btn-kembali" href="/admin/input_kategori">Kembali</a>
            </div>
        </form>
        P : {{input.category}}
    </div>
</template>

<script>
import axios from 'axios';

export default {
  data(){
    return{
        input:{
            category: "",
        }
    }
  },
  methods:{
    add(){
        if (this.input.category != '') {
            axios.post('https://bimbel-militaryinforces.com/api/admin/landing_page/add_category', {
                  nama_category : this.input.category,
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
  }
}
</script>


