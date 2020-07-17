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

    <?php
          $sql = $koneksi -> prepare("SELECT max(id_simpanan) as id FROM simpanan");
          $sql -> execute();
          $hsl = $sql -> fetch();
          $kode = $hsl['id'];
          $nourut = (int) substr($kode, 3, 3);
          $nourut++;
          $char = "S";
          $new = $char . sprintf("%03s", $nourut);
         ?>
    <!-- Main content -->
    <section class="content">


            <!-- /.card -->
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tambah Simpanan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="proses/simpanan_proses.php?agung=tambah" method="post">
                <div class="card-body" align=center>
                  <div class="form-group row">
                    <label for="IdAnggota" class="col-sm-3 col-form-label">ID Simpan</label>
                    <div class="col-sm-7" aling=center>
                      <input type="text" class="form-control" name="id_simpan" readonly value="<?php echo $new; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Tanggal Simpan</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" name="tgl_simpan" placeholder="Nama Pinjaman" required>
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
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Jenis Simpanan</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="js" onchange="changeValue(this.value)">
                        <option></option>
                        <?php
                        $zxc = $koneksi -> prepare("SELECT * FROM jenis_simpanan");
                        $zxc -> execute();
                        $jsArray = "var prdName = new Array();\n";
                        while($cat = $zxc -> fetch()){
                          ?>
                        <option value="<?php echo $cat['id_jenis_simpanan']; ?>"><?php echo $cat['id_jenis_simpanan']." - ".$cat['nama_simpanan']; ?></option>
                        <?php $jsArray .= "prdName['" . $cat['id_jenis_simpanan'] . "'] = {jumlah:'" . addslashes($cat['jumlah']) . "'};\n"; ?>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="IdAnggota" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-7" aling=center>
                      <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Simpanan" required >
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
    <script type="text/javascript">
        <?php echo $jsArray; ?>
        function changeValue(x){
        document.getElementById('jumlah').value = prdName[x].jumlah;
        };
        </script>
</div>
<?php
include('template/footer.php');
?>
