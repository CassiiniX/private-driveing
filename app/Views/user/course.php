<?= $this->extend('user/layout/default'); ?>

<?= $this->section('title');?>
	Detail Kursus
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
	<?php if(!$course){ ?>
		<div class="container-fluid bg-white mt-5" 
			style="height:100vh">
			<div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 m-auto text-center animated bounceIn">
				<img src="<?= base_url('assets/images/no-course.png');?>"
					class="img-fluid">
				<p>
					<h5>Belum ada Jadwal Kursus</h5>
				</p>
			</div>
		</div>	
	<?php }else{ ?>
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
			            		<td>Telat Pembayaran</td>
			            		<td><b class="text-danger"><?= $paymentLate;?></b></td>
							</tr>
			            	<tr>
			            		<td colspan="2" class="text-center">
			            			<button class="btn btn-danger mb-2"
			            				onclick="cancelOrder('<?= base_url('user/course/cancel/'.$course['id']);?>')">
			            				<i class='fa fa-times'></i> Batalkan
			            			</button>

			            			<?php if($course['status'] == "payment"){ ?>
			            				<button class="btn btn-success mb-2"
			            					data-toggle="modal" data-target="#modalManualPayment">
			            					<i class="fa fa-dollar-sign"></i> Lakukan Pembayaran
			            				</button>

			            				<button class="btn btn-primary mb-2"	
			            					data-toggle="modal" data-target="#modalAimPayment">
			            					<i class="fa fa-info-circle"></i> Tujuan Pembayaran
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
				    					<div class="col-md-4 text-center mb-2">
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
			          			<td><?= $instructur['name'];?></td>
			          		</tr>
			          		<tr>
			          			<td>Email</td>
			          			<td><?= $instructur['email'];?></td>
			          		</tr>
			          		<tr>
			          			<td>Phone</td>
			          			<td><?= $instructur['phone'];?></td>
			          		</tr>		          	
			          		<tr>
			          			<td colspan="2" class="text-center">
			          				<?php if($course['status'] == "running"){ ?>
				          				<button class="btn btn-success"
				          					data-toggle="modal" data-target="#modalReview">
				          					<i class='fa fa-star'></i> Berikan Review
				          				</button>
			          				<?php } ?>
			          			</td>
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
	            <i class="fas fa-clock bg-<?= ($item['isToday'] ? 'warning' : ($item['active'] ? 'success' : 'danger'));?> animated bounceIn"></i>
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
	           <i class="fas fa-clock bg-<?= ($item['isToday'] ? 'warning' : ($item['active'] ? 'success' : 'danger'));?>"></i>
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
	<?php } ?>
<?= $this->endSection();?>

<?= $this->section("sc_footer");?>

<?php if($course){ ?>
	<?= $this->include("user/course/modal-pending");?>

	<?= $this->include("user/course/modal-payment");?>

	<?= $this->include("user/course/modal-waiting");?>

	<?= $this->include("user/course/modal-running");?>

	<?= $this->include("user/course/modal-review");?>

	<?= $this->include("user/course/modal-aim-payment");?>

	<?= $this->include("user/course/modal-payment-box");?>
<?php } ?>

<script>
function cancelOrder(action){
	swal.fire({
    	title: 'Apakah Anda Yakin?',
    	text: 'Membatalkan Kursus Ini',
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