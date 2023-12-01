<?php
    session_start();
    session_destroy();

    echo "<script>alert('Anda telah logout, silahkan login kembali');
        window.location = 'login.php'; </script>"; 
?>