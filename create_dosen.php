<h1 class="mb-4 text-center mt-1">Dosen</h1>
<div class="row justify-content-center">

<div class="col-6">


    <form method="post" action="">
      <div class="mb-2">
        <label for="" class="form-label">Nama Dosen</label>
        <input type="text" class="form-control border border-primary" id="" name="namadosen">
      </div>

      <div class="mb-2">
        <label for="" class="form-label">Kode Dosen</label>
        <input type="text" class="form-control border border-primary" id="" name="kodedosen">
      </div>

      <div class="mb-2">
        <label for="" class="form-label">Mata kuliah</label>
        <input type="text" class="form-control border border-primary" id="" name="matakuliah">
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
  $sql = mysqli_query($db, "INSERT INTO dosen (nama_dosen,kode_dosen,mata_kuliah)
  VALUES ('$_POST[namadosen]','$_POST[kodedosen]','$_POST[matakuliah]')");

  if ($sql) {
    echo "<script> alert('Data berhasil disimpan')</script>";
    echo "<script>window.location.href='index.php?p=dosen'</script>";
  }
}
?>