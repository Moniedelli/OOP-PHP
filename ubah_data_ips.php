<?php
    include "class.php";
    $celass = new kelas(); 

    if(isset($_GET['kode_ips'])){
		$kode_ips = $_GET['kode_ips'];
		$data = $celass->edit_ips($kode_ips);

        // echo $data['kode_ips'];
        // echo $data ['nim'];
        // die(); 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<!-- font awesome -->
		<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>form ips</title>
</head>
<body>
            <!-- rencana header -->
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand">Ubah Data IPS</a> 
            </div>
        </nav>
        <br>
<div class="container"> 
        <form name="input" action="proses.php?i=update" method="POST">

        <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">ID IPK</label> 
                <div class="col-sm-10">
                    <input type="text" name="kode_ips" class="form-control" placeholder="Masukkan ID IPK" value="<?php echo $data['kode_ips'] ?>" readonly> 
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">NIM</label> 
                <div class="col-sm-10">
                    <input type="text" name="nimm" class="form-control" placeholder="masukkan NIM" value="<?php echo $data['nimm'] ?>" readonly> 
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Jumlah IPS</label> 
                <div class="col-sm-10">
                    <input type="text" name="jumla_ips" class="form-control" placeholder="masukkan jumlah IPS" value="<?php echo $data['jumla_ips'] ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Semester</label> 
                <div class="col-sm-10">
                    <input type="text" name="semester" class="form-control" placeholder="masukkan semester" value="<?php echo $data['semester'] ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">SKS</label>
                <div class="col-sm-10">
                    <input type="text" name="sks" class="form-control" placeholder="masukkan jumlah sks" value="<?php echo $data['sks'] ?>">
                </div>
            </div>

            <!-- tombol ubah --> 
                <input type="submit" name="update" value="simpan" class="btn btn-primary btn-sm"></input>
            <!-- tombol kembali --> 
            <a href="ips.php" type="button" class="btn btn-danger btn-sm">
					kembali
			</a> 
    </form>
</body>
</html>