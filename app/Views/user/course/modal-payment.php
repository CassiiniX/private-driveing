<div id="modalPayment" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border:0px solid red">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 

      <div class="modal-body">      
      	<div class="row">
      		<div class="col-5 m-auto">
	      		<img src="<?= base_url('assets/images/modal-payment.png');?>"
	      			class="img-fluid">
	    	</div>

	    	<div class="col-12 text-center mt-3">
	    		<p>
	    			Pembayaran bisa dilakukan dengan mengirim bukti pembayaran pada modal halaman ini
	    			<br />	    		
	    			Jika pembayaran belum dilakukan sampai tanggal <b class="text-danger"><?= $paymentLate;?></b> Maka kursus akan digagalkan
	    		</p>

	    		<a href="#" 
	    			onclick="localStorage.setItem('modal-payment',true)" 
	    		 	data-dismiss="modal" 
	    		 	aria-label="Close">
	    			Jangan tampilkan modal ini lagi
	    		</a>
	    	</div>
	    </div>
      </div>		      
    </div>
  </div>
</div>

<?php if($course['status'] == "payment"){ ?>
<script>
if(!localStorage.getItem('modal-payment')){
	setTimeout(() => {
		$("#modalPayment").modal('show');
	},3000);
}
</script>
<?php } ?>