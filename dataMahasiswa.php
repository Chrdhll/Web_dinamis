<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="alert alert-success text-center p-1">Data Mahasiswa</h1>
        <table id="tablePendaftar" class="table table-striped table-hover">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Email</th>
                <th>Tanggal lahir</th>
                <th>Jenis Kelamin</th>
                <th>Hobi</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $queryTampil = "SELECT * FROM mahasiswa";
                $no = 1;
                $tampil = mysqli_query($db, $queryTampil);

                while ($rowTampil = mysqli_fetch_array($tampil)) {
                ?>
                <tr>

                    <td><?php echo $no; ?></td>
                    <td><?php echo $rowTampil['nama']; ?></td>
                    <td><?php echo $rowTampil['nim']; ?></td>
                    <td><?php echo $rowTampil['email']; ?></td>
                    <td><?php echo $rowTampil['tanggal_lahir']; ?></td>
                    <td><?php echo $rowTampil['jenis_kelamin']; ?></td>
                    <td><?php echo $rowTampil['hobi']; ?></td>
                    <td><?php echo $rowTampil['alamat']; ?></td>
                    <td>
                        <a href="edit_mahasiswa.php?id_edit=<?=$rowTampil['nim']?>"
                         class="btn btn-warning">Edit</a>
                        <a href="delete_mahasiswa.php?id_hapus=<?=$rowTampil['nim']?>"
                         class="btn btn-danger" onclick="return confirm('yakin menghapus data ?')">Delete</a>
                    </td>
                </tr>
                <?php
                $no++;
                }
                ?>
            </tbody>
        </table>
        <a href="mahasiswa.php" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>