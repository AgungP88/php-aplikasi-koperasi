<?php
include'../../koneksi.php';
  $proses = $_GET['agung'];
  if($proses=='tambah'){
    $id_ambil   = $_POST['id_ambil'];
    $tgl_ambil  = $_POST['tgl_ambil'];
    $anggota    = $_POST['anggota'];
    $jumlah     = $_POST['jumlah'];

    $sql = $koneksi -> prepare("SELECT * FROM anggota WHERE id_anggota = '$anggota'");
    $sql -> execute(array($anggota));
    $hsl = $sql -> fetch();
    $metode = $hsl['saldo'];
    $hasil = $metode - $jumlah;
    if($metode<$jumlah){
      echo "<script>
  					alert('Pengambilan Gagal Karena saldo anda kurang')
  					window.location='../pengambilan.php'
  					</script>";
    }else{
    $tambah = $koneksi -> prepare("INSERT INTO pengambilan(id_pengambilan, tgl_ambil, id_anggota, jumlah) VALUES(?,?,?,?)");
    $tambah -> execute(array($id_ambil, $tgl_ambil, $anggota, $jumlah));

    $ubah = $koneksi -> prepare("UPDATE anggota SET saldo = :2 WHERE id_anggota = :1");
    $ubah -> bindParam(':1', $anggota);
    $ubah -> bindParam(':2', $hasil);
    $ubah -> execute();
    }
    $insert = $tambah -> rowCount();

    if($insert>0){
      echo "<script>
  					alert('tambah berhasil')
  					window.location='../pengambilan.php'
  					</script>";
          }else {
      echo "<script>
        		alert('tambah gagal')
        		window.location='../pengambilan.php'
        		</script>";
    }
  }

  if($proses=='edit'){
    $ask = $_GET['ask'];
    $id_ambil   = $_POST['id_ambil'];
    $tgl_ambil  = $_POST['tgl_ambil'];
    $anggota    = $_POST['anggota'];
    $jumlah     = $_POST['jumlah'];

    $sql = $koneksi -> prepare("SELECT * FROM anggota WHERE id_anggota = '$anggota'");
    $sql -> execute(array($anggota));
    $hsl = $sql -> fetch();
    $metode = $hsl['saldo'];
    $hasil = $metode + $ask - $jumlah;

    $query = $koneksi -> prepare("UPDATE pengambilan SET tgl_ambil = :2, id_anggota = :3, jumlah = :4 WHERE id_pengambilan = :1");
    $query -> bindParam(':1', $id_ambil);
    $query -> bindParam(':2', $tgl_ambil);
    $query -> bindParam(':3', $anggota);
    $query -> bindParam(':4', $jumlah);
    $query -> execute();

    $ubah = $koneksi -> prepare("UPDATE anggota SET saldo = :2 WHERE id_anggota = :1");
    $ubah -> bindParam(':1', $anggota);
    $ubah -> bindParam(':2', $hasil);
    $ubah -> execute();

    $update = $query -> rowCount();

    if($update>0){
      echo "<script>
  					alert('edit berhasil')
  					window.location='../pengambilan.php'
  					</script>";
          }else {
      echo "<script>
        		alert('edit gagal')
        		window.location='../pengambilan.php'
        		</script>";
    }
  }

  if($proses=='hapus'){
    $metode = $_GET['app'];
    $ask = $_GET['ask'];
    $query = $koneksi -> prepare("SELECT * FROM pengambilan WHERE id_pengambilan = :id");
    $query -> bindParam(':id',$metode);
    $query -> execute();
    $cek = $query -> fetch();
    $jumlah = $cek['jumlah'];
    $sql = $koneksi -> prepare("SELECT * FROM anggota WHERE id_anggota = '$ask'");
    $sql -> execute(array($ask));
    $hsl = $sql -> fetch();
    $metode2 = $hsl['saldo'];
    $hasil = $metode2 + $jumlah;

    $ubah = $koneksi -> prepare("UPDATE anggota SET saldo = :2 WHERE id_anggota = :1");
    $ubah -> bindParam(':1', $ask);
    $ubah -> bindParam(':2', $hasil);
    $ubah -> execute();

    $hapus = $koneksi -> prepare("DELETE FROM pengambilan WHERE id_pengambilan = :id");
    $hapus -> bindParam(':id',$metode);
    $hapus -> execute();
    $delete = $hapus -> fetch();

    $delete = $hapus -> rowCount();

    if($delete>0){
      echo "<script>
  					alert('hapus berhasil')
  					window.location='../pengambilan.php'
  					</script>";
          }else {
      echo "<script>
        		alert('hapus gagal')
        		window.location='../pengambilan.php'
        		</script>";
    }
  }
?>
