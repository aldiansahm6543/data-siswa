<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url('asset/') ?>vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= base_url('asset/') ?>vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?= base_url('asset/') ?>css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url('asset/') ?>css/styles.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url('asset/') ?>css/custom.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body class="bg-blue">
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="<?= base_url('asset/') ?>img/smkn1.jpg" class="d-block" width="100%" style="height: 45vh;">
                    </div>
                    <div class="carousel-item">
                      <img src="<?= base_url('asset/') ?>img/smkn1.jpg" class="d-block" width="100%" style="height: 45vh;">
                    </div>
                    <div class="carousel-item">
                      <img src="<?= base_url('asset/') ?>img/smkn1.jpg" class="d-block" width="100%" style="height: 45vh;">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                	<?= $this->session->flashdata('message'); ?>
                  <form method="post" action="<?= base_url(); ?>">
                    <div class="form-group">
                      <input id="login-username" type="text" name="username" class="input-material" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" class="input-material" placeholder="Password">
                    </div>
                    <button type="submit" class="btn" style="background-color: #FF69B4;">Login</button>

                  </form><a href="#" class="forgot-pass">Forgot Password?</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- JavaScript files-->
    <script src="<?= base_url('asset/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('asset/') ?>vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?= base_url('asset/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('asset/') ?>vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?= base_url('asset/') ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('asset/') ?>vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>