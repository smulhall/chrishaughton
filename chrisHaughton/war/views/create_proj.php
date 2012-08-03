<div id='central_panel'>

	<h4>Please give the name and category of the new project you would like to enter into the database:</h4>
	<form action='/forms/create_proj.php' method='post'>
	<table class='input_table'>
	
	<tr>
	<td>Project Name:</td>
	<td><input type='text' name='title' /></td>
	</tr>
	
	<tr>
	<td>Category:</td>
	<td><select name='category'>
	<option value='ill'>illustration</option>
	<option value='ani'>animation</option>
	<option value='sk'>sketch</option>
	<option value='bks'>book</option>
	<option value='prj'>project</option>
	<option value='mov'>movie</option>
	<option value='app'>app</option>
	<option value='ft'>fair trade</option>
	</select></td>
	</tr>
	
	
	<tr>
	<td></td>
	<td><input type='submit' /></td>
	</tr>
			
	</table>
	
	<input type='hidden' name='pg' value='crproj' />
	
	</form>

</div> <!--  close central_panel -->

