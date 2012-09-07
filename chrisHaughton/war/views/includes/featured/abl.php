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
	
	<div id='central_panel' class='admin_central_panel'>
	
		<div>
			<ul>
				<a href='?pg=lang&fp=<?php echo $fp; ?>'><li>Languages</li></a>
				<a href='?pg=awards&fp=<?php echo $fp; ?>'><li>Awards</li></a>
				<a href='?pg=about&fp=<?php echo $fp; ?>'><li>About the book</li></a>
				<a href='?pg=resources&fp=<?php echo $fp; ?>'><li>Toys, Prints and Downloads</li></a>
			</ul>
		</div>
		
		
		<?php
		
		if($pg=='lang'){ ?>
			<p>language contnet</p>
		<?php }
		elseif($fp=='awards'){ ?>
			<p>language contnet</p>
		<?php }
		elseif($fp=='awards'){ ?>
			<p>language contnet</p>
		<?php }
		elseif($fp=='resources'){ ?>
			<p>resources contnet</p>
		<?php }
		?>
				
	
	</div> <!--  close central_panel -->


	
</div>
</body>
</html>



		
