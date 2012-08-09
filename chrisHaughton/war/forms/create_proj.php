<div id='central_panel'>

<?php

import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;
// gettting attributes from form POST
$projectDetails['title'] = $_POST['title'];
$projectDetails['category'] = $_POST['category'];

// creating the service and accessing the model
$portfolioService = PortfolioServiceFactory::getPortfolioService();
$project = $portfolioService-> addProject($projectDetails);

$id = $project->getId();

//redirect to image upload page
echo "<p><a href='/forms/upload_image.php?proj=$id'>upload images for this project?</a></p>";

?>
</div> <!--  close central_panel -->
