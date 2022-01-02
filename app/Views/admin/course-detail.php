<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('title');?>
	Detail Kursus
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
<div class="container">
	<div class="row p-3">
	  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-3">
	  	<div class="row">
	  		<div class="col-12">
		        <div class="card animated bounceIn">
		          <div class="card-body">             
		            <div class="text-center mb-2">
		              <img src="<?= base_url('assets/images/course-'.$course['status'].'.png');?>"
		                style="width:80%">    		             
		            </div>

		            <table class="table table-borderless">
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
		            		<td>Status </td>
		            		<td>
			            		<?php if($course['status'] == "pending"){ ?>
	      							<span class="badge badge-warning text-white">Pending</span>
	    						<?php }else if($course['status'] == "payment"){ ?>
	      							<span class="badge badge-success text-white">Pembayaran</span> 
	    						<?php }else if($course['status'] == "waiting"){ ?>
	      							<span class="badge badge-success text-white">Menunggu</span>
	    						<?php }else if($course['status'] == "running"){ ?> 
	      							<span class="badge badge-warning text-white">Berjalan</span>
	    						<?php }else if($course['status'] == "success"){ ?> 
	    							<span class="badge badge-success text-white">Selesai</span>
	    						<?php }else if($course['status'] == "canceled"){ ?> 
	    							<span class="badge badge-danger text-white">Dibatalkan</span>
	    						<?php }else if($course['status'] == 'rejected'){ ?>
	    							<span class="badge badge-danger text-white">Ditolak</span>
	    						<?php }else if($course['status'] == 'failed'){ ?>
	    							<span class="badge badge-danger text-white">Digagalkan</span>
	    						<?php } ?>
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
		            		<td>
		            			<b class="text text-danger">
		            				<?= $paymentLate;?>
		            			</b>
		            		</td>
		            	</tr>
		            	<tr>
		            		<td colspan="2" class="text-center">
		            			<?php if($course['status'] == "pending"){ ?>
		            				<button class="btn btn-primary"
			            				onclick="window.location='<?= base_url('admin/course/approve/'.$course['id']);?>'">
		            					<i class='fa fa-check'></i> Terima
		            				</button>
		            				<button class="btn btn-danger"
			            				onclick="rejected('<?= base_url('admin/course/reject/'.$course['id']);?>')">
		            					<i class='fa fa-times'></i> Tolak
		            				</button>
		            			<?php } ?>

		            			<?php if($course['status'] == "payment"){ ?>
		            				<?php if($isLate){ ?>
		            					<div class="alert alert-danger" 
		            						style="opacity:0.5">
		            						User telat membayar kursus anda harus mengklik tombol dibawah ini
		            						untuk mengagalkan kursus
		            					</div>

		            					<button class="btn btn-danger"
		            						onclick="window.location='<?= base_url('admin/course/failed/'.$course['id']);?>'">
		            						Gagalkan
		            					</button>
		            				<?php }else{ ?>
		            					<div class="alert alert-primary" 
		            						style="opacity:0.5">		            				
			            					Untuk mengubah status kursus bisa dilakukan 
		            						<br/> 
		            						Pada halaman pembayaran manual jika user telah membayar
		            					</div>
		            				<?php  } ?>
		            			<?php } ?>

		            			<?php if($course['status'] == "waiting"){ ?>
		            				<button class="btn btn-success"
		            					onclick="window.location='<?= base_url('admin/course/running/'.$course['id']);?>'">
		            					Tandai kursus telah dimulai
		            				</button>
		            			<?php } ?>

		            			<?php if($course['status'] == "running"){ ?>
		            				<button class="btn btn-success"
		            					onclick="window.location='<?= base_url('admin/course/success/'.$course['id']);?>'">
		            					Tandai kursus telah selesai
		            				</button>
		            			<?php } ?>
		            		</td>
		            	</tr>
		            </table>               
		          </div>
		        </div>
	    	</div>

	    	<?php if(count($manualPayment)){ ?>
		    	<div class="col-12">
		    		<div class="card animated bounceIn">
		    			<div class="card-body">	    				    		
		    				<div class="text-center mb-4">
		    					<h5>Riwayat Pembayaran Manual</h5>
		    				</div>
		    				
		    				<div class="row">
		    					<?php foreach($manualPayment as $item){ ?>		    						
			    					<div class="col-md-4 text-center mb-2"
			    						onclick="window.location='<?= base_url('admin/manual-payment/detail/'.$item['id']);?>'"
			    						style="cursor:pointer">
			    						<img src="<?= base_url('assets/images/proofs/'.$item['proof']);?>" 
			    							style="width:80px">	  
			    					</div>	    						  			    					
			    					<div class="col-md-8 p-1"
			    						onclick="window.location='<?= base_url('admin/manual-payment/detail/'.$item['id']);?>'"
			    						style="cursor:pointer">
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
		    	</div>
	    	<?php } ?>

	    	<div class="col-12">
	    		<div class="card animated bounceIn">
		          <div class="card-body">  
		          	<div class="text-center mb-2">
		          		<img src="<?= base_url('assets/images/instructurs/'.$instructur['photo']);?>"
		          			class="img-fluid">		          		
		          	</div>
		          	<table class="table table-borderless">		          		
		          		<tr>
		          			<td>Nama</td>
		          			<td>
		          				<a href="<?= base_url('admin/instructur?search='.$instructur['id']);?>" target="_blank"><?= $instructur['name'];?></a>
		          			</td>
		          		</tr>
		          		<tr>
		          			<td>Email</td>
		          			<td><?= $instructur['email'];?></td>
		          		</tr>
		          		<tr>
		          			<td>Phone</td>
		          			<td><?= $instructur['phone'];?></td>
		          		</tr>		          	
		          	</table>
		          </div>
		        </div>
	    	</div>
	    </div>
	  </div>

	  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
	    <div class="timeline">
	     <?php foreach(time_make_timeline($course) as $item){ ?>
	      <div class="time-label">
	        <span class="bg-<?= ($item['isToday'] ? 'warning' : ($item['active'] ? 'success' : 'danger'));?> animated bounceIn">
	        	<?= $item['date'];?>
	        </span>
	      </div> 

	      <div>
	        <i class="fas fa-clock bg-<?= ($item['isToday'] ? 'warning' : ($item['active'] ? 'success' : 'danger'));?> animated bounceIn">
	        </i>
	        <div class="timeline-item">           
	          <span class="time"> 
	            <i class="fas fa-clock"></i> Pukul <?= $course['clock_start'];?>
	          </span>
	          <div class="p-2">
	            Kursus Dimulai
	          </div>
	        </div>
	      </div>           

	      <div>
	       <i class="fas fa-clock bg-<?= ($item['isToday'] ? 'warning' : ($item['active'] ? 'success' : 'danger'));?>">
	       </i>
	        <div class="timeline-item">          
	          <span class="time">
	            <i class="fas fa-clock"></i> Pukul <?= $item['clock_end'];?>
	          </span>
	          <div class="p-2">
	            Kursus Berakhir
	          </div>
	        </div>
	      </div>   
	     <?php } ?>                  
	    </div>
	  </div>
	</div>
</div>
<?= $this->endSection();?>

<?= $this->section("sc_footer");?>
	<?php if($course['status'] == "pending"){ ?>
		<script>
			function rejected(action){
				swal.fire({
			    	title: 'Apakah Anda Yakin?',
			    	text: 'Ingin Menolak Kursus Ini',
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
	<?php } ?>
<?= $this->endSection();?>