<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<h1> PHP adalah server side scripting </h1>"; // buat ini di html aja
    print "<h2> Hello world </h2>";
    
    for($i=1;$i<=6;$i++){
        print("<h$i>hello world</h$i>");
    }

    // variabel adalah tempat untuk menyimpan sebuah nilai
    // di php nama varibel harus diawali dengan simbol "$". tipe data tidak perlu dideklarasikan 
    // contoh : $nama="bil gates". variabel sifatnya case sensitif 
    // snake_case : menggunakan underscore
    // kebab-case : untuk nama file dan folder tidak bisa untuk varibel 
    
    // untuk memanggil variabel 
    // echo "Nama ceop microsoft adalah = ".$nama; atau
    // echo "Nama ceop microsoft adalah = $nama"; --> pemanggilan ini tidak bisa menggunakan kutif sat('')

    
    ?>
  
</body>
</html>