<?php
include "class.php";
$class = new kelas();

if ($_GET['m'] == "input"){
	if (isset($_POST['simpan'])){
		$data = array(
						$nim 			= $_POST['nim'] ,
						$nama 			= $_POST['nama_mhs'] ,
						$jurusan 		= $_POST['id_jurusan'] ,
						$jeniskelamin 	= $_POST['jenis_kelamin'] ,
						$alamat 		= $_POST['alamat_mhs'] ,
						$nohp 			= $_POST['nohp_mhs'] ,
						$email 			= $_POST['email_mhs'],
						$wali 			= $_POST['nidn'],

						$foto 			= $_FILES['foto'],
					);
						// memisahkan
						$split        = explode('.', $_FILES ['foto']['name']);

						// mengambil extensinya
						$extensi      = $split[count($split)-1];
						// var_dump($extensi);
						// die();

						// menyatukan nim dan extensi 
						$foto         = $nim . '.' .$extensi;

						// darimana asal file tersebut 
						$tempfiles = $_FILES['foto']['tmp_name'];

						// tempat menyimapn file
						$dir = "foto/";

						// untuk memindahkan file ke folder 
						move_uploaded_file($tempfiles, $dir.$foto);

		// var_dump($data);
		// var_dump($foto);
		// echo $foto;
		// die();

		$berhasil = $class->tambah_data_mahasiswa($data);
		if($berhasil){
			echo "<script>alert('Data Berhasil Disimpan');window.location = 'tabel.php'</script>";
		}else{
			echo "Gagal insert!";
		}
	}
}else if($_GET['nim']){

		if(isset($_GET['nim'])){
			$nim = $_GET['nim'];
			$data = $class->tampil_edit_mahasiswa($nim);
		}

		unlink("foto/" . $data['foto']);

		$class->hapus_data_mahasiswa($nim);
		if ($class) {
			echo "<script>alert('Data Berhasil Dihapus');window.location = 'tabel.php'</script>";
		}else{
			echo "gagal";
		}
}else if ($_GET['m'] == "ubah"){
			if (isset($_POST['ubah'])){
				$data = array(
					$nim 			= $_POST['nim'] ,
					$nama 			= $_POST['nama_mhs'] ,
					$jurusan 		= $_POST['jurusan'] ,
					$jeniskelamin 	= $_POST['jenis_kelamin'] ,
					$alamat 		= $_POST['alamat_mhs'] ,
					$nohp 			= $_POST['nohp_mhs'] ,
					$email 			= $_POST['email_mhs'],
					$wali 			= $_POST['wali'],

					$foto 			= $_FILES['foto'],
				);

				if(isset($_GET['nim'])){
					$nim = $_GET['nim'];
					$result = $class->tampil_edit_mahasiswa($nim);
					$result2 = $class->tampil_edit_mahasiswa($foto);
				}

				if ($_FILES['foto']['name'] == "") {
					$foto = $result['foto'];
				}else{
					$split        = explode('.', $_FILES ['foto']['name']);
					$extensi      = $split[count($split)-1];
					$foto         = $nim . '.' .$extensi;

					unlink("foto/" . $result['foto']);

					move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$foto);
				}

				// var_dump($data);
				// var_dump($foto);
				// var_dump ($result);
				// die();

				$berhasil = $class->ubah_data_mahasiswa($data);
				if($berhasil){
					echo "<script>alert('Data Berhasil diubah');window.location = 'tabel.php'</script>";
				}else{
					echo "Gagal ubah!";
				}
		}
}


// JURUSAN
if ($_GET['j'] == "input"){
	if (isset($_POST['simpan'])){
		$data = array(
			// 'id_jurusan'   => $_POST['id_jurusan'],
			// 'nama_jurusan' => $_POST['nama_jurusan'],

			$id   	= $_POST['id_jurusan'],
			$nama 	= $_POST['nama_jurusan'],
			);

			// echo $id; 
			// echo $nama; 
			// var_dump($data);
			// die(); 

		$berhasil = $class->tambah_data_jurusan($data);
		if($berhasil){
			echo "<script>alert('Data Berhasil Disimpan');window.location = 'jurusan.php'</script>";
		}else{
			echo "Gagal insert!";
		}
	}
}else if(isset($_GET['id_jurusan'])){
			$id = $_GET['id_jurusan'];
			$class->hapus_data_jurusan($id);
			if ($class) {
				echo "berhasil";
				echo "<script>alert('Data Berhasil Dihapus');window.location = 'jurusan.php'</script>";
			}else{
				echo "data gagal di hapus";
			}
}else if ($_GET['j'] == "update"){
		if (isset($_POST['update'])){
			$data = array(
						'id_jurusan'   => $_POST['id_jurusan'] ,
						'nama_jurusan' => $_POST['nama_jurusan'] ,
						);
			$berhasil = $class->ubah_data_jurusan($data);
			if($berhasil){
				echo "<script>alert('Data Berhasil diubah');window.location = 'jurusan.php'</script>";
			}else{
				echo "Gagal ubah!";
			}
		}
}

// DOSEN
if ($_GET['d'] == "input"){
	if (isset($_POST['simpan'])){
		$data = array(
						$nidn 			= $_POST['nidn'] ,
						$nama 			= $_POST['nama'] ,
						$pendidikan 	= $_POST['pendidikan'] ,
						$tgl_lahir	 	= $_POST['tgl_lahir'] ,
						$gender 		= $_POST['gender'] ,
						$alamat			= $_POST['alamat'], 
						$nohp 			= $_POST['no_hp'] ,
						$email 			= $_POST['email'],

						$foto_dosen 	= $_FILES['foto_dosen'],
					);

						$split        = explode('.', $_FILES ['foto_dosen']['name']);

						$extensi      = $split[count($split)-1]; 
						$foto_dosen  = $nidn . '.' .$extensi; 

						$tempfiles = $_FILES['foto_dosen']['tmp_name'];
						// tempat menyimapn file
						$dir = "foto_dosen/";

						move_uploaded_file($tempfiles, $dir.$foto_dosen);

		// var_dump($data);
		// var_dump($foto_dosen); 
		// die();

		$berhasil = $class->tambah_data_dosen($data);
		if($berhasil){
			echo "<script>alert('Data Berhasil Disimpan');window.location = 'dosen.php'</script>";
		}else{
			echo "Gagal insert!";
		}
	}
}else if($_GET['nidn']){

	if(isset($_GET['nidn'])){
		$nidn = $_GET['nidn'];
		$data = $class->tampil_edit_dosen($nidn);
	}

	unlink("foto_dosen/" . $data['foto_dosen']);

	$class->hapus_data_dosen($nidn);
	if ($class) {
		echo "<script>alert('Data Berhasil Dihapus');window.location = 'dosen.php'</script>";
	}else{
		echo "gagal";
	}
}else if ($_GET['d'] == "ubah"){
	if (isset($_POST['ganti'])){
		$data = array(
						$nidn 			= $_POST['nidn'] ,
						$nama 			= $_POST['nama'] ,
						$pendidikan 	= $_POST['pendidikan'] ,
						$tgl_lahir	 	= $_POST['tgl_lahir'] ,
						$gender 		= $_POST['gender'] ,
						$alamat			= $_POST['alamat'], 
						$nohp 			= $_POST['no_hp'] ,
						$email 			= $_POST['email'],

						$foto_dosen 	= $_FILES['foto_dosen'],
					);

						// if(isset($_GET['nidn'])){
						// 	$nidn = $_GET['nidn'];
						// 	$data = $class->tampil_edit_dosen($nidn);
						// }

						// $split        = explode('.', $_FILES ['foto_dosen']['name']); 
						// $extensi      = $split[count($split)-1]; 
						// $foto_dosen  = $nidn . '.' .$extensi; 

						// $tempfiles = $_FILES['foto_dosen']['tmp_name'];
						// // tempat menyimapn file
						// $dir = "foto_dosen/";

						// move_uploaded_file($tempfiles, $dir.$foto_dosen);

						if(isset($_GET['nidn'])){
							$nidn = $_GET['nidn'];
							$data = $class->tampil_edit_dosen($nidn);
						}
		
						if ($_FILES['foto_dosen']['name'] == "") {
							$foto_dosen = $data['foto_dosen'];
						}else{
							$split        = explode('.', $_FILES ['foto_dosen']['name']);
							$extensi      = $split[count($split)-1];
							$foto_dosen   = $nidn . '.' .$extensi;
		
							unlink("foto_dosen/" . $data['foto_dosen']); 
							move_uploaded_file($_FILES['foto_dosen']['tmp_name'], "foto_dosen/".$foto_dosen);
						}
		// var_dump($data);
		// var_dump($foto_dosen); 
		// die();

		$berhasil = $class->ubah_data_dosen($data); 
		if($berhasil){
			echo "<script>alert('Data Berhasil Disimpan');window.location = 'dosen.php'</script>";
		}else{
			echo "Gagal insert!";
		}
	}
}

if ($_GET['i'] == "input"){
	if (isset($_POST['simpan'])){
		$data = array(
			$id_ips  	= $_POST['kode_ips'],
			$nim 		= $_POST['nimm'],
			$jumlah_ips = $_POST['jumla_ips'], 
			$semester 	= $_POST['semester'], 
			$sks 		= $_POST['sks'], 
			);

			// echo $id_ips;
			// echo $nama;
			// var_dump($data);
			// die();

		$berhasil = $class->tambah_data_IPS($data);
		if($berhasil){
			echo "<script>alert('Data Berhasil Disimpan');window.location = 'ips.php'</script>";
		}else{
			echo "Gagal insert!";
		}
	}
}else if ($_GET['i'] == "update"){
	if (isset($_POST['update'])){
		$data = array(
						$id_ips  	= $_POST['kode_ips'],
						$nim 		= $_POST['nimm'],
						$jumlah_ips = $_POST['jumla_ips'], 
						$semester 	= $_POST['semester'], 
						$sks 		= $_POST['sks'],
					);
			
			// echo $id_ips;
			// echo $nama;
			// var_dump($data);
			// die();
			
		$berhasil = $class->ubah_data_IPS($data); 
		if($berhasil){
			echo "<script>alert('Data Berhasil diubah');window.location = 'ips.php'</script>";
		}else{
			echo "Gagal ubah!";
		}
	}
}else if(isset($_GET['kode_ips'])){
	$kode_ips = $_GET['kode_ips'];
	$class->hapus_data_ips($kode_ips);
	if ($class) {
		echo "berhasil";
		echo "<script>alert('Data Berhasil Dihapus');window.location = 'ips.php'</script>";
	}else{
		echo "data gagal di hapus";
	}
}
?>