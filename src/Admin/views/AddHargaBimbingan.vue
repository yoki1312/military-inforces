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
                <button class="btn-save" v-on:click.prevent = "save()">Simpan</button>
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
    save(){
      alert("sudah");
      if (this.input.nama_paket != '' && this.input.harga != '' && this.input.deskripsi != '' && this.input.path_foto != '' && this.input.list_deskripsi_paket != '') {
          axios.post('https://bimbel-militaryinforces.com/api/admin/landing_page/add_paket', {
                nama_paket : this.input.nama_paket,
                harga : this.input.harga,
                path_foto: this.input.path_foto,
                deskripsi: this.input.deskripsi,
                list_deskripsi_paket: this.input.list_deskripsi_paket
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
                  .push({ path: '/admin/input_harga_bimbingan' })
              } 
          }
        )
        .catch((error) => console.log(error));
      } else {
          alert('Data Tidak Lengkap')
      }
    }
  },
  mounted(){

  }
    
}
</script>