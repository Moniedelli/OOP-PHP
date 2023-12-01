<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- w3school -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <!-- font awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>tabel</title>
</head>

<body>

    <!-- cajascript untuk side bar -->
    <script>
    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }
    </script>
    <!-- Sidebar (hidden by default) -->
    <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left"
        style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
        <b>
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a> <br>
        </b>
        <a href="tabel.php" onclick="w3_close()" class="w3-bar-item w3-button">Tabel Mahasiswa</a>
        <a href="jurusan.php" onclick="w3_close()" class="w3-bar-item w3-button">Tabel Jurusan</a>
        <a href="view.php" onclick="w3_close()" class="w3-bar-item w3-button">View Mahasiswa</a>
        <a href="dosen.php" onclick="w3_close()" class="w3-bar-item w3-button">Dosen</a> 
        <a href="ips.php" onclick="w3_close()" class="w3-bar-item w3-button">IPS</a>
        <br>
        <br>
        <br>
        <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">logout</a>
    </nav>

    <!-- Top menu -->
    <div class="w3-top">
        <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
            <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
            <div class="w3-center w3-padding-16">Tabel View Mahasiswa</div> 
        </div>
    </div>

    <br><br><br><br>
<div class="container">
                <form action="#" method="POST">
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Cari : </label> 
                                    <div class="col-sm-10">
                                <input type="text" name="nama_mhs" class="form-control" placeholder="Cari berdasarkan nama"> 
                                    </div>
                                </div>
                                <input class="btn btn-primary mb-3" type="submit" value="cari">
                </form>
    <table class="table align-middle table-bordered table-hover"> 
    <tr>
                        <center>
                            <th>NO</th> 
                        </center>
                        <th>NIM</th>
                        <th>Nama </th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>E-Mail</th>
                        <th>Wali</th> 
                        <th>Foto</th>
                    </tr>
                    <?php 
                        include "class.php";
                        $celas = new kelas();
                        $nama = isset($_POST['nama_mhs']) ? $_POST['nama_mhs'] : '';

                        foreach ($celas->cari_data($nama) as $result) {
                    ?>
                    <tr>
                        <td><?php echo ++$no ?></td> 

                        <td><?php echo $result['nim']; ?></td></td>

                        <td><?php echo $result['nama_mhs']; ?></td>

                        <td>
                            <?php
                                echo $result['nama_jurusan'];
                            ?>
                        </td> 
                        
                        <td>
                        <?php 
                        if ($result['jenis_kelamin']== 1) { 
                            echo "Laki - Laki"; 
                        }else if ($result['jenis_kelamin']== 2) {
                            echo "Perempuan";
                        }
                        ?>
                        </td>

                        <td><?php echo $result['alamat_mhs']; ?></td>
                        <td><?php echo $result['nohp_mhs']; ?></td>
                        <td><?php echo $result['email_mhs']; ?></td>
                        
                        <td>
                            <?php
                                echo $result ['nama']; 
                            ?>
                        </td> 

                        <td>
                            <img src="foto/<?php echo $result['foto'] ?>" width = "80"> </img>
                        </td>
                    </tr>
                    <?php } ?>
    </table>
</div>
</body>
</html>