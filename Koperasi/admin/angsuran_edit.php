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
    $edit = $koneksi -> prepare("SELECT * FROM angsuran WHERE id_angsuran = :id");
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
                <h3 class="card-title">Edit Angsuran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="proses/angsuran_proses.php?agung=edit" method="post">
                <div class="card-body" align=center>
                  <div class="form-group row">
                    <label for="IdAnggota" class="col-sm-3 col-form-label">ID Angsuran</label>
                    <div class="col-sm-7" aling=center>
                      <input type="text" class="form-control" name="id_angsuran" readonly value="<?php echo $hasil['id_angsuran']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Tanggal Angsuran</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" name="tgl_angsuran" placeholder="Tanggal Angsuran" required value="<?php echo $hasil['tgl_angsuran']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">ID Pinjaman</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="id_pinjam" onchange="changeValue(this.value)">
                        <option value="<?php echo $hasil['id_pinjaman']; ?>"><?php echo $hasil['id_pinjaman']; ?></option>
                        <?php
                        $zxc = $koneksi -> prepare("SELECT * FROM pinjaman");
                        $zxc -> execute();
                        $jsArray = "var prdName = new Array();\n";
                        while($cat = $zxc -> fetch()){
                          $metode = $cat['id_pinjaman'];
                          $sql = $koneksi -> prepare("SELECT max(ke) as id FROM angsuran WHERE id_pinjaman = :1");
                          $sql -> bindParam(':1', $metode);
                          $sql -> execute();
                          $hsl = $sql -> fetch();
                          $kode = $hsl['id'];
                          $nourut = $kode;
                          $nourut++;
                          ?>
                        <option value="<?php echo $cat['id_pinjaman']; ?>"><?php echo $cat['id_pinjaman']; ?></option>
                        <?php $jsArray .= "prdName['" . $cat['id_pinjaman'] . "'] = {IdAnggota:'" . addslashes($cat['id_anggota']) . "',nominal:'".addslashes($cat['angsuran'])."',lama:'".addslashes($nourut)."'};\n"; ?>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">ID Anggota</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="id_anggota" id="id_anggota" placeholder="ID Anggota" required value="<?php echo $hasil['id_anggota']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Angsuran Ke</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="ke" id="lama" placeholder="Angsuran Ke" required value="<?php echo $hasil['ke']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NamaLengkap" class="col-sm-3 col-form-label">Nominal</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" required value="<?php echo $hasil['nominal']; ?>">
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
        document.getElementById('id_anggota').value = prdName[x].IdAnggota;
        document.getElementById('nominal').value = prdName[x].nominal;
        document.getElementById('lama').value = prdName[x].lama;
        };
        </script>
</div>
<?php
include('template/footer.php');
?>
