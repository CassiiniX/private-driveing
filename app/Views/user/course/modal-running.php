<div id="modalRunning" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
	      		<img src="<?= base_url('assets/images/modal-running.png');?>"
	      			class="img-fluid">
	    	</div>

	    	<div class="col-12 text-center mt-3">
	    		<p>
	    			Kursus telah dimulai sekarang anda dapat datang ke lokasi sesuai waktu yang telah anda pilih
	    			<br />
	    			Dan sekarang anda juga dapat mereview instruktur
	    		</p>

	    		<a href="#" 
	    			onclick="localStorage.setItem('modal-running',true)" 
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

<?php if($course['status'] == "running"){ ?>
<script>
if(!localStorage.getItem('modal-running')){
	setTimeout(() => {
		$("#modalRunning").modal("show");
	},3000);
}
</script>
<?php } ?>