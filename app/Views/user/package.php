<?= $this->extend('user/layout/default'); ?>

<?= $this->section('title');?>
	Paket
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Paket</h1>
      </div>
    </div>
  </div>
</section>

<section class="content"
	style="background:none;border:0px solid red;box-shadow:none">
  <div class="card"
	style="background:none;border:0px solid red;box-shadow:none">
    <div class="card-body"
	style="background:none;border:0px solid red;box-shadow:none">
    	<?php if(!count($package)){ ?>
    		<div class="text-center">
				<img src="<?= base_url('assets/images/not-found.png');?>"
					style="width:45%">
				<h5>Data tidak ditemukan</h5>
				<p><small>Data paket tidak ditemukan</small></p>
			</div>
    	<?php }else{ ?>
	    	<div class="row">
	    	<?php 
	    		$theBgColor = ["danger","success","dark","warning"];
	    		foreach ($package as $item) {
	    	?>		    	
				<div class="col-sm-3 mb-3">
			        <div class="position-relative p-3 bg-<?= $theBgColor[rand(0,2)];?> text-center" 
			        	style="border-radius:10px">			        			          			        
			          <div class="ribbon-wrapper ribbon-lg animated bounceIn" 
			          	style="cursor:pointer"
			      		data-toggle="modal" data-target="#modalOrder<?= $item['id'];?>">
                        <div class="ribbon bg-primary">
                          <i class='fas fa-shopping-cart'></i> Pesan
                        </div>
                      </div>
			   		  <img src="<?= base_url('assets/images/package.png');?>" 
			   		  	class="img-fluid animated bounceIn">
			          <p class="animated bounceIn"><?= $item['name'];?></p>
			          <p class="animated bounceIn"><?= $item['meet'];?> Hari Pertemuan</p>
			          <p class="badge badge-primary animated bounceIn">
			          	Rp <?= number_format($item['cost'],2);?>
			          </p>
			        </div>
			    </div>

			    <div id="modalOrder<?= $item['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				      <div class="modal-body">
				      	<div class="row">
				      		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
				      			<div class="text-center p-2">
				      				<b><?= $item['name'];?></b>
				      			</div>		

				      			<div class="text-center p-2">
			          				<img src="<?= base_url('assets/images/package.png');?>" 
			          					class="img-fluid">			        
			          			</div>			          			

			          			<div class="small mt-3">				          			
			          				<div class="pt-2">
			          					<i class="fas fa-car"></i> Pertemuaan
			          				</div>
									<p><?= $item['meet'];?> Hari</p>
									<div class="pt-2" style="border-top:1px solid lightgray">
										<i class="fas fa-dollar-sign"></i> Biaya
									</div>
									<p class="text-success">Rp <?= number_format($item['cost'],2);?></p>
									<div class="pt-2" style="border-top:1px solid lightgray">
										<i class="fas fa-clock"></i> Dibuat Pada
									</div>
								    <p><?= time_human($item['created_at']);?></p>
								</div> 
				      		</div>

				      		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12" 
				      			style="border-left:1px solid lightgray;max-height:500px;overflow-y:auto">
				      			<form method="post" action="<?= base_url('user/order');?>">
				      				<input type="hidden" name="package" value="<?= $item['id'];?>">

				      				<?= csrf_field();?>

				      				<div class="form-group">
				      					<div class="p-1 small text-muted">Pilih Instruktur : </div>
				      					<div>
				      						<select class="form-control" 
				      							name="instructur">
				      							<?php foreach ($instructur as $itemInstructur) { ?>				      											      							
				      								<option value="<?= $itemInstructur['id'];?>">
				      									<?= $itemInstructur['name'];?>
				      								</option>
				      							<?php } ?>
				      						</select>				      		
				      					</div>
				      				</div>

				      				<div class="form-group">
				      					<div class="p-1 small text-muted">Lama Kursus : </div>
				      					<div>
				      						<select class="form-control" 
				      							name="hour">
				      							<?php for($i=0;$i<$_ENV['app.course_max_hour'];$i++){ ?>
				      								<option value="<?= $i+1;?>"><?= $i+1;?> Jam</option>				      						
				      							<?php } ?>
				      						</select>
				      					</div>
				      				</div>

				      				<div class="form-group">
				      					<div class="p-1 small text-muted">Pilih Tanggal Mulai : </div>
				      					<div>
				      						<input type="date" class="form-control" 
				      							name="date_start"
				      							min="<?= $minDate;?>"
				      							required>
				      						<small class='text-muted text-danger'>*Note <?= $_ENV['app.payment_day'];?> hari untuk batas waktu pembayaran</small>
				      					</div>
				      				</div>

				      				<div class="form-group">
				      					<div class="p-1 small text-muted">Pilih Jam Mulai : </div>
				      					<div>
				      						<select class="form-control" 
				      								name="clock_start">
				      							<option value="7">Pukul 7 Pagi</option>
				      							<option value="8">Pukul 8 Pagi</option>
				      							<option value="9">Pukul 9 Pagi</option>
				      							<option value="10">Pukul 10 Siang</option>
				      							<option value="11">Pukul 11 Siang</option>
				      							<option value="12">Pukul 12 Siang</option>
				      							<option value="13">Pukul 1 Siang</option>
				      							<option value="14">Pukul 2 Siang</option>
				      							<option value="15">Pukul 3 Sore</option>
				      							<option value="16">Pukul 4 Sore</option>				      							
				      						</select>
				      					</div>
				      				</div>		
				      				
				      				<button class="btn btn-private-driveing">
				      					Kirim
				      				</button>
				      			</form>
				      		</div>
				      	</div>
				      </div>		      
				    </div>
				  </div>
				</div>
		    <?php 
		    	}
		    ?>
			</div>
		<?php } ?>
    </div>   
  </div>
</section>
<?= $this->endSection();?>