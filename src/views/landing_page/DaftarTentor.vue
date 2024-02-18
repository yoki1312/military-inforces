<template>
  <div class="daftar-tentor">
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
            <h1>Daftar Tentor</h1>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="row mt-4" >
              <div class="col-md-3 mb-3" v-for="(item, index) in mentor" :key="index">
                <div class="card" style="border:0">
                  <img :src="item.url_gambar" class="card-img-top" alt="...">
                  <div class="" style="">
                    <h5 class="card-title mt-2">{{ item.nama_mentor }}</h5>
                    <p class="btn-orange">{{ item.jabatan }}</p>
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
  import axios from 'axios';

  export default {
    name: 'DaftarTentor',
    components: {
      Header,
      Navbar,
      Footer
    },
    data() {
      return {
        items: [{
            text: 'Beranda',
            href: '/'
          },
          {
            text: 'Daftar Tentor',
            active: true
          }
        ],
        mentor: []
      }
    },
    mounted() {
      const apiUrl = 'https://site.bimbel-militaryinforces.com/api/mentor';

      axios.get(apiUrl)
        .then(response => {
          this.mentor = response.data.data;
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }
  }
</script>