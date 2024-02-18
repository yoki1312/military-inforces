<template>
  <div class="foto-kegiatan">
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
    <section class="body-skedinasan">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <h1>Geleri FOTO KEGIATAN</h1>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <CoolLightBox 
              :items="foto" 
              :index="index"
              @close="index = null">
            </CoolLightBox>

            <div class="images-wrapper">
              <div class="row">
                <div  v-for="(image, imageIndex) in foto" :key="imageIndex" class="col-sm-3 form-group">
                    <div class="card"   @click="index = image">
                      <img :src="image.url_gambar" class="card-img-top" style="max-height: 300px ;min-height: 300px ;">
                      <div class="card-body">
                        <br>
                        <h5 class="card-title">{{ image.nama_kegiatan }}</h5>
                        <p class="card-text">{{ image.deskripsi }}</p>
                      </div>
                  </div>

                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>

    <Footer />
  </div>
</template>

<script>
// @ is an alias to /src
import Header from '@/components/landing_page/Header.vue'
import Navbar from '@/components/landing_page/Navbar.vue'
import Footer from '@/components/landing_page/Footer.vue'

import CoolLightBox from 'vue-cool-lightbox'
import 'vue-cool-lightbox/dist/vue-cool-lightbox.min.css'
import axios from 'axios';

export default {
  name: 'FotoKegiatan',
  components: {
    Header,
    Navbar,
    Footer,
    CoolLightBox,
  },
  data() {
    return {
      items: [
        {
          text: 'Beranda',
          href: '/'
        },
        {
          text: 'Foto Kegiatan',
          active: true
        }
      ],
      foto: [],
      index: null
    }
  },
  mounted() {
    // Ganti URL di bawah dengan URL sebenarnya dari server Anda
    const apiUrl = 'https://site.bimbel-militaryinforces.com/api/kegiatan';

    // Menggunakan Axios untuk mengambil data
    axios.get(apiUrl)
      .then(response => {
        this.foto = response.data.data;
        // Memperbarui data 'foto' dengan data yang diterima dari server
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
}
</script>
