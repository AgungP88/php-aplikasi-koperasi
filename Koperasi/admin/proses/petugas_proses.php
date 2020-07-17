<?php
include'../../koneksi.php';
  $proses = $_GET['agung'];
  if($proses=='tambah'){
    $id     = $_POST['id'];
    $nama   = $_POST['nama'];
    $jk     = $_POST['jk'];
    $tempat = $_POST['tempat_lahir'];
    $tgl    = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];
    $email  = $_POST['email'];

    $tambah = $koneksi -> prepare("INSERT INTO petugas(id_petugas, nama, jk, email, no_hp, tempat_lahir, tgl_lahir, alamat) VALUES (?,?,?,?,?,?,?,?)");
    $tambah -> execute(array($id, $nama, $jk, $email, $no_hp, $tempat, $tgl, $alamat));

    $tambah2 = $koneksi -> prepare("INSERT INTO user(id, nama, password, hak) VALUES (?,?,123,'petugas')");
    $tambah2 -> execute(array($id,$nama));

    $insert = $tambah -> rowCount();
    if($insert>0){
    echo "<script>
					alert('tambah berhasil')
					window.location='../petugas.php'
					</script>";
        }else {
    echo "<script>
      		alert('tambah gagal')
      		window.location='../petugas.php'
      		</script>";
        }
  }

  if($proses=='edit'){
    $id     = $_POST['id'];
    $nama   = $_POST['nama'];
    $jk     = $_POST['jk'];
    $tempat = $_POST['tempat_lahir'];
    $tgl    = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];
    $email  = $_POST['email'];

    $query = $koneksi -> prepare("UPDATE petugas SET nama = :2, jk = :3, email = :4, no_hp = :5, tempat_lahir = :6, tgl_lahir = :7, alamat = :8 WHERE id_petugas = :1");
    $query2 = $koneksi -> prepare("UPDATE user SET nama = :2 WHERE id = :1");

    $query -> bindParam(':1', $id);
    $query -> bindParam(':2', $nama);
    $query -> bindParam(':3', $jk);
    $query -> bindParam(':4', $email);
    $query -> bindParam(':5', $no_hp);
    $query -> bindParam(':6', $tempat);
    $query -> bindParam(':7', $tgl);
    $query -> bindParam(':8', $alamat);
    $query2 -> bindParam(':1', $id);
    $query2 -> bindParam(':2', $nama);
    $query -> execute();
    $query2 -> execute();

    $edit = $query -> rowCount();

    if($edit>0){
    echo "<script>
					alert('edit berhasil')
					window.location='../petugas.php'
					</script>";
        }else {
    echo "<script>
      		alert('edit gagal')
      		window.location='../petugas.php'
      		</script>";
        }
  }

  if($proses=='hapus'){
    $metode = $_GET['app'];
    $hapus = $koneksi -> prepare("DELETE FROM anggota WHERE id_anggota = :id");
    $hapus -> bindParam(':id',$metode);
    $hapus -> execute();
    $delete = $hapus -> fetch();

    $hapus2 = $koneksi -> prepare("DELETE FROM user WHERE id = :id");
    $hapus2 -> bindParam(':id',$metode);
    $hapus2 -> execute();
    $delete2 = $hapus2 -> fetch();

    $delete = $hapus -> rowCount()

    if($delete>0){
    echo "<script>
					alert('hapus berhasil')
					window.location='../petugas.php'
					</script>";
        }else {
    echo "<script>
      		alert('hapus gagal')
      		window.location='../petugas.php'
      		</script>";
        }
  }
?>
