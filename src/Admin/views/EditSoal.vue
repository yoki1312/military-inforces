<template>
    <div class="container add-page">
        <h4>Edit Daftar Soal</h4>
        <!-- {{pertanyaan.id_category}} -->
        <form>
            <input type="hidden" name="id" :value="pertanyaan.id">
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Masukan Nama Kategori Soal</label>
                <div class="col-sm-9"> 
                    <select name="id_category" v-model="input.id_category" class="form-control">
                        <option v-for="(item, index) in category.data" :key="index" :value="item.id" :selected="item.id == 4">{{item.nama_category}}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Masukan Soal</label>
                <div class="col-sm-9">
                    <textarea name="text_pertanyaan" v-model="input.text_pertanyaan" class="form-control" id="" placeholder="Soal" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban A</label>
                <div class="col-sm-9">
                    <textarea name="a" v-model="input.a" class="form-control" id="" placeholder="Jawaban A" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban B</label>
                <div class="col-sm-9">
                    <textarea name="b" v-model="input.b" class="form-control" id="" placeholder="Jawaban B" rows="5" ></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban C</label>
                <div class="col-sm-9">
                    <textarea name="c" v-model="input.c" class="form-control" id="" placeholder="Jawaban C" rows="5" ></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban D</label>
                <div class="col-sm-9">
                    <textarea name="d" v-model="input.d" class="form-control" id="" placeholder="Jawaban D" rows="5" ></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban yang benar</label>
                <div class="col-sm-9">
                    <select name="kunci_jawaban" v-model="input.kunci_jawaban" class="form-control">
                        <option  :selected="'a' == pertanyaan.kunci_jawaban" value="a">A</option>
                        <option :selected="'b' == pertanyaan.kunci_jawaban" value="b">B</option>
                        <option :selected="'c' == pertanyaan.kunci_jawaban" value="c">C</option>
                        <option  :selected="'d' == pertanyaan.kunci_jawaban" value="d">D</option>
                        <!-- <option value="e">E</option> -->
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Penjelasan</label>
                <div class="col-sm-9">
                    <textarea name="penjelasan" v-model="input.penjelasan" class="form-control" id="" placeholder="Penjelasan" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jumlah Score</label>
                <div class="col-sm-9">
                    <input name="score" v-model="input.score" type="number" class="form-control" id="" placeholder="score">
                </div>
            </div>
            <div class="text-right mt-5">
                <button class="btn-save" v-on:click.prevent = "saveEdit()">Simpan</button>
                <a class="btn-kembali" href="/admin/input_soal">Kembali</a>
            </div>
        </form>
    </div>
</template>


<script>
import axios from 'axios';

    export default {
      data(){
        return{
          username: this.$session.get("username")?this.$session.get("username"):"",
          category:[],
          pertanyaan:[],
          input:{
            id_category: "",
            text_pertanyaan: "",
            a: "",
            b: "",
            c: "",
            d: "",
            e: "",
            kunci_jawaban: "",
            penjelasan: "",
            score: 0,
          },
          id : this.$route.params.id_soal
        }
      },
      methods:{
        setCategory(data){
          this.category = data
        },
        setPertanyaan(data){
          this.pertanyaan = data
        },
        saveEdit(){
            if (this.input.text_pertanyaan != '') {
                axios.post('https://bimbel-militaryinforces.com/api/admin/soal/do_edit_soal', {
                    id : this.id,
                    id_category : this.input.id_category,
                    text_pertanyaan : this.input.text_pertanyaan,
                    a : this.input.a,
                    b : this.input.b,
                    c : this.input.c,
                    d : this.input.d,
                    e : this.input.e,
                    kunci_jawaban : this.input.kunci_jawaban,
                    penjelasan : this.input.penjelasan,
                    score : this.input.score,
                    }, {
                headers: {
                    "Content-type": "text/plain",
                    // "Access-Control-Allow-Origin": "*",
                    },
                })
            .then( 
                (response) => {
                    // console.log(response.data)
                    const status = response.data.status
                    const message = response.data.message
                    
                    alert(message)
        
                    if (status == 1) {
                        this.$router
                        .push({ path: '/admin/input_soal' })
                    } 
                }
            )
            .catch((error) => console.log(error));
            } else {
                alert('Data Tidak Lengkap')
            }
        },
      },
      mounted(){
        console.log(this.id);
        axios.get('https://bimbel-militaryinforces.com/api/admin/landing_page/all_category', {
          headers: {
            "Content-type": "application/json",
            }
        })
      .then( (response) => {
        console.log(response.data)
        this.setCategory(response.data)
      })
      .catch((error) => console.log(error));
      axios.post('https://bimbel-militaryinforces.com/api/admin/soal/soal_by_id', 
      {
            id : this.id,
        },
        {
          headers: {
            "Content-type": "text/plain",
            }
        })
      .then( (response1) => {
        console.log(response1.data)
        this.setPertanyaan(response1.data.data[0])
        this.input.id_category = response1.data.data[0].id_category
        this.input.text_pertanyaan = response1.data.data[0].text_pertanyaan
        this.input.a = response1.data.data[0].a
        this.input.b = response1.data.data[0].b
        this.input.c = response1.data.data[0].c
        this.input.d = response1.data.data[0].d
        this.input.kunci_jawaban = response1.data.data[0].kunci_jawaban
        this.input.penjelasan = response1.data.data[0].penjelasan
        this.input.score = response1.data.data[0].score
        console.log(response1.data.data[0].text_pertanyaan);
      })
      .catch((error) => console.log(error));
      }
    }
</script>