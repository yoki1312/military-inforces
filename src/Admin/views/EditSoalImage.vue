<template>
    <div class="container add-page">
        <form>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Masukan Nama Kategori Soal</label>
                <div class="col-sm-9">
                    <select class="form-control">
                        <option>TIU</option>
                        <option>TWK</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Masukan Soal</label>
                <div class="col-sm-9">
                    <input type="file" id="file" name="file" multiple />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban A</label>
                <div class="col-sm-9">
                    <input type="file" id="file" name="file" multiple />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban B</label>
                <div class="col-sm-9">
                    <input type="file" id="file" name="file" multiple />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban C</label>
                <div class="col-sm-9">
                    <input type="file" id="file" name="file" multiple />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban D</label>
                <div class="col-sm-9">
                    <input type="file" id="file" name="file" multiple />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jawaban yang benar</label>
                <div class="col-sm-9">
                    <select class="form-control">
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jumlah Score</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="" placeholder="score">
                </div>
            </div>
            <div class="text-right mt-5">
                <button class="btn-save">Simpan</button>
                <a class="btn-kembali" href="/admin/input_soal">Kembali</a>
            </div>
        </form>
    </div>
</template>