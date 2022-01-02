<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('title');?>
	Setting
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kelola Website</h1>
      </div>
    </div>
  </div>
</section>

<div class="container"> 
  <div class="card">
    <div class="card-body">
      <form method="post" action="<?= base_url('admin/setting/edit');?>">
        <?= csrf_field();?>
        <div class="form-group">
          Nama Website :
          <input type="text" class="form-control" value="<?= $_ENV['app.site_name'];?>" name="site_name">
          <small class="text-muted">Masukan Nama Website</small>
        </div>
        <div class="form-group">
          Waktu Max Kursus : 
          <input type="text" class="form-control" value="<?= $_ENV['app.course_max_hour'];?>" name="course_max_hour">
          <small class="text-muted">Waktu Max Kursus</small>
        </div>
        <div class="form-group">
          Kurun Waktu Pembayaran : 
          <input type="text" class="form-control" value="<?= $_ENV['app.payment_day'];?>" name="payment_day">
          <small class="text-muted">Kurun Waktu Pembayaran</small>
        </div>
        <button class="btn btn-private-driveing">Kirim</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection();?>