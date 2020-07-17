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
                    <h1>Data Akun</h1>
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
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Table Akun</h3>

                    <div class="card-tools">
                      <form class="" action="" method="post">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>ID User</th>
                          <th>Nama</th>
                          <th>Password</th>
                          <th>Hak</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <?php
                      if(isset($_POST['search'])){
                        $param = $_POST['search'];
                        $asd = $koneksi->prepare("SELECT * FROM user WHERE id LIKE :1 OR nama LIKE :1 ");
                        $asd->bindParam(':1', $param);
                        $asd->execute();
                      }else{
                      $asd = $koneksi -> prepare("SELECT * FROM user ");
                      $asd -> execute();
                    }
                      $i = 1;
                      while($data = $asd -> fetch()){
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $data['id']; ?></td>
                          <td><?php echo $data['nama']; ?></td>
                          <td><?php echo $data['password']; ?></td>
                          <td><?php echo $data['hak']; ?></td>
                          <td>
                            <a href="akun_edit.php?prabowo=<?php echo $data['id']; ?>" rel="tooltip" title="Edit">
                            <button type="button" name="button" class="btn btn-success"><i class="fa fa-cog"></i></button>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                      <?php $i++; } ?>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
