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
    <h3 align="center">LAPORAN DATA ANGSURAN ANGGOTA</h3>
    <br>
    <div class="container-fluid">
      <table class="table table-striped">
        <thead class="bg-warning">
          <tr>
            <th>ID Angsuran</th>
            <th>Tanggal angsuran</th>
            <th>ID Pinjaman</th>
            <th>Anggota</th>
            <th>Ke</th>
            <th>Nominal</th>
            <th>Status</th>
          </tr>
        </thead>
        <?php
        $asd = $koneksi -> prepare("SELECT * FROM angsuran ");
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
            <td><?php echo $data['id_angsuran']; ?></td>
            <td><?php echo $data['tgl_angsuran']; ?></td>
            <td><?php echo $data['id_pinjaman']; ?></td>
            <td><?php echo $data['id_anggota']." - ".$hasil['nama_lengkap']; ?></td>
            <td><?php echo $data['ke']; ?></td>
            <td><?php echo "Rp.".number_format($data['nominal'],2,",","."); ?></td>
            <td><?php echo $data['status']; ?></td>
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
