<?php 
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$id = $_GET['Id'];
$type = $_GET['type'];
//echo "id = $id";
//echo "<br />type = $type";

$portfolioService = PortfolioServiceFactory::getPortfolioService();
$categories = $portfolioService-> getCategoryList();

if($type=="category"){
	$object_to_delete = $portfolioService-> getCategory($id);
}
else if($type=="project"){
	$object_to_delete = $portfolioService-> getProject($id);
}
		
$portfolioService-> delete($object_to_delete);

header("Location: /forms/admin.php");
?>