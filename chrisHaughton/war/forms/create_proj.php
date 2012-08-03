<div id='central_panel'>

<?php

import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$portfolioService = PortfolioServiceFactory::getPortfolioService();	
$projectDetails['title'] = $_POST['title'];
$projectDetails['category'] = $_POST['category'];
$project = $portfolioService-> addProject($projectDetails);
$id = $project->getId();

//redirect to image upload page
echo "<p><a href='/forms/upload_image.php?proj=$id'>upload images for this project?</a></p>";

?>
</div> <!--  close central_panel -->
