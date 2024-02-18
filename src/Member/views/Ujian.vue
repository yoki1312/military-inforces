<template>
  <div class="container mt-3">
    <h3>Ujian Berlangsung</h3>
    <div class="text-right" id="plug">{{timerOutput}}</div>
    <!-- {{Pertanyaan.data[0]}} -->
    <!-- {{jmlSoal = parseInt(TempUjian.data[0]['total_number'])}}
    {{currentNo = parseInt(TempUjian.data[0]['last_number'])}} -->
    <b-row>
        <b-col sm="10" class="mb-9">
          <strong> No. {{parseInt(Pertanyaan.data[0]['no_urut'])}}</strong>
          <div class="pertanyaan">
            <h5>{{Pertanyaan.data[0]['text_pertanyaan']}}</h5>

            <input type="radio" id="a" value="a" v-model="answer" />
            <label for="a"> <span>A. {{Pertanyaan.data[0]['a']}}</span></label> <br />

            <input type="radio" id="b" value="b" v-model="answer" />
            <label for="b"><span>B. {{Pertanyaan.data[0]['b']}}</span></label> <br />

            <input type="radio" id="c" value="c" v-model="answer" />
            <label for="c"><span>C. {{Pertanyaan.data[0]['c']}}</span></label> <br />

            <input type="radio" id="d" value="d" v-model="answer" />
            <label for="d"><span>D. {{Pertanyaan.data[0]['d']}}</span></label> <br />

            <input type="radio" id="e" value="e" v-model="answer" />
            <label for="e"><span>E. {{Pertanyaan.data[0]['e']}}</span></label> <br />

          </div>
          <div class="tombol">
            <button class="btn btn-warning" v-if="parseInt(Pertanyaan.data[0]['no_urut'])>1" v-on:click.prevent="getPertanyaanByNo(parseInt(Pertanyaan.data[0]['no_urut'])-1,parseInt(TempUjian.data[0]['id']))">Sebelumnya</button>
            <button class="btn btn-success" v-if="parseInt(Pertanyaan.data[0]['no_urut'])<parseInt(TempUjian.data[0]['total_number'])" v-on:click.prevent="getPertanyaanByNo(parseInt(Pertanyaan.data[0]['no_urut'])+1,parseInt(TempUjian.data[0]['id']))">Selanjutnya</button>
            <button class="btn btn-success" v-if="answer && parseInt(Pertanyaan.data[0]['no_urut'])<parseInt(TempUjian.data[0]['total_number'])" v-on:click.prevent="saveNext(parseInt(TempUjian.data[0]['id']),parseInt(Pertanyaan.data[0]['id']),answer,parseInt(Pertanyaan.data[0]['no_urut']))">Simpan & Selanjutnya</button>
            <button class="btn btn-success" v-if="answer && parseInt(Pertanyaan.data[0]['no_urut'])>=parseInt(TempUjian.data[0]['total_number'])" v-on:click.prevent="saveFinish(parseInt(TempUjian.data[0]['id']))">Simpan & Selesai</button>
          </div>
        </b-col>
        <b-col sm="2" class="no-soal">
          <span v-for="(row,i) in TempUjian.allPertanyaan" :key="i">
            <button v-if="row.jawaban" class="btn btn-success" v-on:click.prevent="getPertanyaanByNo(parseInt(row.no_urut),parseInt(TempUjian.data[0]['id']))"> {{row.no_urut}}</button>
            <button v-else class="btn btn-danger" v-on:click.prevent="getPertanyaanByNo(parseInt(row.no_urut),parseInt(TempUjian.data[0]['id']))"> {{row.no_urut}}</button>
          </span>
        </b-col>
    </b-row>
  </div>
</template>

<script>
import axios from 'axios';
var today = new Date();
var date1 = (today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds()).toString()
console.log(date1)
export default {
  name: 'Ujian',
  data() {
    return {
      countDownToTime : new Date("July 06, 2023 23:50:00").getTime(),
      timerOutput:  null,
      answer : ""
    }
},
methods: {
    startTimer: function() {
      const timeNow = new Date().getTime();
      const timeDifference = this.countDownToTime - timeNow;
      const millisecondsInOneSecond = 1000;
      const millisecondsInOneMinute = millisecondsInOneSecond * 60;
      const millisecondsInOneHour = millisecondsInOneMinute * 60;
      const millisecondsInOneDay = millisecondsInOneHour * 24;
      // const differenceInDays = timeDifference / millisecondsInOneDay;
      const remainderDifferenceInHours = (timeDifference % millisecondsInOneDay) / millisecondsInOneHour;
      const remainderDifferenceInMinutes = (timeDifference % millisecondsInOneHour) / millisecondsInOneMinute;
      const remainderDifferenceInSeconds = (timeDifference % millisecondsInOneMinute) / millisecondsInOneSecond;
      // const remainingDays = Math.floor(differenceInDays);
      const remainingHours = Math.floor(remainderDifferenceInHours);
      const remainingMinutes = Math.floor(remainderDifferenceInMinutes)+(remainingHours*60);
      const remainingSeconds =Math.floor(remainderDifferenceInSeconds);
      this.timerOutput = "Sisa Waktu : " + remainingMinutes + " Menit " + "" + remainingSeconds + " Detik";
    },
    setTempUjian(data){
      this.TempUjian = data
    },
    setPertanyaan(data){
      this.Pertanyaan = data
    },
    getPertanyaanByNo(no,id_ujian){
      
      axios.post('http://localhost/api2/military_inforces/member/member/pertanyaanByNo', {
              no : no,
              id_ujian : id_ujian,
            }, {
          headers: {
            "Content-type": "text/plain",
            },
        })
      .then( 
        (response) => {
          this.setPertanyaan(response.data)
          if(response.data.data[0]['jawaban']){
            this.answer = response.data.data[0]['jawaban']
          } else {
            this.answer = null
          }
        }
      )
      .catch((error) => console.log(error));
    },
    saveNext(id_ujian,id_pertanyaan,answer,no){
      axios.post('http://localhost/api2/military_inforces/member/member/save_answer', {
              id_ujian : id_ujian,
              id_pertanyaan : id_pertanyaan,
              answer : answer,
              last_numb : no+1,
            }, {
          headers: {
            "Content-type": "text/plain",
            },
        })
      .then( 
        this.getPertanyaanByNo(no+1,id_ujian),
        window.location.reload()
      )
      .catch((error) => console.log(error));
    },
    saveFinish(id_ujian){
      axios.post('http://localhost/api2/military_inforces/member/member/finish_ujian', {
              id_ujian : id_ujian
            }, {
          headers: {
            "Content-type": "text/plain",
            },
        })
      .then( 
        // this.getPertanyaanByNo(no+1,id_ujian),
        // window.location.reload()
        this.$router
                .push({ path: '/member/history' })
                .then(() => { this.$router.go() })
      )
      .catch((error) => console.log(error));
    }
  },
  mounted() {
       setInterval(() => { this.startTimer() }, 1000);
       axios.get('http://localhost/api2/military_inforces/member/member/temp_detail_ujian', {
      headers: {
        "Content-type": "application/json",
        }
    })
  .then((response) => {
    this.setTempUjian(response.data)
    var date = new Date(response.data.data[0]['tanggal_ujian'] + ' ' + response.data.data[0]['finish_time'])
    this.countDownToTime = date.getTime()
    // console.log(date)
    var last_number = response.data.data[0]['last_number']
    var id_ujian = response.data.data[0]['id']
    axios.post('http://localhost/api2/military_inforces/member/member/pertanyaanByNo', 
    {no : last_number,id_ujian : id_ujian},{
          headers: {
            "Content-type": "text/plain",
            },
        },
        
        )
      .then( 
        (response) => {
          this.setPertanyaan(response.data)
          if(response.data.data[0]['jawaban']){
            this.answer = response.data.data[0]['jawaban']
          } else {
            this.answer = null
          }
        }
      )
      .catch((error) => console.log(error));
  }
  )
  .catch((error) => console.log(error));
    }

}
</script>

<style>
.tombol .btn {
  margin-left: 10px;
}
.no-soal .btn {
  width: 40px;
}
</style>