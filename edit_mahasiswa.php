
    <?php
    include 'koneksi.php';
    $ambil_mhs = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$_GET[id_edit]'");
    $data_mhs = mysqli_fetch_array($ambil_mhs);
    $tgl = explode("-", $data_mhs['tanggal_lahir']);
    $hobi = explode(",", $data_mhs['hobi']);
    ?>

 

        <h1 class="mb-4 mt-1">Edit Mahasiswa</h1>
        <form method="post" action="">
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
        if (isset($_POST['submit'])) {

            include 'koneksi.php';
            $tgl = $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
            $hobies = implode(",", $_POST['hobi']);
            $sql = mysqli_query($db, "UPDATE mahasiswa SET nama = '$_POST[nama]',email = '$_POST[email]',tanggal_lahir = '$tgl',jenis_kelamin = '$_POST[jk]',hobi = '$hobies',alamat = '$_POST[alamat]' WHERE nim='$_GET[id_edit]'");

            if ($sql) {
                echo "<script> alert('Data berhasil dirubah')</script>";
                echo "<script>window.location.href='index.php?p=mhs'</script>";
            }
        }
        ?>


