<template>
  <div>
    <b-sidebar id="sidebar-no-header" aria-labelledby="sidebar-no-header-title" no-header visible>
      <template>
        <div class="p-3">
          <b-button v-b-toggle.sidebar-no-header>Toggle Sidebar</b-button>
          <h4 id="sidebar-no-header-title">Custom header sidebar</h4>
          <p>
            Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis
            in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
          </p>
          <nav class="mb-3">
            <b-nav vertical>
              <!-- <b-nav-item active >Active</b-nav-item>
              <b-nav-item href="#" >Link</b-nav-item>
              <b-nav-item href="#" >Another Link</b-nav-item> -->
              <router-link to="/">
                <button
                  class="button is-medium is-fullwidth is-rounded is-white margin-btn"
                >
                  <span class="icon is-medium">
                    <i class="mdi mdi-24px mdi-home"></i>
                  </span>
                  <span>Home</span>
                </button>
              </router-link>
              <router-link to="/about">
                <button
                  class="button is-medium is-fullwidth is-rounded is-white margin-btn"
                >
                  <span class="icon is-medium">
                    <i class="mdi mdi-24px mdi-information"></i>
                  </span>
                  <span>About</span>
                </button>
              </router-link>
              <router-link to="/account">
                <button
                  class="button is-medium is-fullwidth is-rounded is-white margin-btn"
                >
                  <span class="icon is-medium">
                    <i class="mdi mdi-24px mdi-account"></i>
                  </span>
                  <span>Account</span>
                </button>
              </router-link>
              <router-link to="/statistics">
                <button
                  class="button is-medium is-fullwidth is-rounded is-white margin-btn"
                >
                  <span class="icon is-medium">
                    <i class="mdi mdi-24px mdi-chart-bar"></i>
                  </span>
                  <span>Statistics</span>
                </button>
              </router-link>
            </b-nav>
          </nav>
          <b-button variant="primary" block >Sign Out</b-button>
        </div>
      </template>
    </b-sidebar>
  </div>
</template>

<style>
.b-sidebar {
  width: 17% !important;
}
.router-link-exact-active > button {
  background-color: #44b783 !important;
  color: white !important;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2) !important;
  margin-bottom: 15px;
}
.button {
  justify-content: left !important;
}
.margin-top {
  margin-top: 2rem;
}
.margin-btn {
  margin-bottom: 10px;
}
</style>
