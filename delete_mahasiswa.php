<?php

include 'koneksi.php';

$hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$_GET[id_hapus]'");
if($hapus){
    echo "<script>window.location.href='index.php?p=mhs'</script>";
}
