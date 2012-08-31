<?php
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$portfolioService = PortfolioServiceFactory::getPortfolioService();

$type = $_GET['type'];
$id = $_GET['Id'];
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
	<?php include '../views/includes/leftMenu.php'; ?>
	
	
	<!-- ======================== Central Panel ========================== -->	
	
	<div id='central_panel'>
	
		<h4>Please enter the new name of the <?php echo $type; ?>:</h4>
		<form action='/update' enctype='multipart/form-data' method='post'>
		<input type='hidden' name='<?php echo $type; ?>_id' value='<?php echo $id; ?>' />
		<table class='input_table'>
			
			<tr><td><input type='text' name='<?php echo $type; ?>' value='' /></td></tr>
			<tr><td></td><td><input type='submit' /></td></tr>
		
		</table>
		<input type='hidden' name='MAX_FILE_SIZE' value='524288'>
		<input type='hidden' name='category' value='<?php echo "$category"; ?>' />	
		<input type='hidden' name='submitted3' value='true' />
		</form>
		
	
	</div> <!--  close central_panel -->

		<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
	</div>
	
</div>
</body>
</html>



		
