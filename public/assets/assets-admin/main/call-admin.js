$(document).ready(function(){
	$('#with_lottery').click(function(){
		$.ajax({
			url: '/en/admin-call/users-with-lottery/',
			method: 'GET',
			success: function(result){
				if(result)
				{
					$('#new_users').hide();
					$('#new_users_without_lottery').hide();
					$('#new_users_with_lottery').show();
				}
			}
		})
	});
	$('#without_lottery').click(function(){
		$.ajax({
			url: '/en/admin-call/users-without-lottery/',
			method: 'GET',
			success: function(result){
				if(result)
				{
					$('#new_users').hide();
					$('#new_users_with_lottery').hide();
					$('#new_users_without_lottery').show();
				}
			}
		})
	});
	$("#select-admin").change(function(){
		var option_val = $(this).val();
		if(option_val == 'admin-call'){
			$('#country_hide').css('display','block')
		}else{
			$('#country_hide').css('display','none')
		}
	})

	$('.select_all').click(function(event) { 
		if(this.checked) { 
			$('.check_conutry').each(function() { 
				this.checked = true;
			});
		}else{
			$('.check_conutry').each(function() { 
				this.checked = false;               
			});         
		}
	});

	$('#submit').click(function(){
		var array = "";
		$('.check_conutry').each(function() { 
			if($(this).prop('checked') == true){
				array += $(this).data('id') + "," ;
			}
		});
		var result = array.substring(0, array.length-1);
		$('#country_id').val(result);
	});
	$('#no_answer').click(function(){
		window.callDate = $('#next_call_date').val();
		var userId = $('#add_status').attr('alt');
		var status = $('#no_answer').val();
		$.ajax({
			url: '/en/admin-call/no-answer/'+userId,
			method: 'GET',
			data: {call_status:status},
			success:function(result){
				$('#status_history').prepend('<div class="col-md-10" style="float:none;margin:0 auto;overflow:hidden"><div class="col-md-2">a</div><div class="col-md-8" style="font-size:12px"><span>'+status+'</span>:<span>'+callDate+'</span></div><div class="col-md-2" style="font-size:12px"><a href="/applicant/remove-status/'+result["id"]+'" class="btn btn-xs btn-info"><i class="fa fa-trash-o bigger-120"></i></a></div></div>');
			}
		})
	});
	$('#call_again').click(function(){
		var userId = $('#add_status').attr('alt');
		var status = $('#call_again').val();
		$.ajax({
			url: '/en/admin-call/call-again/'+userId,
			method: 'GET',
			data: {call_status:status,call_date:callDate},
			success:function(result){
				$('#status_history').prepend('<div class="col-md-10" style="float:none;margin:0 auto;overflow:hidden"><div class="col-md-2">a</div><div class="col-md-8" style="font-size:12px"><span>'+status+'</span>:<span>'+callDate+'</span></div><div class="col-md-2" style="font-size:12px"><a href="/applicant/remove-status/'+result["id"]+'" class="btn btn-xs btn-info"><i class="fa fa-trash-o bigger-120"></i></a></div></div>');
			}
		})
	});
});

