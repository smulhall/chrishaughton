<?php 
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$currCategoryId = $_GET['c'];
$currProjId = $_GET['p'];
$currImageId = $_GET['i'];
//echo "c = $currCategoryId // p = $currProjId // i = $currImageId";

$portfolioService = PortfolioServiceFactory::getPortfolioService();
$categories = $portfolioService-> getCategoryList(); 

if(isset($currCategoryId)){
	$category = $portfolioService-> getCategory($currCategoryId);
}else{
	//$categories = $portfolioService-> getCategoryList();
	$category = $categories[0];
	$currCategoryId = $category-> getId();
}
$projects = $category-> getProjects();

//$projectsList = $portfolioService-> getProjectList(); //numerical array of all projects

if(isset($currProjId)){
	$project = $portfolioService-> getProject($currProjId); //object of singular project containing all images
}else{
	$project = $projects[0];
	$currProjId = $project-> getId();
}
$images = $project-> getImages(); //numerical array of all images in this single project

if(isset($currImageId)){
	$image = $project-> getImageById($currImageId); //particular image user has clicked
} else {
	$images = $project-> getImages();
	$image = $images[0];
	$currImageId = $image-> getId();
}

$links_text = $image-> getLinks(); //Links Url
$links_url = $image-> getLinksText(); //Links Display text


//thumbnails pagination calcs
$total_no_of_thumbnails = count($projects);
$no_of_thumbnails_per_set = 15; //set no of thumbnails per page
$no_of_th_sets = ceil($total_no_of_thumbnails / $no_of_thumbnails_per_set);
$current_th_set = $_GET['ts']; //if set
$current_ts_upr_limit = $current_th_set * $no_of_thumbnails_per_set;
$current_ts_lwr_limit = $current_ts_upr_limit - $no_of_thumbnails_per_set;



?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<title>portfolio.php</title>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type='text/javascript' src='/js/nav_menu.js'></script>
</head>
<body>
<div id='wrapper'>
	
	<!-- ======================== Header ========================== -->
	<?php include 'includes/header.php'; ?>
	
	
	
	<!-- ======================== LHS Menu ========================== -->	
	<?php include 'includes/leftMenu.php'; ?>
	
	
	<!-- ======================== Central Panel ========================== -->	
	<div id="central_panel" class='central_panel_portfolio'>
		<?php 
			
			$movieUrl = $image-> getMovieUrl();
			if($movieUrl != null){ ?>
			<p class='wait_for_video'>Please wait for the movie file to load...</p>
			<div id='video_iframe_div'>
				<iframe src="http://player.vimeo.com/video/<?php echo $image-> getMovieUrl(); ?>?autoplay=true" width="500" height="375" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			</div>
		<?php }else{ ?>
			<img src="<?php echo $image-> getUrl();?>" />
		<?php }	 ?>
	</div> <!-- close central_panel -->
	
	<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
		
		

	</div>  <!-- close rhs_panel -->

</div> <!-- close wrapper -->
</body>
</html>
