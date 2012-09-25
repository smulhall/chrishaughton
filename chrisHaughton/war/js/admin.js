$(document).ready(function() {
		$("#link_text").click(function(e){
			alert("clear text");
			//e.preventDefault();
		    //$('#link_text').val("");
		});
	
	   $(".delete_element").click(function(e){
		   e.preventDefault();
		   var currentId = $(this).attr('id');
		   alert("id = "+currentId);
		   //$(document.getElementById(tr+currentId)).remove();
		});

	   $(".add_text_line").click(function(e){
		   e.preventDefault();
		   $('#info_table > tbody:last').append("<tr><td>Text to Display (new):</td><td><input  name ='display_text_line<?php echo $random;?>' value='' type='text' /></td><td><a class='delete_element' href='#'>delete</a></td></tr>");
		});

	   $(".add_link").click(function(e){
		   e.preventDefault();
		   $('#links_table > tbody:last').append("<tr><td><input id='link_text' class='link_text' name ='link_text<?php echo $random; ?>' type='text' value='url (new)' /></td><td><input class='link_url' name ='link_url<?php echo $random; ?>' type='text' value='display text (new)' /></td><td><a class='delete_element' href='#'>delete</a></td></tr>");
		});
	   
});