<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $_ENV['app.site_name'];?></title>
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/toastr/toastr.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/animate.min.css');?>">
  <link rel="icon" href="<?= base_url('assets/images/logo-header.png');?>">
  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
  <style>
	body{
		padding:0px;
		margin:0px;
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

	.fs-13{
		font-size: 13px;
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
</head>
<body> 		
	<!-- DEKSTOP -->
	<?php if(!$_ENV['agent']->isMobile()){ ?>
		<!-- MESSAGE BOX -->
		<span  class="d-none d-md-block d-lg-block d-xl-block d-xs-none d-sm-none">
			<div id="message-box">
				<div class="text-center pb-3 pt-3">
					<img src="<?= base_url('assets/images/message-ilustrasion.png');?>"
						style="width:60%">
				</div>

				<form class="pb-2 pt-2" 
					id="form-message-dekstop" 
					method="post" 
					action="<?= base_url('contact-us');?>">					
					<?= csrf_field();?>

					<div class="form-group">
						<span class="text-muted small">Nama :</span>
						<input type="text" class="form-control fs-13" placeholder="Nama . . ."
							name="name"
							data-parsley-required>
					</div>
					
					<div class="form-group">
						<span class="text-muted small">Email :</span>
						<input type="email" class="form-control fs-13" placeholder="Email . . ."
							name="email"
							data-parsley-required
							data-parsley-email>
					</div>

					<div class="form-group">
						<span class="text-muted small">No Telp :</span>
						<input type="text" class="form-control fs-13" placeholder="No Telp . . ."
							name="phone"
							data-parsley-required>
					</div>

					<div class="form-group">
						<span class="text-muted small">Pesan :</span>
						<textarea class="form-control fs-13" placeholder="Pesan . . ."
							name="message"
							data-parsley-required></textarea>
					</div>
				
					<button type="submit" class="btn btn-private-driveing btn-block">Submit</button>
				</form>
			</div>
		</span>
			
		<div class="d-none d-md-block d-lg-block d-xl-block d-xs-none d-sm-none"
			id="message-button"
			onclick="toggleMessageBox()">
			<i class="fa fa-comment fa-2x"></i>
		</div>

		<style>
			#message-box{				
				background:white;
				box-shadow:0px 0px 5px #eee;
				width:300px;
				padding:5px;
				padding-left:15px;
				padding-right:15px;
				position:fixed;
				right:25px; 
				bottom:110px;
				z-index:1001;
				border-radius:10px;
				border:1px solid #eee;
				display:none;		
				border-top:10px solid #8652ec;	
				border-bottom: 10px solid #8652ec;
			}

			#message-button{
				background:#8652ec;
				color:white;
				padding:13px;
				width:60px;
				height:60px;
				border-radius:50%;
				position:fixed;
				bottom:30px;
				right:25px; 
				border:1px solid white;
				z-index:1001;
				cursor:pointer;
			}
		</style>
		<!-- END MESSAGE BOX -->	

		<div class="d-none d-md-block d-lg-block d-xl-block d-xs-none d-sm-none">
			<!-- HOME -->
			<div id="dekstop-home-1">	
				<div id="dekstop-home-1-position-1">
					<img src="<?= base_url('assets/images/logo.png');?>"
						width="50px">

					<span class="text-white" style="font-size:10px">
						<?= $_ENV['app.site_name'];?>
					</span>
				</div>
			
				<div id="dekstop-home-1-position-2"
					class="d-flex flex-row">	
					<?php if(!session('user')){ ?>
						<div class="pl-4 pr-4 pt-1 pb-1 ml-4 mr-4 dekstop-home-1-menu"
							onclick="window.location='<?= base_url('signin');?>'">
							Masuk
						</div>
						<div class="pl-4 pr-4 pt-1 pb-1 ml-4 mr-4 dekstop-home-1-menu"
							onclick="window.location='<?= base_url('signup');?>'">
							Daftar
						</div>	
					<?php }else{ ?>		
						<div class="pl-4 pr-4 pt-1 pb-1 ml-4 mr-4 dekstop-home-1-menu"
							onclick="window.location='<?= base_url('/user');?>'">
							Dashboard
						</div>
					<?php } ?>
				</div>
			
				<div id="dekstop-home-1-position-3" class="text-center">
					<h1 id="home-title"><?= $_ENV['app.site_name'];?></h1>
					<p class="animated flipInX">
						Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem 
						IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem
						IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem em IpsumLorem Ipsum
					</p>				
				</div>			

				<div id="dekstop-home-1-position-4">
					<img src="<?= base_url('assets/images/home-ilustrasion-1.png');?>"
						class="animated flipInX"
						id="home-ilustrasion">
				</div>			
			</div>

			<style>
				#dekstop-home-1{
					background:red;
					height:657px;
					max-width: 1349px;
					margin:auto;
					background:url('<?= base_url('assets/images/home-background-1.png');?>') no-repeat;
					position:relative;
					margin-bottom: 50px;
				}

				.dekstop-home-1-menu{
					border-radius:10px;
					border:2px solid #8652ec;
					box-shadow:0px 0px 5px #eee;
					color:#8652ec;
				}

				.dekstop-home-1-menu:hover{
					cursor: pointer;
					background: #8652ec;
					color:white;
				}

				#dekstop-home-1-position-1{
					position:absolute;
					top:30px;
					left:50px;
				}		

				#dekstop-home-1-position-2{
					position:absolute;
					top:30px;
					right:30px;
				}	

				#dekstop-home-1-position-3{
					position:absolute;
					top:210px;
					left:50px;
					color:white;
					max-width:500px;
				}

				#dekstop-home-1-position-4{
					position:absolute;
					top:250px;
					right:150px;
				}	
			</style>
			<!-- HOME -->

			<!-- PROFIL -->
			<div id="dekstop-home-2">
				<div class="row">
					<div class="col-5 animated flipInX">
						<h1>Profil Kami</h1>
						<p>
							Lorem Ipsum Lorem IpsumLorem IpsumLorem 
							IpsumLorem IpsumLorem IpsumLorem IpsumLorem 
							IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem 
						</p>
						<p>
							<img src="<?= base_url('assets/images/home-maps.png');?>" 
								height="400px"/>
						</p>
					</div>
					<div class="col-4 offset-2 animated flipInX">
						<h3>Visi Dan Misi Kami</h3>
						<ul class="list-group">
							<li class="list-group-item">
							Lorem Ipsum Lorem IpsumLorem IpsumLorem
							IpsumLorem IpsumLorem
							</li>
							<li class="list-group-item">
							Lorem Ipsum Lorem IpsumLorem IpsumLorem
							IpsumLorem IpsumLorem
							</li>
							<li class="list-group-item">
							Lorem Ipsum Lorem IpsumLorem IpsumLorem
							IpsumLorem IpsumLorem
							</li>
						</ul>
					</div>
				</div>
			</div>

			<style>
				#dekstop-home-2{
					margin-bottom: 50px;
					background:url('<?= base_url('assets/images/home-background-2.png');?>') no-repeat;			
					margin:auto;
					max-width:1349px;
					padding:50px;
				}
			</style>
			<!-- PROFIL -->

			<!-- ARTICEL -->
			<div id="dekstop-home-3">					
				<?php 
					if(count($dataArticel)){
				?>
					<div class="text-center p-4">
						<h1>Artikel</h1>
					</div>

					<div class="d-flex flex-row flex-wrap">			
						<?php 
							foreach ($dataArticel as $item) {					
						?>
							<!-- MODAL ARTICEL -->
							<div id="modalArticel<?= $item['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							  <div class="modal-dialog modal-lg" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLiveLabel">
							        	<?= ucwords($item['title']);?>
							        </h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<div class="text-center">
							      		<img src="<?= base_url('assets/images/articels/'.$item['image']);?>"
								      		style="width:70%;border-radius:10px">
							      	</div>

							      	<div class="mt-3">
							      		<?= $item['content'];?>
							      	</div>
							      </div>		      
							    </div>
							  </div>
							</div>
							<!-- END MODAL ARTICEL -->

							<div class="col-3 animated flipInX">
								<div class="card">
									<img class="card-img-top" src="<?= base_url('assets/images/articels/'.$item['image']);?>">
									<div class="card-body">
										<h5><?= ucwords($item['title']);?></h5>
										<p>
											<?= str_replace('&nbsp;',' ',word_limiter(strip_tags($item['content']),10,' . . .'));?>
										</p>
										<p>
											<a href="#" data-toggle="modal" data-target="#modalArticel<?= $item['id'];?>">
												Baca Selengkapnya . . .
											</a>
										</p>
									</div>
								</div>
							</div> 		
						<?php 
							}
						?>
					</div>
				<?php 
					}else{
				?>
					<div class="text-center">
						<img src="<?= base_url('assets/images/not-found.png');?>"
							style="width:45%">
						<h5>Data tidak ditemukan</h5>
						<p><small>Data artikel tidak ditemukan</small></p>
					</div>
				<?php 
					}
				?>
			</div>

			<style>
				#dekstop-home-3{
					margin-bottom: 50px;
					background:url('<?= base_url('assets/images/home-background-3.png');?>') no-repeat;			
					margin:auto;
					max-width:1349px;
					padding:50px;	
				}
			</style>
			<!-- END ARTICEL -->

			<!-- GALERY -->
			<div id="dekstop-home-4">						
				<?php 
					if(count($dataGalery)){
				?>
					<div class="text-center p-4">
						<h1>Gallery</h1>
					</div>

					<div class="row">
						<?php 
							foreach($dataGalery as $item){
						?>						
						<div class="col-6 animated flipInX">
							<h5><?= ucwords($item['title']);?></h5>
							<div class="d-flex flex-row flex-wrap justify-content-between">
								<?php 
									$galeryJson = json_decode($item['images']);
								?>								
								<?php foreach ($galeryJson as $itemGalery) { ?>								
								<div class="mb-2">
									<img src="<?= base_url('assets/images/galeries/'.$itemGalery);?>"
										width="300px"
										style="cursor:pointer"
										onclick="window.open('<?= base_url('assets/images/galeries/'.$itemGalery);?>')">
								</div>
								<?php } ?>											
							</div>
						</div>				
						<?php 
							}
						?>
					</div>	
				<?php 
					}else{						
				?>		
					<div class="text-center">
						<img src="<?= base_url('assets/images/not-found.png');?>"
							style="width:45%">
						<h5>Data tidak ditemukan</h5>
						<p><small>Data galeri tidak ditemukan</small></p>
					</div>
				<?php 
					}	
				?>				
			</div>

			<style>
				#dekstop-home-4{
					margin-bottom: 50px;
					background:url('<?= base_url('assets/images/home-background-4.png');?>') no-repeat;			
					margin:auto;
					max-width:1349px;
					padding:50px;
				}
			</style>			
			<!-- END GALERY -->
		</div>
	<?php } ?>
	<!-- END DEKSTOP -->

	<!-- MOBILE -->
	<?php if($_ENV['agent']->isMobile()){ ?>
		<div class="d-block d-md-none d-lg-none d-xl-none d-xs-block d-sm-block">
			<!-- HOME -->
			<div id="mobile-home-1">
				<div class="clearfix">
					<div class="float-left p-4">
						<img src="<?= base_url('assets/images/logo.png');?>"
							width="50px">	
						<span class="text-white" style="font-size:10px"><?= $_ENV['app.site_name'];?></span>
					</div>

					<div class="float-right p-4 text-white" onclick="toggleMenu()">
						<i class='fa fa-align-left fa-1x'></i>
					</div>
				</div>

				<div class="p-2 animated flipInX text-white text-center mt-5">
					<h1 id="home-title"><?= $_ENV['app.site_name'];?></h1>
					<p>
						Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem 
						IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem
						IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem em IpsumLorem Ipsum
					</p>				
				</div>
			</div>

			<style>
				#mobile-home-1{
					background:url('<?= base_url('assets/images/mobile-background.png');?>') no-repeat;
					min-height: 700px;		
					width:360px;
				}
			</style>
			<!-- END HOME -->

			<!-- PROFIL -->
			<div id="mobile-home-2"
				class="container-fluid">
				<div class="row p-3">
					<div class="col-12 animated flipInX">
						<h1>Profil Kami</h1>
						<p>
							Lorem Ipsum Lorem IpsumLorem IpsumLorem 
							IpsumLorem IpsumLorem IpsumLorem IpsumLorem 
							IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem 
						</p>
						<p>
							<img src="<?= base_url('assets/images/home-maps.png');?>" 
							class="img-fluid"/>
						</p>
					</div>
					<div class="col-12 animated flipInX">
						<h3>Visi Dan Misi Kami</h3>
						<ul class="list-group">
							<li class="list-group-item">
							Lorem Ipsum Lorem IpsumLorem IpsumLorem
							IpsumLorem IpsumLorem
							</li>
							<li class="list-group-item">
							Lorem Ipsum Lorem IpsumLorem IpsumLorem
							IpsumLorem IpsumLorem
							</li>
							<li class="list-group-item">
							Lorem Ipsum Lorem IpsumLorem IpsumLorem
							IpsumLorem IpsumLorem
							</li>
						</ul>
					</div>
				</div>
			</div>

			<style>
				#mobile-home-2{
					width:360px;
				}
			</style>
			<!-- END PROFIL -->

			<!-- ARTICEL -->
			<div id="mobile-home-3">
				<?php 
					if(count($dataArticel)){
				?>
					<div class="text-center p-4">
						<h1>Artikel</h1>
					</div>

					<div class="d-flex flex-row flex-wrap p-2">
						<?php 
							foreach ($dataArticel as $item) {					
						?>	
						<!-- MODAL ARTICEL -->
						<div id="modalArticel<?= $item['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLiveLabel"><?= ucwords($item['title']);?></h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						      	<div class="text-center">
						      		<img src="<?= base_url('assets/images/articels/'.$item['image']);?>"
							      		style="width:70%;border-radius:10px">
						      	</div>

						      	<div class="mt-3">
						      		<?= $item['content'];?>
						      	</div>
						      </div>		      
						    </div>
						  </div>
						</div>
						<!-- END MODAL ARTICEL -->

						<div class="animated flipInX">
							<div class="card">
								<img class="card-img-top" src="<?= base_url('assets/images/articels/'.$item['image']);?>">
								<div class="card-body">
								<h5><?= $item['title'];?></h5>
								<p>
									<?= str_replace('&nbsp;',' ',word_limiter(strip_tags($item['content']),10,' . . .'));?>
								</p>
								<p>
									<a href="#" data-toggle="modal" data-target="#modalArticel<?= $item['id'];?>">
										Baca Selengkapnya . . .
									</a>
								</p>
								</div>
							</div>
						</div>				
						<?php } ?>
					</div>
				<?php 
					}else{
				?>
					<div class="text-center pl-3 pr-3">
						<img src="<?= base_url('assets/images/not-found.png');?>"
							class="img-fluid">
						<h5>Data tidak ditemukan</h5>
						<p><small>Data artikel tidak ditemukan</small></p>
					</div>		
				<?php 
					}
				?>
			</div>

			<style>		
				#mobile-home-3{
					width:360px;	
					margin-top:80px;
					margin-bottom: 80px;
				}	
			</style>
			<!-- END ARTICEL -->

			<!-- GALERY -->
			<div id="mobile-home-4">			
				<?php 
					if(count($dataGalery)){ 
				?>
					<div class="text-center p-4">
						<h1>Gallery</h1>
					</div>	

					<?php foreach ($dataGalery as $item) { ?>				
					<div class="p-4">
						<div class="animated flipInX">
							<h5><?= ucwords($item['title']);?></h5>
							<div class="d-flex flex-row flex-wrap justify-content-between">
								<?php 
									$galeryJson = json_decode($item['images']);
								?>

								<?php foreach ($galeryJson as $itemGalery) { ?>								
								<div class="mb-2">
									<img src="<?= base_url('assets/images/galeries/'.$itemGalery);?>"
										width="300px"
										style="cursor:pointer"
										onclick="window.open('<?= base_url('assets/images/galeries/'.$itemGalery);?>')">
								</div>
								<?php } ?>		
							</div>
						</div>				
					</div>		
					<?php } ?>
				<?php 
					}else{
				?>
					<div class="text-center pl-3 pr-3">
						<img src="<?= base_url('assets/images/not-found.png');?>"
							class="img-fluid">
						<h5>Data tidak ditemukan</h5>
						<p><small>Data galeri tidak ditemukan</small></p>
					</div>
				<?php 
					}	
				?>				
			</div>

			<style>
				#mobile-home-4{
					width:360px;
					margin-top: 80px;
					margin-top: 80px;
				}
			</style>
			<!-- END GALERY -->

			<!-- MENU -->
			<div id="mobile-menu"
				class="container-fluid">
				<div class="row" style="height:100%">
					<div class="col-1 bg-light text-dark text-center pt-3">
						<i class='fa fa-times fa-2x' onclick="toggleMenu()"></i>
					</div>

					<div class="col-11 text-white" style="background:#8652ec">
						<?php if(!session('user')){ ?>
						<div class="p-3"
							onclick="window.location='<?= base_url('signin');?>'">
							Masuk
						</div>

						<div class="p-3"
							onclick="window.location='<?= base_url('signup');?>'">
							Daftar
						</div>
						<?php }else{ ?>					
						<div class="p-3"
							onclick="window.location='<?= base_url('user');?>'">
							Dashboard
						</div>
						<?php } ?>

						<div class="p-3" onclick="toggleContactUs()">
							Kontak Kami
						</div>						
					</div>
				</div>
			</div>

			<style>
				#mobile-menu{
					position:fixed;
					top:0px;
					bottom:0px;
					width:100vh; 
					z-index:1001;
					display:none;
				}			
			</style>
			<!-- END MENU -->

			<!-- CONTACT US -->
			<div id="mobile-contact-us"
				class="container-fluid">			
				<form class="mt-3" id="form-message-mobile" method="post" action="<?= base_url('contact-us');?>">					
					<?= csrf_field();?>

					<div class="clearfix">
						<div class="float-right">
							<i class='fa fa-times fa-2x' onclick="toggleContactUs()"></i>		
						</div>
					</div>

					<div class="text-center p-3">
						<img src="<?= base_url('assets/images/message-ilustrasion.png');?>"
							style="width:60%">
					</div>

					<div class="form-group">
						Nama :
						<input type="text" class="form-control" placeholder="Nama . . ."
							name="name"
							data-parsley-required>
					</div>

					<div class="form-group">
						Email : 
						<input type="email" class="form-control" placeholder="Email . . ."
							name="email"
							data-parsley-required
							data-parsley-email>
					</div>

					<div class="form-group">
						No Telp :
						<input type="text" class="form-control" placeholder="No Telp . . ."						
							name="phone"
							data-parsley-required>
					</div>

					<div class="form-group">
						Pesan : 
						<textarea class="form-control" placeholder="Pesan . . ."
							name="message"
							data-parsley-required></textarea>
					</div>
				
					<button type="submit" class="btn btn-private-driveing">Submit</button>
				</form>
			</div>

			<style>
				#mobile-contact-us{
					position:fixed;
					top:0px;
					bottom:0px;
					background:white;
					z-index:1002;
					display:none;
				}			
			</style>
			<!-- END CONTACT US -->
		</div>	
	<?php } ?>	
	<!-- END MOBILE -->

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

	<?php if(!$_ENV['agent']->isMobile()){ ?>
	 <script>
		var passImage = 1;

		setInterval(function(){
			passImage = passImage == 3 ? 1 : (passImage += 1);		
			$("#home-ilustrasion").attr("src","<?= base_url('assets/images/');?>/home-ilustrasion-"+passImage+".png")
		},500);
	</script>	

	<script>
		$("#form-message-dekstop").parsley().on('form:validate',function(){
  			if(this.isValid()){
			    $(".btn-private-driveing").attr("disabled",true);
	  		}else{
		    	toastr.warning("Sepertinya ada data yang belum valid","");
  			}  
		});
	</script>
	<?php } ?>

	<?php if($_ENV['agent']->isMobile()){ ?>
		<script>
		$("#form-message-mobile").parsley().on('form:validate',function(){
	  		if(this.isValid()){
			    $(".btn-private-driveing").attr("disabled",true);
		  	}else{
		    	toastr.warning("Sepertinya ada data yang belum valid","");
	  		}  
		});
		</script>
	<?php } ?>

	<script>	
	function spellText(id,first){		
		var text = $("#"+id).text();	
		$("#"+id).text(first);				
		var maxTime = text.length;	
		var times = 1;
		setInterval(function(){
			$("#"+id).text($("#"+id).text() + text[times]);
			times += 1;
			if(maxTime == times){	
				$("#"+id).text(first);
				times = 1;
			}		
		},200);			
	}

	function toggleMenu(){
		$("#mobile-menu").toggle();
		$("#mobile-menu").addClass('animated fadeInDown')
	}

	function toggleContactUs(){
		$("#mobile-contact-us").toggle();
		$("#mobile-contact-us").addClass('animated fadeInUp')
	}

	function toggleMessageBox(){
		$("#message-box").toggle();
		$("#message-box").addClass('animated flipInX')
	}

	window.onload = function(){		
		spellText("home-title",'K');
	}
	</script>
</body>
</html>