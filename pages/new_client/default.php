<script type="text/javascript">
	$(document).ready(function()
	{
		$('#myModal').modal({
				show: false,
			  backdrop: 'static',
			  keyboard: false  
		});
		
		$("div#basic").css({"display":"block"});
		$("div#loading").css({"display":"none"})
		$("div#contact").css({"display":"none"});
		$("div#address").css({"display":"none"});
		
		$("#submit").click(function(){
				
			var xmlhttp;
			if(window.XMLHttpRequest)
			{//code for ie7+, firefox, chrome, opera, safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if(xmlhttp.readyState<4)
				{
					
					$(".modal-body").css({
							"opacity":"0.2",
							"background-color":"#fff",
							"color":"#000"
					});
					$("div#loading").css({"opacity":"1","display":"block"});
				}
				
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
						document.getElementById("123").innerHTML=xmlhttp.responseText;
						var stat=xmlhttp.responseText;
						if(stat=="basic_added")
						{
							$(".modal-body").css({
								"opacity":"1",
								"background-color":"#fff",
								"color":"#000"
							});
							$("div#basic").css({"display":"none"});
							$("div#contact").css({"display":"block"});
							$("div#loading").css({"display":"none"})
							//$("div#address").css({"display":"none"})
						}
						xmlhttp.responseText="";
				}
			}
			xmlhttp.open("GET","pages/new_client/form_handler.php",true);
			xmlhttp.send();
		});
	});
</script> 
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
						include("contact.php");
						include("address.php");
			        ?>
			        
			        </div>
			        <div id="loading"><img src="http://localhost/github/enso24/includes/images/laoding.gif" /></div>
				        <div id="123">tshewang</div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			        <button type="button" class="btn btn-primary" id="submit">Next</button>
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
		
