<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('title');?>
	Komentar Instruktur
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kelola Komentar Instruktur</h1>
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
	    				<td>Bintang</td>
	    				<td>Username</td>
	    				<td>Instruktur</td>
	    				<td>Komentar</td>	    		
	    				<td>Dibuat</td>
	    				<td>Opsi</td>
	    			</tr>

	    			<?php foreach($instructurFeedback as $item){ ?>
		    			<tr>
		    				<td><?= $item['id'];?></td>
		    				<td><?= make_star($item['star']);?></td>
		    				<td>
		    					<a href="<?= base_url('admin/user?search='.$item['id']);?>" target="_blank">
		    						<?= $item['user']['username'];?>
		    					</a>
		    				</td>
		    				<td>
		    					<a href="<?= base_url('admin/instructur?search='.$item['id']);?>" target="_blank">
			    					<?= $item['instructur']['name'];?>
		    					</a>
		    				</td>
		    				<td><?= $item['comment'];?></td>		    				
		    				<td><?= $item['created_at'];?></td>
		    				<td>
		    					<button class="btn btn-danger mb-2"
		    						onclick="deleteData('<?= base_url('admin/instructur-feedback/delete/'.$item['id']);?>')">
		    						<i class='fa fa-trash'></i> Hapus
		    					</button>
		    				</td>
		    			</tr>							
	    			<?php } ?>

	    			<?php if(!count($instructurFeedback)){ ?>
			            <tr>
			              <td colspan="10" class="text-center">
			                <div class="text-center mt-5">
			                    <img src="<?= base_url('assets/images/not-found.png');?>"
			                      style="width:40%">
			                    <h5>Data tidak ditemukan</h5>
			                    <p><small>Data Komentar Instruktur tidak ditemukan</small></p>
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

<?= $this->section("sc_footer");?>
<script>
function deleteData(action){
	swal.fire({
    	title: 'Apakah Anda Yakin?',
    	text: 'Menghapus data ini',
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