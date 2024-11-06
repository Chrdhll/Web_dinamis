<?php

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
    case 'list':

?>
        <h1 class="alert alert-success text-center p-1 mt-1">Mata kuliah</h1>
        <a href="index.php?p=matakuliah&aksi=tambah" class="btn btn-primary mb-3">Tambah Mata kuliah</a>
        <table id="table-matakuliah" class="table table-striped table-hover border border-primary">
            <thead>
                <th>No</th>
                <th>Kode matakuliah</th>
                <th>Nama mata kuliah </th>
                <th>Semester</th>
                <th>Jenis mata kuliah</th>
                <th>Sks</th>
                <th>Jam</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $queryTampil = "SELECT * FROM matakuliah";
                $no = 1;
                $tampil = mysqli_query($db, $queryTampil);

                while ($rowTampil = mysqli_fetch_array($tampil)) {
                ?>
                    <tr>

                        <td><?php echo $no; ?></td>
                        <td><?php echo $rowTampil['kode_matakuliah']; ?></td>
                        <td><?php echo $rowTampil['nama_matakuliah']; ?></td>
                        <td><?php echo $rowTampil['semester']; ?></td>
                        <td><?php echo $rowTampil['jenis_matakuliah']; ?></td>
                        <td><?php echo $rowTampil['sks']; ?></td>
                        <td><?php echo $rowTampil['jam']; ?></td>
                        <td><?php echo $rowTampil['keterangan']; ?></td>
                        <td>
                            <a href="index.php?p=matakuliah&aksi=edit&id_edit_matakuliah=<?= $rowTampil['id'] ?>"
                                class="btn btn-warning">Edit</a>
                            <a href="proses_matakuliah.php?proses=delete&id_hapus_matakuliah=<?= $rowTampil['id'] ?>"
                                class="btn btn-danger" onclick="return confirm('yakin menghapus data ?')">Delete</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>

    <?php
        break;

    case 'tambah':
    ?>
        <h1 class="mb-4 mt-1">Mata Kuliah</h1>
        <form method="post" action="proses_matakuliah.php?proses=insert">
            <div class="mb-2">
                <label for="" class="form-label">kode matakuliah</label>
                <input type="text" class="form-control border border-primary" id="" name="kodematakuliah">
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Nama matakuliah</label>
                <input type="text" class="form-control border border-primary" id="" name="namamatakuliah">
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Semester</label>
                <input type="number" class="form-control border border-primary" id="" name="semester">
            </div>

            <div class="row g-3 mb-2">
                <label for="" class="form-label ">Jenis matakuliah</label>
                <div class="col-sm mt-2">
                    <select name="jenismatakuliah" class="form-select border border-primary">
                        <option value="">-Pilih jenjang</option>
                        <option value="Teori">Teori</option>
                        <option value="Praktek">Praktek</option>
                    </select>
                </div>
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Sks</label>
                <input type="number" class="form-control border border-primary" id="" name="sks">
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Jam</label>
                <input type="number" class="form-control border border-primary" id="" name="jam">
            </div>


            <div class="mb-2">
                <label for="" class="form-label">Keterangan</label>
                <textarea class="form-control border border-primary" id="exampleFormControlTextarea1" rows="3" name="keterangan"></textarea>
            </div>


            <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
        </form>

    <?php
        break;

    case 'edit':

        include 'koneksi.php';
        $ambil_mtk = mysqli_query($db, "SELECT * FROM matakuliah WHERE id='$_GET[id_edit_matakuliah]'");
        $data_mtk = mysqli_fetch_array($ambil_mtk);
    ?>

        <h1 class="mb-4 mt-1">Edit Matakuliah</h1>
        <form method="post" action="proses_matakuliah.php?proses=update">
            <div class="mb-2">
                <input type="hidden" class="form-control border border-primary" id="" name="id" value="<?= $data_mtk['id'] ?>">
                <label for="" class="form-label">Kode matakuliah</label>
                <input type="text" class="form-control border border-primary" id="" name="kodematakuliah" value="<?= $data_mtk['kode_matakuliah'] ?>">
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Nama matakuliah</label>
                <input type="text" class="form-control border border-primary" id="" name="namamatakuliah" value="<?= $data_mtk['nama_matakuliah'] ?>">
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Semester</label>
                <input type="number" class="form-control border border-primary" id="" name="semester" value="<?= $data_mtk['semester'] ?>">
            </div>

            <div class="row g-3 mb-2">
                <label for="" class="form-label ">Jenis matakuliah</label>
                <div class="col-sm mt-2">
                    <select name="jenismatakuliah" class="form-select border border-primary">
                        <option value="">-pilih jenis</option>
                        <option value="Teori" <?= ($data_mtk['jenis_matakuliah'] == 'Teori') ? 'selected' : '' ?>>Teori</option>
                        <option value="Praktek" <?= ($data_mtk['jenis_matakuliah'] == 'Praktek') ? 'selected' : '' ?>>Praktek</option>

                    </select>
                </div>
            </div>

            <div class="mb-2">
                <label for="" class="form-label">Sks</label>
                <input type="number" class="form-control border border-primary" id="" name="sks" value="<?= $data_mtk['sks'] ?>">
            </div>

            <div class="mb-2">
                <label for="" class="form-label">Jam</label>
                <input type="number" class="form-control border border-primary" id="" name="jam" value="<?= $data_mtk['jam'] ?>">
            </div>

            <div class="mb-2">
                <label for="" class="form-label">Keterangan</label>
                <textarea class="form-control border border-primary" id="exampleFormControlTextarea1" rows="3" name="keterangan" ><?= $data_mtk['keterangan'] ?></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
<?php
        break;
}

?>