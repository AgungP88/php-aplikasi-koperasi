<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Koperasi Simpan Pinjam</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Pemanggilan Asset -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Logo -->
        <a href="#" class="brand-link">
        <img src="assets/dist/img/Logo.jpg"
            alt="Logo Koperasi"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Koperasi Aman</span>
        </a>

        <!-- Sidebar User -->
        <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item has-treeview">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Menu 1 -->
                <li class="nav-item">
                    <a href="daftar_jenis_simpanan.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Jenis Simpanan</p>
                    </a>
                </li>
                <!-- Menu 2 -->
                <li class="nav-item">
                    <a href="register.php" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Daftar Anggota</p>
                    </a>
                </li>

            <!-- Menu 3 -->
            <li class="nav-item">
                <a href="login.php" class="nav-link">
                    <i class="nav-icon fas fa-lock"></i>
                    <p>Login</p>
                </a>
            </li>

            </ul>
        </nav>

        </div>

    </aside>
