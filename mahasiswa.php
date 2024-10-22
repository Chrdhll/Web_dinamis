<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
  case 'list':
?>

    <h1 class="alert alert-success text-center p-1 mt-1">Data Mahasiswa</h1>
    <a href="index.php?p=mhs&aksi=tambah" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    <table id="tablePendaftar" class="table table-striped table-hover border border-primary">
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Nim</th>
        <th>Email</th>
        <th>Tanggal lahir</th>
        <th>Jenis Kelamin</th>
        <th>Hobi</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        <?php
        include 'koneksi.php';
        $queryTampil = "SELECT * FROM mahasiswa";
        $no = 1;
        $tampil = mysqli_query($db, $queryTampil);

        while ($rowTampil = mysqli_fetch_array($tampil)) {
        ?>
          <tr>

            <td><?php echo $no; ?></td>
            <td><?php echo $rowTampil['nama']; ?></td>
            <td><?php echo $rowTampil['nim']; ?></td>
            <td><?php echo $rowTampil['email']; ?></td>
            <td><?php echo $rowTampil['tanggal_lahir']; ?></td>
            <td><?php echo $rowTampil['jenis_kelamin']; ?></td>
            <td><?php echo $rowTampil['hobi']; ?></td>
            <td><?php echo $rowTampil['alamat']; ?></td>
            <td>
              <a href="index.php?p=mhs&aksi=edit&id_edit=<?= $rowTampil['nim'] ?>"
                class="btn btn-warning">Edit</a>
              <a href="proses_mahasiswa.php?proses=delete&id_hapus=<?= $rowTampil['nim'] ?>"
                class="btn btn-danger" onclick="return confirm('yakin menghapus data ?')">Delete</a>
            </td>
          </tr>
        <?php
          $no++;
        }
        ?>
      </tbody>
    </table>

  <?php
    break;

  case 'tambah':
  ?>
    <h1 class="mb-4 mt-1">Registrasi Mahasiswa</h1>
    <form method="post" action="proses_mahasiswa.php?proses=insert">
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
    break;

  case 'edit':

    include 'koneksi.php';
    $ambil_mhs = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$_GET[id_edit]'");
    $data_mhs = mysqli_fetch_array($ambil_mhs);
    $tgl = explode("-", $data_mhs['tanggal_lahir']);
    $hobi = explode(",", $data_mhs['hobi']);

  ?>

    <h1 class="mb-4 mt-1">Edit Mahasiswa</h1>
    <form method="post" action="proses_mahasiswa.php?proses=update">
      <div class="mb-2">
        <label for="" class="form-label">Nama</label>
        <input type="text" class="form-control border border-primary" id="" name="nama" value="<?= $data_mhs['nama'] ?>">
      </div>
      <div class="mb-2">
        <label for="" class="form-label">Nim</label>
        <input type="number" class="form-control border border-primary" id="" name="nim" value="<?= $data_mhs['nim'] ?>">
      </div>
      <div class="mb-2">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control border border-primary" id="" name="email" value="<?= $data_mhs['email'] ?>">
      </div>

      <div class="row g-3 mb-4">
        <label for="" class="form-label ">Tanggal lahir</label>
        <div class="col-sm mt-2">
          <select id="" name="tgl" class="form-select border border-primary">
            <option selected>Tanggal</option>
            <?php
            for ($i = 1; $i <= 31; $i++) {
              $selected = ($tgl[2] == $i) ? 'selected' : '';
              echo "<option value=" . $i . " $selected >" . $i . "</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-sm mt-2">
          <select id="" name="bln" class="form-select border border-primary">
            <option selected>Bulan</option>
            <?php
            for ($i = 1; $i <= 12; $i++) {
              $selected = ($tgl[1] == $i) ? 'selected' : '';
              echo "<option value=" . $i . " $selected > " . $i . "</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-sm mt-2">
          <select name="thn" id="" class="form-select border border-primary">
            <option selected>Tahun</option>
            <?php
            for ($i = date('Y'); $i >= 1980; $i--) {
              $selected = ($tgl[0] == $i) ? 'selected' : '';
              echo "<option value=" . $i . " $selected >" . $i . "</option>";
            } ?>

          </select>
        </div>
      </div>

      <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <label class="form-check-label" for="flexRadioDefault1" name="gender">
              <input class="form-check-input border border-primary" type="radio" name="jk" id="flexRadioDefault1" value="Laki-laki" <?= $data_mhs['jenis_kelamin'] == 'Laki-laki' ?  'checked' : '' ?>>
              Laki-laki
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label" for="flexRadioDefault2" name="gender">
              <input class="form-check-input border border-primary" type="radio" name="jk" id="flexRadioDefault2" value="perempuan" <?= $data_mhs['jenis_kelamin'] == 'Perempuan' ?  'checked' : '' ?>>
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
              <input class="form-check-input border border-primary" type="checkbox" name="hobi[]" value="Baca buku" <?= in_array('Baca buku', $hobi) ?  'checked' : '' ?>>
              Baca buku
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input border border-primary" type="checkbox" name="hobi[]" value="Traveling" <?= in_array('Traveling', $hobi) ?  'checked' : '' ?>>
              Travaling
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input border border-primary" type="checkbox" name="hobi[]" value="Olahraga" <?= in_array('Olahraga', $hobi) ?  'checked' : '' ?>>
              olahraga
            </label>
          </div>
        </div>
      </fieldset>

      <div class="mb-2">
        <label for="" class="form-label">Alamat</label>
        <textarea class="form-control border border-primary" id="exampleFormControlTextarea1" rows="3" name="alamat"> <?= $data_mhs['alamat'] ?></textarea>
      </div>


      <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
<?php
    break;
}

?>