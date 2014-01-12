<?php 
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$id = $_GET['Id'];
$projId = $_GET['projId'];
$type = $_GET['type'];
//echo "id = $id";
//echo "<br />type = $type";

$portfolioService = PortfolioServiceFactory::getPortfolioService();
$categories = $portfolioService-> getCategoryList();

if($type=="category"){
	$portfolioService-> deleteCategory($id);
}
else if($type=="project"){
	$portfolioService-> deleteProject($id);
}
else if($type=="image"){
	$portfolioService-> deleteImage($id, $projId);
}
		
//$portfolioService-> delete($object_to_delete);

header("Location: /forms/admin.php");
?>