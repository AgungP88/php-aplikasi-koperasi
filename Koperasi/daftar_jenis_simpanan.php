<?php
include'koneksi.php';
include('template/header.php');
?>

<?php
$anggota = $koneksi -> prepare("SELECT * FROM anggota");
$anggota -> execute();
$jumanggota = $anggota -> rowCount();

$simpanan = $koneksi -> prepare("SELECT * FROM simpanan");
$simpanan -> execute();
$jumsimpanan = 0;
while ($row = $simpanan -> fetch()) {
  $jumsimpanan += $row['jumlah'];
}

$pinjaman = $koneksi -> prepare("SELECT * FROM pinjaman");
$pinjaman -> execute();
$jumpinjaman = 0;
while ($row = $pinjaman -> fetch()) {
  $jumpinjaman += $row['jumlah'];
}

$angsuran = $koneksi -> prepare("SELECT * FROM angsuran");
$angsuran -> execute();
$jumangsuran = 0;
while ($row = $angsuran -> fetch()) {
  $jumangsuran += $row['nominal'];
}
?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Jenis Simpanan</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <h3 class="card-title">Judul</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>

            <!-- Isi Content Disini -->
            <div class="card-body">
              <ul>
                <li>Simpanan Pokok</li>
                <p>Simpanan pokok adalah sejumlah yang yang wajib di bayarkan oleh anggota kepada koperasi pada saat masuk menjadi anggota.
                   Simpanan pokok tidak dapat diambil kembali selama yang bersangkutan masih menjadi anggota koperasi. Simpanan pkok
                    jumlahnya sama untuk setiap anggota</p>
              </ul>
              <ul>
                <li>Simpanan Wajib</li>
                <p>Simpanan Wajib adalah jumlah simpanan tertentu yang harus dibayarkan oleh anggota kepada koperasi dalam waktu dan
                  kesempatan tertentu, misalnya tiap bulan dengan jumlah simpanan yang sama untuk setiap bulannya. Simpanan wajib tidak
                  dapat diambil kembali selama yang bersangkutan masih menjadi anggota koperasi.</p>
              </ul>
              <ul>
                <li>Simpanan Sukarela</li>
                <p>Simpanan suka rela adalah simpanan yang besarnya tidak di tentukan, tetapi bergantung kepada kemampuan anggota.
                   Simpanan sukarela dapat di setorkan dan di ambil setiap saat.</p>
              </ul>
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
