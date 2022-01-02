<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('title');?>
	Home
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
    </div>
  </div>
</section>

<div class="container">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $course_active;?></h3>

            <p>Kursus Aktif</p>
          </div>
          <div class="icon">
            <i class="fa fa-calendar-alt"></i>
          </div>
          <a href="<?= base_url('admin/course');?>" class="small-box-footer">
          	Lihat <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $manual_payment_active;?></h3>
            <p>Pembayaran Aktif</p>           
          </div>
          <div class="icon">
            <i class="fa fa-dollar-sign"></i>
          </div>
          <a href="<?= base_url('admin/manual-payment');?>" class="small-box-footer">
          	Lihat <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-dark">
          <div class="inner text-white">
            <h3><?= $user_new;?></h3>

            <p>User Terbaru</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="<?= base_url('admin/user');?>" class="small-box-footer">
           Lihat <i class="fas fa-arrow-circle-right"></i>
       	  </a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= $contact_new;?></h3>

            <p>Kontak Terbaru</p>
          </div>
          <div class="icon">
            <i class="fa fa-envelope"></i>
          </div>
          <a href="<?= base_url('admin/contact');?>" class="small-box-footer">
          	Lihat <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="row">
      <section class="col-lg-7 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Kursus Tuntas Dalam 5 Bulan Terakhir
            </h3>           
          </div>
          <div class="card-body">
            <div class="tab-content p-0">              
              <div id="chartContainer" 
                style="height: 370px; max-width: 920px; margin: 0px auto;">
              </div>
            </div>
          </div>
        </div>                    
      </section>

      <section class="col-lg-5">
      	<div class="card p-3">
      		<table class="table">
      			<tr class="bg-dark">
      				<td>Id</td>
      				<td>Photo</td>
      				<td>Username</td>
      			</tr>
      			<?php foreach($last_user->getResult('array') as $item){ ?>
      			<tr>
      				<td><?= $item['id'];?></td>
      				<td>
      					<img src="<?= base_url('assets/images/users/'.$item['photo']);?>"
      						style="width:40px">
      				</td>
      				<td><?= ucwords($item['username']);?></td>
      			</tr>
      			<?php } ?>
      		</table>
      	</div>
      </section>
    </div>      
</div>
<?= $this->endSection();?>

<?= $this->section("sc_footer");?>
<script src="<?= base_url('assets/dist/js/canvasjs.min.js');?>"></script>

<script>
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  title:{
    horizontalAlign: "left"
  },
  data: [{
    type: "column",
    // line
    // pie
    // doughnut
    // column
    startAngle: 60,
    indexLabelFontSize: 17,
    indexLabel: "{label}",
    toolTipContent: "{y}",
    dataPoints: [
      <?php foreach($chart as $item){ ?>
      { y: <?= $item['y'];?>, label: "<?= $item['label'];?>" },     
      <?php } ?>
    ]
  }]
});

chart.render();
</script>
<?= $this->endSection();?>