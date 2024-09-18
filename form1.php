<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penanganan Form</title>
</head>
<body>
    <h1>Registrasi Mahasiswa</h1>

    <form action="" method="get">
    <table>
        <tr>
            <td> nama</td>
            <td> <input type="text" name="nama" id=""></td>
        </tr>
        <tr>
            <td> nim</td>
            <td><input type="text" name="nim" id=""></td>
        </tr>
        <tr>
            <td></td>
            <td> <input type="submit" name="submit"></td>
        </tr>
    </table>
    </form>

    <?php
    if(isset($_GET['submit'])){
        echo "halo selamat datang " .$_GET['nama']."<br>";
        echo "nim anda " .$_GET['nim'];
    }
       
    ?>
</body>
</html>