<?php

import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

// gettting attributes from form POST
$categoryDetails['title'] = $_POST['title'];

// creating the service and accessing the model
$portfolioService = PortfolioServiceFactory::getPortfolioService();
$category = $portfolioService-> addCategory($categoryDetails);

$catId = $category->getId();

include('../create_proj.php');
?>



		

