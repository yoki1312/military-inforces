<template>
  <div class="container mt-3">
    <h3>Daftar Tentor</h3>
    <b-table
      id="table-transition-example"
      :items="products.data"
      :fields="fields"
      striped
      small
      primary-key="nama"
      :tbody-transition-props="transProps"
    ></b-table>
    <!-- {{products.data}} -->

</div>
</template>

<script>
import axios from 'axios';

export default {
data(){
    return{
      username: this.$session.get("username")?this.$session.get("username"):"",
      products:[],
      transProps: {
          // Transition name
          name: 'flip-list'
        },
        fields: [
        {key : "nama", sortable: true},
        {key : "jabatan", sortable: true}
        ]
    }
  },
  methods:{
     setProducts(data){
      this.products = data
    }
  },
  mounted(){
    axios.get('http://localhost/api2/military_inforces/member/member/tentor', {
      headers: {
        "Content-type": "application/json",
        }
    })
  .then( (response) =>this.setProducts(response.data))
  .catch((error) => console.log(error));
  }
}
</script>

<style>
.card-header {
    font-size: 2rem;
}
</style>