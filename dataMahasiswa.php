
        <h1 class="alert alert-success text-center p-1 mt-1">Data Mahasiswa</h1>
        <a href="index.php?p=create_mhs" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
        <table id="tablePendaftar" class="table table-striped table-hover border border-primary">
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
                        <a href="index.php?p=edit_mhs&id_edit=<?=$rowTampil['nim']?>"
                         class="btn btn-warning">Edit</a>
                        <a href="index.php?p=hapus_mhs&id_hapus=<?=$rowTampil['nim']?>"
                         class="btn btn-danger" onclick="return confirm('yakin menghapus data ?')">Delete</a>
                    </td>
                </tr>
                <?php
                $no++;
                }
                ?>
            </tbody>
        </table>
        



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
