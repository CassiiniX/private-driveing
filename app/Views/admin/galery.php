<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('title');?>
	Galery
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kelola Galeri</h1>
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
	    				<td>Judul</td>
	    				<td>Dibuat</td>
	    				<td>Opsi</td>
	    			</tr>

	    			<?php foreach($galery as $item){ ?>
		    			<tr>
		    				<td><?= $item['id'];?></td>
		    				<td><?= $item['title'];?></td>		    	
		    				<td><?= $item['created_at'];?></td>
		    				<td>		    					
		    					<button class="btn btn-danger mb-2"
		    						onclick="deleteData('<?= base_url('admin/galery/delete/'.$item['id']);?>')">
		    						<i class='fa fa-trash'></i> Hapus
		    					</button>
		    				</td>
		    			</tr>											    
	    			<?php } ?>

            <?php if(!count($galery)){ ?>
            <tr>
              <td colspan="10" class="text-center">
                <div class="text-center mt-5">
                    <img src="<?= base_url('assets/images/not-found.png');?>"
                      style="width:40%">
                    <h5>Data tidak ditemukan</h5>
                    <p><small>Data Galeri tidak ditemukan</small></p>
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
      	<h5>Tambah Galeri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">      
      	<form action="<?= base_url('admin/galery/add');?>" 
      		method="post" 
      		id="form-add-data" 
      		enctype="multipart/form-data">
      		<?= csrf_field();?>
      		<div class="form-group">
	      		<input type="text" class="form-control" placeholder="Judul . . ." name="title"
	      			data-parsley-required>
	      		<small class="text-muted">Masukan Judul</small>
	      	</div>
	      	<div class="form-group">
	      		<input type="file" class="form-control" name="image1"
	      			data-parsley-required>
	      		<small class="text-muted">Masukan Gambar 1</small>
	      	</div>	      	
	      	<div class="form-group">
	      		<input type="file" class="form-control" name="image2">
	      		<small class="text-muted">Masukan Gambar 2</small>
	      	</div>	 
	      	<div class="form-group">
	      		<input type="file" class="form-control" name="image3">
	      		<small class="text-muted">Masukan Gambar 3</small>
	      	</div>	 
	      	<div class="form-group">
	      		<input type="file" class="form-control" name="image4">
	      		<small class="text-muted">Masukan Gambar 4</small>
	      	</div>	 
	      	<div class="form-group">
	      		<input type="file" class="form-control" name="image5">
	      		<small class="text-muted">Masukan Gambar 5</small>
	      	</div>	 
	      	<div class="form-group">
	      		<button class="btn btn-private-driveing btn-block">Kirim</button>
	      	</div>
	     </form>
      </div>		      
    </div>
  </div>
</div>
<?= $this->endSection(); ?>

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

<script>
    $("#form-add-data").parsley().on('form:validate',function(){
        if(this.isValid()){
            $(".btn-private-driveing").attr("disabled",true);
        }else{
            toastr.warning("Sepertinya ada data yang belum valid","");
        }  
    });
</script>
<?= $this->endSection(); ?>