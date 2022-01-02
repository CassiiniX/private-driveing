<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('title');?>
	User
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kelola User</h1>
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
                        <td>Photo</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>No Telp</td>
                        <td>Role</td>                        
                        <td>Dibuat</td>
                        <td>Opsi</td>
                    </tr>

                    <?php foreach($user as $item){ ?>
                        <tr>
                            <td><?= $item['id'];?></td>
                            <td>
                                <a href="<?= base_url('assets/images/users/'.$item['photo']);?>"
                                    target="_blank">
                                    <img src="<?= base_url('assets/images/users/'.$item['photo']);?>"
                                        width="100px" />                        
                                </a>
                            </td>
                            <td><?= $item['username'];?></td>
                            <td><?= $item['email'];?></td>
                            <td><?= $item['phone'];?></td>
                            <td>
                                <?php if($item['role'] == "user"){ ?>
                                    <span class="badge badge-success">User</span>
                                <?php }else{ ?>                                
                                    <span class="badge badge-danger">Admin</span>
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

                                <h5>Edit User</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                              <div class="modal-body">      
                                <form action="<?= base_url('admin/user/edit/'.$item['id']);?>" method="post" 
                                    id="form-edit-data-<?= $item['id'];?>"
                                    enctype="multipart/form-data">
                                    <?= csrf_field();?>  
                                     <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" readonly
                                            value="<?= $item['username'];?>">
                                        <small class="text-muted">Masukan Username</small>
                                    </div>                                

                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email"
                                            name="email"
                                            value="<?= $item['email'];?>">
                                        <small class="text-muted">Masukan Email</small>
                                    </div>

                                    <div class='form-group'>
                                        <input type="text" class="form-control" placeholder="No Telp"
                                            name="phone"
                                            value="<?= $item['phone'];?>">
                                        <small class="text-muted">Masukan No Telp (*harus 08)</small>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="password">
                                        <small class="text-muted">Masukan Password (*jika ingin menganti password)</small>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" name="role">
                                            <option value="user" <?= $item['role'] == "user" ? 'selected' : '';?>>User</option>
                                            <option value="admin" <?= $item['role'] == "admin" ? 'selected' : '';?>>Admin</option>
                                        </select>
                                        <small class="text-muted">Pilih Role</small>
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

                    <?php if(!count($user)){ ?>
                        <tr>
                          <td colspan="10" class="text-center">
                            <div class="text-center mt-5">
                                <img src="<?= base_url('assets/images/not-found.png');?>"
                                  style="width:40%">
                                <h5>Data tidak ditemukan</h5>
                                <p><small>Data User tidak ditemukan</small></p>
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