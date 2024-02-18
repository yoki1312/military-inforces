<template>
<div class="SyaratKetentuan">
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
            <h1>Syarat dan Ketentuan</h1>
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

export default {
  name: 'SyaratKetentuan',
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
          text: 'Syarat dan Ketentuan',
          active: true
        }
      ]
    }
  },
  methods:{
    
  }
}
</script>
