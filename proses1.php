<?php
    // membuat koneksi dengan function
    include 'function.php';
    if (isset($_POST['simpan'])) {
        $berhasil = tambah_data_mahasiswa($_POST, $_FILES);

        if ($berhasil) {
            header('location: tabel.php');
            // echo "data mahasiswa berhasil ditambah"; 
        }else{
            echo $berhasil; 
        }

// =========================================================
    // else if untuk ubah data
    } else if (isset($_POST['ubah'])) {

        $berhasil = ubah_data_mahasiswa($_POST, $_FILES);

        //cek insert data
        if($berhasil){
            echo "<script>alert('Data berhasil di ubah'); 
            window.location = 'tabel.php'</script>";
        }else{
            echo " - Data gagal di proses - "; 
        }

// =========================================================
    // else if untuk hapus data
    }else if (isset($_GET['nim'])) { 
        
        $berhasil = hapus_data_mahasiswa($_GET);

        $nim = $data['nim'];
        
        if($berhasil){
            echo "<script>
            alert('Data berhasil di Hapus'); 
            window.location = 'tabel.php' 
            </script>"; 
        }else{
            echo "Data gagal di proses";
        }

// =========================================================
        // else if untuk jurusan 
    }else if (isset($_POST['aksi'])) { 

        $berhasil = tambah_data_jurusan($_POST); 

        if ($berhasil) {
            header('location: jurusan.php'); 
            // echo "data berhasil ditambah"; 
        }else{
            echo $query; 
        }
// =========================================================
    }else if (isset($_POST['edit'])) {

        $berhasil = ubah_data_jurusan($_POST);
        // cek edit data 
        if($berhasil){
            echo "<script>alert('Data berhasil di ubah'); 
            window.location = 'jurusan.php'</script>";
        }else{
            echo " - Data gagal di proses - ";
        }
// =========================================================
    }else if (isset($_GET['id_jurusan'])) {

        $berhasil = hapus_data_jurusan($_GET); 
        
        $id = $data['id_jurusan']; 

        if($berhasil){ 
            echo "<script>
            alert('Data berhasil di Hapus'); 
            window.location = 'jurusan.php'
            </script>"; 
        }else{
            echo "Data gagal di proses";
        }
// =========================================================
    }else if (isset($_POST['save'])) {
        $berhasil = tambah_data_dosen($_POST);
        if ($berhasil) {
            header('location: dosen.php');
            // echo "data berhasil ditambah"; 
        }else{
            echo $berhasil; 
        }
// =========================================================
    }else if (isset($_POST['ganti'])) {

        $berhasil = ubah_data_dosen($_POST);

        if($berhasil){
            echo "<script>alert('Data berhasil di ubah'); 
            window.location = 'dosen.php'</script>";
        }else{
            echo " - dosen gagal di proses - "; 
        }
// =========================================================
    }else if (isset($_GET['nidn'])) {

        $berhasil = hapus_data_dosen($_GET);
        
        $id = $data['nidn'];  

        if($berhasil){ 
            echo "<script>
            alert('Data berhasil di Hapus'); 
            window.location = 'dosen.php' 
            </script>"; 
        }else{
            echo "Data gagal di proses";
        }
    }
?>