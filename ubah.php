<?php
    include "class.php";
    $kelas = new kelas();

    if(isset($_GET['nim'])){
        $nim = $_GET['nim'];
        $data = $kelas->tampil_edit_mahasiswa($nim);
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

        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Ubah Data Mahasiswa</a> 
            </div>
        </nav>
        <br>
<div class="container"> 
        <form action="proses.php?m=ubah" method="POST" enctype="multipart/form-data">
            <!-- untuk menampilkan  nim  -->
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">NIM</label> 
                        <div class="col-sm-10">
                            <input type="text" name="nim" class="form-control" value="<?php echo $data ['nim']; ?>" readonly>
                        </div>
                </div>
                <!-- untuk ubah  nama  -->
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_mhs" class="form-control" value=" <?php echo $data ['nama_mhs']; ?>"> 
                        </div>
                </div>

            <!-- untuk ubah jurusan --> 
            <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-10">
                            <select id="jurusan" name="jurusan" class="form-select" aria-label="Default select example" value="<?php $data ['id_jurusan']?>"> 
                            <?php foreach($kelas->tampil_data_jurusan() as $jurusan) {?>
                                <option value="<?= $jurusan['id_jurusan'] ?>" <?= $jurusan['jurusan'] == $jurusan['id_jurusan'] ? 'selected' : '' ?>>
                                        <?= $jurusan['nama_jurusan']?> 
                                </option>
                                <?php } ?> 
                            </select>
                        </div>
                </div> 

            <!-- untuk input jenis kelamin -->
            <div class="mb-3 row">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <?php if ($data['jenis_kelamin'] == 1) { ?>
                            <input type="radio" name="jenis_kelamin" value="1" checked > Laki - laki </br> 
                            <input type="radio" name="jenis_kelamin" value="2"> Perempuan
                        
                    <?php } else {?> 
                            <input type="radio" name="jenis_kelamin" value="1"> Laki - laki </br>
                            <input type="radio" name="jenis_kelamin" value="2" checked> Perempuan
                    <?php } ?>
                </div>
            </div>

                <!-- untuk ubah alamat -->
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label" >Alamat</label>  
                        <div class="col-sm-10">
                            <input type="text" name="alamat_mhs" class="form-control" value="<?php echo $data['alamat_mhs']?>"> 
                        </div>
                </div>

                <!-- untuk ubah no hp  -->
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">No Hp</label>
                        <div class="col-sm-10">
                            <input type="text" name="nohp_mhs" class="form-control" value="<?php echo $data['nohp_mhs'];?>">
                        </div>
                </div>

                <!-- uantuk ubah email -->
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" name="email_mhs" class="form-control" value="<?php echo $data['email_mhs'];?>"> 
                        </div>
                </div>

            <!-- untuk ubah dosen wali --> 
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Wali</label>
                        <div class="col-sm-10">
                            <select id="dosen" name="wali" class="form-select" aria-label="Default select example">
                            <?php foreach($kelas->tampil_data_dosen() as $dosen) {?>
                                <option value="<?= $dosen['nidn'] ?>" <?= $dosen['wali'] == $dosen['nidn'] ? 'selected' : '' ?>>
                                            <?php
                                                echo $dosen ['nama'];
                                            ?>
                                    <?php } ?>
                                </option>
                            </select>
                        </div>
                </div>

            <!-- utntuk input foto -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                    <img src="foto/<?php echo $data['foto']; ?>" width = "100"></img>
                    <input type="file" name="foto" id="" class="form-control" accept="image/*" value="foto/<?php echo $data['foto']?>"> 
                </div>
            </div>

            <!-- tombol simpan --> 
                <input type="submit" value="ubah" name="ubah" class="btn btn-primary btn-sm"></input> 
            
            <!-- tombol kembali --> 
            <a href="tabel.php" type="button" class="btn btn-danger btn-sm">
					kembali
			</a> 
    </form>
</body>
</html>