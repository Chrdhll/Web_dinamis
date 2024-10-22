<?php

if ($_GET['proses'] == 'insert') {
    if (isset($_POST['submit'])) {

        include 'koneksi.php';
        $sql = mysqli_query($db, "INSERT INTO prodi (nama_prodi,jenjang_prodi)
        VALUES ('$_POST[namaprodi]','$_POST[jenjangstudi]')");
      
        if ($sql) {
          echo "<script> alert('Data berhasil disimpan')</script>";
          echo "<script>window.location.href='index.php?p=prodi'</script>";
        }
      }
}
if ($_GET['proses'] == 'update') {
    if (isset($_POST['submit'])) {

        include 'koneksi.php';
        $sql = mysqli_query($db, "UPDATE prodi SET nama_prodi= '$_POST[namaprodi]',jenjang_prodi = '$_POST[jenjangstudi]' WHERE id='$_POST[id]'");

        if ($sql) {
            echo "<script> alert('Data berhasil dirubah')</script>";
            echo "<script>window.location.href='index.php?p=prodi'</script>";
        }
    }
}
if ($_GET['proses'] == 'delete') {
    include 'koneksi.php';

    $hapus = mysqli_query($db, "DELETE FROM prodi WHERE id='$_GET[id_hapus_prodi]'");
    if ($hapus) {
        echo "<script>window.location.href='index.php?p=prodi'</script>";
    }
}
