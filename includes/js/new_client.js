//new client javasxript
var form_identifier;

function errorMarking(id)
{
	$(id).css({
					"border-style":"2px solid",
					"border-color":"red"
				});
				$(id+"_error").css({
						"display":"inline"
					});
				$(id).click(function(){
					
					$(id).css({
						"border-color":"black",
						"border": "2px inset",
						"border-image-source": "initial",
						"border-image-slice": "initial",
						"border-image-width": "initial",
						"border-image-outset": "initial",
						"border-image-repeat": "initial",
						"-webkit-rtl-ordering": "logical",
						"-webkit-user-select": "text",
						});
					
				});
}

function validateForm(form_identifier) {
	if (form_identifier == "basic") {
		var flag=true;
				
		if($("#type").val()==""){
				errorMarking("#type");
				flag=false;
		}
		if($("#title").val()=="")
		{
			errorMarking("#title");
			flag=false;
		}
		if($("#first_name").val()=="")
		{
			errorMarking("#first_name");
			flag=false;
		}
		if($("#last_name").val()=="")
		{
			errorMarking("#last_name");
			flag=false;
		}
		if($("#gender").val()=="0")
		{
			errorMarking("#gender");
			flag=false;
		}
		if($("#birth_date").val()=="")
		{
			errorMarking("#birth_date");
			flag=false;
		}
		return flag;
	}
	if (form_identifier == "contact") {
		var flag=true;
		
		if($("#phone").val()=="")
		{
			errorMarking("#phone");
			flag=false;
		}
		if($("#fax").val()=="")
		{
			errorMarking("#fax");
			flag=false;
		}
		if($("#mobile").val()=="")
		{
			errorMarking("#mobile");
			flag=false;
		}
		if($("#email").val()=="")
		{
			errorMarking("#email");
			flag=false;
		}
		if($("#contact_method").val()=="")
		{
			errorMarking("#contact_method");
			flag=false;
		}
		if($("#contact_timing").val()=="")
		{
			errorMarking("#contact_timing");
			flag=false;
		}
		return flag;
	}
	if (form_identifier == "address") {
		var flag=true;
		var i = 1;
		var count = 0;
		var address_count = 0;
		var j = 0;
		var a = 0,
			b = 0;
		for (i = 1; i < 10; i++) {
			
				if($("#address_"+i).length)
				{
					
					if($("#street_"+i).val()=="")
					{
						errorMarking("#street_"+i);
						flag=false;
					}
					if($("#house_no_"+i).val()=="")
					{
						errorMarking("#house_no_"+i);
						flag=false;
					}
					if($("#postal_code_"+i).val()=="")
					{
						errorMarking("#postal_code_"+i);
						flag=false;
					}
					if($("#city_"+i).val()=="")
					{
						errorMarking("#city_"+i);
						flag=false;
					}
					if($("#contract_partner_"+i).val()=="")
					{
						errorMarking("#contract_partner_"+i);
						flag=false;
					}
					if($("#address_type_"+i).val()=="")
					{
						errorMarking("#address_type_"+i);
						flag=false;
					}
					for(j=0; j<10; j++){
						if($("#meter_"+i+"_"+j).length)
						{
							if($("#meter_type_"+i+"_"+j).val()=="")
							{
								errorMarking("#meter_type_"+i+"_"+j);
								flag=false;
							}
							if($("#meter_no_"+i+"_"+j).val()=="")
							{
								errorMarking("#meter_no_"+i+"_"+j);
								flag=false;
							}
						}
					}
				}
		}
		return flag;
	}
	return true;
}

function getFormData(form_identifier, address_count) //this function collects the information from the form to be sent to the php file
{
	var data = "";
	if (form_identifier == "basic") {
		data = "";
		var type = $("#type").val();
		var title = $("#title").val();
		var vp_id = $("#vp_id").val();
		var first_name = $("#first_name").val();
		var last_name = $("#last_name").val();
		var gender = $("#gender").val();
		var birth_date = $("#birth_date").val();
		var step = "basic";
		data = "type=" + type + "&title=" + title + "&vp_id=" + vp_id + "&first_name=" + first_name + "&last_name=" + last_name + "&gender" + gender + "&birth_date=" + birth_date + "&step=" + step;
		return data;
	}
	if (form_identifier == "contact") {
		data = "";
		var client_id = $("#client_id").val();
		var phone = $("#phone").val();
		var fax = $("#fax").val();
		var mobile = $("#mobile").val();
		var email = $("#email").val();
		var contact_method = $("#contact_method").val();
		var contact_timing = $("#contact_timing").val();
		var step = "contact";
		data = "phone=" + phone + "&fax=" + fax + "&mobile=" + mobile + "&email=" + email + "&contact_method=" + contact_method + "&contact_timing=" + contact_timing + "&step=" + step;
		return data;
	}
	if (form_identifier == "address") {
		data = "";
		//var address=[["abc","def","fgh","ijk"],["1","2","3","4","5"],[11,12,13,14,15],['a',['b','tshewang'],'c','d','e']];
		var address = new Array();
		var i = 1;
		var count = 0;
		var address_count = 0;
		var j = 1;
		var a = 0,
			b = 0;
		for (i = 1; i < 10; i++) {
			if ($("#address_" + i).length) {
				address[a] = new Array();
				/*	address[a][0] = $("#street_"+i).val();
					address[a][1] = $("#house_no_"+i).val();
					address[a][2] = $("#postal_code_"+i).val();
					address[a][3] = $("#city_"+i).val();
					address[a][4] = $("#contract_partner_"+i).val();
					address[a][5] = $("#address_type_"+i).val();*/
				data = data + "address[" + a + "][0]=" + $("#street_" + i).val() + "&address[" + a + "][1]=" + $("#house_no_" + i).val() + "&address[" + a + "][2]=" + $("#postal_code_" + i).val() + "&address[" + a + "][3]=" + $("#city_" + i).val() + "&address[" + a + "][4]=" + $("#contract_partner_" + i).val() + "&address[" + a + "][5]=" + $("#address_type_" + i).val() + "&";
				b = 0;
				var meters = new Array();
				for (j = 1; j < 10; j++) {
					if ($("#meter_" + i + "_" + j).length) {
						meters[a] = new Array();
						meters[a][b] = new Array();
						//meters[a][b][0]=$("#meter_type_"+i+"_"+j).val();
						//meters[a][b][1]=$("#meter_no_"+i+"_"+j);
						data = data + "meters[" + a + "][" + b + "][0]=" + $("#meter_type_" + i + "_" + j).val() + "&meters[" + a + "][" + b + "][1]=" + $("#meter_no_" + i + "_" + j).val() + "&";
						b++;
					}
				}
				a++;
			}
		}
		/*
		    queryString = queryString + 'userdetails[]='+userdetails[i]+'&';
		    
		    
		    adddress=new Array();
		    address[0]=new Array();
		    address[0][0]=new Array();
		    
		    * */
		data = "tshewang";
		alert(data);
		return data;
	}
}
//this function creates xmlRequest to process the form data... ajax and loads the subsequent form
function sendData(str) {
	//ajax part where the form data will be sent to php file for processing	
	var xmlhttp;
	if (window.XMLHttpRequest) { //code for ie7+, firefox, chrome, opera, safari
		xmlhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState < 4) {
			$(".modal-body").css({
				"opacity": "0.2",
				"background-color": "#fff",
				"color": "#000"
			});
			$("div#loading").css({
				"opacity": "1",
				"display": "block"
			});
		};
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("123").innerHTML = xmlhttp.responseText;
			var stat = xmlhttp.responseText;
			switch (stat) {
			case "basic_added":
				/*$("#myModal").modal('hide');*/
				$(".modal-dialog").css({
					"width": "600px;"
				});
				//dim the modal while the form data is being processed
				$(".modal-body").css({
					"opacity": "1",
					"background-color": "#fff",
					"color": "#000"
				});
				//displaying the particular form
				$("div#basic").css({
					"display": "none"
				});
				$("div#contact").css({
					"display": "block"
				});
				$("div#loading").css({
					"display": "none"
				});
				form_identifier = "contact";
				break;
			case "contact_added":
				form_identifier = "address";
				$(".modal-content").css({
					"width": "750px",
					"margin-left": "auto"
				});
				$(".modal-body").css({
					"opacity": "1",
					"background-color": "#fff",
					"color": "#000"
				});
				$("div#basic").css({
					"display": "none"
				});
				$("div#contact").css({
					"display": "none"
				});
				$("div#address_form_holder").css({
					"display": "block"
				});
				$("button#add_address").css({
					"display": "block"
				});
				$("div#loading").css({
					"display": "none"
				});
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
					"opacity": "1",
					"background-color": "#fff",
					"color": "#000"
				});
				$("div#loading").css({
					"display": "none"
				});
			}
			xmlhttp.responseText = "";
		}
	};
	xmlhttp.open("POST", "pages/new_client/form_handler.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(str);
}

function addMeterForm(i, j) //the parameters i for the address number and j for the meter count
{
	var close_html = '<div id="close_meter_' + i + '_' + j + '" class="close_meter"><img src="includes/images/close_1.png" alt="Remove"></div>';
	if (j == 1) {
		close_html = "";
	}
	//this has the meter form for multiple meters associated with one address
	var html = '<div class="meter" id="meter_' + i + '_' + j + '">' + close_html + '<div id="meter_table"><table><tr><td><label for="meter_type">Meter Type </label> </td><td><input type="text" name="meter_type_' + i + '_' + j + '" id="meter_type_' + i + '_' + j + '" /></td></tr><tr><td><label for="meter_no">Meter No </label></td><td><input type="text" name="meter_no_' + i + '_' + j + '" id="meter_no_' + i + '_' + j + '" /></td></tr></table></div></div>';
	var temp = "#meter_form_holder_" + i;
	$(temp).append(html);
}

function addAddressForm(i) {
	var close_button = '<div id="close_address_' + i + '" class="close_address"><img id="close" src="includes/images/close.png"  alt="Remove"></div>';
	if (i == 1) {
		close_button = "";
	}
	var html = '<div class="addr" id="address_' + i + '">' + close_button + '<div id="addr">Address ' + i + '<table><tr><td><label for="street">Street </label> </td><td><input type="text" name="street" id="street_' + i + '" /></td></tr><tr><td><label for="house_no">House No </label></td><td><input type="text" name="house_no" id="house_no_' + i + '" /></td></tr><tr><td><label for="postal_code">Postal Code </label></td><td><input type="text" name="postal_code" id="postal_code_' + i + '" /></td></tr><tr><td><label for="city">City </label></td><td><input type="text" name="city" id="city_' + i + '" /></td></tr><tr><td><label for="contract_partner">Contract Partner </label></td><td><input type="text" name="contract_partner" id="contract_partner_' + i + '" /></td></tr><tr><td><label for="address_type">Address Type </label></td><td><input type="text" name="address_type" id="address_type_' + i + '" /></td></tr></table></div><div id="meter_container">Meter Details<div id="meter_form_holder_' + i + '"></div><div id="meter_add_button"><button type="button" class="btn btn-primary" id="add_meter_' + i + '">Add Meter</button></div></div></div><div id="spacer">&nbsp;</div>';
	$("#address_form_holder").append(html); //.slideDown("slow");
}
$(document).ready(function () {
	var meter_count = 1;
	var address_count = 1;
	/*-------------default address form loading ----------*/
	//adding the first address form while the document loads
	addAddressForm(address_count);
	addMeterForm(address_count, meter_count);
	var temp = "#add_meter_" + address_count;
	$(temp).click(function () {
		var adr_id = temp.substring(11, temp.length);
		meter_count = meter_count + 1;
		addMeterForm(adr_id, meter_count);
		//$("#add_meter").append("<button type='button' class='btn btn-primary' id='remove_meter'>Remove Meter</button>")
		var close_meter = "#close_meter_" + adr_id + '_' + meter_count;
		$(close_meter).click(function () {
			var first_separation = close_meter.substring(13); //,close_meter.length); // gets
			var numbers = first_separation.split("_");
			//alert(numbers[0]+' '+numbers[1]);
			var meter_no = "#meter_" + numbers[0] + '_' + numbers[1];
			//var meter_no = "#meter_"+i+'_'+j;
			//alert(meter_no);
			$(meter_no).slideUp("slow", function () {
				$(this).remove();
			});
			/*meter_count=meter_count+1;
									addMeterForm(adr_id,meter_count);*/
			//$("#add_meter").append("<button type='button' class='btn btn-primary' id='remove_meter'>Remove Meter</button>")
		});
	});
	/*-------------------this is when there needs the additional form ---------------- */
	//adding address form when there is multiple address associated wiht a client with atleast one meter form
	$("#add_address").click(function () {
		meter_count = 1;
		address_count = address_count + 1;
		addAddressForm(address_count);
		addMeterForm(address_count, meter_count);
		var temp_add_meter = "#add_meter_" + address_count;
		$(temp_add_meter).click(function () {
			var addr_id = temp_add_meter.substring(11, temp_add_meter.length);
			meter_count = meter_count + 1;
			addMeterForm(addr_id, meter_count);
			var close_meter = "#close_meter_" + addr_id + '_' + meter_count;
			$(close_meter).click(function () {
				var first_separation = close_meter.substring(13); //,close_meter.length); // gets
				//var numbers=first_separation.split("_");
				//alert(numbers[0]+' '+numbers[1]);
				var meter_no = "#meter_" + first_separation; //numbers[0]+'_'+numbers[1];
				//alert(meter_close);
				$(meter_no).slideUp("fast", function () {
					$(this).remove();
				});
				/*meter_count=meter_count+1;
									addMeterForm(adr_id,meter_count);*/
				//$("#add_meter").append("<button type='button' class='btn btn-primary' id='remove_meter'>Remove Meter</button>")
			});
			//$("#add_meter").append("<button type='button' class='btn btn-primary' id='remove_meter'>Remove Meter</button>")
		});
		//when ever they add another address form, its close button for address form is registered for the event here
		var temp = "#close_address_" + address_count;
		$(temp).click(function () {
			var addr = "#address_" + temp.substring(15, temp.length);
			$(addr).slideUp("slow", function () {
				$(this).remove();
			});
			/*meter_count=meter_count+1;
									addMeterForm(adr_id,meter_count);*/
			//$("#add_meter").append("<button type='button' class='btn btn-primary' id='remove_meter'>Remove Meter</button>")
		});
	});
	//adding the meter form when an address has multiple meters 	
});
$(document).ready(function () {
	$('#myModal').modal({
		show: false,
		backdrop: 'static',
		keyboard: false
	});
	form_identifier = "basic";
	$("div#basic").css({
		"display": "block"
	});
	$("div#loading").css({
		"display": "none"
	});
	$("div#contact").css({
		"display": "none"
	});
	$("div#address_form_holder").css({
		"display": "none"
	});
	$("#submit").click(function () {
		//this part of script gets the data in form
		var bool = validateForm(form_identifier);
		if (bool == true) {
			var str = getFormData(form_identifier);
			sendData(str);
		}
	});
});