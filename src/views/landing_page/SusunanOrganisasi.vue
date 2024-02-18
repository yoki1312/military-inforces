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
    <section class="body-skedinasan">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <h1>Susunan Organisasi</h1>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <img src="../../assets/images/susunan-organisasi.jpeg">
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
  name: 'SusunanOrganisasi',
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
          text: 'Susunan Organisasi',
          active: true
        }
      ]
    }
  }
}
</script>
