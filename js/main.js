$(function(){
	$('a.edit').live('click',function(){
		$('input#save').show();
		$('input#add').hide();
		var item = $(this).attr('rel');
		var row = $('tr[rel="'+item+'"]');
		//var arr = [ "name", "project", "description", "start", "end", "date", "hours" "" ];
		row.find('td').each(function(index, elem){
			valu = $(elem).text();
			cell = $(elem).attr('rel');
  			$('tr.edits td[rel="'+cell+'"] input').val(valu)

		});
		$('input#id').val(item);
	});






$('#save').live('submit',function(){

//		if($(this).data('formstatus') !== 'submitting'){

			//setup variables
			var form = $(this),
				formData = form.serialize(),
				formUrl = form.attr('action'),
				formMethod = form.attr('method'), 
				responseMsg = $('#update-response');
			
			//add status data to form
			form.data('formstatus','submitting');
			 
			//show response message - waiting
			
			
			//send data to server for validation
			$.ajax({
				url: formUrl,
				type: formMethod,
				data: formData,
				success:function(data){
					var responseData = jQuery.parseJSON(data);
					//alert(responseData.name)
					//setup variables
					if(responseData.message) {
						obj = {
							"name": responseData.name,
							"project": responseData.project,
							"description": responseData.description,
							"start": responseData.start,
							"end": responseData.end,
							"date": responseData.date,
							"hours": responseData.hours
						};						 
						$('table#log').append('<tr rel="'+responseData.id+'" class="data"></tr>');
						$.each( obj, function( key, value ) {
							$('table#log tr[rel="'+responseData.id+'"]').append('<td rel="'+key+'">'+value+'</td>');
						});
						$('table#log tr[rel="'+responseData.id+'"]').append('<td class="small"><a class="edit" rel="'+responseData.id+'" href="#edit">Edit</a></td>');
						//$('tr.edits td[rel="'+key+'"] input').val('');
					} else {
						 obj = {
							"name": responseData.name,
							"project": responseData.project,
							"description": responseData.description,
							"start": responseData.start,
							"end": responseData.end,
							"date": responseData.date,
							"hours": responseData.hours,
							"id": responseData.id
						};
						var entry = responseData.id;
						$.each( obj, function( key, value ) {
							$('table#log tr[rel="'+entry+'"] td[rel="'+key+'"]').text(value);
							$('tr.edits td[rel="'+key+'"] input').val('')
						});
						$('input#id').val('');
						$('input#save').hide();
						$('input#add').show();
					};
				}//function data
			});//ajax
		//}//if status is submitting
		//
		//prevent form from submitting
		return false;
	});
});