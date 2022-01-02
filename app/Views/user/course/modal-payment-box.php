<div id="modalManualPayment" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" 
      	style="border:0px solid red">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 

      <div class="modal-body">            
		<div class="text-center mb-2">
  			<img src="<?= base_url('assets/images/payment.png');?>"
  				style="width:90%">		          				          			
  		</div>

  		<form method="post" action="<?= base_url('user/payment');?>" enctype="multipart/form-data">
  			<?= csrf_field();?>

  			<div class="form-group">
				<textarea class="form-control" placeholder="Keterangan . . ." name="description"></textarea>
  				<small class="text-muted pl-2">Keterangan</small>
  			</div>

  			<div class="form-group">
  				<input type="file" class="form-control" name="proof">
  				<small class="text-muted pl-2">Bukti Pembayaran</small>
  			</div>

  			<div class="form-group">
  				<button class="btn btn-private-driveing btn-block">Kirim</button>
  			</div>	      			  		
  		</form>	    		
      </div>		      
    </div>
  </div>
</div>