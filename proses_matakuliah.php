<?php

if ($_GET['proses'] == 'insert') {
    if (isset($_POST['submit'])) {

        include 'koneksi.php';
        $sql = mysqli_query($db, "Insert into matakuliah(kode_matakuliah,nama_matakuliah,semester,jenis_matakuliah,sks,jam,keterangan)
      VALUES ('$_POST[kodematakuliah]','$_POST[namamatakuliah]','$_POST[semester]','$_POST[jenismatakuliah]','$_POST[sks]','$_POST[jam]','$_POST[keterangan]')");

        if ($sql) {
            echo "<script> alert('Data berhasil disimpan')</script>";
            echo "<script>window.location.href='index.php?p=matakuliah'</script>";
        }
    }
}

if ($_GET['proses'] == 'update') {
    if (isset($_POST['submit'])) {

        include 'koneksi.php';
        $sql = mysqli_query($db, "UPDATE matakuliah SET kode_matakuliah = '$_POST[kodematakuliah]',nama_matakuliah = '$_POST[namamatakuliah]',semester = '$_POST[semester]',jenis_matakuliah= '$_POST[jenismatakuliah]',sks = '$_POST[sks]',jam = '$_POST[jam]',keterangan = '$_POST[keterangan]' WHERE id='$_POST[id]'");

        if ($sql) {
            echo "<script> alert('Data berhasil dirubah')</script>";
            echo "<script>window.location.href='index.php?p=matakuliah'</script>";
        }
    }
}

if ($_GET['proses'] == 'delete') {

    include 'koneksi.php';

    $hapus = mysqli_query($db, "DELETE FROM matakuliah WHERE id='$_GET[id_hapus_matakuliah]'");
    if ($hapus) {
        echo "<script>window.location.href='index.php?p=matakuliah'</script>";
    }
}