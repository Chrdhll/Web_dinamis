<?php

include 'koneksi.php';

$hapus = mysqli_query($db, "DELETE FROM prodi WHERE kode_prodi='$_GET[id_hapus_prodi]'");
if($hapus){
    echo "<script>window.location.href='index.php?p=prodi'</script>";
}