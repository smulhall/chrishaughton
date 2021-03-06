<?php
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$portfolioService = PortfolioServiceFactory::getPortfolioService();
$categories = $portfolioService-> getCategoryList();

if(isset($_GET['proj'])){
	$projectId = $_GET['proj'];
}

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
	<?php include '../includes/leftMenu.php'; ?>
	
	
	<!-- ======================== Central Panel ========================== -->	
	
	<div id='central_panel' class='admin_central_panel'>
	
		<h4>Upload the images in the order of preference that you would like them to be displayed:</h4>
		<form action='/upload' enctype='multipart/form-data' method='post'>
		<input type='hidden' name='project_id' value='<?php echo "$projectId"; ?>' />
		<table class='input_table'>
			<tr><td>Main Image File:</td><td> <input type='file' name='main' /></td></tr>
			<tr><td>Thumbnail File:</td><td> <input type='file' name='thumb' /></td></tr>
			<tr><td>Text to Display (line 1):</td><td> <input  name ='display_text_line1' type='text' /></td></tr>
			<tr><td>Text to Display (line 2):</td><td> <input  name ='display_text_line2' type='text' /></td></tr>
			<tr><td>Text to Display (line 3):</td><td> <input  name ='display_text_line3' type='text' /></td></tr>
			<tr><td>Text to Display (line 4):</td><td> <input  name ='display_text_line4' type='text' /></td></tr>
			<tr><td>Text to Display (line 5):</td><td> <input  name ='display_text_line5' type='text' /></td></tr>
			<tr><td>Link 1 (display text):</td><td> <input  name ='link_text1' type='text' /></td></tr>
			<tr><td>Link 1 (url):</td><td> <input  name ='link_url1' type='text' /></td></tr>
			<tr><td>Link 2 (display text):</td><td> <input  name ='link_text2' type='text' /></td></tr>
			<tr><td>Link 2 (url):</td><td> <input  name ='link_url2' type='text' /></td></tr>
			<tr><td>Link 3 (display text):</td><td> <input  name ='link_text3' type='text' /></td></tr>
			<tr><td>Link 3 (url):</td><td> <input  name ='link_url3' type='text' /></td></tr>
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



		
