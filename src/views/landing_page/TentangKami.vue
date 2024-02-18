<template>
    <div class="halaman-tentang-kami">
      <Header />
      <Navbar />
      <section class="banner-tk">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <b-breadcrumb :items="items"></b-breadcrumb>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                    <h3>Tentang Kami</h3>
                    <p></p>
                </div>
            </div>
        </div>
      </section>
      <section class="tentang-kami page-tentang-kami">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <table class="tb-tentang-kami">
              <tr>
                <td>
                  <img src="../../assets/images/ptentang-kami.png" class="ptentan-kami-image">
                </td>
                <td>
                  <p>Military In Forces Learning Centre adalah lembaga Khursus dan Pelatihan Program Bimbingan Persiapan Tes Abdinegara, TNI/Polri dan Sekolah Kedinasan dibawah naungan hukum Perusahaan CV. Zufnahaya Muda Bahagia yang berkedudukan di Kabupaten Tuban Provinsi Jawa Timur. Ijin dikeluarkan oleh Kementerian Hukum dan Hak Asasi Manusia Republik Indonesia Direktorat Jenderal Administrasi Hukum Umum dengan Nomor: AHU-0028001-AH.01.14 berdasarkan Akta Nomor 03 tanggal 17 April 2023 yang dibuat oleh Notaris Lisa Novita Sari, S.H, M.Kn. Yang berkedudukan di Tuban Jawa Timur beserta dokumen pendukungnya yang telah diterima tanggal 18 April 2023.</p>
                  <h3>Visi Kami</h3>
                  <p>"Menjadi lembaga bimbingan belajar berkompeten, berkualitas, dan dapat dipercaya."</p>
                  <h3>Misi kami</h3>
                  <ol>
                    <li>Melayani, mengembangkan, dan menyediakan program bimbingan belajar yang berkualitas.</li>
                    <li>Melayani pendidikan masyarakat dan menyiapkan siswa, yang berprestasi tinggi disekolah.</li>
                    <li>Mengembangkan metode dan pola pengajaran yang kreatif dan inovatif sehingga siswa selalu unggul.</li>
                    <li>Menyediakan program yang berkualitas, menarik, dan tidak membosankan.</li>
                  </ol>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </section>
      <section class="daftar-harga di-tentangkami">
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <h1>MACAM Bimbingan Belajar</h1>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="box-bimbingan">
                    <div class="dbox-bimbingan">
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
    name: 'Tentang Kami',
    components: {
      Header,
      Navbar,
      Footer,
    },
    data() {
      return {
        items: [
          {
            text: 'Beranda',
            href: '/'
          },
          {
            text: 'Tentang Kami',
            active: true
          }
        ],
      }
    }
  }
  </script>
  