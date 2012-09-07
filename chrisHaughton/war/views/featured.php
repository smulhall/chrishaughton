<?php
$pg = $_GET['pg'];
$fp = $_GET['fp'];
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<title>featured</title>
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
		if($fp == 'abl'){
			include('includes/featured/abl.php');
		}
		elseif($fp == 'ong'){
			include('includes/featured/ong.php');
		}
		elseif($fp == 'hm'){
			include('includes/featured/hm.php');
		}
		elseif($fp == 'dwihap'){
			include('includes/featured/dwihap.php');
		}
		?>
	
		
				
	
	</div> <!--  close central_panel -->


	
</div>
</body>
</html>



		
