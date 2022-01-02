<?= $this->extend('user/layout/default'); ?>

<?= $this->section('title');?>
	Profil
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profil</h1>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">    
    <div class="card-body">
    	<div class="row">
    		<div class="col-lg-6 col-xs-6 col-md-6 col-sm-12 text-center">
    			<img src="<?= base_url('assets/images/users/'.session('user')['photo']);?>" class="img-fluid">

    			<form class="mt-3" enctype="multipart/form-data" method="post" action="<?= base_url('user/update-profil-photo');?>"> 
                    <?= csrf_field();?>
    				<div class="form-group row">                        
    					<div class="col-lg-2 col-xs-2 col-md-2 col-sm-12 pt-2 mt-2 text-muted text-left">
                            Photo 
                        </div>
    					<div class="col-lg-7 col-xs-7 col-md-7 col-sm-12 text-left mt-2">
                            <input type="file" class="form-control" name="photo">
                        </div>
    					<div class="col-lg-2 col-xs-2 col-md-2 col-sm-12 text-left mt-2">
                            <button class="btn btn-private-driveing">Kirim</button>
                        </div>
    				</div>
    			</form>
    		</div>

    		<div class="col-lg-6 col-xs-6 col-md-6 col-sm-12">
    			<h5>Data Profil</h5>

    			<form class="mt-3" id="form-data" method="post" action="<?= base_url('user/update-profil-data');?>">
                    <?= csrf_field();?>

    				<div class="form-group row">
    					<div class="col-lg-3 col-xs-3 col-md-3 col-sm-12 pt-2 text-muted">
                            Username 
                        </div>
    					<div class="col-lg-9 col-xs-9 col-md-9 col-sm-12">
  							<input type="text" class="form-control" value="<?= session('user')['username'];?>" disabled>    						
  							<div class="text-muted small mt-2">
                                Masukan Username
                            </div>
    					</div>
    				</div>

    				<div class="form-group row">
    					<div class="col-lg-3 col-xs-3 col-md-3 col-sm-12 pt-2 text-muted">
                            Email
                        </div>
    					<div class="col-lg-9 col-xs-9 col-md-9 col-sm-12">
    						<input type="email" class="form-control" value="<?= session('user')['email'];?>" placeholder="Masukan Email"
                                name="email"
                                data-parsley-required 
                                data-parsley-email>
    						<div class="text-muted small mt-2">
                                Masukan Email
                            </div>
    					</div>
    				</div>

    				<div class="form-group row">
    					<div class="col-lg-3 col-xs-3 col-md-3 col-sm-12 pt-2 text-muted">
                            No Telp
                        </div>
    					<div class="col-lg-9 col-xs-9 col-md-9 col-sm-12">
    						<input type="text" class="form-control" value="<?= session('user')['phone'];?>" placeholder="Masukan No Telp"
                                name="phone"
                                data-parsley-required>
    						<div class="text-muted small mt-2">
                                Masukan No Telp
                            </div>
    					</div>    						
    				</div>

    				<div class="form-group row">
    					<div class="col-lg-3 col-xs-3 col-md-3 col-sm-12 pt-2 text-muted">
                            Password
                        </div>
    					<div class="col-lg-9 col-xs-9 col-md-9 col-sm-12">
    						<input type="password" class="form-control" placeholder="Password"
                                name="password">
    						<div class="text-muted small mt-2">
                                Masukan password jika ingin menganti password
                            </div>
    					</div>
    				</div>

    				<div class="form-group row">
    					<div class="col-lg-3 col-xs-3 col-md-3 col-sm-12 pt-2 text-muted">
                            Password Konfirmasi
                        </div>
    					<div class="col-lg-9 col-xs-9 col-md-9 col-sm-12">
    						<input type="password" class="form-control" placeholder="Password Konfirmasi"
                                name="password_confirm"
                                data-parsley-required>
    						<div class="text-muted small mt-2">
                                Masukan Password Konfirmasi
                            </div>
    					</div>
    				</div>

    				<div class="text-right">
    					<button class="btn btn-private-driveing">
                            Kirim
                        </button>
    				</div>
    			</div>
    		</div>    		
    	</div>
    </div>   
  </div>
</section>
<?= $this->endSection();?>

<?= $this->section("sc_footer");?>
<script>
    $("#form-data").parsley().on('form:validate',function(){
        if(this.isValid()){
            $(".btn-private-driveing").attr("disabled",true);
        }else{
            toastr.warning("Sepertinya ada data yang belum valid","");
        }  
    });
</script>
<?= $this->endSection();?>