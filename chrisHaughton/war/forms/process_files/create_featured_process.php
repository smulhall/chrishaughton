<?php

import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

// gettting attributes from form POST
$categoryDetails['title'] = $_POST['title'];
$categoryDetails['featured'] = $_POST['featured'];
$categoryDetails['link'] = $_POST['link'];

// creating the service and accessing the model
$portfolioService = PortfolioServiceFactory::getPortfolioService();
$categories = $portfolioService-> getCategoryList();
$category = $portfolioService-> addCategory($categoryDetails);


/* //create hard-coded sublinks
$catId = $category-> getId()."";

// gettting attributes from form POST
$projectDetails['category'] = $catId;
$featured_titles[0] = "Languages/Awards";
$featured_titles[1] = "About";
$featured_titles[2] = "Resources"; 
$proj_id_array = array();

// creating the service and accessing the model
foreach($featured_titles as $featured_title){
	$projectDetails['title'] = $featured_title;
	$project = $portfolioService-> addProject($projectDetails);
	$proj_id = $project-> getId(); 
	$proj_id_array[$featured_title] = $proj_id;
}
*/
include('../create_featured_sublink.php');

?>



