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
          $sql = $koneksi -> prepare("SELECT max(id_pinjaman) as id FROM pinjaman");
          $sql -> execute();
          $hsl = $sql -> fetch();
          $kode = $hsl['id'];
          $nourut = (int) substr($kode, 3, 3);
          $nourut++;
          $char = "P";
          $new = $char . sprintf("%03s", $nourut);
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
              <form class="form-horizontal" action="proses/pinjaman_proses.php?agung=tambah" method="post">
                <div class="card-body" align=center>
                  <div class="form-group row">
                    <label for="IdAnggota" class="col-sm-3 col-form-label">ID Peminjaman</label>
                    <div class="col-sm-7" aling=center>
                      <input type="text" class="form-control" name="id_pinjam" readonly value="<?php echo $new; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" name="tgl_pinjam" placeholder="Tanggal pinjam" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Anggota</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="anggota">
                        <option></option>
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
                      <input type="text" class="form-control" name="jumlah" id="jumlah" onkeyup="sum()" placeholder="Jumlah" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Lama Angsuran (bulan)</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="lama" id="lama" onkeyup="sum()" placeholder="Lama Angsuran" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Bunga(%)</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="bunga" id="bunga" placeholder="Bunga" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Total</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="total" id="total" placeholder="Total" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Angsuran per Bulan</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="angsuran" id="angsuran" placeholder="Angsuran" readonly>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Tambah Data</button>
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
