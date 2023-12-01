<?php
    include "class.php";
    $class = new kelas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <!-- font awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>form</title>
</head>

<body>
    <!-- rencana header -->
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Input Data Mahasiswa</a>
        </div>
    </nav>
    <br>
    <div class="container">
        <form action="proses.php?m=input" method="POST" enctype="multipart/form-data">
            <!-- untuk input nim  -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input require type="text" name="nim" class="form-control" placeholder="Masukkan Nim" require>
                </div>
            </div>
            <!-- untuk input nama  -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_mhs" class="form-control" placeholder="Masukkan Nama" require>
                </div>
            </div>

            <!-- untuk input jurusan --> 
            <div class="mb-3 row">
                <div class="row mb-3">
            <label for="nim" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="id_jurusan" require>
                    <?php foreach($class->tampil_data_jurusan() as $jurusan) {?>
                        <option value="<?= $jurusan['id_jurusan'] ?>"> 
                            <?= $jurusan['nama_jurusan'] ?> 
                        </option> 
                    <?php } ?> 
                </select>
                </div>
            </div>
            </div>

            <!-- untuk input jenis kelamin -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input type="radio" name="jenis_kelamin" value="1"> Laki - laki </br>
                    <input type="radio" name="jenis_kelamin" value="2"> Perempuan
                </div>
            </div>

            <!-- untuk input alamat  -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" name="alamat_mhs" class="form-control" placeholder="Masukkan alamat">
                </div>
            </div>

            <!-- untuk input no hp  -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">No Hp</label>
                <div class="col-sm-10">
                    <input type="text" name="nohp_mhs" class="form-control" placeholder="Masukkan No HP">
                </div>
            </div>

            <!-- utntuk input email -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="text" name="email_mhs" class="form-control" placeholder="Masukkan alamat E-mail">
                </div>
            </div>

            <!-- untuk input dosen wali --> 
            <div class="mb-3 row">
                <div class="row mb-3">
            <label for="nim" class="col-sm-2 col-form-label">Dosen Wali</label> 
                <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="nidn"> 
                <?php foreach($class->tampil_data_dosen() as $dosen) {?>
                        <option value="<?= $dosen['nidn'] ?>"> 
                            <?= $dosen['nama'] ?> 
                        </option> 
                    <?php } ?> 
                </select>
                </div>
            </div>
            </div>

            <!-- utntuk input foto -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" id="foto" class="form-control" accept="image/*"> 
                </div>
            </div>

            <!-- tombol simpan -->
            <input type="submit" value="simpan" name="simpan" class="btn btn-primary btn-sm"></input>

            <!-- tombol kembali -->
            <a href="tabel.php" type="button" class="btn btn-danger btn-sm">
                kembali
            </a>
        </form>
    </div> 
</body>
</html>