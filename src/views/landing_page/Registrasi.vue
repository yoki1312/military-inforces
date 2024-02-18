<template>
<div class="susunan-organisasi">
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
    <section class="body-skedinasan halaman-registrasi">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <h1>Registrasi </h1>
            <p>Silahkan untuk mengisi form dibawah ini, jika Anda ingin mendaftar bimbel pada kami. Silahkan <a href="/login">Login Disini</a> jika Anda telah memiliki akun</p>

            <form>
                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label">Email Anda</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" id="email" placeholder="Masukan email Anda" value="" v-model="input.email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-md-3 col-form-label">Nomor HP</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control" id="no_hp" placeholder="Masukan Nomor Hp Anda" value="" v-model="input.no_hp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-md-3 col-form-label">Nama Anda</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="nama" placeholder="Masukan nama Anda" value="" v-model="input.nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="asal_sekolah" class="col-md-3 col-form-label">Asal Sekolah Anda</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="asal_sekolah" placeholder="Masukan Sekolah Asal Anda" value="" v-model="input.asal_sekolah">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="asal_sekolah" class="col-md-3 col-form-label">Alamat Anda</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="alamat" placeholder="Masukan Alamat Anda" value="" v-model="input.alamat">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload Foto diri Anda</label>
                    <input type="file" class="form-control-file" id="file" name="file" v-on:change="onChangeFileUpload()">
                </div>
                <div class="form-group text-pilih-paket">
                    <label for="">Pilih Paket Anda <font style="color: red; font-size: 14px;">(Harga khusus untuk Kelas Online. Anda dapat menghubungi Admin jika ingin mendaftar Kelas Offline)</font></label>
                </div>
                <!--<select class="custom-select my-1 mr-sm-2" id="category" @change="onChange($event)">
                    <option selected hidden>Pilih Kategori</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select> -->
                <div class="form-check form-check-inline" v-for="(text,index) in paket" :key="index">
                    <input class="form-check-input" type="checkbox" :id="text.id" :value="text.id+'-'+text.harga" v-model="checkedNames" @change="check()">
                    <label class="form-check-label" for="inlineCheckbox1">
                        <div class="list-paket">
                            <div class="dlist-paket">
                                <h3>{{text.nama_paket}}</h3>
                                <p>{{text.deskripsi}}</p>
                                <h2>{{text.harga.toString().slice(0,-3).replace(/\B(?=(\d{3})+(?!\d))/g, ".")}}</h2>
                                <span><b>Paket Untuk</b></span>
                                <p>{{text.list_deskripsi_paket}}</p>
                            </div>
                        </div>
                    </label>
                </div>
                
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Pastikan data yang Anda masukan telah benar
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Anda telah menyetujui <a href="/syarat_ketentuan">Syarat dan Ketentuan</a>
                    </label>
                </div>
                <div class="form-group row mt-5 mb-5">
                    <label for="staticEmail" class="col-md-3 col-form-label"><b>Total Pembayaran</b></label>
                    <div class="col-md-9">
                        <h1>Rp {{ sum }}</h1>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Total Harga Kelas Online yang Anda pilih 
                        </small>
                    </div>
                    
                </div>
                <button class="btn-daftar" v-on:click.prevent = "registrasi()">Daftar Sekarang</button>
            </form>
          </div>
          
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
  name: 'SusunanOrganisasi',
  components: {
    Header,
    Navbar,
    Footer
  },
  data() {
    return {
        file: '',
        onChange(e) {
              console.log(e.target.value);
              this.input.caegory = e.target.value;
          },
        items: [
            {
            text: 'Beranda',
            href: '/'
            },
            {
            text: 'Registrasi',
            active: true
            }
        ],
        paket:[],
        checkedNames: [],
        input:{
            email: "",
            no_hp: "",
            nama: "",
            asal_sekolah: "",
            path_foto:"",
            caegory:1,
            paket:[],
        }
    }
  },
  methods :{
        check () {

            var array = []
            var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

            for (var i = 0; i < checkboxes.length; i++) {
                array.push(checkboxes[i].value)

                
            }
            console.log(array)
            
            
            return(array)

            

        },

        
        
        setMember(data){
            this.paket = data.data
            console.log(this.paket)
        },
    
        registrasi(){
            

            if (this.input.email != '' && this.input.no_hp != '' && this.input.nama != '' && this.input.asal_sekolah != '') {
                
                axios.post('https://bimbelmilitaryinforce.com/api/auth/register', {
                    email : this.input.email,
                    no_hp : this.input.no_hp,
                    nama : this.input.nama,
                    asal_sekolah : this.input.asal_sekolah,
                    category : this.input.category,
                    path_foto : this.input.path_foto,
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
                        .push({ path: '/pembayaran' })
                    } 
                }
            )
            .catch((error) => console.log(error));
            } else {
                alert('Data Tidak Lengkap')
            }
        },
        submitForm(){
            var formData = new FormData();
            var imagefile = document.querySelector('#file');
            formData.append("file", imagefile.files[0]);
  
            axios.post('https://bimbelmilitaryinforce.com/api/auth/upload',
                formData,
                {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              }
            ).then(function(data){
              console.log(data.data);
            })
            .catch(function(){
              console.log('FAILURE!!');
            });
        },
        onChangeFileUpload(){
            var formData = new FormData();
            var imagefile = document.querySelector('#file');
            formData.append("file", imagefile.files[0]);

            this.input.path_foto = imagefile.files[0]['name']
            
            axios.post('https://bimbelmilitaryinforce.com/api/auth/upload',
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
  },
  computed: {
        sum() {
            var jumlah = 0
            var isi = 0
            var myArray = null
            var id = []
            for (var i = 0; i < this.checkedNames.length; i++) { 
                // console.log(this.checkedNames[i]); 

                myArray = this.checkedNames[i].split("-")
                id.push(myArray[0])
                isi = parseInt(myArray[1])
                jumlah = jumlah + isi
            }

          
            // console.log(isi)
            // console.log(this.checkedNames.length)
            // console.log(jumlah)
            isi = jumlah.toString();
            const thousands = /\B(?=(\d{3})+(?!\d))/g;
            return isi.replace(thousands, ".");

        }
    }
    
}
</script>
