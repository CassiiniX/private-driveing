<?= $this->extend('user/layout/default'); ?>

<?= $this->section('title');?>
	Riwayat Kursus
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
	<?php if(!count($course)){ ?>
		<div class="container-fluid bg-white mt-5" 
			style="height:100vh">
			<div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 m-auto text-center animated bounceIn">
				<img src="<?= base_url('assets/images/no-course.png');?>"
					class="img-fluid">
				<p>
					<h5>Belum ada jadwal kursus</h5>
				</p>
			</div>
		</div>	
	<?php }else{ ?>
		<div class="container-fluid pt-2">
			<div class="row">
				<?php foreach ($course as $item) { ?>			
					<div class='col-12'>
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<img src="<?= base_url('assets/images/course-'.$item['status'].'.png');?>" 
											class="img-fluid">                	 
									</div>

									<div class="col-md-4">							
										<div class="row p-4">
											<div class="col-6">
												<div class="row">
													<div class="col-12">
														<?php if($item['status'] == "pending"){ ?>
					              							<span class="badge badge-warning text-white">Status : Pending</span>
					            						<?php }else if($item['status'] == "payment"){ ?>
					              							<span class="badge badge-success text-white">Status : Pembayaran</span> 
					            						<?php }else if($item['status'] == "waiting"){ ?>
					              							<span class="badge badge-success text-white">Status : Menunggu</span>
					            						<?php }else if($item['status'] == "running"){ ?> 
					              							<span class="badge badge-warning text-white">Status : Berjalan</span>
					            						<?php }else if($item['status'] == "success"){ ?> 
					            							<span class="badge badge-success text-white">Status : Selesai</span>
					            						<?php }else if($item['status'] == "canceled"){ ?> 
					            							<span class="badge badge-danger text-white">Status : Dibatalkan</span>
					            						<?php }else if($item['status'] == 'rejected'){ ?>
					            							<span class="badge badge-danger text-white">Status : Ditolak</span>
					            						<?php }else if($item['status'] == 'failed'){ ?>
					            							<span class="badge badge-danger text-white">Status : Digagalkan</span>
					            						<?php } ?>
													</div>
													<div class="col-12 mt-3"
														style="font-size:13px">
														<b>													
															Rp. <?= number_format($item['cost'],2);?>
														</b>
													</div>
													<div class="col-12 mt-3"
														style="font-size:13px">
														<a href="<?= base_url('user/course/'.$item['id']);?>" 
															style="font-size:13px">
															Lihat Selengkapnya
														</a>
													</div>
												</div>
											</div>
											<div class="col-6"
												style="font-size:13px">							
											 	<?= $item['meet'];?> Hari Pertemuan
											</div>							
										</div>
									</div>

									<div class="col-md-5">
										<div class="row p-4">
											<div class="col-2 text-center">
												<img src="<?= base_url('assets/images/instructurs/'.$item['instructur']['photo']);?>"
				          							class="img-fluid">		
											</div>
											<div class="col-8">
												<table class="table table-borderless" 												
													style="font-size:13px">
													<tr>
														<td>Nama</td>
														<td><?= $item['instructur']['name'];?></td>
													</tr>
													<tr>
														<td>Email</td>
														<td><?= $item['instructur']['email'];?></td>
													</tr>	
													<tr>
														<td>No Telp</td>
														<td><?= $item['instructur']['phone'];?></td>
													</tr>
												</table>										
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

			<div class="clearfix">
				<div class="float-right">
					<?= $pager->links('query', 'bootstrap_pagination') ?>
				</div>
			</div>
		</div>
	<?php } ?>
<?= $this->endSection();?>