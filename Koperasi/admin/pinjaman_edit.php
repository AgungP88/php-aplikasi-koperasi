<?php
include'../koneksi.php';
include'../proteksi.php';
include('template/header.php');
?>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Data Pinjaman</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo $_SESSION['username']['id']; ?></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <?php
    $metode = $_GET['prabowo'];
    $edit = $koneksi -> prepare("SELECT * FROM pinjaman WHERE id_pinjaman = :id");
    $edit -> bindParam(':id', $metode);
    $edit -> execute();
    $hasil = $edit -> fetch();
    ?>
    <!-- Main content -->
    <section class="content">


            <!-- /.card -->
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tambah Peminjaman</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="proses/pinjaman_proses.php?agung=edit" method="post">
                <div class="card-body" align=center>
                  <div class="form-group row">
                    <label for="IdAnggota" class="col-sm-3 col-form-label">ID Peminjaman</label>
                    <div class="col-sm-7" aling=center>
                      <input type="text" class="form-control" name="id_pinjam" value="<?php echo $hasil['id_pinjaman']; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" name="tgl_pinjam" placeholder="Tanggal pinjam" required value="<?php echo $hasil['tgl_pinjaman']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Anggota</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="anggota">
                        <option value="<?php echo $hasil['id_anggota']; ?>"><?php echo $hasil['id_anggota']; ?></option>
                        <?php
                        $zxc = $koneksi -> prepare("SELECT * FROM anggota");
                        $zxc -> execute();
                        while($cat = $zxc -> fetch()){
                          ?>
                        <option value="<?php echo $cat['id_anggota']; ?>"><?php echo $cat['id_anggota']." - ".$cat['nama_lengkap']; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row hitung">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Pinjaman yang diajukan</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="jumlah" id="jumlah" onkeyup="sum()" placeholder="Jumlah" required value="<?php echo $hasil['jumlah']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Lama Angsuran (bulan)</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="lama" id="lama" onkeyup="sum()" placeholder="Lama Angsuran" required value="<?php echo $hasil['lama']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Bunga(%)</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="bunga" id="bunga" placeholder="Bunga" readonly value="<?php echo $hasil['bunga']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Total</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="total" id="total" placeholder="Total" readonly value="<?php echo $hasil['total']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Angsuran per Bulan</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="angsuran" id="angsuran" placeholder="Angsuran" readonly value="<?php echo $hasil['angsuran']; ?>">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Edit Data</button>
                  <button type="button" class="btn btn-default float-right" onclick="history.back(-1)">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
    </section>
    <script>
    function sum() {
          var jumlah = document.getElementById('jumlah').value;
          var lama = document.getElementById('lama').value;
          var hasil = (parseInt(lama)/12)*3;
          var result = (parseInt(jumlah) * parseFloat(hasil) / 100) + parseInt(jumlah);
          var angsuran = parseInt(result) / parseInt(lama);
          if (!isNaN(hasil)) {
             document.getElementById('bunga').value = hasil;
          }
          if (!isNaN(result)) {
             document.getElementById('total').value = result;
          }
          if (!isNaN(angsuran)) {
             document.getElementById('angsuran').value = angsuran;
          }
    }
    </script>
</div>
<?php
include('template/footer.php');
?>
