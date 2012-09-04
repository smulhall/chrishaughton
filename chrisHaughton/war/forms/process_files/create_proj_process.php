<?php

import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

// gettting attributes from form POST
$projectDetails['title'] = $_POST['title'];
$projectDetails['category'] = $_POST['category'];

// creating the service and accessing the model
$portfolioService = PortfolioServiceFactory::getPortfolioService();
$project = $portfolioService-> addProject($projectDetails);

$id = $project->getId();

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
	
		<p><a href='/forms/upload_image.php?proj=<?php echo $id; ?>'>upload an IMAGE for this project?</a></p>
		<p><a href='/forms/upload_video.php?proj=<?php echo $id; ?>'>upload a VIDEO for this project?</a></p>
	
	</div> <!--  close central_panel -->

		<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
	</div>
	
</div>
</body>
</html>



		

