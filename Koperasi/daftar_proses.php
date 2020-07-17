<?php
include'koneksi.php';
  $proses = $_GET['agung'];
  if($proses=='tambah'){
    $id        = $_POST['id'];
    $nama      = $_POST['nama'];
    $nik       = $_POST['nik'];
    $jk        = $_POST['jk'];
    $tempat    = $_POST['tempat_lahir'];
    $tgl       = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];
    $agama     = $_POST['agama'];
    $no_hp     = $_POST['no_hp'];
    $email     = $_POST['email'];
    $pekerjaan = $_POST['pekerjaan'];

    $tambah = $koneksi -> prepare("INSERT INTO anggota(id_anggota, nama_lengkap, nik, jk, tempat_lahir, tgl_lahir, alamat, agama, no_hp, email, pekerjaan)
    VALUES(?,?,?,?,?,?,?,?,?,?,?)");
    $tambah -> execute(array($id, $nama, $nik, $jk, $tempat, $tgl, $alamat, $agama, $no_hp, $email, $pekerjaan));

    $tambah2 = $koneksi -> prepare("INSERT INTO user(id, nama, password, hak) VALUES (?,?,123,'anggota')");
    $tambah2 -> execute(array($id,$nama));

    $insert = $tambah -> rowCount();
    if($insert>0){
    echo "<script>
					alert('tambah berhasil')
					window.location='index.php'
					</script>";
        }else {
    echo "<script>
      		alert('tambah gagal')
      		window.location='index.php'
      		</script>";
        }
  }

  if($proses=='edit'){
    $id        = $_POST['id'];
    $nama      = $_POST['nama'];
    $nik       = $_POST['nik'];
    $jk        = $_POST['jk'];
    $tempat    = $_POST['tempat_lahir'];
    $tgl       = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];
    $agama     = $_POST['agama'];
    $no_hp     = $_POST['no_hp'];
    $email     = $_POST['email'];
    $pekerjaan = $_POST['pekerjaan'];

    $query = $koneksi -> prepare("UPDATE anggota SET nama_lengkap = :2, nik = :3, jk = :4, tempat_lahir = :5,
      tgl_lahir = :6, alamat = :7, agama = :8, no_hp = :9, email = :10, pekerjaan = :11 WHERE id_anggota = :1");
    $query2 = $koneksi -> prepare("UPDATE user SET nama = :2 WHERE id = :1");

    $query -> bindParam(':1',$id);
    $query -> bindParam(':2',$nama);
    $query -> bindParam(':3',$nik);
    $query -> bindParam(':4',$jk);
    $query -> bindParam(':5',$tempat);
    $query -> bindParam(':6',$tgl);
    $query -> bindParam(':7',$alamat);
    $query -> bindParam(':8',$agama);
    $query -> bindParam(':9',$no_hp);
    $query -> bindParam(':10',$email);
    $query -> bindParam(':11',$pekerjaan);
    $query2 -> bindParam(':1',$id);
    $query2 -> bindParam(':2',$nama);
    $query -> execute();
    $query2 -> execute();

    $edit = $query -> rowCount();

    if($edit>0){
      echo "<script>
					alert('edit berhasil')
					window.location='../anggota_admin.php'
					</script>";
    }else {
      echo "<script>
					alert('edit gagal')
					window.locatin='../anggota_admin.php'\
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

    echo "<script>
					alert('hapus berhasil')
					window.location='../anggota_admin.php'
					</script>";
  }
?>
