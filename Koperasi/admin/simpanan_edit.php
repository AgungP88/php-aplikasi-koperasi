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
                    <h1>Isi Disini</h1>
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
    $edit = $koneksi -> prepare("SELECT * FROM simpanan WHERE id_simpanan = :id");
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
                <h3 class="card-title">Edit Data Simpanan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="proses/simpanan_proses.php?agung=edit&ask=<?php echo $hasil['jumlah']; ?>" method="post">
                <div class="card-body" align=center>
                  <div class="form-group row">
                    <label for="IdAnggota" class="col-sm-3 col-form-label">ID Simpanan</label>
                    <div class="col-sm-7" aling=center>
                      <input type="text" class="form-control" name="id_simpan" readonly value="<?php echo $hasil['id_simpanan']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="IdAnggota" class="col-sm-3 col-form-label">Tanggal Simpanan</label>
                    <div class="col-sm-7" aling=center>
                      <input type="date" class="form-control" name="tgl_simpan" required value="<?php echo $hasil['tgl_simpan']; ?>">
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
                    <label for="IdAnggota" class="col-sm-3 col-form-label">Jenis Simpanan</label>
                    <div class="col-sm-7" aling=center>
                      <select class="form-control" name="jenis" onchange="changeValue(this.value)">
                        <option value="<?php echo $hasil['id_jenis']; ?>"><?php echo $hasil['id_jenis']; ?></option>
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
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" required value="<?php echo $hasil['jumlah']; ?>">
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
