<?php
include'../../koneksi.php';
  $proses = $_GET['agung'];
  if($proses=='tambah'){
    $id = $_POST['id_jenis'];
    $nama = $_POST['nama_simpanan'];
    $jumlah = $_POST['jumlah'];

    $tambah = $koneksi -> prepare("INSERT INTO jenis_simpanan(id_jenis_simpanan, nama_simpanan, jumlah) VALUES (?,?,?)");
    $tambah -> execute(array($id, $nama, $jumlah));
    $insert = $tambah -> rowCount();

    if($insert>0){
      echo "<script>
  					alert('tambah berhasil')
  					window.location='../jenis_simpanan.php'
  					</script>";
          }else {
      echo "<script>
        		alert('tambah gagal')
        		window.location='../jenis_simpanan.php'
        		</script>";
    }
  }

  if($proses=='edit'){
    $id = $_POST['id_jenis'];
    $nama = $_POST['nama_simpanan'];
    $jumlah = $_POST['jumlah'];

    $query = $koneksi -> prepare("UPDATE jenis_simpanan SET nama_simpanan = :2, jumlah = :3 WHERE id_jenis_simpanan = :1");

    $query -> bindParam(':1', $id);
    $query -> bindParam(':2', $nama);
    $query -> bindParam(':3', $jumlah);
    $query -> execute();

    $edit = $query -> rowCount();

    if($edit>0){
      echo "<script>
					alert('edit berhasil')
					window.location='../jenis_simpanan.php'
					</script>";
    }else {
      echo "<script>
					alert('edit gagal')
					window.locatin='../jenis_simpanan.php'\
					</script>";
    }
  }

  if($proses=='hapus'){
    $metode = $_GET['app'];
    $hapus = $koneksi -> prepare("DELETE FROM jenis_simpanan WHERE id_jenis_simpanan = :id");
    $hapus -> bindParam(':id',$metode);
    $hapus -> execute();
    $delete = $hapus -> fetch();

    $delete = $hapus -> rowCount();

    if($delete>0){
      echo
			'<script>
				alert("Hapus Berhasil");
				window.location = "../jenis_simpanan.php";
			</script>';
		}else{
			echo
			'<script>
				alert("Hapus Gagal");
				window.location = "../jenis_simpanan.php";
			</script>';
		}
    }
?>
