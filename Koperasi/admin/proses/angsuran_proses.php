<?php
include'../../koneksi.php';
  $proses = $_GET['agung'];
  if($proses=='tambah'){
    $id_angsuran  = $_POST['id_angsuran'];
    $tgl_angsuran = $_POST['tgl_angsuran'];
    $id_pinjam    = $_POST['id_pinjam'];
    $id_anggota   = $_POST['id_anggota'];
    $ke           = $_POST['ke'];
    $nominal      = $_POST['nominal'];
    $query = $koneksi -> prepare("SELECT * FROM pinjaman WHERE id_pinjaman = '$id_pinjam'");
    $query -> execute(array($id_pinjam));
    $hsl = $query -> fetch();
    $metode = $hsl['lama'];

    if($ke < $metode){
    $tambah = $koneksi -> prepare("INSERT INTO angsuran(id_angsuran, tgl_angsuran, id_pinjaman, id_anggota, ke, nominal, status)VALUES(?,?,?,?,?,?,'belum lunas')");
    $tambah -> execute(array($id_angsuran, $tgl_angsuran, $id_pinjam, $id_anggota, $ke, $nominal));
  }elseif ($ke == $metode) {
    $tambah = $koneksi -> prepare("INSERT INTO angsuran(id_angsuran, tgl_angsuran, id_pinjaman, id_anggota, ke, nominal, status)VALUES(?,?,?,?,?,?,'lunas')");
    $tambah -> execute(array($id_angsuran, $tgl_angsuran, $id_pinjam, $id_anggota, $ke, $nominal));
  }elseif ($ke > $metode) {
    echo "<script>
					alert('Angsuran Anda Telah Lunas')
					window.location='../angsuran.php'
					</script>";
  }
    $insert = $tambah -> rowCount();

    if($insert>0){
    echo "<script>
					alert('tambah berhasil')
					window.location='../angsuran.php'
					</script>";
        }else {
    echo "<script>
      		alert('tambah gagal')
      		window.location='../angsuran.php'
      		</script>";
        }
  }

  if($proses=='edit'){
    $id_angsuran  = $_POST['id_angsuran'];
    $tgl_angsuran = $_POST['tgl_angsuran'];
    $id_pinjam    = $_POST['id_pinjam'];
    $id_anggota   = $_POST['id_anggota'];
    $ke           = $_POST['ke'];
    $nominal      = $_POST['nominal'];

    $query = $koneksi -> prepare("UPDATE angsuran SET tgl_angsuran = :2, id_pinjaman = :3, id_anggota = :4, ke = :5, nominal = :6 WHERE id_angsuran = :1");

    $query -> bindParam(':1', $id_angsuran);
    $query -> bindParam(':2', $tgl_angsuran);
    $query -> bindParam(':3', $id_pinjam);
    $query -> bindParam(':4', $id_anggota);
    $query -> bindParam(':5', $ke);
    $query -> bindParam(':6', $nominal);
    $query -> execute();

    $update = $query -> rowCount();

    if($update>0){
    echo "<script>
					alert('edit berhasil')
					window.location='../angsuran.php'
					</script>";
        }else {
    echo "<script>
      		alert('edit gagal')
      		window.location='../angsuran.php'
      		</script>";
        }
  }

  if($proses=='hapus'){
    $metode = $_GET['app'];
    $hapus = $koneksi -> prepare("DELETE FROM angsuran WHERE id_angsuran = :id");
    $hapus -> bindParam(':id',$metode);
    $hapus -> execute();
    $delete = $hapus -> fetch();

    $delete = $hapus -> rowCount();

    if($delete>0){
      echo
			'<script>
				alert("Hapus Berhasil");
				window.location = "../angsuran.php";
			</script>';
		}else{
			echo
			'<script>
				alert("Hapus Gagal");
				window.location = "../angsuran.php";
			</script>';
		}
    }
?>
