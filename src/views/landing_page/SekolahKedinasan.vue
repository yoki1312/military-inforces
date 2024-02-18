<template>
  <div class="sekolah-kedinasan">
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
          <div v-for="(kegiatan, imageIndex) in kegiatan" :key="imageIndex" class="col-sm-12">
            <b-card class="form-group">
              <b-card-body>
                <b-button v-b-toggle="'accordion-' + imageIndex" class="btn btn-light">{{ kegiatan.nama_sekolah_kedinasan }}</b-button>
                <b-collapse :id="'accordion-' + imageIndex" class="mt-2 row">
                  <div class="col-sm-3" v-for="(row, rowIndex) in kegiatan.detail_sekolah_kedinasan" :key="rowIndex">
                    <img :src="row.url_gambar" class="card-img-top" style="max-height: 300px ;min-height: 300px ;">
                    <br>
                  </div>
                </b-collapse>
              </b-card-body>
            </b-card>
            <br>
          </div>
        </div>
      </div>
    </section>

    <Footer />
  </div>
</template>

<script>
import Header from '@/components/landing_page/Header.vue'
import Navbar from '@/components/landing_page/Navbar.vue'
import Footer from '@/components/landing_page/Footer.vue'
import axios from 'axios';

export default {
  name: 'SekolahKedinasan',
  components: {
    Header,
    Navbar,
    Footer
  },
  data() {
    return {
      items: [
        { text: 'Beranda', href: '/' },
        { text: 'Sekolah Kedinasan', active: true }
      ],
      kegiatan: []
    }
  },
  mounted() {
    const apiUrl = 'https://site.bimbel-militaryinforces.com/api/sekolahKedinasanApi';

    axios.get(apiUrl)
      .then(response => {
        this.kegiatan = response.data.data;
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
}
</script>
