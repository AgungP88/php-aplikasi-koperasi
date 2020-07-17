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
                    <h1>Data Petugas</h1>
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
    $edit = $koneksi -> prepare("SELECT * FROM petugas WHERE id_petugas = :id");
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
                <h3 class="card-title">Edit Petugas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="proses/petugas_proses.php?agung=edit" method="post">
                <div class="card-body" align=center>
                  <div class="form-group row">
                    <label for="IdAnggota" class="col-sm-3 col-form-label">ID Petugas</label>
                    <div class="col-sm-7" aling=center>
                      <input type="text" class="form-control" name="id" readonly value="<?php echo $hasil['id_petugas']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required value="<?php echo $hasil['nama']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="jk">
                        <option value="<?php echo $hasil['jk']; ?>"><?php echo $hasil['jk']; ?></option>
                        <option>laki laki</option>
                        <option>perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required value="<?php echo $hasil['tempat_lahir']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" required value="<?php echo $hasil['tgl_lahir']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-7">
                      <textarea name="alamat" class="form-control" value=""><?php echo $hasil['alamat']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">No Handphone</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="no_hp" placeholder="No Handphone" required value="<?php echo $hasil['no_hp']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control" name="email" placeholder="Email" required  value="<?php echo $hasil['email']; ?>">
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
