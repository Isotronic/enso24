<style>
		#addr
		{
			width:50%;
			float:left;
		}
		#meter_container
		{
			/*width:40%;*/
			min-height:240px;
			padding-left:50%;
		}
		#meter
		{
			height:auto;
		}
		#meter button#add_meter
		{
			font-size:15px;
			padding:5px;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function()
				{
					$("#add_meter").click(function(){
					var html='<table><tr><td><label for="meter_type">Meter Type </label> </td><td><input type="text" name="meter_type" id="meter_type" /></td></tr><tr><td><label for="meter_no">Meter No </label></td><td><input type="text" name="meter_no" id="meter_no" /></td></tr></table>';
						$("#meter_table").append(html);
						//$("#add_meter").append("<button type='button' class='btn btn-primary' id='remove_meter'>Remove Meter</button>")
		});
				});
	</script>
<div id="address" class="addr">
	<div id="addr">
				Address
				<table>
					<tr>
						<td><label for="street">Street </label> </td>
						<td><input type="text" name="street" id="street" /></td>
					</tr>
					<tr>
						<td><label for="house_no">House No </label></td>
						<td><input type="text" name="house_no" id="house_no" /></td>
					</tr>
					<tr>
						<td><label for="postal_code">Postal Code </label></td>
						<td><input type="text" name="postal_code" id="postal_code" /></td>
					</tr>
					<tr>
						<td><label for="city">City </label></td>	
						<td><input type="text" name="city" id="city" /></td>
					</tr>
					<tr>
						<td><label for="contract_partner">Contract Partner </label></td>
						<td><input type="text" name="contract_partner" id="contract_partner" /></td>
					<//tr>
					<tr>
						<td><label for="address_type">Address Type </label></td>
						<td><input type="text" name="address_type" id="address_type" /></td>
					</tr>
				</table>
	</div>
	<div id="meter_container">
		<div id="meter">
			Meter Details
			<div id="meter_table">
				<table >
				<tr>
					<td><label for="meter_type">Meter Type </label> </td>
					<td><input type="text" name="meter_type" id="meter_type" /></td>
				</tr>
				<tr>
					<td><label for="meter_no">Meter No </label></td>
					<td><input type="text" name="meter_no" id="meter_no" /></td>
				</tr>
			</table>
			</div>
			<button type="button" class="btn btn-primary" id="add_meter">Add Meter</button>
		</div>
	</div>
</div>
