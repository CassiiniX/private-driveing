<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('title');?>
	Kursus
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kelola Kursus</h1>
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
                        <td class="text-center">Status</td>
                        <td>Instruktur</td>
                        <td>User</td>
                        <td>Biaya</td>                                    
                        <td>Dibuat</td>
                        <td>Opsi</td>
                    </tr>

                    <?php foreach($course as $item){ ?>
                        <tr>
                            <td><?= $item['id'];?></td>
                            <td class="text-center">
                                <img src="<?= base_url('assets/images/course-'.$item['status'].'.png');?>"
                                    style="width:200px">                                      
                            </td>            
                            <td>
                                <a href="<?= base_url('admin/instructur?search='.$item['id']);?>" 
                                    target="_blank">
                                    <?= $item['instructur']['name'];?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/user?search='.$item['id']);?>" 
                                    target="_blank">
                                    <?= $item['user']['username'];?>
                                </a>
                            </td>
                            <td><b>Rp. <?= number_format($item['cost'],2);?></b></td>
                            <td><?= $item['created_at'];?></td>
                            <td>
                                <button class="btn btn-primary"
                                    onclick="window.location='<?= base_url('admin/course/detail/'.$item['id']);?>'">
                                    <i class='fa fa-info-circle'></i> 
                                    Detail
                                </button>
                            </td>
                        </tr>
                    <?php } ?>

                    <?php if(!count($course)){ ?>
                        <tr>
                          <td colspan="10" class="text-center">
                            <div class="text-center mt-5">
                                <img src="<?= base_url('assets/images/not-found.png');?>"
                                  style="width:40%">
                                <h5>Data tidak ditemukan</h5>
                                <p><small>Data Kursus tidak ditemukan</small></p>
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