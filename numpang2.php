<?php
	$query = mysqli_query($this->conn, "INSERT INTO mahasiswa VALUES( '".$GLOBALS['nim']."', '".$GLOBALS['nama']."', '".$GLOBALS['jurusan']."', '".$GLOBALS['jeniskelamin']."', '".$GLOBALS['alamat']."', '".$GLOBALS['nohp']."', '".$GLOBALS['email']."', '".$GLOBALS['wali']."', '".$GLOBALS['foto']."')") or die(mysqli_error($this->conn));
?>