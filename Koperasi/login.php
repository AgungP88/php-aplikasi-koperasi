<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Assets -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Koperasi Simpan Pinjam</b></a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><b>Login</b></p>

            <form action="login_proses.php" method="post">
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Username" name="name" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="pw" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="col mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    <button type="button" class="btn btn-secondary btn-block" onclick="history.back(-1)">Cancel</button>
                </div>

            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>

<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>

</body>
</html>
