<template>
    <div class="program-bimbingan">
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
                <h1>Program Bimbingan</h1>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="box-bimbingan">
                    <div class="dbox-bimbingan di-tentangkami">
                        <a href="" class="list-harga-bimbingan">
                            <img src="../../assets/images/macam-bimbingan/1.jpg">
                            <div class="div-text">
                                <p><b>Psikologi</b></p>
                                <p>logika aritmatika, logika penalaran, Wartegg Test, Army Alpha Intelegence Test, Edward Personal Preference Schedule (EPPS), tes Kraepelin atau tes koran, serta tugas menggambar seperti menggambar pohon dan menggambar orang.</p>
                                <span>Rp 250.000</span>
                            </div>
                        </a>
                        <a href="" class="list-harga-bimbingan">
                            <img src="../../assets/images/macam-bimbingan/2.jpg">
                            <div class="div-text">
                                <p><b>Akademik</b></p>
                                <p>(Bahasa Inggris, Matematika, Pengetahuan Umum, Pengetahuan Alam)</p>
                                <span>Rp 250.000</span>
                            </div>
                        </a>
                        <a href="" class="list-harga-bimbingan">
                            <img src="../../assets/images/macam-bimbingan/1.jpg">
                            <div class="div-text">
                                <p><b>Seleksi Kompetensi Dasar</b></p>
                                <p>Tes Intelegensi Umum, Tes Wawasan Kebangsaan, Tes Karakteristik Pribadi</p>
                                <span>Rp 250.000</span>
                            </div>
                        </a>
                        <a href="" class="list-harga-bimbingan">
                            <img src="../../assets/images/macam-bimbingan/2.jpg">
                            <div class="div-text">
                                <p><b>Pembinaan Fisik dan Mental Ideologi</b></p>
                                <span>Rp 250.000</span>
                            </div>
                        </a>
                        <a href="" class="list-harga-bimbingan">
                            <img src="../../assets/images/macam-bimbingan/1.jpg">
                            <div class="div-text">
                                <p><b>Samapta</b></p>
                                <p> Kesamaptaan A meliputi lari 12 menit, kesamaptaan B meliputi pull up untuk casis pria dan chinning untuk casis wanita, sit up, push up, shuttle run, dan renang 25 meter</p>
                                <span>Rp 250.000</span>
                            </div>
                        </a>
                        <a href="" class="list-harga-bimbingan">
                            <img src="../../assets/images/macam-bimbingan/2.jpg">
                            <div class="div-text">
                                <p><b>Renang</b></p>
                                <p>Renang militer dasar dilakukan dengan teknik berenang gaya dad</p>
                                <span>Rp 250.000</span>
                            </div>
                        </a>
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
    
    export default {
      name: 'ProgramBimbingan',
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
              text: 'Program Bimbingan',
              active: true
            }
          ]
        }
      }
    }
    </script>
    