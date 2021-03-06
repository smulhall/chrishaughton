$(document).ready(function() {
	deleteElement();
	addTextLine();
	addLink();
	deleteLink();
	setupForm();
});



//Add a text line
function addTextLine(){
   $(".add_text_line").click(function(e){
	   e.preventDefault();
	   var loopMax = $(this).attr('id');
	   var tableId = $(this).closest('table').attr('id');
	   
	   var rows = $("#"+tableId+" tr"); 
	   var length = rows.length;
	   var newId = length;
	   console.log(newId); //feedback
	   //alert("trId = " + $length);
	  
	   $("#"+tableId+" > tbody:last").append("<tr id='info_tr"+ newId +"'><td>Text to Display (new):</td><td><input class='newInput' id='display_text_line"+ newId +"' name ='display_text_line"+ newId +"' value='' type='text' /></td><td><a id='"+ newId +"' class='delete_element' href='#'>delete</a></td></tr>");
	   
	   deleteElement();
   });
}


//Delete a text line
function deleteElement(){
   $(".delete_element").click(function(e){
	   e.preventDefault();
	   var currentId = $(this).attr('id');
	   var rowId = ("info_tr"+currentId);
	   var tableId = $(this).closest('table').attr('id');
	   $(document.getElementById(tableId)).find("#"+rowId).remove();
	   //$(document.getElementById(rowId)).remove();
	});
}


//Add a link
function addLink(){
   $(".add_link").click(function(e){
	   e.preventDefault();
	   var tableId = $(this).closest('table').attr('id'); //get table id specifically for this image
	   
	   var rows = $("#"+tableId+" tr"); 
	   var length = rows.length;
	   var newId = length;
	   console.log(newId); //feedback
	   //alert("trId = " + length);
	   
	   //add new table row
	   $("#"+tableId+" > tbody:last").append("<tr id='link_tr"+ newId +"'><td><input id='link_text' class='link_text newInput' name ='link_text"+ newId +"' type='text' value='url (new)' /></td><td><input class='link_url newInput' name ='link_url"+ newId +"' type='text' value='display text (new)' /></td><td><a id='"+ newId +"' class='delete_link' href='#'>delete</a></td></tr>");
	   deleteLink();
   });
}

//Delete a link
function deleteLink(){
   $(".delete_link").click(function(e){
	   e.preventDefault();
	   var currentId = $(this).attr('id');
	   var rowId = ("link_tr"+currentId);
	   var tableId = $(this).closest('table').attr('id');
	   $(document.getElementById(tableId)).find("#"+rowId).remove();
	   //$(document.getElementById(rowId)).remove();
	});
}

function setupForm(){
	$(".admin_form").submit(function(event){
    // setup some local variables
    	var newInputs = $('.newInput');
		var $form = $(this);
		var serializedData = $form.serialize();
		
		for(i=0;i<newInputs.length;i++){
			input = newInputs[i];
			value = input.value;
			serializedData += "&"+input.name + "=" + input.value;
		}
		
	    $.ajax({
	        url: "/update",
	        type: "post",
	        data: serializedData,
	        async: false
	    	});    
	});
}

