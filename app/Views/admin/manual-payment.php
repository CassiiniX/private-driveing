<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('title');?>
	Pembayaran Manual
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kelola Pembayaran Manual</h1>
      </div>
    </div>
  </div>
</section>

<div class="container"> 
    <div class="card">
    	<div class="card-body">
    		<div class="clearfix">    		
    			<div class="float-right">
    				<form>
    					<input type="text" class="form-control" 
    						placeholder="Search . . ." 
    						name="search"
    						value="<?= $search ;?>"
	    					onkeyup="event.keyCode == 13">
	    			</form>
    			</div>
    		</div>

            <div class="table-responsive">
                <table class="table mt-4">
                    <tr class="bg-dark">
                        <td>Id</td>
                        <td>Status</td>
                        <td>Bukti</td>
                        <td>User</td>
                        <td>Kursus</td>                                    
                        <td>Deskripsi</td>
                        <td>Dibuat</td>
                        <td>Opsi</td>
                    </tr>

                    <?php foreach($manualPayment as $item){ ?>
                        <tr>
                            <td><?= $item['id'];?></td>
                            <td>
                            	<?php if($item['status'] == "failed"){ ?>
                            		<span class="badge badge-danger">Gagal</span>
                            	<?php }else if($item['status'] == "success"){ ?>
                            		<span class="badge badge-success">Berhasil</span>
                            	<?php }else if($item['status'] == "validasi"){ ?>
                            		<span class="badge badge-primary">Validasi</span>
                            	<?php } ?>
                            </td>            
                     		    <td>
                     			    <a href="<?= base_url('assets/images/proofs/'.$item['proof']);?>" target="_blank">
                     				     <img src="<?= base_url('assets/images/proofs/'.$item['proof']);?>" 
                     					    style="width:100px">
                     			    </a>
                     		    </td>
                     		    <td>
                     			    <a href="<?= base_url('admin/user?search='.$item['id']);?>" target="_blank">
                     				   <?= $item['user']['username'];?>
                     			    </a>
                     		    </td>
                            <td>
                            	<a href="<?= base_url('admin/course/detail/'.$item['id']);?>" target="_blank">
                            		<?= $item['course']['id'];?>
                            	</a>
                            </td>                     
                            <td><?= $item['description'];?></td>
                            <td><?= $item['created_at'];?></td>
                            <td>
                                <button class="btn btn-primary"
                                    onclick="window.location='<?= base_url('admin/manual-payment/detail/'.$item['id']);?>'">
                                    <i class='fa fa-info-circle'></i> Detail
                                </button>
                            </td>
                        </tr>
                    <?php } ?>

                    <?php if(!count($manualPayment)){ ?>
                        <tr>
                          <td colspan="10" class="text-center">
                            <div class="text-center mt-5">
                                <img src="<?= base_url('assets/images/not-found.png');?>"
                                  style="width:40%">
                                <h5>Data tidak ditemukan</h5>
                                <p><small>Data Pembayaran Manual tidak ditemukan</small></p>
                            </div>  
                          </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="clearfix">
                <div class="float-right">
                    <?= $pager->links('query', 'bootstrap_pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection();?>