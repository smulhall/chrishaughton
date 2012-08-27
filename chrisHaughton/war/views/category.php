<?php 
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$currCategoryId = $_GET['c'];
$currProjId = $_GET['p'];
$currImageId = $_GET['i'];

$portfolioService = PortfolioServiceFactory::getPortfolioService();

//from model
$category = $portfolioService-> getCategory($currCategoryId);
$projects = $portfolioService-> getProjectList(); //numerical array of all projects
if(isset($currProjId)){
	$project = $portfolioService-> getProject($currProjId); //object of singular project containing all images
}else{
	$project = $projects[0];
}
$images = $project-> getImages(); //numerical array of all images in this single project
if(isset($currProjId)){
	$image = $project-> getImageById($currImageId); //particular image user has clicked
} else {
	$image = $project-> getImages()[0];
}

$links = $image-> getLinks();
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<title>portfolio.php</title>
</head>
<body>
<div id='wrapper'>
	
	<!-- ======================== Header ========================== -->
	<div id='header'>
		<a href='index.php?pg=home'><img src='/images/logo.jpg' /></a>
	</div>
	
	
	<!-- ======================== LHS Menu ========================== -->	
	<?php include 'includes/leftMenu.php'; ?>
	
	
	<!-- ======================== Central Panel ========================== -->	
	<div id="central_panel">
		<img src="<?php echo $image-> getUrl();?>"> 
	</div>
	
	<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
		
		<div id="thumb_wrapper"> 
			<?php
			foreach($projects as $proj){
				//print_r($proj);
				$imagesCurrProj = $proj-> getImages(); //numerical array of all images in this single project
				//print_r($imagesCurrProj[0]);
				$thumbUrl = $imagesCurrProj[0]-> getThumbUrl();
				//echo "<br />thumbUrl = ".$thumbUrl;
				//echo "<br />";
				//print_r($imagesCurrProj);
				if($imagesCurrProj[0]!=null){
			?>
				<a href="/views/category.php?c=<?php echo $currCategoryId; ?>&p=<?php echo $proj-> getId();?>&i=<?php echo $imagesCurrProj[0]-> getId(); ?>">
					<img class="rhs_thumb" src="<?php echo $imagesCurrProj[0]-> getThumbUrl();?>" />
				</a>	
			<?php 
				}
			} 
			?>
		</div>
		
		<div id="prev_next">
			<a id="prev_ts" href="#">
				<img class="arrow" src="/images/prev.jpg">
			</a>
			<a id="next_ts" href="#">
				<img class="arrow" src="/images/next.jpg">
			</a>
		</div>
		
		
		
		<div id="image_info_wrapper">
			
			<p class="dashed_line">- - - - - - - - - - - - -</p>
			
			
			<div id="info">
				<?php $info = $image-> getInfo();
				foreach($info as $info1){
				?>
					<p><?php echo $info1?></p>
				<?php
				}
				?>
			</div>
			
			
			<div id="links">
				<?php 
				foreach($links as $links1){
				?>
					<a target='_blank' href='<?php echo $links1 ?>'><?php echo $links1 ?></a>
				<?php
				}
				?>	
			</div>
			
			
			
			<div id="more_images">
				<div id='more_images_thumb_wrapper'>
					<h4>More Images:</h4>
					<?php
					$no_of_elements = count($images);
					//echo "elements = ".$no_of_elements."<br />";
					//print_r($images);
					if($no_of_elements > 1){ //test to see if there are more images in this project
						$c=0;
						foreach($images as $img){
							if($c >= 1){
								//echo $c." // ";
								?>
								<a href='/views/category.php?c=<?php echo $currCategoryId; ?>&p=<?php echo $currProjId;?>&i=<?php echo $img-> getId(); ?>'><img class="rhs_thumb" src="<?php echo $img-> getThumbUrl();?>" /></a>
								<?php
							} 
							$c++;
						}
					} 
					?>
				</div>	
			</div>
			
			

		</div>
	</div>
</body>
</html>