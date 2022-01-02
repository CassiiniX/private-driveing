<div id="modalReview" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border:0px solid red">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 

      <div class="modal-body">            	
      	<div class="text-center mb-2">
      		<img src="<?= base_url('assets/images/review.png');?>"
      			width="95%">		          		
      	</div>

      	<form action="<?= base_url('user/review');?>" method="post">		          	
      		<?= csrf_field(); ?>

      		<div class="form-group">
      			<textarea class="form-control" name="comment" placeholder="Komentar . . ."></textarea>
          		<small class="text-muted pl-2">Komentar</small>
      		</div>
          
          	<div class="form-group">
          		<select class="form-control" name="star">
          			<option value="1">Bintang 1</option>
          			<option value="2">Bintang 2</option>
          			<option value="3">Bintang 3</option>
          			<option value="4">Bintang 4</option>
          			<option value="5">Bintang 5</option>
          		</select>
          		<small class="text-muted pl-2">Bintang </small>
          	</div>

          	<div class="form-group">
          		<button class="btn btn-private-driveing btn-block">Kirim</button>
          	</div>	          		
        </form>		       
      </div>		      
    </div>
  </div>
</div>