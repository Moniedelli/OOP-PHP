<?php
$query = "SELECT * FROM user WHERE '$username' = username AND '$password' = passw"; 
        $exc = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($exc);

        // var_dump($data); s
        // die(); 

        if(isset($data)){
            // login berhasil
            session_start();
            $_SESSION = ['username'] = $data ['username'];

            echo "<script>alert('berhasil login');window.location = 'tabel.php'</script>"; 
        }else{
            // gagal
            echo "<script>alert('gagal login');window.login.php = 'login.php'</script>";
        }
?> 