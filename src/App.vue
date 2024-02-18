<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<style scoped>
  @import 'bootstrap/dist/css/bootstrap.min.css';
  @import 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css';
</style>
<style>
  @font-face {
    font-family: "BebasNeue-Regular";
    src: local("BebasNeue"),
    url(./fonts/BebasNeue/BebasNeue-Regular.ttf) format("truetype");
  }
  @font-face {
    font-family: "Ubuntu-Regular";
    src: local("Ubuntu"),
    url(./fonts/Ubuntu/Ubuntu-Regular.ttf) format("truetype");
  }
</style>
<script>
export default {
  name : 'App',
}
</script>

