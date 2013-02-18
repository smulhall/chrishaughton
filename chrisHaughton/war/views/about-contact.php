<?php
$pg = $_GET['pg'];
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type='text/javascript' src='/js/nav_menu.js'></script>
<title>about/contact</title>
</head>
<body>
<div id='wrapper'>
	
	<!-- ======================== Header ========================== -->
	<?php include 'includes/header.php'; ?>
	
	
	<!-- ======================== LHS Menu ========================== -->	
	<?php include '../views/includes/leftMenu.php'; ?>
	
	
	<!-- ======================== Central Panel ========================== -->	
	
	<div id='central_panel' class='central_panel_text_pages'>
		
		<?php
		if($pg == 'about'){ ?>
			<img class='text_pages_img' src='http://lh5.ggpht.com/zk3k-QYMOtIGqyBq6sLvXWvw1MhjYW5yFycpwg7JZm7Qo57ptz40CIe2TGywCSkZpNDkHLudQCL7_AWctgolqLbh3nojar8' />
			<?php 
			include('includes/about-contact/about.php');
		}
		elseif($pg == 'contact'){ ?>
			<img class='text_pages_img' src='http://lh5.ggpht.com/9oHJmwn0XYlZiQWhk-eCmUg4L-d8UfhsDL_oYz8mvZ5KhtJwYZo6t9Gva21fafP627Yyt5KSI_wl2v-lR9Wmy6_JjQPhGU1nGQ' />
			<?php
			include('includes/about-contact/contact.php');
		}
		?>
	
		
				
	
	</div> <!--  close central_panel -->


	
</div>
</body>
</html>



		
