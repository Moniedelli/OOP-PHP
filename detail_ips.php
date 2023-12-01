<?php
        include "class.php";
        $kelas = new kelas();

        if(isset($_GET['nim'])){
            $nim = $_GET['nim'];
            $data = $kelas->tampil_detail_data($nim);
        }
?>
<!DOCTYPE html>
<html>
<head>
<title>detail</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- font awesome -->
<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
</head>
<body class="w3-theme-l5">

<div class="w3-container w3-content" style="max-width:100%;margin-top:80px">    
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m7">
      <!-- Profile -->
      <div class="w3-container w3-card w3-round w3-white w3-margin"><br>
         <h4>Mahasiswa: <?php echo $data ['nama_mhs']?></h4>
         <p><img src="foto/<?php echo $data['foto'] ?>" height="50px"></p>
         <hr>
         <p>NIM:  <?php echo $data['nim'] ?></p>
         <p></i>Jumlah IPS:  <?php echo $data['jumla_ips'] ?></p>
         <p></i>Semester: <?php echo $data['semester'] ?> </p>
         <p></i>SKS: <?php echo $data['sks']?></p>
        </div>
      </div>
      <br>
      <br>
    </div>
    
    <!-- untuk menampiklkan dosen -->
    <div class="w3-col m7">
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <h4>Dosen Wali: <?php echo $data['nama'] ?></h4><br>
        <img src="foto_dosen/<?php echo $data['foto_dosen'] ?>" height="50px">
        <hr>
        <p>Pendidikan: <?php echo $data['pendidikan'] ?></p>
        <p>Tanggal Lahir: <?php echo $data['tgl_lahir'] ?></p>
        <p>Alamat: <?php echo $data['alamat'] ?></p>
        <p></p>
      </div>
      </div> 
    </div>
  </div>
</div>

<a href="tabel.php" type="button" class="btn btn-danger btn-sm">Kembali </a>

</body>
</html> 
