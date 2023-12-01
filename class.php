<?php
    include 'konek.php';
    class kelas extends koneksi{

        function __construct(){
            parent::__construct();
            session_start();
            if ($_SESSION['user']==""){
                echo "<script>alert('Anda belum login, silahkan login terlebih dahulu');window.location = 'login.php'</script>";
            }
        }

        // READ 
        function tampil_data_mahasiswa(){
                $query = mysqli_query($this->conn,"SELECT * FROM mahasiswa JOIN jurusan on mahasiswa.jurusan = jurusan.id_jurusan JOIN dosen on mahasiswa.wali = dosen.nidn");
                while($result = mysqli_fetch_assoc($query)){
                    $data[] = $result;
                }
                return $data;
        }

        // CRIETE 
        function tambah_data_mahasiswa ($data){
            $query = mysqli_query($this->conn, "INSERT INTO mahasiswa VALUES( '".$GLOBALS['nim']."', '".$GLOBALS['nama']."', '".$GLOBALS['jurusan']."', '".$GLOBALS['jeniskelamin']."', '".$GLOBALS['alamat']."', '".$GLOBALS['nohp']."', '".$GLOBALS['email']."', '".$GLOBALS['wali']."', '".$GLOBALS['foto']."')") or die(mysqli_error($this->conn));

            return $query;
        }

        // UPDATE
        function ubah_data_mahasiswa($data){
            $query = mysqli_query($this->conn, "UPDATE mahasiswa SET nama_mhs = '".$GLOBALS['nama']."', jurusan = '".$GLOBALS['jurusan']."' , jenis_kelamin = '".$GLOBALS['jeniskelamin']."' , alamat_mhs = '".$GLOBALS['alamat']."' , nohp_mhs = '".$GLOBALS['nohp']."' ,email_mhs = '".$GLOBALS['email']."' , wali = '".$GLOBALS['wali']."' , foto = '".$GLOBALS['foto']."' WHERE mahasiswa . nim = '".$GLOBALS['nim']."'") or die(mysqli_error($this->conn)); 

            return $query;
        }

        function tampil_edit_mahasiswa($nim){
            $query = mysqli_query($this->conn, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
            $data= mysqli_fetch_assoc($query);

            return $data;
        }

        // DELETE
        function hapus_data_mahasiswa($nim){
            $query = mysqli_query($this->conn,"DELETE FROM mahasiswa WHERE nim = '$nim'") or die(mysqli_error($this->conn));
            return $query;
        }

        function cari_data($nama){
            $qry = mysqli_query($this->conn,"SELECT * FROM mahasiswa INNER JOIN jurusan on mahasiswa.jurusan = jurusan.id_jurusan
            INNER JOIN dosen on mahasiswa.wali = dosen.nidn where nama_mhs like '%$nama%'");
            while($x = mysqli_fetch_assoc($qry)){
                $data[] = $x;
            }
            return $data;
        }
// ==========================================================
    // tabel jurusan
    function tampil_data_jurusan(){
        $query = mysqli_query($this->conn,"SELECT * FROM jurusan ");
        while($result = mysqli_fetch_assoc($query)){
            $data[] = $result;
        }
        return $data;
    }
    
    function tambah_data_jurusan ($data){
        $query = mysqli_query($this->conn, "INSERT INTO jurusan VALUES(   '".$GLOBALS['id']."','".$GLOBALS['nama']."')")or die(mysqli_error($this->conn));
        
        return $query;
    }
    
    function ubah_data_jurusan($data){
        $query = mysqli_query($this->conn, "UPDATE jurusan SET nama_jurusan = '".$data['nama_jurusan']."' WHERE jurusan . id_jurusan = '".$data['id_jurusan']."'") or die(mysqli_error($this->conn));

        return $data;
    }
    
    function hapus_data_jurusan($id){
        $query = mysqli_query($this->conn,"DELETE FROM jurusan WHERE id_jurusan = '$id'") or die(mysqli_error($this->conn));
        return $query;
    }
    
    function edit($id){
        $query = mysqli_query($this->conn,"SELECT * FROM jurusan WHERE id_jurusan = '$id'");
        $data= mysqli_fetch_assoc($query);
        return $data;
    }

    // ==========================================================
    // tabel dosen
    function tampil_data_dosen(){
        $query = mysqli_query($this->conn,"SELECT * FROM dosen ");
        while($result = mysqli_fetch_assoc($query)){
            $data[] = $result;
        }
        return $data;
    }

    function tambah_data_dosen($data){  
        $query = mysqli_query($this->conn, "INSERT INTO dosen VALUES( '".$GLOBALS['nidn']."', '".$GLOBALS['nama']."', '".$GLOBALS['pendidikan']."', '".$GLOBALS['tgl_lahir']."', '".$GLOBALS['gender']."', '".$GLOBALS['alamat']."', '".$GLOBALS['nohp']."', '".$GLOBALS['email']."', '".$GLOBALS['foto_dosen']."')") or die(mysqli_error($this->conn));

        return $query;
    }

    function tampil_edit_dosen($nidn){
        $query = mysqli_query($this->conn, "SELECT * FROM dosen WHERE nidn = '$nidn'");
        $data= mysqli_fetch_assoc($query);

        return $data;
    }

    function hapus_data_dosen($nidn){
        $query = mysqli_query($this->conn,"DELETE FROM dosen WHERE nidn = '$nidn'") or die(mysqli_error($this->conn));
        
        return $query; 
    }

    function ubah_data_dosen($data){ 

        $query = mysqli_query($this->conn, "UPDATE dosen SET nama = '".$GLOBALS['nama']."', pendidikan = '".$GLOBALS['pendidikan']."' , tgl_lahir = '".$GLOBALS['tgl_lahir']."' , gender = '".$GLOBALS['gender']."' , alamat = '".$GLOBALS['alamat']."' ,no_hp = '".$GLOBALS['nohp']."' , email = '".$GLOBALS['email']."' , foto_dosen = '".$GLOBALS['foto_dosen']."' WHERE dosen . nidn = '".$GLOBALS['nidn']."'") or die(mysqli_error($this->conn));

        return $query;
    }

    // ==========================================================
    // tabel IPS
    function tampil_data_IPS(){
        $query = mysqli_query($this->conn,"SELECT * FROM ips ");
        while($result = mysqli_fetch_assoc($query)){
            $data[] = $result;
        }
        return $data;
    }

    function tambah_data_IPS($data){
        $query = mysqli_query($this->conn, "INSERT INTO ips VALUES(   '".$GLOBALS['id_ips']."','".$GLOBALS['nim']."', '".$GLOBALS['jumlah_ips']."', '".$GLOBALS['semester']."', '".$GLOBALS['sks']."')")or die(mysqli_error($this->conn));
        return $query;
    }

    function edit_ips($kode_ips){
        $query = mysqli_query($this->conn,"SELECT * FROM ips WHERE kode_ips = '$kode_ips'");
        $data= mysqli_fetch_assoc($query);

        return $data;
    }

    function ubah_data_ips($data){
        $query = mysqli_query($this->conn, "UPDATE ips SET nimm = '".$GLOBALS['nim']."', jumla_ips = '".$GLOBALS['jumlah_ips']."' , semester = '".$GLOBALS['semester']."' , sks = '".$GLOBALS['sks']."' WHERE ips . kode_ips = '".$GLOBALS['id_ips']."'") or die(mysqli_error($this->conn));
        return $data;
    }

    function hapus_data_ips($kode_ips){
        $query = mysqli_query($this->conn,"DELETE FROM ips WHERE kode_ips = '$kode_ips'") or die(mysqli_error($this->conn));
        return $query; 
    }

    // fitur baru 
    function tampil_detail_data($nim){
        $query = mysqli_query($this->conn, "SELECT * FROM mahasiswa JOIN jurusan ON mahasiswa.jurusan = jurusan.id_jurusan JOIN dosen ON mahasiswa.wali = dosen.nidn JOIN ips ON mahasiswa.nim = ips.nimm  WHERE nim = '$nim'");
        $data= mysqli_fetch_assoc($query);

        return $data;
    }
}
?>