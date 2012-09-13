<?php

import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

// gettting attributes from form POST
$categoryDetails['title'] = $_POST['title'];
$categoryDetails['featured'] = $_POST['featured'];

// creating the service and accessing the model
$portfolioService = PortfolioServiceFactory::getPortfolioService();
$category = $portfolioService-> addCategory($categoryDetails);

$catId = $category-> getId()."";
//==============


// gettting attributes from form POST
$projectDetails['category'] = $catId;
$featured_titles[0] = "Languages/Awards";
$featured_titles[1] = "About";
$featured_titles[2] = "Resources"; 
$proj_id_array = array();

// creating the service and accessing the model
foreach($featured_titles as $featured_title){
	$projectDetails['title'] = $featured_title;
	$project = $portfolioService-> addProject($projectDetails);
	$proj_id = $project-> getId(); 
	$proj_id_array[$featured_title] = $proj_id;
}

?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<title>portfolio.php</title>
</head>
<body>
<div id='wrapper'>
	
	<!-- ======================== Header ========================== -->
	<div id='header'>
		<a href='index.php?pg=home'><img src='/images/logo.jpg' /></a>
	</div>
	
	
	<!-- ======================== LHS Menu ========================== -->	
	<?php include '../../views/includes/leftMenu.php'; ?>
	
	
	<!-- ======================== Central Panel ========================== -->	
	
	<div id='central_panel' class='admin_central_panel'>
	
		<h4>select the sublink that you would like to upload an image to:</h4>
		
		<select name='project'>
		<?php 
		foreach($proj_id_array as $key => $value){?>
			<option value='<?php echo $value; ?>'><?php echo $key; ?></option>
		<?php 
		}
		?>
		</select>
		
		<!-- <p><a href='/forms/upload_image.php?proj=<?php echo $id; ?>'>upload an IMAGE for this project?</a></p>
		<p><a href='/forms/upload_video.php?proj=<?php echo $id; ?>'>upload a VIDEO for this project?</a></p> -->
	
		
	
	</div> <!--  close central_panel -->

		<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
	</div>
	
</div>
</body>
</html>


		

