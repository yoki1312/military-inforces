<template>
  <div class="home">
    <Header />
    <Navbar />
    
    <section class="text-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12">
                  <div class="dtext-banner">
                      <h4>SELAMAT DATANG DI</h4>
                      <h1>MILITARY IN FORCES LEARNING CENTRE</h1>
                      <p>Website ini berisikan Latihan Soal / Try-Out selama satu tahun yang bisa kalian gunakan sebagai media belajar dan langsung keluar score nya beserta pembahasan untuk mengukur kemampuan untuk mengukur kemampuan kalian dengan biaya mulai dari Rp 55.000,-</p>
                      <p class="btnz-index"><a href="/registrasi" class="btn-default">GABUNG SEKARANG</a></p>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <section class="banner">
        <table class="table-banner">
            <tr>
                <td>
                  <b-carousel
                    id="carousel-1"
                    v-model="slide"
                    :interval="900000"
                    controls
                    indicators
                    background="#ababab"
                    img-width="1024"
                    img-height="480"
                    style="text-shadow: 1px 1px 2px #333;"
                    @sliding-start="onSlideStart"
                    @sliding-end="onSlideEnd"
                  >
                    <!-- Text slides with image -->
                    <b-carousel-slide
                      img-src="assets/images/logo.png"
                    >
                      <img src="../../assets/images/banner/banner1.jpg">
                    </b-carousel-slide>

                    <b-carousel-slide
                      img-src="assets/images/logo.png"
                    >
                      <img src="../../assets/images/banner/banner1.jpg">
                    </b-carousel-slide>

                    <b-carousel-slide
                      img-src="assets/images/logo.png"
                    >
                      <img src="../../assets/images/banner/banner1.jpg">
                    </b-carousel-slide>
                  </b-carousel>
                </td>
            </tr>
        </table>
    </section>
    <section class="spesialis-kami">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="dspesialis-kami">
              <div class="first-sp">
                <h2>SPESIALISASI KAMI</h2>
                <p>Military In Forces Learning Centre menyediakan Program Bimbingan Belajar Psikotes, Akademik, Wawancara, Binsiktal (Pembinaan Fisik dan Mental) Kelas Belajar Renang serta Kelas Offline dan Kelas Online Persiapan Seleksi Tes TNI/Polri, Sekolah Kedinasan, CPNS, PPPK, BUMN, TPA OTO BAPPENAS, Tes Masuk Pegawai Bank termasuk Perusahaan Swasta, Tes Kenaikan Jabatan serta Tes Pengajuan Beasiswa S1, S2,dan S3 sesuai standard kebutuhan tes.</p>
                <a href="/sekolah_kedinasan" class="btn-default">lihat Lebih banyak</a>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <a href="" class="">
              <div class="dspesialis-kami">
                <img src="../../assets/images/spesialis/1.jpg">
                <div class="text-foot">
                  <h2>KORPS POLRI</h2>
                  <p><a href="https://penerimaan.polri.go.id " class="">lihat Selengkapnya</a></p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <a href="" class="">
              <div class="dspesialis-kami">
                <img src="../../assets/images/spesialis/2.jpg">
                <div class="text-foot">
                  <h2>Tentara nasional indonesia</h2>
                  <p><a href="https://rekrutmen-tni.mil.id/" class="">lihat Selengkapnya</a></p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <a href="" class="">
              <div class="dspesialis-kami">
                <img src="../../assets/images/spesialis/3.jpg">
                <div class="text-foot">
                  <h2>Stan</h2>
                  <p><a href="https://pknstan.ac.id/spmb-2023" class="">lihat Selengkapnya</a></p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <a href="" class="">
              <div class="dspesialis-kami">
                <img src="../../assets/images/spesialis/4.jpg">
                <div class="text-foot">
                  <h2>Stin</h2>
                  <p><a href="https://dikdin.bkn.go.id/" class="">lihat Selengkapnya</a></p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <a href="" class="">
              <div class="dspesialis-kami">
                <img src="../../assets/images/spesialis/5.jpg">
                <div class="text-foot">
                  <h2>CET BEA cukai</h2>
                  <p><a href="https://www.beacukai.go.id/" class="">lihat Selengkapnya</a></p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="tentang-kami">
      <img src="../../assets/images/icon1.png" class="icon1">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <table class="tb-tentang-kami">
              <tr>
                <td>
                  <h2>TENTANG KAMI</h2>
                  <p>Military In Forces Learning Centre adalah Lembaga Khursus dan Pelatihan Program Bimbingan Belajar Persiapan Tes Abdinegara, TNI/Polri dan Sekolah Kedinasan dibawah Naungan Badan Hukum Perusahaan CV Zufnahaya Muda Bahagia.</p>
                  <p><a href="/tentang_kami" class="btn-default">Selengkapnya</a></p>
                  <h3>Keunggulan kami</h3>
                  <ol>
                    <li>Menyediakan kelas belajar Offline, Online dan Website Try-Out beserta Skoring Akademik, Psikotes, SKD dll.</li>
                    <li>Menggunakan metode belajar dengan pendekatan Personal Approach Solution</li>
                    <li>Interpretasi Psikotes langsung oleh Psikolog.</li>
                    <li>Simulasi CAT/ SKD.</li>
                    <li>Tips dan Trik mengerjakan soal dan lolos wawancara kerja</li>
                  </ol>
                </td>
                <td>
                  <img src="../../assets/images/icon2.png" class="icon2">
                  <img src="../../assets/images/tentang-kami.jpg">
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </section>
    <section class="quotes">
      <div class="oquotes">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12">
              <div class="quotes-img">
                <img src="../../assets/images/img1.png" class="img-quotes">
              </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12">
              <div class="quotes-text">
                <h1>Tunggu apa lagi?</h1>
                <p>Segera bergabung bersama <span class="font-merk">Military in Forces Learning Centre</span> & raih impian-mu menjadi Abdi Negara.</p>
                <p><a href="/registrasi" class="btn-default">GABUNG SEKARANG</a></p>
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
  name: 'Home',
  components: {
    Header,
    Navbar,
    Footer
  },
  data () {
    return {
      items: [
        
      ],
    }
  },
}
</script>
