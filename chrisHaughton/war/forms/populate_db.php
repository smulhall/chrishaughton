<?php
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

// creating the service and accessing the model
$portfolioService = PortfolioServiceFactory::getPortfolioService();
$categories = $portfolioService-> getCategoryList();

//Array ( [title] => Project 4 [category] => 62 )


//creating projects for each category
$projectDetails = array();

foreach($categories as $category){
	$projectDetails['category'] = $category-> getId()."";
	for($i=0; $i<2; $i++){
		$projectDetails['title'] = $i."";
		print_r($projectDetails);
		echo "<br />";
		$project = $portfolioService-> addProject($projectDetails);
	}
}
