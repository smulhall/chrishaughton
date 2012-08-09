<div id='central_panel'>
<?php 

if($_GET['proj'])
{
	$_POST['submitted2']='true';
}



//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if(isset($_POST['submitted3'])){
	$project_details['project_id'] = $_POST['project_id'];
	$project_details['project_category'] = $_POST['category'];
	$project_details['file_type'] = $_POST["file_type"];
	
	$images_details['file_type'] = $_POST["file_type"];
	$images_details['display_text_line1'] = $_POST["display_text_line1"];
	$images_details['display_text_line2'] = $_POST["display_text_line2"];
	$images_details['display_text_line3'] = $_POST["display_text_line3"];



	// ====== upload file ========


	$file_upload = $_FILES["upload"];
	$file_thumb_upload = $_FILES["upload_thumb"];
	$file_upload_directory = "model/images/art";
	$file_thumb_upload_directory = "model/images/art/=thumb";

	//function to find the max image id
	$max_image_id = $this->model->get_latest_image_id();
	$file_upload['name'] = "$max_image_id.jpg"; //set the name of the file


	//create array of allowed formats
	$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png', 'video/mp4');

	function error_message($passed_error){
		// Print a message based upon the error.
		switch ($file_upload['error']) {
			case 1:
				print 'The file exceeds the upload_max_filesize setting in php.ini';
				break;
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';
				break;
			case 3:
				print 'The file was only partially uploaded';
				break;
			case 4:
				print 'No file was uploaded';
				break;
			case 6:
				print 'No temporary folder was available';
				break;
			case 7:
				print 'Unable to write to the disk';
				break;
			case 8:
				print 'File upload stopped';
				break;
			default:
				print 'A system error occurred';
				break;
		} // End of switch.
	}


	// Check for an uploaded file:
	if (isset($file_thumb_upload) && isset($file_upload)) {
		//$thumb_file_type = $file_thumb_upload['type'];
		//$main_file_type = $file_upload['type'];
		//================= upload main image and thumbnail =====================
		if (in_array($file_thumb_upload['type'], $allowed) && in_array($file_upload['type'], $allowed)) {

			//TODO: error checking to see if the file name already exists
				
			$max_thumb_id = $this->model->find_max_thumb_id();//find the max thumb_id
			$new_thumb_id = $max_thumb_id + 1; //name of current upload file
			$file_thumb_upload['name'] = "$new_thumb_id.jpg"; //change name of uploaded file
			if($_POST["file_type"] == 'image'){
				$file_upload['name'] = "$new_thumb_id.jpg"; //change name of uploaded image file
			}elseif($_POST["file_type"] == 'video'){
				$file_upload['name'] = "$new_thumb_id.mp4"; //change name of uploaded video file
			}
				
			// Move the file over.
			if (move_uploaded_file ($file_thumb_upload['tmp_name'], "$file_thumb_upload_directory/{$file_thumb_upload['name']}")) {
				$this->model->insert_thumbnail_into_db($new_thumb_id, $project_details, $file_thumb_upload['name']); //insert details into db
				echo "<p class='success'>The thumbnail image file has been uploaded correctly!</p>";
			} // End of move... IF.


			//TODO: error checking to see if the file name already exists

			// Move the file over.
			if (move_uploaded_file ($file_upload['tmp_name'], "$file_upload_directory/{$file_upload['name']}")) {
				$this->model->insert_image_into_db($images_details, $file_upload['name'], $new_thumb_id); //insert details into db
				echo "<p class='success'>The main image/video file has been uploaded correctly!</p>";
				$_POST['thumb_id'] = $new_thumb_id;
				$_POST['submitted4'] = "true";
				$_POST['proj'] = $project_details['project_id'];
			} // End of move... IF.
		}
		else { // Invalid type.
			echo "<p class='error'>Incorrect format. Please upload the following:<br /> Images => JPEG or PNG <br />Videos => mp4</p>";
		}

	} // End of isset($_FILES['upload']) IF.


	// Check for an error:
	if ($file_thumb_upload['error'] > 0) {
		error_message($file_thumb_upload['error']);
		echo " when uploading the thumbnail image.<br/>";
		echo "<p class='flow_link'> <a href='index.php?pg=uplimg'>Try Again</a></p>"; 
	} // End of error IF.

	if ($file_upload['error'] > 0) {
		error_message($file_upload['error']);
		echo " when uploading the main image.<br/>";
		echo "<p class='flow_link'> <a href='index.php?pg=uplimg'>Try Again</a></p>"; 
	} // End of error IF.


	// Delete the file if it still exists:
	if (file_exists ($file_thumb_upload['tmp_name']) && is_file($file_thumb_upload['tmp_name']) ) {
		unlink ($file_thumb_upload['tmp_name']);
	}

	if (file_exists ($file_upload['tmp_name']) && is_file($file_upload['tmp_name']) ) {
		unlink ($file_upload['tmp_name']);
	}

	
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
elseif(isset($_POST['submitted6'])){
	$proj_id = $_POST['proj'];
	$image_id = $this->model->get_latest_image_id();
	
	foreach($_POST['link'] as $key => $value){
		$this->model->insert_links_into_db($value, $image_id);
	}
	
	echo "<p class='success'>The links were successfully entered into the database</p>";
	echo "<p class='flow_link'> <a href='index.php?pg=uplimg&proj=$proj_id'>Upload another image for this project?</a></p>"; 
	echo "<p class='flow_link'> <a href='index.php?pg=uplimg'>Upload another image for a different project?</a></p>"; 
	echo "<p><a href='index.php?pg=crproj'>Create a new Project?</a></p>";
	
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
elseif(isset($_POST['submitted5'])){
	$no_of_links = $_POST['no_of_links'];
	$proj_id = $_POST['proj']
	
?>	
	<h4>Please enter each of the <?php echo $no_of_links?> links associated with this image:</h4>
	<form action='/upload' method='post'>
	<table class='input_table'>
	<?php 
	for($i=1; $i<=$no_of_links; $i++){
		echo "Link $i: <input type='text' name='link[$i]' /><br />";
	}
	?>
	<tr><td></td><td><input type='submit' /></td></tr>
	</table>
	<input type='hidden' name='submitted6' value='true' />
	<input type='hidden' name='proj' value='<?php echo $proj_id; ?>' />
	</form>
	
<?php 
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
elseif(isset($_POST['submitted2']) && $_POST['project_name'] != 'null'){
	$category = $_POST['category'];
	if(isset($_GET['proj'])){
		$project_id = $_GET['proj'];
	}
	else{
		$project_id = $_POST['project_id'];
	}
	
	?>
	<h4>Upload the images in the order of preference that you would like them top be displayed:</h4>
	<form action='/upload' enctype='multipart/form-data' method='post'>
	<input type='hidden' name='project_id' value='<?php echo "$project_id"; ?>' />
	<table class='input_table'>
		<tr><td>Main Image File:</td><td> <input type='file' name='upload' /></td></tr>
		<tr><td>File Type:</td>
		<td><select name='file_type'>
			<option value='image'>image</option>
			<option value='video'>video</option>
		</select></td></tr>
		<tr><td>Thumbnail File:</td><td> <input type='file' name='upload_thumb' /></td></tr>
		<tr><td>Text to Display (line 1):</td><td> <input  name ='display_text_line1' type='text' /></td></tr>
		<tr><td>Text to Display (line 2):</td><td> <input  name ='display_text_line2' type='text' /></td></tr>
		<tr><td>Text to Display (line 3):</td><td> <input  name ='display_text_line3' type='text' /></td></tr>
		<tr><td></td><td><input type='submit' /></td></tr>
	
	</table>
	<input type='hidden' name='MAX_FILE_SIZE' value='524288'>
	<input type='hidden' name='category' value='<?php echo "$category"; ?>' />
	
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
	<form action='/upload' method='post'>
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
else{
	$returned_info = $this->model->get_user_info($current_user_id);
	$db_session_id = $returned_info['session_id'];
	
	if($current_user_type == 'admin' && $db_session_id == $session_id){
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
?>
	<h4>Select the category of the project that you would like to upload images for:</h4>
	<form action='/upload' method='post'>
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
		</select></td></tr>
	
		<tr><td></td><td><input type='submit' /></td></tr>
	
	</table>
	<input type='hidden' name='submitted1' value='true' />
	</form>

<?php 
	}
	else{
		echo "<p>Sorry, but you have no admin rights</p>";
		echo "<p>login <a href='index.php?pg=login'>here</a></p>";
	}
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if(isset($_POST['submitted4'])){
	$proj_id = $_POST['proj'];
	?>
	<h4>Please Enter the number of links associated with this image:</h4>
	<form action='/upload' method='post'>
	<table class='input_table'>
	<tr><td>No of links:</td><td> <input  name ='no_of_links' type='text' /></td></tr>
	<tr><td></td><td><input type='submit' /></td></tr>
	</table>
	<input type='hidden' name='submitted5' value='true' />
	<input type='hidden' name='proj' value='<?php echo $proj_id; ?>' />
	</form>
<?php
}
?>

</div> <!--  close central_panel -->


