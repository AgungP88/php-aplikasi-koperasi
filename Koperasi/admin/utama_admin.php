<?php
include'../koneksi.php';
include'../proteksi.php';
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
                    <h1>Dashboard</h1>
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
                <div class="row">

                    <div class="col-lg-3 col-xs-6">
					    <div class="small-box bg-blue">
						    <div class="inner">
							    <h4><?php echo "Rp.".number_format($jumpinjaman,2,",","."); ?></h4>
							    <p>Total Pinjaman</p>
                            </div>

						    <div class="icon">
							    <i class="ion ion-bag"></i>
                            </div>
						    <p class="small-box-footer"><a href="pinjaman.php" style="color:white;">Pinjaman</a> <i class="fa fa-arrow-circle-right"></i></p>
					    </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h4><?php echo "Rp.".number_format($jumangsuran,2,",","."); ?></h4>
                                <p>Total Angsuran</p>
                            </div>

                            <div class="icon">
                                <i class="ion ion-book"></i>
                            </div>
                            <p class="small-box-footer"><a href="angsuran.php" style="color:white;"> Angsuran </a><i class="fa fa-arrow-circle-right"></i></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h4><?php echo "Rp.".number_format($jumsimpanan,2,",","."); ?></h4>
                                <p>Total Simpanan</p>
                            </div>

                            <div class="icon">
                                <i class="ion ion-card"></i>
                            </div>
                            <p class="small-box-footer"> <a href="simpanan.php" style="color:white;"> Simpanan </a><i class="fa fa-arrow-circle-right"></i></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h4><?php echo $jumanggota; ?></h4>
                                <p>Total Member</p>
                            </div>

                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <p class="small-box-footer"><a href="anggota_admin.php" style="color:white;"> Anggota </a><i class="fa fa-arrow-circle-right"></i></p>
                        </div>
                    </div>

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
