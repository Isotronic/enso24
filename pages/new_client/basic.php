<div id="basic">
Basic Information
	<form method="post" name="basic" id="basic" action="" class="">
		<label for="vp_id">VP ID </label> 
			<input type="text" name="vp_id" id="vp_id" placeholder="VP ID" /><span id="vp_id_error" style="display:none"> *Required field</span><br />
		<label for="type">Client Type </label> 
			<input type="text" name="type" id="type" placeholder="Client Type" /><span id="type_error" style="display:none"> *Required field</span><br />
		<label for="title">Title</label>
			<input type="text" name="title" id="title"  /><span id="title_error" style="display:none"> *Required field</span><br />
		<label for="first_name">First Name </label>
			<input type="text" name="first_name" id="first_name" placeholder="First Name"/><span id="first_name_error" style="display:none"> *Required field</span><br />
		<label for="last_name">Last Name </label>
			<input type="text" name="last_name" id="last_name" placeholder="Last Name" /><span id="last_name_error" style="display:none"> *Required field</span><br />
			<label for="gender">Gender </label>
			<select id="gender" name="gender">
				<option value=0>Select Gender</option>
				<option>Male</option>
				<option>Female</option>
			</select><span id="gender_error" style="display:none"> *Required field</span><br />
		<label for="birth_date">Date of Birth </label>
			<input type="date" name="birth_date" id="birth_date" /><span id="birth_date_error" style="display:none"> *Required field</span><br />
			<input type="hidden" name="step" id="step" value="basic" />
	</form>
</div>
