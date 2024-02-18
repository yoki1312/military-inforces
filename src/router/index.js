import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/landing_page/Home.vue'
import SekolahKedinasan from '../views/landing_page/SekolahKedinasan.vue'
import FotoKegiatan from '../views/landing_page/FotoKegiatan.vue'
import DaftarTentor from '../views/landing_page/DaftarTentor.vue'
import TentangKami from '../views/landing_page/TentangKami.vue'
import ProsesKegiatan from '../views/landing_page/ProsesKegiatan.vue'
import SusunanOrganisasi from '../views/landing_page/SusunanOrganisasi.vue'
import Registrasi from '../views/landing_page/Registrasi.vue'
import Login from '../views/landing_page/Login.vue'
import SyaratKetentuan from '../views/landing_page/SyaratKetentuan.vue'
import RegistrasiSuccess from '../views/landing_page/RegistrasiSuccess.vue'
import CobaGratis from '../views/landing_page/CobaGratis.vue'
import ProgramBimbingan from '../views/landing_page/ProgramBimbingan.vue'

Vue.use(VueRouter)

const routes = [
  // AUTH
  {
    path: '/logintest',
    name: 'Login',
    component: () => import('../views/Logintest.vue'),
  },


  // MEMBER
  {
    path: '/member/profile',
    name: 'Profile',
    component: () => import('../Member/views/Profile.vue'),
  },
  {
    path: '/member/tentor',
    name: 'Tentor',
    component: () => import('../Member/views/Tentor.vue'),
  },
  {
    path: '/member/jadwal_pelaksanaan',
    name: 'Jadwal Pelaksanaan',
    component: () => import('../Member/views/JadwalPelaksanaan.vue'),
  },
  {
    path: '/member/soal_ujian',
    name: 'Soal Ujian',
    component: () => import('../Member/views/SoalUjian.vue'),
  },

  // LANDING PAGE
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/sekolah_kedinasan',
    name: 'sekolah_kedinasan',
    component: SekolahKedinasan
  },
  {
    path: '/foto_kegiatan',
    name: 'foto_kegiatan',
    component: FotoKegiatan
  },
  {
    path: '/daftar_tentor',
    name: 'daftar_tentor',
    component: DaftarTentor
  },
  {
    path: '/tentang_kami',
    name: 'tentang_kami',
    component: TentangKami
  },
  {
    path: '/proses_kegiatan',
    name: 'proses_kegiatan',
    component: ProsesKegiatan
  },
  {
    path: '/susunan_organisasi',
    name: 'susunan_organisasi',
    component: SusunanOrganisasi
  },
  {
    path: '/registrasi',
    name: 'registrasi',
    component: Registrasi
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/syarat_ketentuan',
    name: 'syarat_ketentuan',
    component: SyaratKetentuan
  },
  {
    path: '/pembayaran',
    name: 'registrasi_success',
    component: RegistrasiSuccess
  },
  {
    path: '/coba_gratis',
    name: 'coba_gratis',
    component: CobaGratis
  },
  {
    path: '/program_bimbingan',
    name: 'program_bimbingan',
    component: ProgramBimbingan
  },

  // ADMIN
  {
    path: '/admin/member',
    name: 'admin',
    component: () => import('../Admin/views/Member.vue'),
  },
  {
    path: '/admin/bukti_bayar',
    name: 'bukti_bayar',
    component: () => import('../Admin/views/BuktiBayar.vue'),
  },
  {
    path: '/admin/input_kategori',
    name: 'input_kategori',
    component: () => import('../Admin/views/InputKategori.vue'),
  },
  {
    path: '/admin/input_soal',
    name: 'input_soal',
    component: () => import('../Admin/views/InputSoal.vue'),
  },
  {
    path: '/admin/add_kategori',
    name: 'add_kategori',
    component: () => import('../Admin/views/AddKategori.vue'),
  },
  {
    path: '/admin/edit_kategori/:id_category',
    name: 'edit_kategori',
    component: () => import('../Admin/views/EditKategori.vue'),
  },
  {
    path: '/admin/add_soal',
    name: 'add_soal',
    component: () => import('../Admin/views/AddSoal.vue'),
  },
  {
    path: '/admin/add_soal_image',
    name: 'add_soal_image',
    component: () => import('../Admin/views/AddSoalImage.vue'),
  },
  {
    path: '/admin/edit_soal/:id_soal',
    name: 'edit_soal',
    component: () => import('../Admin/views/EditSoal.vue'),
  },
  {
    path: '/admin/edit_soal_image',
    name: 'edit_soal_image',
    component: () => import('../Admin/views/EditSoalImage.vue'),
  },
  {
    path: '/admin/input_harga_bimbingan',
    name: 'input_harga_bimbingan',
    component: () => import('../Admin/views/InputHargaBimbingan.vue'),
  },
  {
    path: '/admin/add_harga_bimbingan',
    name: 'add_harga_bimbingan',
    component: () => import('../Admin/views/AddHargaBimbingan.vue'),
  },
  {
    path: '/admin/edit_harga_bimbingan/:id',
    name: 'edit_harga_bimbingan',
    component: () => import('../Admin/views/EditHargaBimbingan.vue'),
  },
  {
    path: '/admin/input_galeri',
    name: 'input_galeri',
    component: () => import('../Admin/views/InputGaleri.vue'),
  },
  {
    path: '/admin/add_galeri',
    name: 'add_harga_galeri',
    component: () => import('../Admin/views/AddGaleri.vue'),
  },
  {
    path: '/admin/edit_galeri',
    name: 'edit_galeri',
    component: () => import('../Admin/views/EditGaleri.vue'),
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
