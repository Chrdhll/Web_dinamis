<h1 class="mb-4 text-center mt-1">Prodi</h1>
<div class="row justify-content-center">

<div class="col-6">


    <form method="post" action="">
      <div class="mb-2">
        <label for="" class="form-label">Nama Prodi</label>
        <input type="text" class="form-control border border-primary" id="" name="namaprodi">
      </div>

      <div class="mb-2">
        <label for="" class="form-label">Kode Prodi</label>
        <input type="text" class="form-control border border-primary" id="" name="kodeprodi">
      </div>


      <div class="row g-3 mb-4">
        <label for="" class="form-label ">Jenjang studi</label>
        <div class="col-sm mt-2">
          <select name="jenjangstudi" class="form-select border border-primary">
            <option value="">-Pilih jenjang</option>
            <option value="D3">D3</option>
            <option value="D4">D4</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
          </select>
        </div>
      </div>

      <div class="mb-3">
      <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
      </div>
      
    </form>


    </div>

</div>



<?php
if (isset($_POST['submit'])) {

  include 'koneksi.php';
  $sql = mysqli_query($db, "INSERT INTO prodi (nama_prodi,kode_prodi,jenjang_prodi)
  VALUES ('$_POST[namaprodi]','$_POST[kodeprodi]','$_POST[jenjangstudi]')");

  if ($sql) {
    echo "<script> alert('Data berhasil disimpan')</script>";
    echo "<script>window.location.href='index.php?p=prodi'</script>";
  }
}
?>