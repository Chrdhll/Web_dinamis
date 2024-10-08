<?php
include 'koneksi.php';
$ambil_prodi = mysqli_query($db, "SELECT * FROM prodi WHERE kode_prodi='$_GET[id_edit_prodi]'");
$data_prodi = mysqli_fetch_array($ambil_prodi);
?>

<h1 class="mb-4 text-center mt-1">Prodi</h1>
<div class="row justify-content-center">
    <div class="col-6">


        <form method="post" action="">
            <div class="mb-2">
                <label for="" class="form-label">Nama Prodi</label>
                <input type="text" class="form-control border border-primary" id="" name="namaprodi" value="<?= $data_prodi['nama_prodi'] ?>">
            </div>

            <div class="mb-2">
                <label for="" class="form-label">Kode Prodi</label>
                <input type="text" class="form-control border border-primary" id="" name="kodeprodi" value="<?= $data_prodi['kode_prodi'] ?>">
            </div>


            <div class="row g-3 mb-4">
                <label for="" class="form-label ">Jenjang studi</label>
                <div class="col-sm mt-2">
                    <select name="jenjangstudi" class="form-select border border-primary">
                        <option value="">-Pilih jenjang</option>
                        <option value="D3" <?= ($data_prodi['jenjang_prodi'] == 'D3') ? 'selected' : '' ?>>D3</option>
                        <option value="D4" <?= ($data_prodi['jenjang_prodi'] == 'D4') ? 'selected' : '' ?>>D4</option>
                        <option value="S1" <?= ($data_prodi['jenjang_prodi'] == 'S1') ? 'selected' : '' ?>>S1</option>
                        <option value="S2" <?= ($data_prodi['jenjang_prodi'] == 'S2') ? 'selected' : '' ?>>S2</option>
                        <option value="S3" <?= ($data_prodi['jenjang_prodi'] == 'S3') ? 'selected' : '' ?>>S3</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
            </div>

        </form>

        <?php
        if (isset($_POST['submit'])) {

            include 'koneksi.php';
            $sql = mysqli_query($db, "UPDATE prodi SET nama_prodi= '$_POST[namaprodi]',jenjang_prodi = '$_POST[jenjangstudi]' WHERE kode_prodi='$_GET[id_edit_prodi]'");

            if ($sql) {
                echo "<script> alert('Data berhasil dirubah')</script>";
                echo "<script>window.location.href='index.php?p=prodi'</script>";
            }
        }
        ?>


    </div>

</div>