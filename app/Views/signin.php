<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Masuk</title>
  <link rel="icon" href="<?= base_url('assets/images/logo-header.png');?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/toastr/toastr.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/animate.min.css');?>">
  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
  <style>
	body{
		padding:0px;
		margin:0px;
		background: url('<?= base_url('assets/images/welcome-background.png');?>') no-repeat center;
	}

	.btn-private-driveing{
		background:  #8652ec;
		border:2px solid white;
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
      text-align: right;      
      padding-top:5px;
      margin:0px;
      opacity: 0.8;
      font-size: 13px;
    }
  </style>
</head>
<body>
	<div class="col-lg-3 xol-md-3 col-xl-3 col-sm-12"
		style="padding:5px;margin:auto">
		<div class="mt-5 p-1">
			<div class="col-12 text-center">
				<img src="<?= base_url('assets/images/welcome-1.png');?>"					
					class="animated bounceIn"
					style="height:250px">					
			</div>

			<div class="clearfix pb-2 pt-2">
				<div class="float-left">
					<h6>Masuk ke akun anda</h6>
				</div>

				<div class="float-right">
					<a href="<?= base_url('/');?>">
						Kembali
					</a>
				</div>
			</div>

			<form id="form-signin" method="post" action="<?= base_url('signin');?>">
				<?= csrf_field(); ?>
				
				<div class="form-group">
					Email : 
					<input type="email" class="form-control" placeholder="Email . . ."
						name="email"
						data-parsley-required
						data-parsley-email>
					<small class="text-muted">Masukan Email</small>
				</div>

				<div class="form-group">
					Password :
					<input type="password" class="form-control" placeholder="Password . . ."
						name="password"
						data-parsley-required>
					<small class="text-muted">Masukan Password</small>
				</div>

				<button class="btn btn-private-driveing">
					Kirim
				</button>				
			</form>
		</div>
	</div>

	<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
	<script src="<?= base_url('assets/dist/js/adminlte.min.js');?>"></script>
	<script src="<?= base_url('assets/plugins/toastr/toastr.min.js');?>"></script>
    <script src="<?= base_url('assets/dist/js/parsley.min.js');?>"></script>
    <script src="<?= base_url('assets/dist/js/i18n/id.js');?>"></script>

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

	<script>
		var passImage = 1;
		
		setInterval(function(){
			passImage = passImage == 3 ? 1 : (passImage += 1);		
			$(".animated").attr("src","<?= base_url('assets/images/');?>/welcome-"+passImage+".png")
		},500);
	</script>		

    <script>
	$("#form-signin").parsley().on('form:validate',function(){
  		if(this.isValid()){
		    $(".btn-private-driveing").attr("disabled",true);
	  	}else{
	    	toastr.warning("Sepertinya ada data yang belum valid","");
  		}  
	});
	</script>
</body>
</html>