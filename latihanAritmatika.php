<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penanganan Form</title>
</head>
<body>
    <h1>Registrasi Mahasiswa</h1>

    <form action="" method="post">
    <table>
        <tr>
            <td>angka 1</td>
            <td> <input type="number" name="satu" id=""></td>
        </tr>
        <tr>
            <td>angka 2</td>
            <td><input type="number" name="dua" id=""></td>
        </tr>
        <tr>
            <td></td>
            <td>
            <input type="submit" name="tambah" value="+">
            <input type="submit" name="kurang" value="-">
            <input type="submit" name="kali" value="x">
            <input type="submit" name="bagi" value="/">
            <input type="submit" name="mod" value="%">
            </td>
        </tr>
    </table>
    </form>

    <?php
    if(isset($_POST['tambah'])){
        echo "hasil tambah adalah :".$_POST['satu']+$_POST['dua'];
    }
    if(isset($_POST['kurang'])){
        echo "hasil kurang adalah :".$_POST['satu']-$_POST['dua'];
    }
    if(isset($_POST['kali'])){
        echo "hasil kali adalah :".$_POST['satu']*$_POST['dua'];
    }
    if(isset($_POST['bagi'])){
        echo "hasil bagi adalah :".$_POST['satu']/$_POST['dua'];
    }
    if(isset($_POST['mod'])){
        echo "hasil mod adalah :".$_POST['satu']%$_POST['dua'];
    }
    

    


       
    ?>
</body>
</html>