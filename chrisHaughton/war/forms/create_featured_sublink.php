<?php
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

if(!isset($catId)){
	$catId = $_GET['Id'];
}
//echo "catId = $catId <br />";


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
	
		<h4>Please give the name and category of the new sublink you would like to enter into the database:</h4>
		<form action='/forms/process_files/create_featured_sublink_process.php' method='post'>
		<input type='hidden' name='category_id' value='<?php echo "$catId"; ?>' />
		<table class='input_table'>
		
		<tr>
		<td>Sublink Name:</td>
		<td><input type='text' name='title' /></td>
		</tr>
		
		<tr>
		<td>Featured Link:</td>
		<td><select name='category'>
		<?php 
			foreach ($categories as $category) {
				$id_loop = $category-> getId();
				?>
				<option <?php if($id_loop == $catId){echo "selected='selected'";} ?> value='<?php echo $category-> getId();?>'><?php echo $category-> getTitle();?></option>
				<?php
			}
		?>
		</select></td>
		</tr>
		
		
		<tr>
		<td>Page Text (HTML):</td>
		<td><textarea name='page_text' width='20' height='20'></textarea></td>
		</tr>
		
		
		<tr>
		<td></td>
		<td><input type='submit' /></td>
		</tr>
				
		</table>
		
		<input type='hidden' name='pg' value='crproj' />
		
		</form>
	
	</div> <!--  close central_panel -->

		<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
	</div>
	
</div>
</body>
</html>



		
