<?php
include'../../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Print</title>
    <link rel="stylesheet" type="text/css" href="../../assets/dist/css/bootstrap.css">
  </head>
  <body>
    <h3 align="center">LAPORAN DATA PINJAMAN ANGGOTA</h3>
    <br>
    <div class="container-fluid">
      <table class="table table-striped">
        <thead class="bg-warning">
          <tr>
            <th>ID Pinjaman</th>
            <th>Tanggal Pinjam</th>
            <th>Anggota</th>
            <th>Jumlah</th>
            <th>Lama</th>
            <th>Bunga</th>
            <th>Angsuran</th>
          </tr>
        </thead>
        <?php
        $asd = $koneksi -> prepare("SELECT * FROM pinjaman ");
        $asd -> execute();
        while($data = $asd -> fetch()){
          $id = $data['id_anggota'];
          $kat = $koneksi -> prepare("SELECT * FROM anggota WHERE id_anggota = :id");
          $kat -> bindParam(':id', $id);
          $kat -> execute();
          $hasil = $kat -> fetch();
        ?>
        <tbody>
          <tr>
            <td><?php echo $data['id_pinjaman']; ?></td>
            <td><?php echo $data['tgl_pinjaman']; ?></td>
            <td><?php echo $data['id_anggota']." - ".$hasil['nama_lengkap']; ?></td>
            <td><?php echo "Rp.".number_format($data['jumlah'],2,",","."); ?></td>
            <td><?php echo $data['lama']; ?></td>
            <td><?php echo $data['bunga']; ?></td>
            <td><?php echo "Rp.".number_format($data['angsuran'],2,",","."); ?></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
    </div>
    <script>
		window.print();
	</script>
  </body>
</html>
