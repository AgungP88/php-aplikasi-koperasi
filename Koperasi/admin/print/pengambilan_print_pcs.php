<?php
include'../../koneksi.php';

$metode = $_GET['prabowo'];
$edit = $koneksi -> prepare("SELECT * FROM pengambilan WHERE id_pengambilan = :id");
$edit -> bindParam(':id', $metode);
$edit -> execute();
$hasil = $edit -> fetch();
$metode2 = $hasil['id_anggota'];
$edit2 = $koneksi -> prepare("SELECT * FROM anggota WHERE id_anggota = :id");
$edit2 -> bindParam(':id', $metode2);
$edit2 -> execute();
$hasil2 = $edit2 -> fetch();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Print</title>
    <link rel="stylesheet" type="text/css" href="../../assets/dist/css/bootstrap.css">
  </head>
  <body>
    <img src="../../assets/dist/img/8.jpg" alt="" width="150px" height="150px" style="float:left;">
    <div class="float-right">To : </div><br>
    <div class="float-right"><?php echo $hasil2['nama_lengkap'] ?></div><br>
    <div class="float-right">No Hp : <?php echo $hasil2['no_hp'] ?></div><br>
    <div class="float-right">NIK : <?php echo $hasil2['nik'] ?></div><br>
    <div class="float-right">Email : <?php echo $hasil2['email'] ?></div><br><br><br><br>
    Tanggal Pengajuan : <?php echo $hasil['tgl_ambil']; ?><br>
    Tanggal Print : <?php echo date('Y-m-d'); ?><br><br>
    <b>No Pinjaman : # <?php echo $hasil['id_pengambilan']; ?></b><br>
    <b>No Anggota : # <?php echo $hasil['id_anggota']; ?></b><br><br><br>
    <div class="container-fluid">
    <table class="table" border="1">
      <thead>
        <tr>
          <th>ID Pengambilan</th>
          <th>Nama</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $hasil['id_pengambilan']; ?></td>
          <td><?php echo $hasil2['nama_lengkap']; ?> </td>
          <td><?php echo "Rp.".number_format($hasil['jumlah'],2,",","."); ?></td>
        </tr>
      </tbody>
    </table>
  </div><br><br>
  <div class="float-right">No Pengambilan : <?php echo $hasil['id_pengambilan']; ?></div><br>
  <div class="float-right">Jumlah Terima : <?php echo "Rp.".number_format($hasil['jumlah'],2,",","."); ?></div>
  <br><br><br>
  <b>Note : </b>
    <script>
		window.print();
	</script>
  </body>
</html>
