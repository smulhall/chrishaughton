<div>
	<ul>
		<a href='?pg=about'><li>About</li></a>
		<a href='?pg=contact'><li>Contact</li></a>
	</ul>
</div>
		
		
<?php 
if($pg == 'about'){ ?>
	<p>about content</p>
<?php 
}
elseif($pg == 'contact'){ ?>
	<p>contact content</p>
<?php 
}
?>