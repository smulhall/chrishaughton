<?php 
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$currImageId = $_GET['i'];

$portfolioService = PortfolioServiceFactory::getPortfolioService();
$category = $portfolioService-> getCategory(1);
echo "category = $category<br />";
$projects = $portfolioService-> getProjectList();
echo "projects = $projects<br />";
$images = $projects[1]-> getImages();
echo "images = $images<br />";
$image = $projects[1]-> getImageById($currImageId);
echo "image = $image<br />";

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
	
	
	<!-- ======================== Header ========================== -->	
	<?php include 'includes/leftMenu.php'; ?>
	
	
		
	<div id="central_panel">
		<img src="<?php echo $image-> getUrl();?>"> 
	</div>
	<div id="rhs_panel">
		<div id="thumb_wrapper"> 
			<a href='/views/category.php?c=<?php echo $category; ?>&p=<?php echo $projects[1]-> getId();?>&i=<?php echo $images[$c]-> getId(); ?>'><img class="rhs_thumb" src="<?php echo $images[0]-> getThumb();?>"></a>
		</div>
		<div id="prev_next">
			<a id="prev_ts" href="index.php?pg=ill&amp;proj=131&amp;th=181&amp;img=219&amp;curr_ts=1">
				<img class="arrow" src="/images/prev.jpg">
			</a>
			<a id="next_ts" href="index.php?pg=ill&amp;proj=131&amp;th=181&amp;img=219&amp;curr_ts=3">
				<img class="arrow" src="/images/next.jpg">
			</a>
		</div>
		
		
		
		<div id="image_info_wrapper">
			
			<p class="dashed_line">- - - - - - - - - - - - -</p>
			
			
			<div id="info">
			
			</div>
			
			<div id="links">
			
			</div>
			
			
			
			<div id="more_images">
				<div id='more_images_thumb_wrapper'>
					<?php
					$no_of_elements = count($images);
					if($no_of_elements > 1){ //test to see if there are more images in this project
						$c=0;
						foreach($images as $key => $value){
							if($c >= 1){
								?>
									<a href='/views/category.php?c=<?php echo $category; ?>&p=<?php echo $projects[1]-> getId();?>&i=<?php echo $images[$c]-> getId(); ?>'><img class='rhs_thumb' src='<?php echo $images[$c]-> getUrl().'=s64'; ?>' /></a>
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