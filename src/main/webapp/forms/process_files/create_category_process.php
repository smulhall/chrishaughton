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

$catId = $category->getId();

include('../create_proj.php');
?>



		

