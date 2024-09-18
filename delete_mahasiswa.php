<?php

include 'koneksi.php';

$hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$_GET[id_hapus]'");
if($hapus){
    header('location:dataMahasiswa.php');
}
