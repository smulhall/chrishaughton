<?php
$pg = $_GET['pg'];
$fp = $_GET['fp'];
?>


<div>
	<?php
	if($fp=='abl'){
		include('includes/featured/abl.php');
	}
	elseif($fp=='ong'){
		include('includes/featured/ong.php');
	}
	elseif($fp=='hm'){
		include('includes/featured/hm.php');
	}
	elseif($fp=='dwihap'){
		include('includes/featured/dwihap.php');
	}
	?>
</div>