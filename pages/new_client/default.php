<script type="text/javascript">
	var form_identifier;
	function validateForm(form_identifier) 
	{
		if(form_identifier=="basic")
		{
			
			var type=$("#type").val();
			var title=$("#title").val();
			var first_name=$("#first_name").val();
			var last_name=$("#last_name").val();
			var birth_date=$("#birth_date").val();
			/*if(type=="")
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
			}*/
			return true;
		}
		if(form_identifier=="contact")
		{
    		var phone = $("#phone").val();
    		var fax = $("#fax").val();
    		var mobile = $("#mobile").val();
    		var email = $("#email").val();
            var contact_method = $("#contact_method").val();
    		var contact_timing = $("#contact_timing").val();
    		/*if(phone=="")
    		{
    			alert("Enter phone number");
    			return false;
    		}*/
    		return true;
			
		}
		if(form_identifier=="address")
		{
		    var street = $("#street").val();
		    var house_no = $("#house_no").val();
		    var postal_code = $("#postal_code").val();
		   	var city = $("#city").val();
		    var contract_partner = $("#contract_partner").val();
		    var address_type = $("#address_type").val();
		   	/* if(street=="")
		    {
		    	alert("Enter Street");
		    	return false;
		    }*/
		    return true;
		}
		return true;
	}
	
	
	function getFormData(form_identifier,address_count) //this function collects the information from the form to be sent to the php file
	{
		var data="";
		if(form_identifier=="basic")
		{
			data="";
			var type=$("#type").val();
			var title=$("#title").val();
			var first_name=$("#first_name").val();
			var last_name=$("#last_name").val();
			var birth_date=$("#birth_date").val();
			var step="basic";
			data="type="+type+"&title="+title+"&first_name="+first_name+"$last_name="+last_name+"&birth_date="+birth_date+"&step="+step;
			return data;
		}
		if(form_identifier=="contact")
		{
			data="";
			var client_id = $("#client_id").val();
    		var phone = $("#phone").val();
    		var fax = $("#fax").val();
    		var mobile = $("#mobile").val();
    		var email = $("#email").val();
            var contact_method = $("#contact_method").val();
    		var contact_timing = $("#contact_timing").val();
    		var step="contact";
    		data="phone="+phone+"&fax="+fax+"&mobile="+mobile+"&email="+email+"&contact_method="+contact_method+"&contact_timing="+contact_timing+"&step="+step;
    		return data;
		}
		if(form_identifier=="address")
		{
			data="";
			var address=[["abc","def","fgh","ijk"],["1","2","3","4","5"],[11,12,13,14,15],['a','b','c','d','e']];
			
			
			var i=1
			var count=0;
			for(i=1; i<10; i++)
			{
				
				if($("#address_"+i).length)
				{
					var meter_count=0;
					for(j=0; j<10; j++)
					{
						if($("#meter_"+i+"_"+j).length)
						{
							meter_count=meter_count+1;
						}
					}
					alert(meter_count);
					count=count+1;
				}
			}
			for(i=0; i<address.length; i++){
				for(j=0; j<5; j++){
					data=data+'address['+i+']['+j+']='+address[i][j]+'&';
				}
				
			}
			alert(data);
			/*
			var client_id = $("#client_id").val();
		    var street = $("#street").val();
		    var house_no = $("#house_no").val();
		    var postal_code = $("#postal_code").val();
		   	var city = $("#city").val();
		    var contract_partner = $("#contract_partner").val();
		    var address_type = $("#address_type").val();
		    var step="address";
		    data="street="+street+"&house_no="+house_no+"&postal_code="+postal_code+"&city="+city+"&contract_partner="+contract_partner+"&address_type="+address_type+"&step="+step;
		    return data;
		    queryString = queryString + 'userdetails[]='+userdetails[i]+'&';
		    * */
		   return data;
		  	
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
								$(".modal-dialog").css({"width":"600px;"});
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
								form_identifier="contact";
								break;
							case "contact_added":
								form_identifier="address";
								$(".modal-content").css({"width":"750px","margin-left":"auto"})
								$(".modal-body").css({
									"opacity":"1",
									"background-color":"#fff",
									"color":"#000"
								});
								
								$("div#basic").css({"display":"none"});
								$("div#contact").css({"display":"none"});
								$("div#address_form_holder").css({"display":"block"});
								$("button#add_address").css({"display":"block"});
								$("div#loading").css({"display":"none"});
								break;
							case "address_added":
								$("#myModal").modal('hide');
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
							 default:
							 	$(".modal-body").css({
									"opacity":"1",
									"background-color":"#fff",
									"color":"#000"
								});
							 	$("div#loading").css({"display":"none"});
								
							}
						
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
		
		
		form_identifier="basic";
		
		$("div#basic").css({"display":"block"});
		$("div#loading").css({"display":"none"});
		$("div#contact").css({"display":"none"});
		$("div#address_form_holder").css({"display":"none"});
		
		$("#submit").click(function(){
			
			//this part of script gets the data in form
			//var temp=$("#step").val();
			var bool=validateForm(form_identifier);	
			if(bool==true)
			{
				var str=getFormData(form_identifier);
				sendData(str);
			}
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
					});
				});
	        	
    		</script> 
		</div>
		
