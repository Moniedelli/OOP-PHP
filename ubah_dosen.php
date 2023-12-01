<?php
    include "class.php";
    $class = new kelas();

    if(isset($_GET['nidn'])){
        $nidn = $_GET['nidn'];
        $result = $class->tampil_edit_dosen($nidn);
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
    <title>form</title>
</head>
<body>
            <!-- rencana header -->
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Ubah Data Dosen</a>  
            </div>
        </nav>
        <br>
<div class="container"> 
        <form action="proses.php?d=ubah" method="POST" enctype="multipart/form-data">
            <!-- untuk menampilkan  nidn  -->
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">NIDN</label>
                        <div class="col-sm-10">
                            <input type="text" name="nidn" class="form-control" value="<?php echo $result ['nidn']; ?>" readonly> 
                        </div>
                </div>
                <!-- untuk ubah  nama  -->
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" value=" <?php echo $result ['nama']; ?>">
                        </div>
                </div>

                <!-- untuk ubah alamat -->
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label" >Pendidikan</label>
                        <div class="col-sm-10">
                            <input type="text" name="pendidikan" class="form-control" value="<?php echo $result['pendidikan']?>">
                        </div>
                </div>

                <!-- untuk ubah alamat -->
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label" >Tanggal Lahir</label> 
                        <div class="col-sm-10">
                            <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $result['tgl_lahir']?>">
                        </div>
                </div>
            <!-- untuk input jenis kelamin -->
            <div class="mb-3 row">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label> 
                <div class="col-sm-10">
                    <?php if ($result['gender'] == 1) { ?>
                            <input type="radio" name="gender" value="1" checked > Laki - laki </br> 
                            <input type="radio" name="gender" value="2"> Perempuan
                        
                    <?php } else {?> 
                            <input type="radio" name="gender" value="1"> Laki - laki </br>
                            <input type="radio" name="gender" value="2" checked> Perempuan
                    <?php } ?>
                    
                </div>
            </div>

                <!-- untuk ubah alamat -->
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label" >Alamat</label>  
                        <div class="col-sm-10">
                            <input type="text" name="alamat" class="form-control" value="<?php echo $result['alamat']?>"> 
                        </div>
                </div>

                <!-- untuk ubah no hp  -->
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">No Hp</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_hp" class="form-control" value="<?php echo $result['no_hp'];?>">
                        </div>
                </div>

                <!-- uantuk ubah email -->
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" value="<?php echo $result['email'];?>"> 
                        </div>
                </div>

            <!-- utntuk input foto -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                <img src="foto_dosen/<?php echo $result['foto_dosen']; ?>" width = "100"></img>
                    <input type="file" name="foto_dosen" id="foto" class="form-control" accept="image/*" value="foto_dosen/<?php echo $result['foto_dosen']; ?>" width = "100">
                </div>
            </div>

            <!-- tombol simpan --> 
                <input type="submit" value="Ubah" name="ganti" class="btn btn-primary btn-sm"></input> 
            
            <!-- tombol kembali --> 
            <a href="dosen.php" type="button" class="btn btn-danger btn-sm"> 
					kembali
			</a> 
    </form>
</body>
</html>