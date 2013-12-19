<?php
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$portfolioService = PortfolioServiceFactory::getPortfolioService();
$category = $portfolioService-> addProject($_POST);


?>

<div id='central_panel'>

<?php
if(isset($_POST['submitted1'])){
	$project_details['project_name'] = $_POST['project_name'];
	$project_details['project_category'] = $_POST['project_category'];
	
	//function to create project
	$proj_id = $this->model->create_proj($project_details);
	
	//redirect to image upload page
	echo "<p><a href='index.php?pg=uplimg&proj=$proj_id'>upload images for this project?</a></p>";
}
else{
	$returned_info = $this->model->get_user_info($current_user_id);
	$db_session_id = $returned_info['session_id'];
	
	if($current_user_type == 'admin' && $db_session_id == $session_id){
?>
	<h4>Please give the name and category of the new project you would like to enter into the database:</h4>
	<form action='' method='post'>
	<table class='input_table'>
	
	<tr>
	<td>Project Name:</td>
	<td><input type='text' name='project_name' /></td>
	</tr>
	
	<tr>
	<td>Category:</td>
	<td><select name='project_category'>
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
	<input type='hidden' name='submitted1' value='true' />
	
	</form>
<?php
	}
	else{
		echo "<p>Sorry, but you have no admin rights</p>";
		echo "<p>login <a href='index.php?pg=login'>here</a></p>";
	}
}
?>

</div> <!--  close central_panel -->

