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
                    <h1>Data Jenis Simpanan</h1>
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
          $sql = $koneksi -> prepare("SELECT max(id_jenis_simpanan) as id FROM jenis_simpanan");
          $sql -> execute();
          $hsl = $sql -> fetch();
          $kode = $hsl['id'];
          $nourut = (int) substr($kode, 2, 2);
          $nourut++;
          $char = "JS";
          $new = $char . sprintf("%01s", $nourut);
         ?>
    <!-- Main content -->
    <section class="content">


            <!-- /.card -->
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tambah Jenis Simpanan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="proses/jenis_simpanan_proses.php?agung=tambah" method="post">
                <div class="card-body" align=center>
                  <div class="form-group row">
                    <label for="IdAnggota" class="col-sm-3 col-form-label">ID Jenis Simpanan</label>
                    <div class="col-sm-7" aling=center>
                      <input type="text" class="form-control" name="id_jenis" readonly value="<?php echo $new; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Nama Simpanan</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="nama_simpanan" placeholder="Nama Pinjaman" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="jumlah" placeholder="Jumlah" required>
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

</div>
<?php
include('template/footer.php');
?>
