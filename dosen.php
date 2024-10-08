<h1 class="alert alert-success text-center p-1 mt-1">Data Dosen</h1>

<a href="index.php?p=create_dosen" class="btn btn-primary mb-3">Tambah Dosen</a>

<table class="table table-striped table-hover border border-primary">
    <tr>
        <th>No</th>
        <th>Nama Dosen</th>
        <th>Kode Dosen</th>
        <th>Mata Kuliah</th>
        <th>Aksi</th>
    </tr>

    <?php
    include 'koneksi.php';
    $ambil = mysqli_query($db, "SELECT * FROM dosen");
    $no = 1;
    while ($data = mysqli_fetch_array($ambil)) {
    ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data['nama_dosen'] ?></td>
            <td><?= $data['kode_dosen'] ?></td>
            <td><?= $data['mata_kuliah'] ?></td>
            <td>
                <a href="index.php?p=edit_dosen&id_edit_dosen=<?=$data['kode_dosen']?>" class="btn btn-warning">Edit</a>
                <a href="delete_dosen.php?id_hapus_dosen=<?=$data['kode_dosen']?>" class="btn btn-danger" onclick="return confirm('yakin menghapus data ?')">Hapus</a>
            </td>
        </tr>
    <?php
        $no++;
    }
    ?>
   
</table>
