<template>
    <div class="container add-page">
        <h4>Tambah Galery</h4>
        <form>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Masukan Gambar</label>
                <div class="col-sm-9">
                    <input type="file" id="file" name="file" multiple />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Deskripsi Gambar</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="" placeholder="Deskripsi Gambar" rows="5"></textarea>
                </div>
            </div>
            <div class="text-right mt-5">
                <button class="btn-save">Simpan</button>
                <a class="btn-kembali" href="/admin/input_galeri">Kembali</a>
            </div>
        </form>
    </div>
</template>