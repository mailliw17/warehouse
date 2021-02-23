<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if (!empty($page_title)) echo $page_title; ?></title>
    <!-- <link href="<?= base_url() ?>vendor/login/loginfont.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/login/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/login/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/login/css/login.css">
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <!-- <img src="<?= base_url() ?>vendor/login/images/login2.jpg" alt="login" class="login-card-img"> -->
                        <img src="<?= base_url() ?>assets/img/gdg.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">

                                <h4> <strong>Warehouse Management System</strong> </h4>
                            </div>
                            <p class="login-card-description">Silahkan masuk</p>

                            <!-- INI FLASHMESSAGE -->
                            <?php if ($this->session->flashdata('gagal_login')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Username / Password salah !
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('message')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Password Berhasil Diganti <br>
                                    Silahkan Login Ulang !
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('penyusup')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Silahkan login terlebih dahulu
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url() ?>auth" method="POST">
                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Isi username anda ..." autocomplete="off" required>
                                </div>
                                <?= form_error('username', ' <small class="text-danger pl-3">', '</small>');  ?>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Isi Password anda..." required>
                                </div>
                                <input type="submit" class="btn btn-block login-btn mb-4" type="button" value="Login">
                            </form>
                            <!-- <a href="#!" class="forgot-password-link">Forgot password?</a> -->
                            <!-- <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p> -->
                            <nav class="login-card-footer-nav">
                                <p>Develop By <br> PT. Charoen Pokphand Indonesia - William</p>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>              
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
        </div>
    </main>

    <script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>vendor/jquery/popper.min.js"></script>
    <script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>