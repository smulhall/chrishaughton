<?php
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$portfolioService = PortfolioServiceFactory::getPortfolioService();
$categories = $portfolioService-> getCategoryList();

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
	
		<h4>Please give the name of the new category you would like to enter into the database:</h4>
		<form action='process_files/create_category_process.php' method='post'>
		<table class='input_table'>
		
		<tr>
		<td>Category Name:</td>
		<td><input type='text' name='title' /></td>
		</tr>
		
		
		<tr>
		<td></td>
		<td><input type='submit' /></td>
		</tr>
				
		</table>
		
		<input type='hidden' name='pg' value='crproj' />
		<input type='hidden' name='featured' value='false' />
		<input type='hidden' name='link' value='false' />
		
		</form>
	
	</div> <!--  close central_panel -->

		<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
	</div>
	
</div>
</body>
</html>



		
