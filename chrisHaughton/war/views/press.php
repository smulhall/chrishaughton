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
<title>press</title>
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
		if($pg == 'press'){ ?>
			<img class='text_pages_img' src='http://lh6.ggpht.com/WZ5mgSs46S4Dbdtpy_B8uJlHn3YUSkaGrup9M7qaL522dBlUNmq1d6G-e4rjGQpBN-6FQoWDDBZZ2w4aiZscutiVzB41ireA' />
			<?php 
			include('includes/press/press.php');
		}
		elseif($pg == 'int'){ ?>
			<img class='text_pages_img' src='http://lh6.ggpht.com/WZ5mgSs46S4Dbdtpy_B8uJlHn3YUSkaGrup9M7qaL522dBlUNmq1d6G-e4rjGQpBN-6FQoWDDBZZ2w4aiZscutiVzB41ireA' />
			<?php
			include('includes/press/interviews.php');
		}
		elseif($pg == 'pub'){ ?>
			<img class='text_pages_img' src='http://lh6.ggpht.com/WZ5mgSs46S4Dbdtpy_B8uJlHn3YUSkaGrup9M7qaL522dBlUNmq1d6G-e4rjGQpBN-6FQoWDDBZZ2w4aiZscutiVzB41ireA' />
			<?php
			include('includes/press/publications.php');
		}
		?>
	
		
				
	
	</div> <!--  close central_panel -->


	
</div>
</body>
</html>



		
