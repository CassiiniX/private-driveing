<?= $this->extend('user/layout/default'); ?>

<?= $this->section('title');?>
	Home
<?= $this->endSection();?>

<?= $this->section('content'); ?>	
  <?php if(!$course){ ?>
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
    <div class="container">
      <div class="row p-3">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-3">
          <div class="card animated bounceIn">
            <div class="card-body">             

               <div class="text-center mb-2">
                <?php if($course['status'] == "pending"){ ?>
                <img src="<?= base_url('assets/images/course-pending.png');?>"
                  style="width:80%">    
                <?php }else if($course['status'] == "payment"){ ?>
                <img src="<?= base_url('assets/images/course-payment.png');?>" 
                  style="width:80%">
                <?php }else if($course['status'] == "waiting"){ ?>
                <img src="<?= base_url('assets/images/course-waiting.png');?>"
                  style="width:80%">
                <?php }else if($course['status'] == "running"){ ?>
                <img src="<?= base_url('assets/images/course-running.png');?>"
                  style="width:80%">
                <?php } ?>
              </div>

              <table class="table table-borderless">
                <tr>
                  <td>Status</td>
                  <td>
                    <?php if($course['status'] == "pending"){ ?>
                      <span class="badge badge-warning text-white">Pending</span>
                    <?php }else if($course['status'] == "payment"){ ?>
                      <span class="badge badge-success text-white">Pembayaran</span>
                    <?php }else if($course['status'] == "waiting"){ ?>
                      <span class="badge badge-success text-white">Menunggu</span>
                    <?php }else if($course['status'] == "running"){ ?>
                      <span class="badge badge-warning text-white">Berjalan</span>
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <td>Pertemuan</td>
                  <td><?= $course['meet'];?> Hari</td>
                </tr>
                <tr>
                  <td>Biaya</td>
                  <td><b>Rp.<?= number_format($course['cost'],2);?></b></td>
                </tr>
              </table>
                  
              <span class="clearfix">
                <span class="float-right"                   
                  onclick="window.location='<?= base_url('user/course');?>'"
                  style="cursor:pointer">
                  Lihat Selengkapnya
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="timeline">
           <?php foreach(time_make_timeline($course) as $item){ ?>
            <div class="time-label">
              <span class="bg-<?= ($item['isToday'] ? 'warning' : ($item['active'] ? 'success' : 'danger'));?> animated bounceIn">
                <?= $item['date'];?>
              </span>
            </div> 

            <div>
              <i class="fas fa-clock bg-<?= ($item['isToday'] ? 'warning' : ($item['active'] ? 'success' : 'danger'));?> animated bounceIn">
              </i>
              <div class="timeline-item">           
                <span class="time"> 
                  <i class="fas fa-clock"></i> Pukul <?= $course['clock_start'];?>
                </span>
                <div class="p-2">
                  Kursus Dimulai
                </div>
              </div>
            </div>           

            <div>
              <i class="fas fa-clock bg-<?= ($item['isToday'] ? 'warning' : ($item['active'] ? 'success' : 'danger'));?>">
              </i>
              <div class="timeline-item">          
                <span class="time">
                  <i class="fas fa-clock"></i> Pukul <?= $item['clock_end'];?>
                </span>
                <div class="p-2">
                  Kursus Berakhir
                </div>
              </div>
            </div>   
           <?php } ?>                  
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
<?= $this->endSection();?>