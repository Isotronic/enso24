
<div id="content">
			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
			        	Add New Client</button>
			        	
	        <!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" > 
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Add New Client Info</h4>
			      </div>
			      <div class="modal-body">
			        <?php
			        	//this pulls the basic info form into this modal
			        	include("basic.php");
			        ?>
			        </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			        <button type="button" class="btn btn-primary">Next</button>
			      </div>
			      
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		
			<script type="text/javascript">
				$(document).ready(function()
				{
					$('#myModal').modal({
							show: false,
						  backdrop: 'static',
						  keyboard: false  
						})
				});
	        	
    		</script> 
		</div>
		
