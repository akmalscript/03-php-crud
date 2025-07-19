<?php
include "service/database.php";

$nim        = "";
$nama       = "";
$alamat     = "";
$fakultas   = "";
$sukses     = "";
$error      = "";

// if(isset($_GET['op'])) {
//     $op = $_GET['op'];
// } else {
//     $op = "";
// }
$op = isset($_GET['op']) ? $_GET['op'] : "";

if($op == 'delete') {
    $id     = $_GET['id'];
    $sql1   = "DELETE FROM mahasiswa
                WHERE id = '$id'";
    $q1     = mysqli_query($koneksi, $sql1);
    if($q1) {
        $sukses = "Data berhasil dihapus!";
    } else {
        $error = "Data gagal dihapus!";
    }
}

if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from mahasiswa where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nim        = $r1['nim'];
    $nama       = $r1['nama'];
    $alamat     = $r1['alamat'];
    $fakultas   = $r1['fakultas'];

    if ($nim == '') {
        $error = "Data tidak ditemukan";
    }
}

if(isset($_POST['simpan'])) { // untuk create
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $fakultas = $_POST['fakultas'];

    if($nim && $nama && $alamat && $fakultas) {
        if($op == 'edit') { //untuk update
            $sql1    = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', alamat = '$alamat', fakultas='$fakultas'
                        WHERE id = $id";
            $q1 = mysqli_query($koneksi, $sql1);
            if($q1) {
                $sukses = "Data berhasil diupdate!";
            } else {
                $error = "Data gagal diupdate!";
            }
        } else { //untuk insert
            $sql1 = "INSERT INTO mahasiswa (nim, nama, alamat, fakultas) VALUES ('$nim', '$nama', '$alamat', '$fakultas')";
            $q1 = mysqli_query($koneksi, $sql1);
            if($q1) {
                $sukses = "Input data berhasil!";
            } else {
                $error = "Input data gagal!";
            }
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }
        .card {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="mx-auto">
        <!-- untuk menginputkan data -->
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php
                    header("location: index.php");
                }
                ?>
                <?php
                if($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $sukses ?>
                    </div>
                <?php
                    header("location: index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>">
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <select class="form-control" id="fakultas" name="fakultas">
                            <option value="">-- Pilih Fakultas --</option>
                            <option value="Saintek">Saintek</option>
                            <option value="Soshum">Soshum</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from mahasiswa order by id";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut = 1;
                        while($r2 = mysqli_fetch_array($q2)) {
                            $id     = $r2['id'];
                            $nim    = $r2['nim'];
                            $nama       = $r2['nama'];
                            $alamat     = $r2['alamat'];
                            $fakultas   = $r2['fakultas'];
                        ?>
                            <tr>
                                <th scope="row"><?= $urut++ ?></th>
                                <td scope="row"><?= $nim ?></td>
                                <td scope="row"><?= $nama ?></td>
                                <td scope="row"><?= $alamat ?></td>
                                <td scope="row"><?= $fakultas ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?= $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?= $id ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>