<h1 class="alert alert-success text-center p-1 mt-1 ">Data prodi</h1>

<a href="index.php?p=create_prodi" class="btn btn-primary mb-3 mt-1">Tambah prodi</a>

<table class="table table-striped table-hover border border-primary">
    <tr>
        <th>No</th>
        <th>Nama Prodi</th>
        <th>Kode Prodi</th>
        <th>Jenjang prodi</th>
        <th>Aksi</th>
    </tr>

    <?php
    include 'koneksi.php';
    $ambil = mysqli_query($db, "SELECT * FROM prodi");
    $no = 1;
    while ($data = mysqli_fetch_array($ambil)) {
    ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data['nama_prodi'] ?></td>
            <td><?= $data['kode_prodi'] ?></td>
            <td><?= $data['jenjang_prodi'] ?></td>
            <td>
                <a href="index.php?p=edit_prodi&id_edit_prodi=<?=$data['kode_prodi']?>" class="btn btn-warning">Edit</a>
                <a href="delete_prodi.php?id_hapus_prodi=<?=$data['kode_prodi']?>" class="btn btn-danger" onclick="return confirm('yakin menghapus data ?')">Hapus</a>
            </td>
        </tr>
    <?php
        $no++;
    }
    ?>
   
</table>
