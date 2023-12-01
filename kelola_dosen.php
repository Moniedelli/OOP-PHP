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
    <title>input dosen</title>
</head>

<body>
    <!-- rencana header -->
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand">Input Data Dosen</a>
        </div>
    </nav>
    <br>
    <div class="container">
        <form action="proses.php?d=input" method="POST" enctype="multipart/form-data">
            <!-- untuk input NIDN  -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">NIDN</label>
                <div class="col-sm-10">
                    <input type="text" name="nidn" class="form-control" placeholder="Masukkan NIDN">
                </div>
            </div>
            <!-- untuk input Nama  -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                </div>
            </div>

            <!-- untuk input Pendidikan  -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Pndidikan</label>
                <div class="col-sm-10">
                    <input type="text" name="pendidikan" class="form-control" placeholder="Masukkan pendidikan "> 
                </div>
            </div>

            <!-- untuk input Tgl Lahir  --> 
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Tanggal Lahir</label> 
                <div class="col-sm-10">
                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukkan TGL Lahir"> 
                </div>
            </div>

            <!-- untuk input jenis kelamin -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Gender</label> 
                <div class="col-sm-10">
                    <input type="radio" name="gender" value="1"> Laki - laki </br>
                    <input type="radio" name="gender" value="2"> Perempuan
                </div>
            </div>

            <!-- untuk input alamat  -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat">
                </div>
            </div>

            <!-- untuk input no hp  -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">No Hp</label>
                <div class="col-sm-10">
                    <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No HP">
                </div>
            </div>

            <!-- utntuk input email -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" placeholder="Masukkan alamat E-mail">
                </div>
            </div>

            <!-- utntuk input foto -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="foto_dosen" id="foto" class="form-control" accept="image/*">
                </div>
            </div>

            <!-- tombol simpan -->
            <input type="submit" value="simpan" name="simpan" class="btn btn-primary btn-sm">
            </input>

            <!-- tombol kembali -->
            <a href="dosen.php" type="button" class="btn btn-danger btn-sm">
                kembali 
            </a>
        </form>
    </div> 
</body>
</html>