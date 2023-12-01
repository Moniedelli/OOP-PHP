<?php
    // include 'konek.php';
    include 'konek.php';
    class biodata extends database{
    // =========================================================
    // function untuk input data mahasiswa 
    function tambah_data_mahasiswa($data, $files){

        $nim          = $data['nim']; 
        $nama         = $data['nama_mhs']; 
        $jurusan      = $data['id_jurusan'];
        $jeniskelamin = $data['jenis_kelamin'];
        $alamat       = $data['alamat_mhs'];
        $nohp         = $data['nohp_mhs']; 
        $email        = $data['email_mhs'];
        $wali         = $data['nidn'];

        $split        = explode('.', $files ['foto']['name']); 
        $extensi      = $split[count($split)-1]; 
        $foto         = $nim . '.' .$extensi; 
        $split        = explode('.', $files ['foto']['name']); 
        // tempat menyimapn file
        $dir = "foto/";
        // darimana asal filenya
        $tempfiles = $files['foto']['tmp_name'];
        // untuk memindahkan foto yang kita upload ke dalam folder dir yang kita buat
        move_uploaded_file($tempfiles, $dir.$foto);

        // query untuk input 
        $query = "INSERT INTO mahasiswa VALUES ('$nim' , '$nama' , '$jurusan' , '$jeniskelamin' , '$alamat' , '$nohp' , '$email' , '$wali', '$foto')";

        $sql = mysqli_query($GLOBALS['conn'] , $query);

        //mengembalikan ke proses.php 
        return true;
    }
    // =========================================================
    // function untuk ubah data mahasiswa 
    function ubah_data_mahasiswa($data, $files){
          //menangkap data/value dari form
        $nim          = $data['nim']; 
        $nama         = $data['nama_mhs']; 
        $jurusan      = $data['jurusan'];
        $jeniskelamin = $data['jenis_kelamin'];
        $alamat       = $data['alamat_mhs'];
        $nohp         = $data['nohp_mhs']; 
        $email        = $data['email_mhs']; 
        $wali         = $data['nidn'];

            $query_tanda = "SELECT * FROM mahasiswa WHERE nim = '$nim'"; 
            $sql2 = mysqli_query($GLOBALS['conn'], $query_tanda); 
            $result = mysqli_fetch_array($sql2);

            if ($files['foto']['name'] == "") {
                $foto = $result['foto']; 
            }else{
                $split = explode('.', $files ['foto']['name']);
                $extensi = $split[count($split)-1];
                $foto = $result['nim']. '.' . $extensi;

                unlink("foto/" . $result['foto']);
                move_uploaded_file($files['foto']['tmp_name'], "foto/".$foto);
            }

          //membuat query update data
        $query = "UPDATE `mahasiswa` SET `nama_mhs` = '$nama', `jurusan` = '$jurusan', `jenis_kelamin` = '$jeniskelamin', `alamat_mhs` = '$alamat', `nohp_mhs` = '$nohp', `email_mhs` = '$email', `wali` = '$wali', `foto` = '$foto' WHERE `mahasiswa`.`nim` = $nim;";

        $sql = mysqli_query($GLOBALS['conn'], $query);
        //mengembalikan ke proses.php 
        return true;
    }

    // =========================================================
    // function untuk hapus data mahasiswa
    function hapus_data_mahasiswa($data){

        $nim = $data['nim'];

        $query_tanda = "SELECT * FROM mahasiswa WHERE nim = '$nim'"; 
        $sql2 = mysqli_query($GLOBALS['conn'], $query_tanda);

        $result = mysqli_fetch_array($sql2); 

        // var_dump($sql2); 
        // unlink untuk menghilangkan foto
        unlink("foto/" . $result['foto']);
        // die(); 
    
        $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
        $sql = mysqli_query($GLOBALS['conn'], $query);
        //mengembalikan ke proses.php 
        return true;
    }

}

    // =========================================================
    
    function tambah_data_jurusan($data){

        $id = $data['id_jurusan']; 
        $nama = $data['nama_jurusan'];

        // echo "tambah data"; 
        // die(); 

        $query = "INSERT INTO jurusan VALUES ('$id' , '$nama')";

        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;  
    }

    // =========================================================

    function ubah_data_jurusan($data){
        //menangkap data/value dari form
        $id           = $data['id_jurusan']; 
        $nama         = $data['nama_jurusan']; 
        
        $query = "UPDATE `jurusan` SET `nama_jurusan` = '$nama' WHERE `jurusan`.`id_jurusan` = '$id'; "; 

        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    // =========================================================

    function hapus_data_jurusan($data){

        $id = $data['id_jurusan']; 

        $query = "DELETE FROM jurusan WHERE id_jurusan = '$id' ";

        $sql = mysqli_query($GLOBALS['conn'], $query); 

        return true;
    }

        // =========================================================
    // function untuk input data dosen  
    function tambah_data_dosen($data){ 
        // echo "tambah data"; 
        // die(); 
        $nidn         = $data['nidn']; 
        $nama         = $data['nama']; 
        $pendidikan   = $data['pendidikan'];
        $tgl_lahir    = $data['tgl_lahir'];
        $gender       = $data['gender'];
        $alamat       = $data['alamat'];
        $nohp         = $data['no_hp']; 
        $email        = $data['email']; 

        // query untuk input 
        // $query = "INSERT INTO `dosen` VALUES (`$nidn`, `$nama`, `$pendidikan`, `$tgl_lahir`, `$gender`, `$alamat`, `$nohp`, `$email`)";
        $query = "INSERT INTO dosen VALUES ('$nidn', '$nama', '$pendidikan', '$tgl_lahir', '$gender', '$alamat', '$nohp', '$email')";

        $sql = mysqli_query($GLOBALS['conn'] , $query);

        //mengembalikan ke proses.php 
        return $sql; 
    }

    // masih eror
    function ubah_data_dosen($data){ 
        $nidn         = $data['nidn']; 
        $nama         = $data['nama']; 
        $pendidikan   = $data['pendidikan'];
        $tgl_lahir    = $data['tgl_lahir'];
        $gender       = $data['gender'];
        $alamat       = $data['alamat'];
        $nohp         = $data['no_hp']; 
        $email        = $data['email']; 

        // query untuk input 
        $query = "UPDATE `dosen` SET `nama` = '$nama', `pendidikan` = '$pendidikan', `tgl_lahir` = '$tgl_lahir', `gender` = '$gender', `alamat` = '$alamat', `no_hp` = '$nohp', `email` = '$email' WHERE `dosen`.`nidn` = '$nidn';";

        $sql = mysqli_query($GLOBALS['conn'] , $query); 

        //mengembalikan ke proses.php 
        return $sql; 
    }

    function hapus_data_dosen($data){

        $nidn = $data['nidn'];
    
        $query = "DELETE FROM dosen WHERE nidn = '$nidn'";
        $sql = mysqli_query($GLOBALS['conn'], $query);
        //mengembalikan ke proses.php 
        return true;  
    }
?>