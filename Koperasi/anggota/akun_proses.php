<?php
include'../koneksi.php';
  $proses = $_GET['agung'];
  if($proses=='edit'){
    $id   = $_POST['id'];
    $nama = $_POST['nama'];
    $pw   = $_POST['pw'];
    $hak  = $_POST['hak'];

    $query = $koneksi -> prepare("UPDATE user SET nama = :2, password = :3, hak = :4 WHERE id = :1");

    $query -> bindParam(':1', $id);
    $query -> bindParam(':2', $nama);
    $query -> bindParam(':3', $pw);
    $query -> bindParam(':4', $hak);
    $query -> execute();

    $update = $query -> rowCount();

    if($update>0){
    echo "<script>
					alert('Edit berhasil')
					window.location='akun.php'
					</script>";
        }else {
    echo "<script>
      		alert('Edit gagal')
      		window.location='akun.php'
      		</script>";
        }
  }
?>
