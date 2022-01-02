<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->renderSection('title');?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/toastr/toastr.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/animate.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.css');?>">
  <link rel="icon" href="<?= base_url('assets/images/logo-header.png');?>">
  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
  <style>
  .btn-private-driveing{
    background:  #8652ec;
    border:0px solid white;
    outline:0px solid white;
    color:white;
  }

  .btn-private-driveing:hover{
    border:2px solid #8652ec;
    color:#8652ec;
    background: white;
  }

  .parsley-errors-list{
    color:red;
    list-style:none;
    padding-left:10px;
    padding-top:3px;
    margin:0px;
    opacity: 0.8;
    font-size: 13px;
  }
  </style>
  <?= $this->renderSection('sc_header');?>
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>     
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/profil');?>">
          <i class="fas fa-user"></i> 
          <span class="small">Profil</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout');?>">
          <i class="fas fa-power-off"></i> 
          <span class="small">Keluar</span>
        </a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-2">
    <a href="<?= base_url('/user');?>" class="brand-link">
      <img src="<?= base_url('assets/images/logo.png');?>" alt="Logo" class="brand-image img-circle" 
        style="opacity: .8">
      <span class="brand-text font-weight-light">
        <?= $_ENV['app.site_name'];?>
      </span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/images/users/'.session('user')['photo']);?>" class="img-circle" alt="User Image">
        </div>
        <div class="info small">
          <a href="<?= base_url('user/profil');?>" class="d-block">
            <?= ucwords(session('user')['username']);?>
          </a>
          <a href="<?= base_url('user/profil');?>" class="d-block">
            <?= session('user')['email'];?>
          </a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">                        
          <li class="nav-item">
            <a href="<?= base_url('user/package');?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Paket
                <span class="badge badge-info right"><?= $_ENV['menu.package'];?></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('user/instructur');?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Instruktur
                <span class="badge badge-info right"><?= $_ENV['menu.instructur'];?></span>
              </p>
            </a>
          </li>     
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Jadwal Kursus
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">    
              <li class="nav-item">
                <a href="<?= base_url('user/course');?>" class="nav-link">
                  <p class="pl-4">Kursus Anda</p>
                </a>
              </li>          

              <li class="nav-item">
                <a href="<?= base_url('user/course-history');?>" class="nav-link">
                  <p class="pl-4">Riwayat Kursus</p>
                </a>
              </li>   
            </ul>
          </li> 
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <?= $this->renderSection('content'); ?>             
  </div>

  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js');?>"></script>
<script src="<?= base_url('assets/plugins/toastr/toastr.min.js');?>"></script>
<script src="<?= base_url('assets/dist/js/parsley.min.js');?>"></script>
<script src="<?= base_url('assets/dist/js/i18n/id.js');?>"></script>
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js');?>"></script>

<?php 
if(session('fallback')){
  if(session("fallback")["message"] == "success"){
    ?>
    <script>
      toastr.success("","<?= session('fallback')['success'];?>");
    </script>
    <?php
  }

  if(session('fallback')['message'] == "failed"){
    ?>
      <script>
        toastr.error("<?= session('fallback')['failed'];?>","Terjadi Kesalahan");
      </script>
    <?php
  }     
}
?>

<?= $this->renderSection('sc_footer');?>
</body>
</html>