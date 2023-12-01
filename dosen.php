<?php
    include "class.php";
    $class = new kelas(); 
    $no = 1;
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
    <title>Dosen</title>  
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
            <div class="w3-center w3-padding-16">Tabel Data Dosen</div> 
        </div>
    </div>

    <br><br><br>

    <div class="container">
        <!-- judul -->
        <h1 class="mt-4">Data Dosen</h1> 
        <figure>
            <blockquote class="blockquote">
                <p>berisi data yang telah di simpan di database</p>
            </blockquote>
        </figure>

        <a href="kelola_dosen.php" type="button" class="btn btn-primary mb-3">
            <i class="fa fa-plus">
            </i> tambah data Dosen 
        </a>

        <!-- tabel head -->
        <div>
            <table class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            <center>No. </center>
                        </th>
                        <th>NIDN</th>
                        <th>Nama</th>
                        <th>Pendidikan</th>
                        <th>Tanggal Lahir</th>
                        <th>Gender</th> 
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>E-Mail</th>
                        <th>Foto</th>
                        <th>Aksi</th>
<?php
    foreach($class->tampil_data_dosen() as $result) {
?>
                    </tr>
                </thead>

                <tbody>
                    <!-- isi tabel -->
                    <tr>
                        <td>
                            <center>
                                <?php 
                                    echo $no++;
                                ?>.
                            </center>
                        </td>

                        <td>
                            <?php 
                                echo $result ['nidn'];
                            ?>
                        </td>

                        <td>
                            <?php 
                                echo $result ['nama']; 
                            ?>
                        </td>

                        <td>
                            <?php 
                            // mencetak jurusan yang sudah connect dengan tabel jurusan 
                                echo $result ['pendidikan'];
                            ?>
                        </td>

                        <td>
                            <?php
                                echo $result ['tgl_lahir']; 
                            ?>

                        </td>

                        <td>
                            <?php 
                                // percabangan untuk jenis kelamin
                                if ($result ['gender']== 1) {
                                    echo "Laki - Laki"; 
                                }else if ($result ['gender']== 2) {
                                    echo "Perempuan";
                                }
                            ?>
                        </td>

                        <td>
                            <?php 
                                    echo $result ['alamat'];
                            ?>
                        </td>

                        <td>
                            <?php 
                                    echo $result ['no_hp'];
                            ?>
                        </td>

                        <td>
                            <?php
                                    echo $result ['email']; 
                            ?>
                        </td>

                        <td>
                            <img src="foto_dosen/<?php echo $result['foto_dosen'] ?>" width = "80"> </img> 
                        </td>
                        <!--  -->
                        <td>

                            <!-- tombol edit -->
                            <a href="ubah_dosen.php?nidn=<?php echo $result['nidn'] ?>" type="button"
                                class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i> 
                                ubah
                            </a>

                            <!-- tombol delete -->
                            <a href="proses.php?nidn=<?php echo $result['nidn'] ?>" type="button"  
                                class="btn btn-danger btn-sm"
                                
                                onClick="return confirm('apakah anda yakin data dengan nidn : <?php echo $result['nidn'] ?>, akan di hapus..?')">
                                <i class="fa fa-trash"></i>
                                hapus
                            </a>
                        </td>
                    </tr>
                </tbody>
<?php
    }
?>
            </table>
        </div>
    </div>
</body>
</html>