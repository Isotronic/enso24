<script type="text/javascript">

	function validateForm(form_identifier) 
	{
		if(form_identifier=="basic")
		{
			
			var type=$("#type").val();
			var title=$("#title").val();
			var first_name=$("#first_name").val();
			var last_name=$("#last_name").val();
			var birth_date=$("#birth_date").val();
			if(type=="")
			{
				alert("Enter Client Type")
				return false;
			}
			if(title=="")
			{
				alert("Enter Title");
				return false;
			}
			if(first_name=="")
			{
				alert("Enter First Name");
				return false;
			}
			if(last_name=="")
			{
				alert("Enter Last Name")
				return false;
			}
			if(birth_date="")
			{
				alert("Enter Date of Birth");
				return false;
			}
			return true;
		}
		else if(form_identifier=="contact")
		{
			var client_id = $("#client_id").val();
    		var phone = $("#phone").val();
    		var fax = $("#fax").val();
    		var mobile = $("#mobile").val();
    		var email = $("#email").val();
            var contact_method = $("#contact_method").val();
    		var contact_timing = $("#contact_timing").val();
			
		}
		else if(form_identifier=="address")
		{
			var client_id = $("#client_id").val();
		    var street = $("#street").val();
		    var house_no = $("#house_no").val();
		    var postal_code = $("#postal_code").val();
		   	var city = $("#city").val();
		    var contract_partner = $("#contract_partner").val();
		    var address_type = $("#address_type").val();
		}
		return true;
	}
	
	
	function getFormData(form_identifier) //this function collects the information from the form to be sent to the php file
	{
		var data="";
		
		if(form_identifier=="basic")
		{
			
			var type=$("#type").val();
			var title=$("#title").val();
			var first_name=$("#first_name").val();
			var last_name=$("#last_name").val();
			var birth_date=$("#birth_date").val();
			var step="basic";
			
			data="type="+type+"&title="+title+"&first_name="+first_name+"$last_name="+last_name+"&birth_date="+birth_date+"&step="+step;
			alert(data);

		}
		else if(form_identifier=="contact")
		{
			var client_id = $("#client_id").val();
    		var phone = $("#phone").val();
    		var fax = $("#fax").val();
    		var mobile = $("#mobile").val();
    		var email = $("#email").val();
            var contact_method = $("#contact_method").val();
    		var contact_timing = $("#contact_timing").val();
		}
		else if(form_identifier=="address")
		{
			var client_id = $("#client_id").val();
		    var street = $("#street").val();
		    var house_no = $("#house_no").val();
		    var postal_code = $("#postal_code").val();
		   	var city = $("#city").val();
		    var contract_partner = $("#contract_partner").val();
		    var address_type = $("#address_type").val();
		}
		
	}
	
	//this function creates xmlRequest to process the form data... ajax and loads the subsequent form
	function sendData(str)
	{
		//ajax part where the form data will be sent to php file for processing	
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
						
						switch(stat)
						{
							case "basic_added":
								/*$("#myModal").modal('hide');*/
								form_identifier="contact";
								//dim the modal while the form data is being processed
								$(".modal-body").css({
									"opacity":"1",
									"background-color":"#fff",
									"color":"#000"
								});
								
								//displaying the particular form
								$("div#basic").css({"display":"none"});
								$("div#contact").css({"display":"block"});
								$("div#loading").css({"display":"none"});
								break;
							case "contact_added":
								form_identifier="address";
								$(".modal-body").css({
									"opacity":"1",
									"background-color":"#fff",
									"color":"#000"
								});
								$("div#basic").css({"display":"none"});
								$("div#contact").css({"display":"none"});
								$("div#loading").css({"display":"block"});
								break;
							case "address_added":
								$("#myModal").hide();
								/*
								$(".modal-body").css({
									"opacity":"1",
									"background-color":"#fff",
									"color":"#000"
								});
								$("div#basic").css({"display":"none"});
								$("div#contact").css({"display":"none"});
								$("div#loading").css({"display":"none"});
								*/
								break;
								
							
						}
					/*
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
						else if(stat=="contact_added")
						{
							
						}*/
						xmlhttp.responseText="";
				}
			}
			
			xmlhttp.open("POST","pages/new_client/form_handler.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send(str);
		
	}
	
	$(document).ready(function()
	{
		$('#myModal').modal({
				show: false,
			  backdrop: 'static',
			  keyboard: false  
		});
		
		var form_identifier="basic";
		$("div#basic").css({"display":"block"});
		$("div#loading").css({"display":"none"})
		$("div#contact").css({"display":"none"});
		$("div#address").css({"display":"none"});
		
		$("#submit").click(function(){
			
			//this part of script gets the data in form
			//var temp=$("#step").val();
				
			var bool=validateForm(form_identifier);	
			if(bool==true)
			{
				var str=getFormData(form_identifier);
				sendData(str);
			}
			return false;	
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
		