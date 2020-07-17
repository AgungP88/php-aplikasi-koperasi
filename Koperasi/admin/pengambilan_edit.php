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
                    <h1>Data Pengambilan Simpanan</h1>
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
    $edit = $koneksi -> prepare("SELECT * FROM pengambilan WHERE id_pengambilan = :id");
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
                <h3 class="card-title">Edit Pengambilan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="proses/pengambilan_proses.php?agung=edit&ask=<?php echo $hasil['jumlah']; ?>" method="post">
                <div class="card-body" align=center>
                  <div class="form-group row">
                    <label for="IdAnggota" class="col-sm-3 col-form-label">ID Pengambilan</label>
                    <div class="col-sm-7" aling=center>
                      <input type="text" class="form-control" name="id_ambil" readonly value="<?php echo $hasil['id_pengambilan']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Tanggal Pengambilan</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" name="tgl_ambil" placeholder="Nama Pinjaman" required value="<?php echo $hasil['tgl_ambil']; ?>">
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
                  <div class="form-group row">
                    <label for="IdAnggota" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-7" aling=center>
                      <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Pengambilan" required value="<?php echo $hasil['jumlah']; ?>">
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
</div>
<?php
include('template/footer.php');
?>
