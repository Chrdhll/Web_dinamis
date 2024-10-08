<?php
include 'koneksi.php';
$ambil_dosen = mysqli_query($db, "SELECT * FROM dosen WHERE kode_dosen='$_GET[id_edit_dosen]'");
$data_dosen = mysqli_fetch_array($ambil_dosen);
?>

<h1 class="mb-4 text-center mt-1">Prodi</h1>
<div class="row justify-content-center">
    <div class="col-6">


        <form method="post" action="">
            <div class="mb-2">
                <label for="" class="form-label">Nama Prodi</label>
                <input type="text" class="form-control border border-primary" id="" name="namadosen" value="<?= $data_dosen['nama_dosen'] ?>">
            </div>

            <div class="mb-2">
                <label for="" class="form-label">Kode Prodi</label>
                <input type="text" class="form-control border border-primary" id="" name="kodedosen" value="<?= $data_dosen['kode_dosen'] ?>">
            </div>

            <div class="mb-2">
                <label for="" class="form-label">Mata kuliah</label>
                <input type="text" class="form-control border border-primary" id="" name="matakuliah" value="<?= $data_dosen['mata_kuliah'] ?>">
            </div>

            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
            </div>

        </form>

        <?php
        if (isset($_POST['submit'])) {

            include 'koneksi.php';
            $sql = mysqli_query($db, "UPDATE dosen SET nama_dosen= '$_POST[namadosen]',mata_kuliah= '$_POST[matakuliah]' WHERE kode_dosen='$_GET[id_edit_dosen]'");

            if ($sql) {
                echo "<script> alert('Data berhasil dirubah')</script>";
                echo "<script>window.location.href='index.php?p=dosen'</script>";
            }
        }
        ?>


    </div>

</div>