<?php



	// ========== open html ===========
	include 'open_html.php';
	// ========== open html ===========

	
	include 'page_sections/header.php';
	include 'page_sections/lhs_menu.php';
		
	if($pg == 'crproj'){
		include 'page_sections/db/create_proj.php'; //allow user to create a new project and upload images for that project
	}
	elseif($pg == 'delproj'){
		include 'page_sections/db/delete_proj.php'; //allow user to delete an existing project
	}
	elseif($pg == 'uplimg'){
		include 'page_sections/db/upload_image.php'; 
	}
	elseif($pg == 'delimg'){
		include 'page_sections/db/delete_image.php'; 
	}
	elseif($pg == 'updimg'){
		include 'page_sections/db/update_image.php'; 
	}
	elseif($pg == 'updproj'){
		include 'page_sections/db/update_proj.php'; 
	}
					
	
	// ========== close html ===========
	include 'open_html.php';
	// ========== close html ===========
	
	
?>




