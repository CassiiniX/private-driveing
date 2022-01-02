<?= $this->extend('user/layout/default'); ?>

<?= $this->section('title');?>
	Instruktur
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Instruktur</h1>
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
    	<?php if(!count($instructur)){ ?>
    		<div class="text-center">
				<img src="<?= base_url('assets/images/not-found.png');?>"
					style="width:45%">
				<h5>Data tidak ditemukan</h5>
				<p><small>Data instruktur tidak ditemukan</small></p>
			</div>
    	<?php }else{ ?>
	    	<div class="row">
		    	<?php 
		    		$theBgColor = ["danger","success","dark","warning"];
		    		foreach ($instructur as $item) {
		    	?>		    		
					<div class="col-sm-3 mb-3">
				        <div class="position-relative p-3 bg-<?= $theBgColor[rand(0,2)];?> text-center" 
				        	style="border-radius:10px">	

				          <div class="ribbon-wrapper ribbon-lg animated bounceIn" 
				          	style="cursor:pointer"
				          	data-toggle="modal" data-target="#modalInstructur<?= $item['id'];?>">
	                        <div class="ribbon bg-primary">
	                          <i class='fas fa-comment'></i> Review
	                        </div>
	                      </div>

				          <img src="<?= base_url('assets/images/instructurs/'.$item['photo']);?>" class="img-fluid animated bounceIn">			        

				          <p class="animated bounceIn">
				          	<?= $item['name'];?>
				          </p>

				          <span class="animated bounceIn">
				          	<?= make_star($item['star']) ?>
				          </span>

				          <p class="small animated bounceIn">
				          	<?= $item['email'];?>			         
				          	<br/>
				          	<?= $item['phone'];?>
				          </p>
				        </div>
				    </div>

				    <div id="modalInstructur<?= $item['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
				          				<img src="<?= base_url('assets/images/instructurs/'.$item['photo']);?>" 
				          					class="img-fluid">			        
				          			</div>

				          			<div class="text-center">
				          				<?= make_star($item['star']) ?>
				          			</div>

				          			<div class="small mt-3">				          			
				          				<div class="pt-2">
				          					<i class="fas fa-envelope"></i> Email
				          				</div>
										<p><?= $item['email'];?></p>

										<div class="pt-2" style="border-top:1px solid lightgray">
											<i class="fas fa-phone"></i> No Telp
										</div>
										<p><?= $item['phone'];?></p>

										<div class="pt-2" style="border-top:1px solid lightgray">
											<i class="fas fa-clock"></i> Bergabung Pada
										</div>
									    <p><?= time_human($item['created_at']);?></p>
									</div>
					      		</div>

					      		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12" 
					      			style="border-left:1px solid lightgray;max-height:500px;overflow-y:auto">
					      			<?php 
					      				if(!count($item['feedback'])){
					      			?>
					      				<div class="text-center mt-5">
											<img src="<?= base_url('assets/images/not-found.png');?>"
												style="width:70%">
											<h5>Data tidak ditemukan</h5>
											<p><small>Data review tidak ditemukan</small></p>
										</div>  
									<?php }else{ ?>									
										<?php 
											foreach ($item['feedback'] as $itemFeedback) {																																		
										?>											
						      			<div class="pb-2" 
						      				style="border-bottom:1px solid lightgray;margin-bottom:10px">
							      			<div class="user-panel d-flex p-0">
										        <div class="image">
										          <img src="<?= base_url('assets/images/users/'.$itemFeedback['user']['photo']);?>" class="img-circle" alt="User Image">
										        </div>
										        <div class="info small pt-0 pb-0 text-muted">
										          <span class="d-block">
										          	<?= ucwords($itemFeedback['user']['username']);?>
										          </span>
										          <span class="d-block">
										          	<?= time_human($itemFeedback['created_at']);?>
										          </span>
										        </div>
										    </div>					      			
						      				<div class="p-2 pl-4">
							      				<?= make_star($itemFeedback['star']);?>
						      				</div>	
						      				<div class="p-3" 
						      					style="border-radius:0px 20px 20px 20px;background:#eeeeee;font-size:14px">
							      				<?= ucwords($itemFeedback['comment']) ;?>
						      				</div>
						      			</div> 	 
						      			<?php 
						      				}
						      			?>
					      			<?php } ?>
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