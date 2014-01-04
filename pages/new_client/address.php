<style>
		.addr
		{
			
			border-color:#000000;
			padding: 1px;
			 
			  white-space: normal;
			  background-color:#E4B9C0;
			 
			  border: 1px solid #000000;
			  border: 1px solid rgba(0, 0, 0, 0.2);
			  border-radius: 10px;
			  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
			          box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
			  background-clip: padding-box;
			  padding-top:10px;
		}
		.addr input{
			height:40px;
			padding-bottom:0px;
		}
		#addr
		{
			width:50%;
			padding-left:20px;
			float:left;
		}
		#meter_container
		{
			/*width:40%;*/
			min-height:300px;
			padding-left:55%;
			padding-right:5px;
			padding-top:5px;
			padding-bottom:10px;
			
		}
		.meter
		{
			height:auto;
			background-color: #ffffff;
			 padding-bottom:5px;
			 padding-left:10px;
			 padding-top:10px;
			  border: 1px solid #E4B9C0;
			  border: 1px solid #E4B9C0;
			  border-radius: 10px;
			  -webkit-box-shadow: inset 0 0px 5px;
			          box-shadow: inset 0 0px 5px;
			  background-clip: padding-box;
		}
		#meter_container button.add_meter
		{
			font-size:15px;
			padding:5px;
		}
		.meter input{
			width:170px;
		}
		#meter_add_button
		{
			text-align:right;
			
		}
		#meter_container #meter_add_button button
		{
			font-size:15px;
			padding:5px;
		}
		#meter_table
		{
			padding-top:10px;
		}
		div#add_address
		{
			
			/*padding-top:10px;*/
			padding-left:75%;
		}
		button#add_address
		{
			
			display:none;
		}
		.close_address
		{
			width:25x;
			height:25px;
			z-index:999999;
			float:right;
			padding-right:5px;
			padding-top:0px;
			cursor:pointer;
			display: block;
		}
		.close_address img
		{
			width:25px;
			height:25px;
			z-index:999999;
			display: block;
		}
		.close_meter
		{
			width:25px;
			height:25px;
			z-index:999999;
			float:right;
			padding-right:5px;
			padding-top:0px;
			cursor:pointer;
			display: block;
		}
		.close_meter img
		{
			width:15px;
			height:15px;
			z-index:999999;
			display: block;
		}
		#address
		{
			
		}
		#spacer
		{
			line-height:5px;
		}
	</style>
	<script type="text/javascript">	
		function addMeterForm(i,j) //the parameters i for the address number and j for the meter count
		{
			var close_html='<div id="close_meter_'+i+'_'+j+'" class="close_meter"><img src="includes/images/close_1.png" alt="Remove"></div>';
			if(j==1)
			{
				close_html="";
			}
			//this has the meter form for multiple meters associated with one address
			var html='<div class="meter" id="meter_'+i+'_'+j+'">'+close_html+'<div id="meter_table"><table><tr><td><label for="meter_type">Meter Type </label> </td><td><input type="text" name="meter_type_'+i+'_'+j+'" id="meter_type_'+i+'_'+j+'" /></td></tr><tr><td><label for="meter_no">Meter No </label></td><td><input type="text" name="meter_no_'+i+'_'+j+'" id="meter_no_'+i+'_'+j+'" /></td></tr></table></div></div>';
						
						var temp="#meter_form_holder_"+i;
						$(temp).append(html);
						
						
		}	
		function addAddressForm(i)
		{
				var close_button='<div id="close_address_'+i+'" class="close_address"><img id="close" src="includes/images/close.png"  alt="Remove"></div>';
				if(i==1)
				{
					close_button="";
				}
				var html='<div class="addr" id="address_'+i+'">'+close_button+'<div id="addr">Address '+i+'<table><tr><td><label for="street">Street </label> </td><td><input type="text" name="street" id="street" /></td></tr><tr><td><label for="house_no">House No </label></td><td><input type="text" name="house_no" id="house_no" /></td></tr><tr><td><label for="postal_code">Postal Code </label></td><td><input type="text" name="postal_code" id="postal_code" /></td></tr><tr><td><label for="city">City </label></td><td><input type="text" name="city" id="city" /></td></tr><tr><td><label for="contract_partner">Contract Partner </label></td><td><input type="text" name="contract_partner" id="contract_partner" /></td></tr><tr><td><label for="address_type">Address Type </label></td><td><input type="text" name="address_type" id="address_type" /></td></tr></table></div><div id="meter_container">Meter Details<div id="meter_form_holder_'+i+'"></div><div id="meter_add_button"><button type="button" class="btn btn-primary" id="add_meter_'+i+'">Add Meter</button></div></div></div><div id="spacer">&nbsp;</div>';
				$("#address_form_holder").append(html);//.slideDown("slow");
				
				
		}
		
		$(document).ready(function()
				{
					
					var meter_count=1;
					var address_count=1;
					
					/*-------------default address form loading ----------*/
					//adding the first address form while the document loads
					addAddressForm(address_count);
					addMeterForm(address_count,meter_count);
					
					
					
					var temp="#add_meter_"+address_count;
							
							$(temp).click(function(){
								
									var adr_id = temp.substring(11,temp.length);
									meter_count=meter_count+1;
									addMeterForm(adr_id,meter_count);
									//$("#add_meter").append("<button type='button' class='btn btn-primary' id='remove_meter'>Remove Meter</button>")
								
								var close_meter="#close_meter_"+adr_id+'_'+meter_count;
								
									$(close_meter).click(function(){
									
									var first_separation=close_meter.substring(13);//,close_meter.length); // gets
									var numbers=first_separation.split("_");
									//alert(numbers[0]+' '+numbers[1]);
									
									var meter_no = "#meter_"+numbers[0]+'_'+numbers[1];
								//var meter_no = "#meter_"+i+'_'+j;
									
									//alert(meter_no);
									$(meter_no).slideUp("slow");
								
									/*meter_count=meter_count+1;
									addMeterForm(adr_id,meter_count);*/
									//$("#add_meter").append("<button type='button' class='btn btn-primary' id='remove_meter'>Remove Meter</button>")
									});
								
								
								
								});
					
	
				/*-------------------this is when there needs the additional form ---------------- */
					//adding address form when there is multiple address associated wiht a client with atleast one meter form
					$("#add_address").click(function(){
							meter_count=1;
							address_count=address_count+1;
							
							addAddressForm(address_count);
							addMeterForm(address_count,meter_count);
							
							var temp_add_meter="#add_meter_"+address_count;
							
							$(temp_add_meter).click(function(){
								
								
									var addr_id = temp_add_meter.substring(11,temp_add_meter.length);
									meter_count=meter_count+1;
									addMeterForm(addr_id,meter_count);
									
									var close_meter="#close_meter_"+addr_id+'_'+meter_count;
									
									$(close_meter).click(function(){
									
										var first_separation=close_meter.substring(13);//,close_meter.length); // gets
										//var numbers=first_separation.split("_");
										//alert(numbers[0]+' '+numbers[1]);
										
										var meter_no = "#meter_"+first_separation;//numbers[0]+'_'+numbers[1];
										//alert(meter_close);
										$(meter_no).slideUp("fast");
									/*meter_count=meter_count+1;
									addMeterForm(adr_id,meter_count);*/
									//$("#add_meter").append("<button type='button' class='btn btn-primary' id='remove_meter'>Remove Meter</button>")
									});
									
									//$("#add_meter").append("<button type='button' class='btn btn-primary' id='remove_meter'>Remove Meter</button>")
								});
							//when ever they add another address form, its close button for address form is registered for the event here
							
							var temp="#close_address_"+address_count;
							
							$(temp).click(function(){
								
									var addr = "#address_"+temp.substring(15,temp.length);
									$(addr).slideUp("slow");
									/*meter_count=meter_count+1;
									addMeterForm(adr_id,meter_count);*/
									//$("#add_meter").append("<button type='button' class='btn btn-primary' id='remove_meter'>Remove Meter</button>")
								});
							
							
					});
					
					//adding the meter form when an address has multiple meters 
					
					
					
		});
	</script>
<div id="address_form_holder">
</div>

<div id="add_address">
<button type="button" class="btn btn-primary" id="add_address">Add Address</button>
</div>