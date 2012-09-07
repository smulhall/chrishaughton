<?php
$pg = $_GET['pg'];
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<title>press</title>
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
	
	
		

		<?php
		if($pg == 'press'){
			include('includes/press/press.php');
		}
		elseif($pg == 'int'){
			include('includes/press/interviews.php');
		}
		elseif($pg == 'pub'){
			include('includes/press/publications.php');
		}
		?>
	
		
				
	
	</div> <!--  close central_panel -->


	
</div>
</body>
</html>



		
