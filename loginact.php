<?php
include "konek.php";

class login extends koneksi{
    function __construct(){
		parent::__construct();
    }
    
    function login_proses($username, $password)
    {
        $qry = "select * from user where username = '$username' and password = '$password'";
        $exec = mysqli_query($this->conn,$qry);
        $data = mysqli_fetch_array($exec);

        return $data;
    }
}

$xlogin = new login();

$username = mysqli_real_escape_string($xlogin->getConn(),$_POST['username']);
$password = mysqli_real_escape_string($xlogin->getConn(),$_POST['password']);

$data = $xlogin->login_proses($username, $password);

if($data)
{
    session_start();
    $_SESSION['user'] = $data['username'];
    echo "<script>alert('Login Berhail');window.location = 'tabel.php'</script>";
    
}else{
    echo "<script>alert('Username dan password salah'); 
    window.location = 'login.php'; </script>";
}
?>