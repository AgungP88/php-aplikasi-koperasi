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
    <h3 align="center">LAPORAN DATA SIMPANAN ANGGOTA</h3>
    <br>
    <div class="container-fluid">
      <table class="table table-striped">
        <thead class="bg-warning">
          <tr>
            <th>ID Simpan</th>
            <th>Tanggal Simpan</th>
            <th>Anggota</th>
            <th>Jenis Simpanan</th>
            <th>Jumlah</th>
          </tr>
        </thead>
        <?php
        $asd = $koneksi -> prepare("SELECT * FROM simpanan ");
        $asd -> execute();
        while($data = $asd -> fetch()){
          $id = $data['id_anggota'];
          $id2 = $data['id_jenis'];
          $kat = $koneksi -> prepare("SELECT * FROM anggota WHERE id_anggota = :id");
          $kat2 = $koneksi -> prepare("SELECT * FROM jenis_simpanan WHERE id_jenis_simpanan = :id2");
          $kat -> bindParam(':id', $id);
          $kat2 -> bindParam(':id2', $id2);
          $kat -> execute();
          $kat2 -> execute();
          $hasil = $kat -> fetch();
          $hasil2 = $kat2 -> fetch();
        ?>
        <tbody>
          <tr>
            <td><?php echo $data['id_simpanan']; ?></td>
            <td><?php echo $data['tgl_simpan']; ?></td>
            <td><?php echo $data['id_anggota']." - ".$hasil['nama_lengkap']; ?></td>
            <td><?php echo $hasil2['nama_simpanan']; ?></td>
            <td><?php echo "Rp.".number_format($data['jumlah'],2,",","."); ?></td>
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
