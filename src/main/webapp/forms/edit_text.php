<?php
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$portfolioService = PortfolioServiceFactory::getPortfolioService();
$categories = $portfolioService-> getCategoryList();


$type = $_GET['type'];
$id = $_GET['Id'];
$oldTitle = $_GET['title'];
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<title>portfolio.php</title>
</head>
<body>
<div id='wrapper'>
	
	<!-- ======================== Header ========================== -->
	<div id='header'>
		<a href='index.php?pg=home'><img src='/images/logo.jpg' /></a>
	</div>
	
	
	<!-- ======================== LHS Menu ========================== -->	
	<?php include '../views/includes/leftMenu.php'; ?>
	
	
	<!-- ======================== Central Panel ========================== -->	
	
	<div id='central_panel' class='admin_central_panel'>
	
		<h4>Please enter the new name of the <?php echo $type; ?>:</h4>
		<form action='/forms/process_files/edit_text_process.php' enctype='multipart/form-data' method='post'>
		<input type='hidden' name='<?php echo $type; ?>' value='<?php echo $id; ?>' />
		<table class='input_table'>
			
			<tr><td><input type='text' name='title' value='<?php echo $oldTitle; ?>' /></td></tr>
			<tr><td></td><td><input type='submit' /></td></tr>
		
		</table>
		</form>
		
	
	</div> <!--  close central_panel -->

		<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
	</div>
	
</div>
</body>
</html>



		
