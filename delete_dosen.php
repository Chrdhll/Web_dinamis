<?php

include 'koneksi.php';

$hapus = mysqli_query($db, "DELETE FROM dosen WHERE kode_dosen='$_GET[id_hapus_dosen]'");
if($hapus){
    echo "<script>window.location.href='index.php?p=dosen'</script>";
}