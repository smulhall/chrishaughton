<?php
include_once("model/Model.php");
?>

<div id='central_panel'>


<?php 



//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if(isset($_POST['submitted3'])){
	$category = $_POST['category'];
	$project_id = $_POST['project_id'];
	
	//$success = $this->model->delete_project($project_id);
	
	if($success){
		echo "The project was successfully updated";
	}
	else{
		echo "error";
	}
}


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
elseif(isset($_POST['submitted3']) && $_POST['project_name'] != 'null'){
	$category = $_POST['category'];
	$project_id = $_POST['project_id'];
	$project_info = $this->model->select_project_info($project_id);
	print_r($project_info);
?>
	<h4>Edit the fields you wish below:</h4>
	<form action='' method='post'>
	
	<table class='input_table'>
		<tr><td>Project Title:</td><td><input type='text' value='info to update 1' /></td></tr>
		<tr><td></td><td><input type='text' value='info to update 2' /></td></tr>
		<tr><td></td><td><input type='text' value='info to update 3' /></td></tr>
		<tr><td></td><td><input type='submit' value='update' /></td></tr>
	</table>

	<input type='hidden' name='category' value='<?php echo "$category;" ?>' />
	<input type='hidden' name='project_id' value='<?php echo "$project_id;" ?>' />
	<input type='hidden' name='submitted3' value='true' />
	</form>
<?php
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
elseif (isset($_POST['submitted2']) && $_POST['project_id'] != 'null'){
	$project_id = $_POST['project_id'];
	$category =	$_POST['category'];
	
	//$thumbs = &$this->model->portfolio->categories[$category]->projects[$project_id]->thumbs; //array of all images in this project
	//$image = $thumbs[181];
	//echo <img src='$thumbs' />";
	//->images->links;
	//print_r($image);
?>
	<h4>Select the image that you would like to update:</h4>
	<form action='' method='post'>
	<table class='input_table'>
		
		<tr><td>Image:</td>
		<td><select name='project_id'>
		<option value='null'>select an image</option>
		<?php 
		foreach($thumbs as $key => $value){
			echo "<option value='$key'>$value</option>";
		}
		?>
		
		</select></td></tr>
	
		<tr><td></td><td><input type='submit' /></td></tr>
	
	</table>
	<input type='hidden' name='submitted3'  value='true' />
	<input type='hidden' name='category' value='<?php echo "$category"; ?>' />
	</form>
<?php
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
elseif (isset($_POST['submitted1']) && $_POST['project_category'] != 'null'){
	$category =	$_POST['project_category'];
	$category_projects = $this->model->get_projects_in_category($category); //array of all projects in this category
?>
	<h4>Select the project that you would like to update:</h4>
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
	<input type='hidden' name='category' value='<?php echo "$category"; ?>' />
	</form>
<?php
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
else{
?>

	<h4>Select the category of the project that you would like to update:</h4>
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


