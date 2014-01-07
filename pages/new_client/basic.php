<div id="basic">
Basic Information
	<form method="post" name="basic" id="basic" action="" class="">
		<label for="type">Client Type </label> 
			<input type="text" name="type" id="type" placeholder="Client Type" /><br />
		<label for="title">Title</label>
			<input type="text" name="title" id="title"  /><br />
		<label for="first_name">First Name </label>
			<input type="text" name="first_name" id="first_name" placeholder="First Name"/><br />
		<label for="last_name">Last Name </label>
			<input type="text" name="last_name" id="last_name" placeholder="Last Name" /><br />
			<label for="gender">Gender </label>
			<select id="gender">
				<option>Select Gender</option>
				<option>Male</option>
				<option>Female</option>
			</select><br />
		<label for="birth_date">Date of Birth </label>
			<input type="date" name="birth_date" id="birth_date" /><br />
			<input type="hidden" name="step" id="step" value="basic" />
	</form>
</div>
