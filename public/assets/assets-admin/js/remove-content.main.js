$(document).ready(function(){
	$('.modal_hide_content').click(function(){
		var action = $(this).attr('data-action');
		$('#action_remove').attr('href',action);
	})
})

