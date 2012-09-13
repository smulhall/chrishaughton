
<?php 
	$movieUrl = $image-> getMovieUrl();
	if($movieUrl != null){ ?>
		<p class='wait_for_video'>Please wait for the movie file to load...</p>
		
		<div id='video_iframe_div'>
			<iframe src="http://player.vimeo.com/video/<?php echo $image-> getMovieUrl(); ?>?autoplay=true" width="500" height="375" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		</div>
		<?php }else{ ?>
			<img src="<?php echo $image-> getUrl();?>" />
		<?php }	 
?>
		

<div class='text_pages_content'>
	
	<div id='horiz_links_div' class='featured'>
		<?php 
			include('featured-menu.php');
		?>
	</div>
	
	<div class='text_pages_content_content'>
		
		<?php 
		if($pg == 'lang'){ ?>
			<p>language content</p>
		<?php 
		}
		elseif($pg == 'about'){ ?>
			<p>about content</p>
		<?php 
		}
		elseif($pg == 'resources'){ ?>
			<p>resources content</p>
		<?php 
		}
		?>
	
	</div>

</div>





		
	


