<?= $this->extend('admin/layout/default');?>

<?= $this->section('title');?>
	Paket
<?= $this->endSection();?>

<?= $this->section('content');?>	
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kelola Paket</h1>
      </div>
    </div>
  </div>
</section>

<div class="container"> 
    <div class="card">
    	<div class="card-body">
    		<div class="clearfix">
    			<div class="float-left">
    				<button class="btn btn-primary"
    					data-toggle="modal" data-target="#modal-add">
    					<i class='fa fa-plus'></i> Tambah
    				</button>
    			</div>
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
	    				<td>Nama</td>
	    				<td>Pertemuan</td>
	    				<td>Harga</td>
	    				<td>Status</td>
	    				<td>Dibuat</td>
	    				<td>Opsi</td>
	    			</tr>

	    			<?php foreach($package as $item){ ?>
		    			<tr>
		    				<td><?= $item['id'];?></td>
		    				<td><?= $item['name'];?></td>
		    				<td><?= $item['meet'];?> Hari</td>
		    				<td>Rp. <?= number_format($item['cost'],2);?></td>
		    				<td>
		    					<?php if($item['status'] == "active"){ ?>
								 <span class="badge badge-success">Aktif</span>
		    					<?php }else{ ?>
		    					 <span class="badge badge-danger">Nonaktif</span>
		    					<?php } ?>
		    				</td>
		    				<td><?= $item['created_at'];?></td>
		    				<td>
		    					<button class="btn btn-success mb-2"
		    					   data-toggle="modal" data-target="#modal-edit-<?= $item['id'];?>">
		    						<i class='fa fa-edit'></i> Edit
		    					</button>		    					
		    				</td>
		    			</tr>		

		    			<div id="modal-edit-<?= $item['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header"
						      	style="border:0px solid gray">
						      	<h5>Edit Paket</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>

						      <div class="modal-body">      
						      	<form action="<?= base_url('admin/package/edit/'.$item['id']);?>" method="post" 
						      		id="form-edit-data-<?= $item['id'];?>"
						      		enctype="multipart/form-data">
						      		<?= csrf_field();?>							 
						      		<div class="form-group">
							      		<input type="text" class="form-control" placeholder="Nama . . ." name="name"
							      			value="<?= $item['name'];?>">							      
							      		<small class="text-muted">Masukan Nama</small>
							      	</div>	      
							      	<div class="form-group">
							      		<input type="text" class="form-control" placeholder="Pertemuan . . ." name="meet"
							      			value="<?= $item['meet'];?>">
							      		<small class="text-muted">Masukan Pertemuaan</small>
							      	</div>
							      	<div class="form-group">
							      		<input type="text" class="form-control" placeholder="Biaya . . ." name="cost"
							      			value="<?= $item['cost'];?>">
							      		<small class="text-muted">Masukan Biaya</small>
							      	</div>
							      	<div class="form-group">
							      		<select class="form-control" name="status">
							      			<option value="active" <?= $item['status']  == 'active' ? 'selected' : '';?>>Aktif</option>
							      			<option value="nonactive" <?= $item['status'] == 'nonactive' ? 'selected' : '';?>>Nonaktif</option>
							      		</select>
							      		<small class="text-muted">Pilih Status</small>
							      	</div>
							      	<div class="form-group">
							      		<button class="btn btn-private-driveing btn-block">Kirim</button>
							      	</div>
							     </form>
						      </div>		      
						    </div>
						  </div>
						</div>				
	    			<?php } ?>

	    			<?php if(!count($package)){ ?>
			            <tr>
			              <td colspan="10" class="text-center">
			                <div class="text-center mt-5">
			                    <img src="<?= base_url('assets/images/not-found.png');?>"
			                      style="width:40%">
			                    <h5>Data tidak ditemukan</h5>
			                    <p><small>Data Paket tidak ditemukan</small></p>
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

<div id="modal-add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header"
      	style="border:0px solid gray">
      	<h5>Tambah Paket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">      
      	<form action="<?= base_url('admin/package/add');?>" 
      		method="post" 
      		id="form-add-data" 
      		enctype="multipart/form-data">
      		<?= csrf_field();?>
      		<div class="form-group">
	      		<input type="text" class="form-control" placeholder="Nama . . ." name="name"
	      			data-parsley-required>
	      		<small class="text-muted">Masukan Nama</small>
	      	</div>	      
	      	<div class="form-group">
	      		<input type="text" class="form-control" placeholder="Pertemuan . . ." name="meet"
	      			data-parsley-required>
	      		<small class="text-muted">Masukan Pertemuaan</small>
	      	</div>
	      	<div class="form-group">
	      		<input type="text" class="form-control" placeholder="Biaya . . ." name="cost"
	      			data-parsley-required>
	      		<small class="text-muted">Masukan Biaya</small>
	      	</div>
	      	<div class="form-group">
	      		<select class="form-control" name="status">
	      			<option value="active">Aktif</option>
	      			<option value="nonactive">Nonaktif</option>
	      		</select>
	      		<small class="text-muted">Pilih Status</small>
	      	</div>
	      	<div class="form-group">
	      		<button class="btn btn-private-driveing btn-block">Kirim</button>
	      	</div>
	     </form>
      </div>		      
    </div>
  </div>
</div>
<?= $this->endSection();?>

<?= $this->section("sc_footer");?>
<script>
    $("#form-add-data").parsley().on('form:validate',function(){
        if(this.isValid()){
            $(".btn-private-driveing").attr("disabled",true);
        }else{
            toastr.warning("Sepertinya ada data yang belum valid","");
        }  
    });
</script>
<?= $this->endSection();?>