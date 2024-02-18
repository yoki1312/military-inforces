<template>
  <div class="foto-kegiatan proses-kegiatan">
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
            <h1>Proses Kegiatan</h1>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <CoolLightBox 
              :items="foto" 
              :index="index"
              @close="index = null">
            </CoolLightBox>

            <div class="images-wrapper">
              <div
                class="image"
                v-for="(image, imageIndex) in foto"
                :key="imageIndex"
                @click="index = image"
                :style="{ backgroundImage: 'url(' + image + ')' }">

              
              </div>
              <!-- <div
                class="image"
                v-for="(image, imageIndex) in foto"
                :key="imageIndex"
                @click="index = image"
                :style="{ backgroundImage: 'url(' + require('../../assets/images/'+image) + ')' }">

              
              </div> -->
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

export default {
  name: 'ProsesKegiatan',
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
          text: 'Proses Kegiatan',
          active: true
        }
      ],
      foto: [
        'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/nature-quotes-1557340276.jpg?crop=0.666xw:1.00xh;0.168xw,0&resize=640:*'
      ],
      index: null
    }
  }
}
</script>
