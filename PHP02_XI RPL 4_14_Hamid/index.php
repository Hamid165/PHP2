<?php
include 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Daftar Buku</title>
</head>

<body>
    <div class="p-3 mb-2 .bg-light">
        <div class="container">
            <nav class="navbar navbar-light" style="background-color: #ffffff;"> <a class="navbar-brand">Daftar Siswa</a>
                <form class="form-inline" action="index.php" method="get">
                    <input class="form-control mr-sm-2" name="cari" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
            <div>
                <?php
                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                }
                ?>

                <table class="table table-striped table-hover">
                    <tr class="text-center">
                        <th class="table-info">No</th>
                        <th class="table-info">Nis</th>
                        <th class="table-info">Nama Siswa</th>
                        <th class="table-info">Jenis Kelamin</th>
                        <th class="table-info">Alamat</th>
                        <th class="table-info">Jurusan</th>
                        <th class="table-info">Aksi</th>
                    </tr>
                    <?php
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_buku WHERE nama_siswa LIKE '%" . $_GET['cari'] . "%' ORDER BY nama_siswa ASC ");
                    } else {
                        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_buku");
                    }
                    $nomor = 1;
                    while ($baris = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <th class="text-center"> <?php echo $nomor ?></th>
                        <th class="text-center"> <?php echo $baris[1]; ?></th>
                        <th><?php echo $baris[2]; ?></th>
                        <th><?php echo $baris[3]; ?></th>
                        <th><?php echo $baris[4]; ?></th>
                        <th class="text-center"><?php echo $baris[5]; ?></th>
                        <th class="text-center">
                            <a href="edit.php?id=<?php echo $baris[0]; ?>" class="btn btn-warning">Edit</a>
                            <a href="hapus.php?id=<?php echo $baris[0]; ?>" class="btn btn-danger">Delete</a>
                        </th>
                    </tr>
                    <?php
                        $nomor++;
                    } ?>
                </table>
                <th> <a href="tambah.php" class="btn btn-outline-success btn-sm">Tambah Siswa</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

</body>

</html>