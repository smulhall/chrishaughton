<div>
	<ul>
		<a href='?pg=press'><li>Press</li></a>
		<a href='?pg=int'><li>Interviews</li></a>
		<a href='?pg=pub'><li>Publications</li></a>
	</ul>
</div>
		
		
<?php 
if($pg == 'press'){ ?>
	<p>press content</p>
<?php 
}
elseif($pg == 'int'){ ?>
	<p>interview content</p>
<?php 
}
elseif($pg == 'pub'){ ?>
	<p>publications content</p>
<?php 
}
?>