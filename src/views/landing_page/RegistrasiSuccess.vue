<template>
<div class="Pembayaran">
    <Header />
    <Navbar />

    <section class="head-breadcrumb">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <b-breadcrumb :items="items"></b-breadcrumb>
          </div>
        </div>
      </div>
    </section>
    <section class="body-skedinasan halaman-info-pembayaran">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <h1>Registrasi Berhasil</h1>
            <p>Terimakasih Anda telah mendaftar bimbingan belajar pada kami dan pendaftaran Anda telah berhasil</p>
            <p>Selanjutnya Anda dapat mentransfer biaya pendaftaran Anda sesuai pilihan pembelajaran Anda ke rekening dibawah ini</p>
            <div class="no-rek">
                <img src="../../assets/images/bank/bca.png" class="bank-logo">
                <p>No rekening: <b>1234567890</b></p>
                <p>Atas Nama: <b>CV. Media Utama</b></p>
            </div>
            <p>Kemudian Anda dapat mengirimkan bukti transfer pada form dibawah ini.</p>
            <form>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload Bukti Pembayaran</label>
                    <input type="file" class="form-control-file" id="file" name="file" v-on:change="onChangeFileUpload()" required>
                </div>
                <div class="mb-3">
                    <label for="username">Atas Nama pengirim </label>
                    <input type="text" id="nama" class="form-control" v-model="input.nama" required/>
                </div>
                <div class="mb-3">
                    <label for="password">Transfer melalui </label>
                    <input type="text" id="transfer_by" class="form-control" v-model="input.transfer_by" required/>
                </div>
                <button class="btn-daftar" type="submit" v-on:click.prevent = "simpanBuktiBayar()">
                    Kirim Bukti Pembayaran
                </button>
            </form>
          </div>
        </div>
        <div>
        <b-button v-b-modal.modal-1>Launch demo modal</b-button>

        <b-modal id="modal-1">
            <p class="my-4">Terimakasih bukti transfer Anda berhasil terkirim. Silahkan tunggu 1x24 kami akan kirimkan password login anda ke email yang telah terdaftar</p>
        </b-modal>
        </div>
      </div>
    </section>

    <Footer />
  </div>
</template>

<script>
import axios from 'axios';
// @ is an alias to /src
import Header from '@/components/landing_page/Header.vue'
import Navbar from '@/components/landing_page/Navbar.vue'
import Footer from '@/components/landing_page/Footer.vue'

export default {
  name: 'RegistrasiSuccess',
  components: {
    Header,
    Navbar,
    Footer
  },
  data() {
    return {
      items: [
        {
          text: 'Beranda',
          href: '/'
        },
        {
          text: 'Registrasi',
          href: '/registrasi'
        },
        {
          text: 'Pembayaran',
          active: true
        }
      ],
      input:{
        path_foto:'',
        nama:'',
        transfer_by:''
      }
    }
  },
  methods:{
    simpanBuktiBayar(){
      if (this.input.transfer_by != '' && this.input.path_foto != '' && this.input.nama != '') {
        axios.post('https://bimbelmilitaryinforce.com/api/auth/simpanBuktiBayar', {
                  nama : this.input.nama,
                  transfer_by : this.input.transfer_by,
                  path_foto : this.input.path_foto,
                }, {
              headers: {
                "Content-type": "text/plain",
                },
            })
          .then( 
            (response) => {
                const status = response.data.status
                const message = response.data.message
                
                alert(message)
    
                if (status == 1) {
                    this.$router
                    .push({ path: '/login' })
                } 
            }
          )
          .catch((error) => console.log(error));
      } else {
        alert("Data Tidak Lengkap");
      }
    },
    onChangeFileUpload(){
        var formData = new FormData();
        var imagefile = document.querySelector('#file');
        formData.append("file", imagefile.files[0]);

        this.input.path_foto = imagefile.files[0]['name']
        
        axios.post('https://bimbelmilitaryinforce.com/api/auth/uploadBuktiBayar',
          formData,
            {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            }
            ).then(function(data){
                console.log(data.data);
                alert('Upload file berhasil')
            })
            .catch(function(){
                console.log('FAILURE!!');
            });
    }
  }
}
</script>
