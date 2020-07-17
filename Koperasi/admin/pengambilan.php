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

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="card">
            <div class="card-header">
              <a href="pengambilan_tambah.php" rel="tooltip" title="Tambah Data">
                <button type="button" name="button" class="btn btn-secondary"><i class="fa fa-plus"></i></button>
                </a>
                <a href="print/pengambilan_print.php" rel="tooltip" title="Print" target="blank">
                  <button type="button" name="button" class="btn btn-primary"><i class="fa fa-print"></i></button>
                  </a>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>

            <!-- Isi Content Disini -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Table Pengambilan</h3>

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
                          <th>ID Pengambilan</th>
                          <th>Tanggal Pengambilan</th>
                          <th>Anggota</th>
                          <th>Jumlah</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <?php
                      if(isset($_POST['search'])){
                        $param = $_POST['search'];
                        $asd = $koneksi->prepare("SELECT * FROM pengambilan WHERE id_pengambilan LIKE :1 OR id_anggota LIKE :1 ");
                        $asd->bindParam(':1', $param);
                        $asd->execute();
                      }else{
                      $asd = $koneksi -> prepare("SELECT * FROM pengambilan ");
                      $asd -> execute();
                    }
                      $i = 1;
                      while($data = $asd -> fetch()){
                        $id = $data['id_anggota'];
                        $kat = $koneksi -> prepare("SELECT * FROM anggota WHERE id_anggota = :id");
                        $kat -> bindParam(':id', $id);
                        $kat -> execute();
                        $hasil = $kat -> fetch();
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $data['id_pengambilan']; ?></td>
                          <td><?php echo $data['tgl_ambil']; ?></td>
                          <td><?php echo $data['id_anggota']." - ".$hasil['nama_lengkap']; ?></td>
                          <td><?php echo "Rp.".number_format($data['jumlah'],2,",","."); ?></td>
                          <td>
                            <a href="pengambilan_edit.php?prabowo=<?php echo $data['id_pengambilan']; ?>" rel="tooltip" title="Edit">
                            <button type="button" name="button" class="btn btn-success"><i class="fa fa-cog"></i></button>
                            </a>
                            <a rel="tooltip" title="Hapus" href="proses/pengambilan_proses.php?agung=hapus&app=<?php echo $data['id_pengambilan']; ?>&ask=<?php echo $data['id_anggota']; ?>" onclick="return confirm('apakah anda yakin?')">
                            <button type="button" name="button" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
                            </a>
                            <a rel="tooltip" title="Print" href="print/pengambilan_print_pcs.php?prabowo=<?php echo $data['id_pengambilan']; ?>" target="blank">
                            <button type="button" name="button" class="btn btn-primary" ><i class="fa fa-print"></i></button>
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
