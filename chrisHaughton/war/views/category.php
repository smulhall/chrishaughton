<?php 
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$currCategoryId = $_GET['c'];
$currProjId = $_GET['p'];
$currImageId = $_GET['i'];

$portfolioService = PortfolioServiceFactory::getPortfolioService();

//from model
$category = $portfolioService-> getCategory($currCategoryId);
$projects = $portfolioService-> getProjectList(); //numerical array of all projects
//TODO: projects should be based on the $currCategoryId
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

<<<<<<< HEAD
$links = $image-> getLinks(); //Links Url
//$links_url = $image-> getLinksText(); //Links Display text


=======
$links = $image-> getLinks();
>>>>>>> refs/remotes/origin/stephen1
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<title>portfolio.php</title>
<<<<<<< HEAD
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type='text/javascript'>
	$(document).ready(function() {

		$(".menu_link").hover(
	  function () {
	    $(this).addClass('HL');
	  }, 
	  function () {
	    $(this).removeClass('HL');
	  }
	);

	
		
	});
</script>

=======
>>>>>>> refs/remotes/origin/stephen1
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
		<?php if($image-> getMovieUrl() != null){ ?>
			<iframe src="http://player.vimeo.com/video/<?php echo $image-> getMovieUrl(); ?>" width="500" height="375" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		<?php }else{?>
			<img src="<?php echo $image-> getUrl();?>">
		<?php }	 ?>
	</div>
	
	<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
		
		<div id="thumb_wrapper"> 
			<?php
			foreach($projects as $proj){
				//print_r($proj);
				$imagesCurrProj = $proj-> getImages(); //numerical array of all images in this single project
				//print_r($imagesCurrProj[0]);
				if($imagesCurrProj[0]!=null){
					$thumbUrl = $imagesCurrProj[0]-> getThumbUrl();
					//echo "<br />thumbUrl = ".$thumbUrl;
					//echo "<br />";
					//print_r($imagesCurrProj);
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
				$i=0;
				$no_of_links = count($links);
				echo "no_of_links = $no_of_links";
				?>
				<a id='first_link' target='_blank' href='<?php echo $links_loop; ?>'><?php echo $links_loop; ?></a><br />
				
					
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
