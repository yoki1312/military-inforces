<template>
  <div class="container mt-3">
    <h3>Detail Riwayat Ujian</h3>
    <!-- {{detailHistoryUjian.data[0]}} -->
    <b-card
            header-text-variant="h1"
            border-variant="none"
            header-bg-variant=""
            align="left"
            v-for="(row, i) in detailHistoryUjian.data" :key="i"
        >
        <b-card-header>
          <h5>No. {{i+1}}</h5>
          <h5>{{row.text_pertanyaan}}</h5>
        </b-card-header>
        <b-card-body>
            <span>Jawaban : {{answer = row.jawaban}} </span> 
            <div>
              <input type="radio" id="a" value="a" v-model="answer"/>
              <label for="a"> <span>A. {{row['a']}}</span></label> <br />

              <input type="radio" id="b" value="b" v-model="answer" />
              <label for="b"><span>B. {{row['b']}}</span></label> <br />

              <input type="radio" id="c" value="c" v-model="answer" />
              <label for="c"><span>C. {{row['c']}}</span></label> <br />

              <input type="radio" id="d" value="d" v-model="answer" />
              <label for="d"><span>D. {{row['d']}}</span></label> <br />

              <input type="radio" id="e" value="e" v-model="answer" />
              <label for="e"><span>E. {{row['e']}}</span></label> <br />

            </div>
            <b-row v-if="row.kunci_jawaban === row.jawaban" class="result-benar">
                <b-col sm="12"><h5>Benar</h5></b-col>
            </b-row>
            <b-row v-else class="result-salah">
                <b-col sm="12"><h5>Salah</h5></b-col>
            </b-row>
        </b-card-body>
        <b-card-footer>
          <span><h5>Penjelasan : </h5></span>
          {{row.penjelasan}}
          <span><h5>Kunci Jawaban : {{row.kunci_jawaban}}</h5></span>
        </b-card-footer>
    </b-card>
    <!-- {{detailHistoryUjian.data}} -->

</div>
</template>

<script>
import axios from 'axios';

export default {
data(){
    return{
      username: this.$session.get("username")?this.$session.get("username"):"",
      detailHistoryUjian:[],
      id : this.$route.params.UjianId
    }
  },
  methods:{
     setDetailHistoryUjian(data){
      this.detailHistoryUjian = data
    }
  },
  mounted(){
    console.log(this.id);
    var id_ujian = this.id
    axios.post('http://localhost/api2/military_inforces/member/member/detail_history_ujian', {
              id_ujian : id_ujian
            }, {
          headers: {
            "Content-type": "text/plain",
            },
        })
      .then(
        (response) => {
          this.setDetailHistoryUjian(response.data)
        } 
      )
      .catch((error) => console.log(error));
    }
}
</script>

<style>
.card {
    margin-top: 10px;
}
.result-benar {
  background: #76f1b8;
}
.result-salah {
  background: #ff0202;
}

.result-benar .result-salah {
  margin: 0;
  padding: 3px;
}
</style>

