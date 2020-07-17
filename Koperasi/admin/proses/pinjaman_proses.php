<?php
include'../../koneksi.php';
  $proses = $_GET['agung'];
  if($proses=='tambah'){
    $id_pinjam = $_POST['id_pinjam'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $anggota = $_POST['anggota'];
    $jumlah = $_POST['jumlah'];
    $lama = $_POST['lama'];
    $bunga = $_POST['bunga'];
    $total = $_POST['total'];
    $angsuran = $_POST['angsuran'];

    $tambah = $koneksi -> prepare("INSERT INTO pinjaman(id_pinjaman, tgl_pinjaman, id_anggota, jumlah, lama, bunga, total, angsuran )VALUES(?,?,?,?,?,?,?,?)");
    $tambah -> execute(array($id_pinjam, $tgl_pinjam, $anggota, $jumlah, $lama, $bunga, $total, $angsuran));
    $insert = $tambah -> rowCount();

    if($insert>0){
      echo "<script>
  					alert('tambah berhasil')
  					window.location='../pinjaman.php'
  					</script>";
          }else {
      echo "<script>
        		alert('tambah gagal')
        		window.location='../pinjaman.php'
        		</script>";
    }
  }

  if($proses=='edit'){
    $id_pinjam = $_POST['id_pinjam'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $anggota = $_POST['anggota'];
    $jumlah = $_POST['jumlah'];
    $lama = $_POST['lama'];
    $bunga = $_POST['bunga'];
    $total = $_POST['total'];
    $angsuran = $_POST['angsuran'];

    $query = $koneksi -> prepare("UPDATE pinjaman SET tgl_pinjaman = :2, id_anggota = :3, jumlah = :4, lama = :5, bunga = :6, total = :7, angsuran = :8 WHERE id_pinjaman = :1");

    $query -> bindParam(':1', $id_pinjam);
    $query -> bindParam(':2', $tgl_pinjam);
    $query -> bindParam(':3', $anggota);
    $query -> bindParam(':4', $jumlah);
    $query -> bindParam(':5', $lama);
    $query -> bindParam(':6', $bunga);
    $query -> bindParam(':7', $total);
    $query -> bindParam(':8', $angsuran);
    $query -> execute();

    $update = $query -> rowCount();

    if($update > 0){
			echo
			'<script>
				alert("Edit Berhasil");
				window.location ="../pinjaman.php"
			</script>';

		}else{
			echo
			'<script>
				alert("Edit Gagal");
				window.location ="../pinjaman.php"
			</script>';

		}
  }

  if($proses=='hapus'){
    $metode = $_GET['app'];
    $hapus = $koneksi -> prepare("DELETE FROM pinjaman WHERE id_pinjaman = :id");
    $hapus -> bindParam(':id',$metode);
    $hapus -> execute();
    $delete = $hapus -> fetch();

    $delete = $hapus -> rowCount();

    if($delete>0){
      echo
      '<script>
        alert("Hapus Berhasil");
        window.location = "../pinjaman.php";
      </script>';
    }else{
      echo
      '<script>
        alert("Hapus Gagal");
        window.location = "../pinjaman.php";
      </script>';
    }
    }
?>
