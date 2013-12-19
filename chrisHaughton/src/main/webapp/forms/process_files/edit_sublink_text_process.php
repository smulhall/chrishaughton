<?php

import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

// creating the service and accessing the model
$portfolioService = PortfolioServiceFactory::getPortfolioService();


// gettting attributes from form POST
$newText = $_POST['text'];

$id = $_POST['projectId'];


$project = $portfolioService-> getProject($id);
$project->setText($newText);
$portfolioService-> updateProject($project);

header("Location: /forms/admin.php");
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
		<p>edit was succesful</p>
	
	</div> <!--  close central_panel -->

		<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
	</div>
	
</div>
</body>
</html>



		

