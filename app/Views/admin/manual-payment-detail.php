<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('title');?>
	Detail Pembayaran Manual
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Detail Pembayaran Manual</h1>
      </div>
    </div>
  </div>
</section>

<div class="container">
	<div class="row">
		<div class="col-5">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<table class="table table-borderless">
								<tr>
									<td colspan="2">
										<a href="<?= base_url('assets/images/proofs/'.$manualPayment['proof']);?>" 
											target="_blank">
											<img src="<?= base_url('assets/images/proofs/'.$manualPayment['proof']);?>"
												class="img-fluid">
										</a>
									</td>
								</tr>
								<tr>
									<td>Deskripsi</td>
									<td><?= $manualPayment['description'];?></td>
								</tr>
								<tr>
									<td>Status</td>
									<td>
										<?php if($manualPayment['status'] == "validasi"){ ?>
											<span class="badge badge-primary">Validasi</span>
										<?php }else if($manualPayment['status'] == "success"){ ?>
											<span class="badge badge-success">Berhasil</span>
										<?php }else if($manualPayment['status'] == "failed"){ ?>
											<span class="badge badge-danger">Gagal</span>
										<?php } ?>
									</td>
								</tr>
								<tr>
									<td>Dikirim Pada</td>
									<td><?= $manualPayment['created_at'];?></td>
								</tr>
								<?php if($manualPayment['status'] == "validasi"){ ?>
								<tr>
									<td colspan="2" class="text-center">
										<button class="btn btn-success"
											onclick="window.location='<?= base_url('admin/manual-payment/success/'.$manualPayment['id']);?>'">
											<i class='fa fa-check'></i> Berhasil
										</button>
										<button class="btn btn-danger"
											onclick="onFailed('<?= base_url('admin/manual-payment/failed/'.$manualPayment['id']);?>')">
											<i class="fa fa-times"></i> Gagal
										</button>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
					</div>
				</div>

				<div class="col-12">
				<?php if(count($historyManualPayment)){ ?>
		    		<div class="card">
		    			<div class="card-body">	    				    		
		    				<div class="text-center mb-4">
		    					<h5>Riwayat Pembayaran Manual</h5>
		    				</div>
		    				
		    				<div class="row">
		    					<?php foreach($historyManualPayment as $item){ ?>		    						
		    						<div class="col-md-1">
		    							<a href="<?= base_url('admin/manual-payment/detail/'.$item['id']);?>"><?= $item['id'];?></a>
		    						</div>

			    					<div class="col-md-3 text-center mb-2">
			    						<a href="<?= base_url('assets/images/proofs/'.$item['proof']);?>" target="_blank">
			    							<img src="<?= base_url('assets/images/proofs/'.$item['proof']);?>" 
			    								style="width:80px">	  
			    						</a>
			    					</div>	    						  			    					
			    					<div class="col-md-8 p-1">			    				
			    						<div class="row">
			    							<div class="col-12">
			    								<div class="clearfix">
			    									<div class="float-left">
			    										<?php if($item['status'] == "validasi"){  ?>
						    								<span class="badge badge-primary">Validasi</span>
			    										<?php }else if($item['status'] == "success"){ ?>
						    								<span class="badge badge-success">Berhasil</span>
			    										<?php }else if($item['status'] == "failed"){ ?>
				    										<span class="badge badge-danger">Gagal</span>
			    										<?php } ?>	   
			    									</div>
			    									<div class="float-right">
			    										<?= $item['created_at'];?>	    				
			    									</div>
			    								</div>		    								
			    							</div>

			    							<div class="col-12">
			    								<?= $item['description'];?>
			    							</div>		    					
			    						</div>
			    					</div>	    
		    					<?php } ?>
		    				</div>	    	
		    			</div>
		    		</div>		    	
	    		<?php } ?>
				</div>
			</div>
		</div>

		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<table class="table table-reponsive">
						<tr>
							<td colspan="2" class="text-center">
								 <img src="<?= base_url('assets/images/course-'.$course['status'].'.png');?>"
                                    style="width:70%"/>      
							</td>
						</tr>
						<tr>
							<td>Kursus</td>
							<td>
								<a href="<?= base_url('admin/course?search='.$course['id']);?>" 
									target="_blank">
									<?= $course['id'];?>
								</a>
							</td>
						</tr>
						<tr>
							<td>User</td>
							<td>
								<a href="<?= base_url('admin/user?search='.$user['id']);?>" 
									target="_blank">
									<?= $user['username'];?>
								</a>
							</td>
						</tr>
						<tr>
							<td>Insturktur</td>
							<td>
								<a href="<?= base_url('admin/instructur?search='.$instructur['id']);?>" 
									target="_blank">
									<?= $instructur['name'];?>
								</a>
							</td>
						</tr>				
						 <tr>
		            		<td>Biaya </td>
		            		<td><b>Rp.<?= number_format($course['cost'],2);?></b></td>
		            	</tr>
		            	<tr>
		            		<td>Pertemuan </td>
		            		<td><?= $course['meet'];?> Hari </td>
		            	</tr>		      
		            	<tr>
		            		<td>Lama Kursus </td>
		            		<td><?= $course['hour'];?> Jam</td>
		            	</tr>     
		            	<tr>
		            		<td>Dibuat Pada</td>
		            		<td><?= $course['created_at'];?></td>
		            	</tr>		
		            	<tr>
		            		<td>Telat Bayar Pada</td>
		            		<td><b class="text-danger"><?= $paymentLate;?></b></td>
		            	</tr>		
		            	<?php if(!$isValidate){ ?>
			            	<?php if($course['status'] == "payment"){ ?>
		            		<tr>
			            		<td colspan="2" class="text-center">
		            				<button class="btn btn-primary"
		            					onclick="window.location='<?= base_url('admin/manual-payment/complete/'.$course['id']);?>'">
		            					Tanda Tuntas Bayar
		            				</button>
		            			</td>
		            		</tr>
		            		<?php } ?>
		            	<?php }else{ ?>		            	 
		            	<tr>
		            		<td colspan="2">
		            			<div class="alert alert-primary text-center"
		            				style="opacity:0.5">
		            				Pembayaran manual masih terdapat data yang perlu divalidasi
		            			</div>
		            		</td>
		            	</tr>
		            	<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection();?>

<?= $this->section("sc_footer");?>
<script>
function onFailed(action){
	swal.fire({
    	title: 'Apakah Anda Yakin?',
    	text: 'Mengagalkan pembayaran ini',
    	icon: 'warning',
    	confirmButtonColor: '#fe7c96',
    	showCancelButton: true,
    	confirmButtonText: 'Oke',
    	showLoaderOnConfirm: true,
    	cancelButtonText: 'Batal',      
  	})
  	.then(result => {
	  	if(result.value){  	 	
  	 		window.location = action;
  		}
  	})
}
</script>
<?= $this->endSection();?>