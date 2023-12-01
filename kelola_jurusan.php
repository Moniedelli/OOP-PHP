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
        <form method="POST" action="proses.php?j=input" name="input">
            <!-- untuk input nama  jurusan --> 
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">ID Jurusan</label> 
                <div class="col-sm-10">
                    <input type="text" name="id_jurusan" class="form-control" placeholder="Masukkan ID Jurusan"> 
                </div>
            </div>

            <!-- untuk input nama  -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Jurusan</label> 
                <div class="col-sm-10">
                    <input type="text" name="nama_jurusan" class="form-control" placeholder="Masukkan Nama Jurusan">
                </div>
            </div>

            <!-- tombol simpan -->
            <input type="submit" value="simpan" name="simpan" class="btn btn-primary btn-sm">  
            </input>

            <!-- tombol kembali -->
            <a href="jurusan.php" type="button" class="btn btn-danger btn-sm"> 
                kembali
            </a> 
        </form>
    </div> 
</body>
</html>