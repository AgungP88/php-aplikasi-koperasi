<!DOCTYPE html>
<?php
include'koneksi.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Assets -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php
      $sql = $koneksi -> prepare("SELECT max(id_anggota) as id FROM anggota");
      $sql -> execute();
      $hsl = $sql -> fetch();
      $kode = $hsl['id'];
      $nourut = (int) substr($kode, 3, 3);
      $nourut++;
      $char = "A";
      $new = $char . sprintf("%03s", $nourut);
     ?>
<body class="hold-transition register-page">
<div class="container col-md-7">
    <div class="card card-primary my-4">
    <div class="card-header text-white text-center"><b>FORM PENDAFTARAN KOPERASI SIMPAN PINJAM</b></div>
    <div class="alert alert-danger">
      ID Anggota harap diingat sebagai username untuk login. Password default adalah 123
    </div>
    <form class="" action="daftar_proses.php?agung=tambah" method="post">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col">
                  <div class="form-group">
                      <label for="nama">ID Anggota</label>
                      <input type="text" class="form-control" name="id" value="<?php echo $new; ?>" placeholder="ID" readonly>
                  </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" value="" placeholder="Nama Lengkap" required>
                </div>

                <div class="form-group">
                    <label for="tempat">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" value="" placeholder="Tempat Lahir" required>
                </div>

                <div class="form-group">
                    <label for="jenis">Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option disabled="true" selected="" value="">- Jenis Kelamin -</option>
                        <option>laki laki</option>
                        <option>perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>

                </div>

                <div class="col">


                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control" name="nik" placeholder="Masukan NIK" required>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                </div>

                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select name="agama" class="form-control" required>
                        <option disabled="true" selected="" value="">- Agama -</option>
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Kepercayaan">Kepercayaan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" required>
                </div>

                <div class="form-group">
                    <label for="tlp">No. Telp</label>
                    <input type="text" class="form-control" name="no_hp" placeholder="No. Telp" required>
                </div>

                </div>
            </div>
            <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <div class="col">
              <button type="button" class="btn btn-secondary btn-block" onclick="history.back(-1)">Cancel</button>
            </div>
          </div>
        </div>
    </form>
    </div>



</div>

<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>

</body>

</html>
