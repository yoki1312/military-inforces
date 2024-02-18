<template>
    <div id="navbar">
        <section class="menu-navbar">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <img src="../../assets/images/logo.png" class="img-menu">
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <ul class="list-menu">
                            <li>
                                <a href="/">BERANDA</a>
                            </li>
                            <li>
                                <a href="/sekolah_kedinasan">SEKOLAH KEDINASAN</a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="dropbtn">PROFIL <i class="fas fa-chevron-down"></i></button>
                                    <div class="dropdown-content">
                                        <a href="/foto_kegiatan">FOTO KEGIATAN</a>
                                        <a href="/proses_kegiatan">PROSES KEGIATAN</a>
                                        <a href="/daftar_tentor">DAFTAR TENTOR</a>
                                        <a href="/susunan_organisasi">SUSUNAN ORGANISASI</a>
                                        <a href="/tentang_kami">TENTANG KAMI</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="dropbtn">PROGRAM BIMBEL <i class="fas fa-chevron-down"></i></button>
                                    <div class="dropdown-content">
                                        <a href="/coba_gratis">COBA GRATIS</a>
                                        <a href="/program_bimbingan">PROGRAM BIMBINGAN BELAJAR</a>
                                    </div>
                                </div>
                            </li>
                            <li class="btn-default">
                                <a href="/registrasi">GABUNG SEKARANG</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="menu-navbar-mobile">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-6">
                        <a href="/">
                            <img src="../../assets/images/logo.png" class="img-menu">
                        </a>
                    </div>
                    <div class="col-md-10 col-sm-6 col-6">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler openbtn" @click="openNav">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- mobile -->
        <div id="mySidebar" class="sidebar">
            <a class="closebtn" @click="closeNav">×</a>
            <a href="/"> BERANDA</a>
            <a href="/sekolah_kedinasan"> SEKOLAH KEDINASAN</a>
            <div class="dropdown">
                <button class="dropbtn">PROFIL <i class="fas fa-chevron-down"></i></button>
                <div class="dropdown-content">
                    <a href="/foto_kegiatan">FOTO KEGIATAN</a>
                    <a href="/proses_kegiatan">PROSES KEGIATAN</a>
                    <a href="/daftar_tentor">DAFTAR TENTOR</a>
                    <a href="/susunan_organisasi">SUSUNAN ORGANISASI</a>
                    <a href="/tentang_kami">TENTANG KAMI</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">PROGRAM BIMBEL <i class="fas fa-chevron-down"></i></button>
                <div class="dropdown-content">
                    <a href="/coba_gratis">COBA GRATIS</a>
                    <a href="/program_bimbingan">PROGRAM BIMBINGAN BELAJAR</a>
                </div>
            </div>
            <a href="/registrasi" class="btn-default">GABUNG SEKARANG</a>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'app',
        components: {
        },
        mounted() {
        },
        methods: {
            openNav(){
                // alert("tes");
                document.getElementById("mySidebar").setAttribute("style", "width:250px");
            },
            closeNav(){
                // alert("tes");
                document.getElementById("mySidebar").setAttribute("style", "width:0");
            },
        }
    }

</script>
