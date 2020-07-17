<?php
include'../../koneksi.php';
  $proses = $_GET['agung'];
  if($proses=='tambah'){
    $id_simpan  = $_POST['id_simpan'];
    $tgl_simpan = $_POST['tgl_simpan'];
    $anggota    = $_POST['anggota'];
    $js         = $_POST['js'];
    $jumlah     = $_POST['jumlah'];
    $sql = $koneksi -> prepare("SELECT * FROM anggota WHERE id_anggota = '$anggota'");
    $sql -> execute(array($anggota));
    $hsl = $sql -> fetch();
    $metode = $hsl['saldo'];
    $hasil = $metode + $jumlah;
    if($js=='JS3'){
    $tambah = $koneksi -> prepare("INSERT INTO simpanan(id_simpanan, tgl_simpan, id_anggota, id_jenis, jumlah)VALUES(?,?,?,?,?)");
    $tambah -> execute(array($id_simpan, $tgl_simpan, $anggota, $js, $jumlah));

    $ubah = $koneksi -> prepare("UPDATE anggota SET saldo = :2 WHERE id_anggota = :1");
    $ubah -> bindParam(':1', $anggota);
    $ubah -> bindParam(':2', $hasil);
    $ubah -> execute();
    }else{
    $tambah = $koneksi -> prepare("INSERT INTO simpanan(id_simpanan, tgl_simpan, id_anggota, id_jenis, jumlah)VALUES(?,?,?,?,?)");
    $tambah -> execute(array($id_simpan, $tgl_simpan, $anggota, $js, $jumlah));
  }
    $insert = $tambah -> rowCount();

    if($insert>0){
      echo "<script>
  					alert('tambah berhasil')
  					window.location='../simpanan.php'
  					</script>";
          }else {
      echo "<script>
        		alert('tambah gagal')
        		window.location='../simpanan.php'
        		</script>";
    }
  }

  if($proses=='edit'){
    $ask = $_GET['ask'];
    $id_simpan  = $_POST['id_simpan'];
    $tgl_simpan = $_POST['tgl_simpan'];
    $anggota    = $_POST['anggota'];
    $jenis      = $_POST['jenis'];
    $jumlah     = $_POST['jumlah'];
    $sql = $koneksi -> prepare("SELECT * FROM anggota WHERE id_anggota = '$anggota'");
    $sql -> execute(array($anggota));
    $hsl = $sql -> fetch();
    $metode = $hsl['saldo'];
    $hasil = $metode - $ask + $jumlah;
    if($jenis=='JS3'){
      $query = $koneksi -> prepare("UPDATE simpanan SET tgl_simpan = :2 , id_anggota = :3 , id_jenis = :4 , jumlah = :5 WHERE id_simpanan = :1");
      $query -> bindParam(':1',$id_simpan);
  		$query -> bindParam(':2',$tgl_simpan);
  		$query -> bindParam(':3',$anggota);
  		$query -> bindParam(':4',$jenis);
  		$query -> bindParam(':5',$jumlah);
  		$query -> execute();

      $ubah = $koneksi -> prepare("UPDATE anggota SET saldo = :2 WHERE id_anggota = :1");
      $ubah -> bindParam(':1', $anggota);
      $ubah -> bindParam(':2', $hasil);
      $ubah -> execute();
    }else{
      $query = $koneksi -> prepare("UPDATE simpanan SET tgl_simpan = :2 , id_anggota = :3 , id_jenis = :4 , jumlah = :5 WHERE id_simpanan = :1");
      $query -> bindParam(':1',$id_simpan);
  		$query -> bindParam(':2',$tgl_simpan);
  		$query -> bindParam(':3',$anggota);
  		$query -> bindParam(':4',$jenis);
  		$query -> bindParam(':5',$jumlah);
  		$query -> execute();
    }
    $update = $query -> rowCount();

		if($update > 0){
			echo
			'<script>
				alert("Edit Berhasil");
				window.location ="../simpanan.php"
			</script>';

		}else{
			echo
			'<script>
				alert("Edit Gagal");
				window.location ="../simpanan.php"
			</script>';

		}
  }

  if($proses=='hapus'){
    $metode = $_GET['app'];
    $ask = $_GET['ask'];
    $query = $koneksi -> prepare("SELECT * FROM simpanan WHERE id_simpanan = :id");
    $query -> bindParam(':id',$metode);
    $query -> execute();
    $cek = $query -> fetch();
    $jumlah = $cek['jumlah'];
    $js = $cek['id_jenis'];
    $sql = $koneksi -> prepare("SELECT * FROM anggota WHERE id_anggota = '$ask'");
    $sql -> execute(array($ask));
    $hsl = $sql -> fetch();
    $metode2 = $hsl['saldo'];
    $hasil = $metode2 - $jumlah;
    if($js=='JS3'){
      $ubah = $koneksi -> prepare("UPDATE anggota SET saldo = :2 WHERE id_anggota = :1");
      $ubah -> bindParam(':1', $ask);
      $ubah -> bindParam(':2', $hasil);
      $ubah -> execute();

      $hapus = $koneksi -> prepare("DELETE FROM simpanan WHERE id_simpanan = :id");
      $hapus -> bindParam(':id',$metode);
      $hapus -> execute();
      $delete = $hapus -> fetch();
    }else{
    $hapus = $koneksi -> prepare("DELETE FROM simpanan WHERE id_simpanan = :id");
    $hapus -> bindParam(':id',$metode);
    $hapus -> execute();
    $delete = $hapus -> fetch();
    }
    $delete = $hapus -> rowCount();

    if($delete>0){
      echo
      '<script>
        alert("Hapus Berhasil");
        window.location = "../simpanan.php";
      </script>';
    }else{
      echo
      '<script>
        alert("Hapus Gagal");
        window.location = "../simpanan.php";
      </script>';
    }
    }
?>
