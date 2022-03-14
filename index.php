<?php
// Koneksi ke database
require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <!-- data mahasiswa -->
    <h1 align=center>Data Mahasiswa</h1>

    <section style="text-align:center">

    <button type="button"  class="jumbotron text-center" style="text-align:center">
    <a href="tambah.php" class="btn btn-primary" role="button" data-bs-toggle="button" >Tambah Data</a>
    </button>

    </section>
    <br>
    <form action="" method="POST" align=center>
        <input class="form-control me-2" type="text" name="keyword" autofocus placeholder="Cari data" autocomplete="off" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
    </form>
    <br>

    <table border="1" cellpadding="10" cellspacing="0" align=center>
        <thead style="background-color: #0dcaf0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Photo</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Jurusan</th>
            <th>Email</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
        </thead>
            <tr>

                <td> <?= $i; ?> </td>
                <td>
                    <a href="ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data');  ">Hapus</a>
                </td>
                <td><img src="img/<?php echo $row["gambar"] ?>" width="50"></td>
                <td><?php echo $row["nama"] ?></td>
                <td><?php echo $row["npm"] ?></td>
                <td><?php echo $row["jurusan"] ?></td>
                <td><?php echo $row["email"] ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
        
    </table>
    <!-- akhir data mahasiswa -->  
</body>
</html>