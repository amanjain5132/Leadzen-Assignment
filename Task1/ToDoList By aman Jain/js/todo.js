$( document ).ready(function() {	
	$(document).on('submit','#todoForm', function(event){
		var formData = $(this).serialize();
		$.ajax({
                url: "action.php",
                method: "POST",              
                data: formData,
				dataType:"json",
                success: function(data) {     
					var html = $("#taskHTML").html();					
					html = html.replace(/TO_DO_ID/g, data.id);
					html = html.replace(/TASK_NAME/g, data.task);					
					$("#sortable").append(html).fadeIn('slow');
					$('#todo').val('');
					countTodos();
                }
        });		
		return false;
	});
	
	countTodos();
	
	$('.todolist').on('change','#sortable li input[type="checkbox"]',function(){
		if($(this).prop('checked')){
			var doneItem = $(this).parent().parent().find('label').text();
			$(this).parent().parent().parent().addClass('remove');
			var tasks = [];
			tasks.push($(this).val()); 			
			done(doneItem, $(this).val());
			countTodos();
			var todos = tasks.join(); 
			updateTask(todos, );
		}
	});
	
	
	$('.todolist').on('click','.remove-item',function(){
		removeItem(this);
		var id = $(this).attr('data-id');
		var action = 'updateTask';	
		$.ajax({
			url: "action.php",
			method: "POST",    
			data:{id: id, val:2, action:action},
			success: function(data) {     
				console.log("updated");
			}
		});		
	});
	
	$("#checkAll").click(function(){
		AllDone();
	});
});


function countTodos(){
	var count = $("#sortable li").length;
	$('.count-todos').html(count);
}

function removeItem(element){
    $(element).parent().remove();
}

function done(doneItem, id){
    var done = doneItem;
    var rowHtml = '<li>'+ done +'<button class="btn btn-default btn-xs pull-right  remove-item" data-id="'+id+'"><span  class="glyphicon glyphicon-remove"></span></button></li>';
    $('#done-items').append(rowHtml);
    $('.remove').remove();
}

function AllDone(){
	var items = [];
	var tasks = [];
	$('#sortable li').each( function() {
		items.push($(this).text());  
		tasks.push($(this).find('input').val()); 
	});		
	for (i = 0; i < items.length; i++) {
		$('#done-items').append('<li>' + items[i] + '<button class="btn btn-default btn-xs pull-right  remove-item"data-id="'+ tasks[i] +'"><span class="glyphicon glyphicon-remove"></span></button></li>');
	}	
	$('#sortable li').remove();
	countTodos();
	var todos = tasks.join(); 
	updateTask(todos);
}


function updateTask(itemIds) {	
	var action = 'updateTask';	
	$.ajax({
		url: "action.php",
		method: "POST",    
		data:{id: itemIds,  val:1, action:action},
		success: function(data) {     
			console.log("updated");
		}
	});		
}