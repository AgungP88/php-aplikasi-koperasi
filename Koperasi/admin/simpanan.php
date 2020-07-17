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
                    <h1>Data Simpanan</h1>
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
              <a href="simpanan_tambah.php" rel="tooltip" title="Tambah Data">
                <button type="button" name="button" class="btn btn-secondary"><i class="fa fa-plus"></i></button>
                </a>
                <a href="print/simpanan_print.php" rel="tooltip" title="Print" target="blank">
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
                    <h3 class="card-title">Table Simpanan</h3>

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
                          <th>ID Simpan</th>
                          <th>Tanggal Simpan</th>
                          <th>Anggota</th>
                          <th>Jenis Simpanan</th>
                          <th>Jumlah</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <?php
                      if(isset($_POST['search'])){
                        $param = $_POST['search'];
                        $asd = $koneksi->prepare("SELECT * FROM simpanan WHERE id_simpanan LIKE :1 OR id_anggota LIKE :1 ");
                        $asd->bindParam(':1', $param);
                        $asd->execute();
                      }else{
                      $asd = $koneksi -> prepare("SELECT * FROM simpanan ");
                      $asd -> execute();
                    }
                      $i = 1;
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
                          <td><?php echo $i; ?></td>
                          <td><?php echo $data['id_simpanan']; ?></td>
                          <td><?php echo $data['tgl_simpan']; ?></td>
                          <td><?php echo $data['id_anggota']." - ".$hasil['nama_lengkap']; ?></td>
                          <td><?php echo $hasil2['nama_simpanan']; ?></td>
                          <td><?php echo "Rp.".number_format($data['jumlah'],2,",","."); ?></td>
                          <td>
                            <a href="simpanan_edit.php?prabowo=<?php echo $data['id_simpanan']; ?>" rel="tooltip" title="Edit">
                            <button type="button" name="button" class="btn btn-success"><i class="fa fa-cog"></i></button>
                            </a>
                            <a rel="tooltip" title="Hapus" href="proses/simpanan_proses.php?agung=hapus&app=<?php echo $data['id_simpanan']; ?>&ask=<?php echo $data['id_anggota']; ?>" onclick="return confirm('apakah anda yakin?')">
                            <button type="button" name="button" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
                            </a>
                            <a target="blank" rel="tooltip" title="Print" href="print/simpanan_print_pcs.php?prabowo=<?php echo $data['id_simpanan']; ?>" >
                            <button type="button" name="button" class="btn btn-primary" ><i class="fa fa-print"></i></button>
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
