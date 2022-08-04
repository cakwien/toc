<div class="row">
    <div class="col-md-6">
        <h5>Insert Soal</h5>
    </div>
</div>
<form action="" method="post">
    <div class="row">
        <div class="col-md-6 mt-1">
            <label for="" class="fw-bold">Soal</label>
            <textarea name="soal" id="summernote1" style="height:140px;" class=""></textarea>
        </div>
        <div class="col-md-6 mt-1">
            <label for="">Opsi Benar</label>
            <!-- <textarea name="opsibenar" rows="2" id="summernote"></textarea> -->
            <textarea name="opsibenar" rows="2" id="summernote2"></textarea>

            <label for="">Opsi 1</label>
            <textarea name="opsisalah[]" rows="2" id="summernote3"></textarea>

            <label for="">Opsi 2</label>
            <textarea name="opsisalah[]" rows="2" id="summernote4"></textarea>

            <label for="">Opsi 3</label>
            <textarea name="opsisalah[]" rows="2" id="summernote5"></textarea>

            <label for="">Opsi 4</label>
            <textarea name="opsisalah[]" rows="2" id="summernote6"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-2">
            <button type="submit" name="simpansoal" class="btn btn-primary float-end">Simpan</button>
            <button onclick="window.location.href='?p=soal'" class="btn btn-danger float-end me-2">Batal</button>
        </div>
    </div>
</form>


<!-- <script>
    CKEDITOR.replace('soal');
    CKEDITOR.replace('opsi1');
    CKEDITOR.replace('opsi2');
    CKEDITOR.replace('opsi3');
    CKEDITOR.replace('opsi4');
    CKEDITOR.replace('opsi5');
</script> -->

<script>
    $(document).ready(function() {
        $('#summernote1').summernote();
        $('#summernote2').summernote();
        $('#summernote3').summernote();
        $('#summernote4').summernote();
        $('#summernote5').summernote();
        $('#summernote6').summernote();
    });
</script>