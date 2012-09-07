<div>
	<ul>
		<a href='?fp=<?php echo $fp; ?>&pg=lang'><li>Languages</li></a>
		<a href='?fp=<?php echo $fp; ?>&pg=awards'><li>Awards</li></a>
		<a href='?fp=<?php echo $fp; ?>&pg=about'><li>About the book</li></a>
		<a href='?fp=<?php echo $fp; ?>&pg=resources'><li>Toys, Prints and Downloads</li></a>
	</ul>
</div>
		
<?php 
if($pg == 'lang'){ ?>
	<p>language contnet</p>
<?php 
}
elseif($pg == 'awards'){ ?>
	<p>awards contnet</p>
<?php 
}
elseif($pg == 'about'){ ?>
	<p>about contnet</p>
<?php 
}
elseif($pg == 'resources'){ ?>
	<p>resources contnet</p>
<?php 
}
?>