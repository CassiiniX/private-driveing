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
  <link rel="stylesheet" href="<?= base_url('assets/plugins/summernote/summernote-bs4.min.css');?>">
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
        <a class="nav-link" href="<?= base_url('user');?>">
          <i class="fas fa-user"></i>
          <span class="small">Kembali Ke User</span>
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
    <a href="<?= base_url('/admin');?>" class="brand-link">
      <img src="<?= base_url('assets/images/logo.png');?>" alt="Logo" class="brand-image img-circle" 
        style="opacity: .8">
      <span class="brand-text font-weight-light">
        <?= $_ENV['app.site_name'];?>
      </span>
    </a>

    <div class="sidebar">      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">                        
          <li class="nav-item">
            <a href="<?= base_url('admin/user');?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>            
                Kelola User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/package');?>" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Kelola Paket
              </p>
            </a>
          </li>     

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Instruktur
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">    
              <li class="nav-item">
                <a href="<?= base_url('admin/instructur');?>" class="nav-link">
                  <p class="pl-4">Kelola Instruktur</p>
                </a>
              </li>          

              <li class="nav-item">
                <a href="<?= base_url('admin/instructur-feedback');?>" class="nav-link">
                  <p class="pl-4">Kelola Komentar</p>
                </a>
              </li>   
            </ul>
          </li> 

          <li class="nav-item">
            <a href="<?= base_url('admin/articel');?>" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Kelola Artikel
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?= base_url('admin/galery');?>" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Kelola Galeri
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?= base_url('admin/contact');?>" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Kelola Kontak
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?= base_url('admin/manual-payment');?>" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Pembayaran Manual
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?= base_url('admin/course');?>" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Kelola Kursus
              </p>
            </a>
          </li>        

          <li class="nav-item">
            <a href="<?= base_url('admin/setting');?>" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan Website
              </p>
            </a>
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