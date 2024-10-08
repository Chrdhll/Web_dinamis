<h1 class="mb-4 mt-1">Registrasi Mahasiswa</h1>
<form method="post" action="">
  <div class="mb-2">
    <label for="" class="form-label">Nama</label>
    <input type="text" class="form-control border border-primary" id="" name="nama">
  </div>
  <div class="mb-2">
    <label for="" class="form-label">Nim</label>
    <input type="number" class="form-control border border-primary" id="" name="nim">
  </div>
  <div class="mb-2">
    <label for="" class="form-label">Email</label>
    <input type="email" class="form-control border border-primary" id="" name="email">
  </div>

  <div class="row g-3 mb-4">
    <label for="" class="form-label ">Tanggal lahir</label>
    <div class="col-sm mt-2">
      <select id="" name="tgl" class="form-select border border-primary">
        <option selected>Tanggal</option>
        <?php
        for ($i = 1; $i <= 31; $i++) {
          echo "<option value=" . $i . ">" . $i . "</option>";
        }
        ?>
      </select>
    </div>
    <div class="col-sm mt-2">
      <select id="" name="bln" class="form-select border border-primary">
        <option selected>Bulan</option>
        <?php
        for ($i = 1; $i <= 12; $i++) {
          echo "<option value=" . $i . ">" . $i . "</option>";
        }
        ?>
      </select>
    </div>
    <div class="col-sm mt-2">
      <select name="thn" id="" class="form-select border border-primary">
        <option selected>Tahun</option>
        <?php
        for ($i = date('Y'); $i >= 1980; $i--) {
          echo "<option value=" . $i . ">" . $i . "</option>";
        } ?>

      </select>
    </div>
  </div>

  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <label class="form-check-label" for="flexRadioDefault1" name="gender">
          <input class="form-check-input border border-primary" type="radio" name="jk" id="flexRadioDefault1" value="Laki-laki" checked>
          Laki-laki
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label" for="flexRadioDefault2" name="gender">
          <input class="form-check-input border border-primary" type="radio" name="jk" id="flexRadioDefault2" value="perempuan">
          Perempuan
        </label>
      </div>
    </div>
  </fieldset>



  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Hobi</legend>
    <div class="col-sm-10">
      <div class="form-check-inline">
        <label class="form-check-label">
          <input class="form-check-input border border-primary" type="checkbox" name="hobi[]" value="Baca buku" checked>
          Baca buku
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input class="form-check-input border border-primary" type="checkbox" name="hobi[]" value="Traveling">
          Travaling
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input class="form-check-input border border-primary" type="checkbox" name="hobi[]" value="Olahraga">
          olahraga
        </label>
      </div>
    </div>
  </fieldset>

  <div class="mb-2">
    <label for="" class="form-label">Alamat</label>
    <textarea class="form-control border border-primary" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
  </div>


  <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
</form>


<?php
if (isset($_POST['submit'])) {

  include 'koneksi.php';
  $tgl = $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
  $hobies = implode(",", $_POST['hobi']);
  $sql = mysqli_query($db, "Insert into mahasiswa(nama,nim,email,tanggal_lahir,jenis_kelamin,hobi,alamat)
  VALUES ('$_POST[nama]','$_POST[nim]','$_POST[email]','$tgl','$_POST[jk]','$hobies','$_POST[alamat]')");

  if ($sql) {
    echo "<script> alert('Data berhasil disimpan')</script>";
    echo "<script>window.location.href='index.php?p=mhs'</script>";
  }
}
?>