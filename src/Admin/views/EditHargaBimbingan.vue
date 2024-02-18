<template>
    <div class="container add-page">
        <h4>Tambah Harga Bimbingan</h4>
        <form>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama Bimbingan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="" placeholder="Nama Bimbingan" v-model="input.nama_paket">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Harga Bimbingan</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="" placeholder="Harga" v-model="input.harga">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="" placeholder="Deskripsi" rows="5" v-model="input.deskripsi"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Masukan gambar</label>
                <div class="col-sm-9">
                    <input type="file" id="file" name="file" multiple v-on:change="onChangeFileUpload()"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">List Isi Paket</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="" placeholder="Deskripsi" rows="5" v-model="input.list_deskripsi_paket"></textarea>
                </div>
            </div>
            <div class="text-right mt-5">
                <button class="btn-save" v-on:click.prevent = "saveEdit()">Simpan</button>
                <a class="btn-kembali" href="/admin/input_harga_bimbingan">Kembali</a>
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
            id : this.$route.params.id,
            input:{
                nama_paket: "",
                harga: "",
                deskripsi: "",
                path_foto: "",
                list_deskripsi_paket: ""
            }
        }
      },
      methods:{
        onChangeFileUpload(){
            var formData = new FormData();
            var imagefile = document.querySelector('#file');
            formData.append("file", imagefile.files[0]);

            this.input.path_foto = imagefile.files[0]['name'];
            console.log(this.input.path_foto);
        },
       saveEdit(){
            if (this.input.text_pertanyaan != '') {
                axios.post('https://bimbel-militaryinforces.com/api/admin/landing_page/do_edit_paket', {
                    id : this.id,
                    nama_paket : this.input.nama_paket,
                    harga : this.input.harga,
                    path_foto: this.input.path_foto,
                    deskripsi: this.input.deskripsi,
                    list_deskripsi_paket: this.input.list_deskripsi_paket
                }, {
                headers: {
                    
                    "Access-Control-Allow-Origin": "*",
                    
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
                        .push({ path: '/admin/input_harga_bimbingan' })
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
        axios.post('https://bimbel-militaryinforces.com/api/admin/landing_page/paket_by_id', 
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
            this.input.nama_paket = response1.data.data[0].nama_paket
            this.input.harga = response1.data.data[0].harga
            this.input.path_foto = response1.data.data[0].path_foto
            this.input.deskripsi = response1.data.data[0].deskripsi
            this.input.list_deskripsi_paket = response1.data.data[0].list_deskripsi_paket
        })
        .catch((error) => console.log(error));
      }
    }
</script>