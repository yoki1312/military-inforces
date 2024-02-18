<template>
  <div class="bg-white">
    <b-navbar type="none" variant="none">
        <!-- <img src="../../assets/images/logo.png" alt="logo" width="10%" class="position-absolute" style="margin-top:70px;"> -->
        <b-navbar-nav class="ml-auto">
          
            <b-nav-item-dropdown text="Alex Darmawan" right class="mr-2">              
                    <li class="nav-item">
                        <router-link class="nav-link" to="/foto_kegiatan">Profile</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/gabung_sekarang">Sign Out</router-link>
                    </li>
                </b-nav-item-dropdown>

        </b-navbar-nav>
    </b-navbar>
  </div>
</template>

<style>
.navbar-nav .nav-link {
  color: #000000 !important;
}


.column {
  display: flex !important;
  align-items: center !important;
}
.columns {
  margin-top: 0 !important;
}
.padding-right {
  padding-right: 15px;
}
.image {
  height: 40px;
  width: 40px;
}
</style>
