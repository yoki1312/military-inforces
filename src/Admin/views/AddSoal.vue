<template>
    <div class="container add-page">
        <h4>Tambah Daftar Soal</h4>
        <!-- {{category}} -->
        <a href="/admin/add_soal_image" class="btn-add-image-soal">Masukan Soal Bergambar</a>
        <form>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Masukan Nama Kategori Soal</label>
                <div class="col-sm-9">
                    <select name="id_category" v-model="input.id_category" class="form-control">
                        <option v-for="(item, index) in category.data" :key="index" :value="item.id">{{item.nama_category}}</option>
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
                    <textarea name="b" v-model="input.b" class="form-control" id="" placeholder="Jawaban B" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban C</label>
                <div class="col-sm-9">
                    <textarea name="c" v-model="input.c" class="form-control" id="" placeholder="Jawaban C" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban D</label>
                <div class="col-sm-9">
                    <textarea name="d" v-model="input.d" class="form-control" id="" placeholder="Jawaban D" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban yang benar</label>
                <div class="col-sm-9">
                    <select name="kunci_jawaban" v-model="input.kunci_jawaban" class="form-control">
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
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
                <button class="btn-save" v-on:click.prevent = "add()">Simpan</button>
                <a class="btn-kembali" href="/admin/input_soal">Kembali</a>
            </div>
        </form>

        <!-- <select class="form-control" multiple="multiple">
        <option selected="selected">orange</option>
        <option>white</option>
        <option selected="selected">purple</option>
        </select> -->

        <!-- <div>
    <Select2 v-model="myValue" :options="myOptions" :settings="{ settingOption: multiple, settingOption: value }" @change="myChangeEvent($event)" @select="mySelectEvent($event)" />
    <h4>Value: {{ myValue }}</h4>
  </div> -->
    </div>
</template>


<script>
import axios from 'axios';

    export default {
      data(){
        return{
          username: this.$session.get("username")?this.$session.get("username"):"",
          category:[],
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
          }
        }
      },
      methods:{
        setCategory(data){
          this.category = data
        },
        add(){
            if (this.input.text_pertanyaan != '') {
                axios.post('https://bimbel-militaryinforces.com/api/admin/soal/add_soal', {
                    id_category : this.input.id_category,
                    text_pertanyaan : this.input.text_pertanyaan,
                    a : this.input.a,
                    b : this.input.b,
                    c : this.input.c,
                    d : this.input.d,
                    e : '',
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
      }
    }
</script>