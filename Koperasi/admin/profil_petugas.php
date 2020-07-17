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
                    <h1>Profil</h1>
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

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
            <!-- Isi Content Disini -->
            <?php
            $metode = $_SESSION['username']['id'];
            $edit = $koneksi -> prepare("SELECT * FROM petugas WHERE id_petugas = :id");
            $edit -> bindParam(':id', $metode);
            $edit -> execute();
            $hasil = $edit -> fetch();
                 ?>
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <h3 class="profile-username text-center"><?php echo $_SESSION['username']['nama']; ?></h3>

                <p class="text-muted text-center"><?php echo $_SESSION['username']['hak']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>ID : </b><a class="float-right"> <?php echo $hasil['id_petugas']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nama : </b> <a class="float-right"><?php echo $hasil['nama']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email : </b> <a class="float-right"><?php echo $hasil['email']; ?></a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
          </div>

          <div class="col-md-9">
            <form action="proses/profil_petugas_proses.php?agung=edit" method="post">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Profil</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <!-- /.tab-pane -->

                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal">
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
                            <option><?php echo $hasil['jk']; ?></option>
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
                          <textarea name="alamat" class="form-control"><?php echo $hasil['alamat']; ?></textarea>
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
                          <input type="email" class="form-control" name="email" placeholder="Email" required value="<?php echo $hasil['email']; ?>">
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Edit Data</button>
                  <button type="button" class="btn btn-default float-right" onclick="history.back(-1)">Cancel</button>
                </div>
              </div><!-- /.card-body -->
            </div>
          </form>
            <!-- /.nav-tabs-custom -->
          </div>

        </div>

            <div class="card-footer">
            Footer
            </div>

        </div>

    </section>

</div>
<?php
include('template/footer.php');
?>
