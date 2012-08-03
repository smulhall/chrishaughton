<?php
include_once("model/Model.php");

//default values
$default_proj = 7; //TODO: correct project?
$default_category = "illustration";


if(isset($featured_link_flag)){
	$_GET['proj'] = $proj;
}
else{
	//GET project_id
	if($_GET['proj']){
		$proj = $_GET['proj'];
	}
	else{
		$projects_array = $this->model->portfolio->categories[$category]->projects;
		$first_project_key = key($projects_array);
		$project_first = $projects_array[$first_project_key];
		$proj = $project_first->project_id;
		$_GET['proj'] = $proj;
	}
}	

	//set featured projects flag for loads after initial one
	$featured_link_flag = $this->model->check_proj_featured($proj);




	//GET thumb_id
	if($_GET['th']){
		$th = $_GET['th'];
	}
	else{
		$thumbs_array = $this->model->portfolio->categories[$category]->projects[$proj]->thumbs;
		$first_thumb_key = key($thumbs_array);
		$thumb_first = $thumbs_array[$first_thumb_key];
		$th = $thumb_first->thumb_id;
		$_GET['th'] = $th;
	}
	
	//GET image_id
	if($_GET['img']){
		$img = $_GET['img'];
	}
	else{
		$images_array = $this->model->portfolio->categories[$category]->projects[$proj]->thumbs[$th]->images;
		$first_image_key = key($images_array);
		$image_first = $images_array[$first_image_key];
		$img = $image_first->image_id;
		$_GET['img'] = $img;
	}

//references of objects in more manageable parts
$all_categories = &$this->model->portfolio;
$categories_array = &$all_categories->categories;
$category_selected = &$categories_array[$category];
$projects_array_in_selected_category = &$category_selected->projects;
$project_selected_in_selected_category = &$projects_array_in_selected_category[$proj];
$thumbs_array_in_selected_project = &$project_selected_in_selected_category->thumbs;
$thumb_selected_in_selected_project = &$thumbs_array_in_selected_project[$th];
$images_array_in_selected_thumb = &$thumb_selected_in_selected_project->images;
$image_selected_in_selected_thumb = &$images_array_in_selected_thumb[$img];
$links_array_in_selected_image = &$image_selected_in_selected_thumb->links;


	// ========== open html ===========
	include 'open_html.php';
	// ========== open html ===========
	
	
	include 'page_sections/header.php';
	include 'page_sections/lhs_menu.php';
	if($pg == 'home'){
		include 'page_sections/portfolio/homepage.php';
	}else{
		include 'page_sections/portfolio/central_panel.php';
	}
	if($pg != 'home'){
		include 'page_sections/portfolio/rhs_panel.php';
	}
	
	

	
	// ========== close html ===========
	include 'close_html.php';
	// ========== close html ===========
?>

