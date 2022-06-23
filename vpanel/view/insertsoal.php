<div class="row">
    <div class="col-md-6">
        <h5>Insert Soal</h5>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mt-1">
        <label for="" class="fw-bold">Soal</label>
        <textarea name="soal" id="soal"></textarea>
    </div>
    <div class="col-md-6 mt-1">
        <label for="">Opsi Benar</label>
        <textarea name="opsi1" rows="2" id="opsi1"></textarea>
    </div>
    <div class="col-md-6 mt-1">
        <label for="">Opsi 1</label>
        <textarea name="opsi2" rows="2" id="opsi2"></textarea>
    </div>
    <div class="col-md-6 mt-1">
        <label for="">Opsi 2</label>
        <textarea name="opsi3" rows="2" id="opsi3"></textarea>
    </div>
    <div class="col-md-6 mt-1">
        <label for="">Opsi 3</label>
        <textarea name="opsi4" rows="2" id="opsi4"></textarea>
    </div>
    <div class="col-md-6 mt-1">
        <label for="">Opsi 4</label>
        <textarea name="opsi5" rows="2" id="opsi5"></textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-2">
        <button type="submit" class="btn btn-primary float-end">Simpan</button>
        <button onclick="window.location.href='?p=soal'" class="btn btn-danger float-end me-2">Batal</button>
    </div>
</div>


<script>
    CKEDITOR.replace('soal');
    CKEDITOR.replace('opsi1');
    CKEDITOR.replace('opsi2');
    CKEDITOR.replace('opsi3');
    CKEDITOR.replace('opsi4');
    CKEDITOR.replace('opsi5');
</script>