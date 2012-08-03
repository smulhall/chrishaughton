<?php
include_once("model/Model.php");
?>

<div id='central_panel'>


<?php 



//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if(isset($_POST['submitted3'])){
	$category = $_POST['category'];
	$project_id = $_POST['project_id'];
	
	$success = $this->model->delete_project($project_id);
	if($success){
		echo "The project was successfully deleted";
	}
	else{
		echo "error";
	}
}


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
elseif(isset($_POST['submitted2']) && $_POST['project_name'] != 'null'){
	$category = $_POST['category'];
	$project_id = $_POST['project_id'];
	
?>
	<h4>Are you sure you want to delete this project?:</h4>
	<form action='' method='post'>
	
	<table class='input_table'>
		<tr><td></td><td><input type='submit' value='delete' /></td></tr>
	</table>

	<input type='hidden' name='category' value='<?php echo "$category;" ?>' />
	<input type='hidden' name='project_id' value='<?php echo "$project_id;" ?>' />
	<input type='hidden' name='submitted3' value='true' />
	</form>
<?php
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
elseif (isset($_POST['submitted1']) && $_POST['project_category'] != 'null'){
	$category =	$_POST['project_category'];
	$category_projects = $this->model->get_projects_in_category($category); //array of all projects in this category
?>
	<h4>Select the project that you would like to upload images for:</h4>
	<form action='' method='post'>
	<table class='input_table'>
		
		<tr><td>Project:</td>
		<td><select name='project_id'>
		<option value='null'>select a project</option>
		<?php 
		foreach($category_projects as $key => $value){
			echo "<option value='$key'>$value</option>";
		}
		?>
		
		</select></td></tr>
	
		<tr><td></td><td><input type='submit' /></td></tr>
	
	</table>
	<input type='hidden' name='submitted2'  value='true' />
	<input type='hidden' name='category' value='<?php echo "$category;" ?>' />
	</form>
<?php
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
else{
?>

	<h4>Select the category of the project that you would like to delete:</h4>
	<form action='' method='post'>
	<table class='input_table'>
		
		<tr><td>Category:</td>
		<td><select name='project_category'>
			<option value='null'>select a category</option>
			<option value='illustration'>illustration</option>
			<option value='animation'>animation</option>
			<option value='sketch'>sketch</option>
			<option value='book'>book</option>
			<option value='project'>project</option>
			<option value='movie'>movie</option>
			<option value='app'>app</option>
			<option value='fairtrade'>fair trade</option>
		</select></td></tr>
	
		<tr><td></td><td><input type='submit' /></td></tr>
	
	</table>
	<input type='hidden' name='submitted1' value='true' />
	</form>
<?php
}
?>



</div> <!--  close central_panel -->


