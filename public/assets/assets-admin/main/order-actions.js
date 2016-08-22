jQuery(document).ready(function () {
    $(function() {
        function displayResult(item) {
            $('.alert').show().html('You selected <strong>' + item.value + '</strong>: <strong>' + item.text + '</strong>');
            }
            window.orderId = $('#remove').attr('alt');
        $('#remove').click(function(){
            $.ajax({
                url:'/en/applicant/order-remove/'+orderId,
                method:'GET',
                success:function(result){
                    if (result) {
                        $('#order').hide();
                    } else {
                        alert('error');
                    }
                }
            })
        });
        $(document).on('click', '#pending', function(){
            $.ajax({
                url:'/en/applicant/order-pending/'+orderId,
                method:'GET',
                success:function(result){
                    $('#pending').html('<span id="done">Mark as done</span>');
                    $('.status').html('<div>pending</div>');
                }
            })
        })

        $('.modal_approve').click(function(){
            var action = $(this).attr('data-action');
            $('#action_approve').attr('href',action);
        });

        $('.modal_hide_content').click(function(){
            window.secondary_id1 = $(this).data('secondary');
            window.user_id1 = $(this).data('user');
            window.message_text1 = $('#message_'+user_id1+'_'+secondary_id1).val();
   
        })

        $('.remove_secondary_pic').click(function(){
            $.ajax({
                url:'/en/applicant/unapprove-secondary-users/',
                method:'POST',
                data:{secondary:secondary_id1,user:user_id1, message:message_text1},
                success:function(result){ 
                    location.reload();  
                }
            })

        })
        
        $('.modal_hide_content_user').click(function(){
            window.user_id2 = $(this).data('user');
            window.message_text2 = $('#message_'+user_id2).val();
        })
        $('.remove_user_pic').click(function(){
            $.ajax({
                url:'/en/applicant/unapprove/',
                method:'GET',
                data:{user:user_id2, message:message_text2},
                success:function(result){  
                    location.reload();
                }
            })

        })


        $('.modal_approve').click(function(){
            var action = $(this).attr('data-action');
            $('#action_approve').attr('href',action);
        })


        $(document).on('click', '#done', function(){    
            $.ajax({
                url:'/en/applicant/order-done/'+orderId,
                method:'GET',
                success:function(result){
                    $('#done').html('<span id="pending">Mark as pending</span>');
                    $('.status').html('<div>payed</div>');
                }
            })
        });
        $('#add_status').click(function(){
            var userId = $('#add_status').attr('alt');
            var key = $('#select_status').val();
            var selected_status = $("#select_status option[value='"+key+"']").text();
            var comment_val = $('#comment').val();
            $.ajax({
                url:'/en/applicant/add-status/'+userId,
                method:'POST',
                data:{current_status:selected_status,comment:comment_val},
                success:function(result){
                    if(result) {
                        $('.current_status').html(result.user.current_status);
                        if(result.current_status == 'Not a Winner' && result.user.product_name == 'demande')
                        {
                            $('#status_history').prepend('<div class="col-md-10" style="float:none;margin:0 auto;overflow:hidden"><div class="col-md-2">a</div><div class="col-md-8" style="font-size:12px"><span>Your application has not been selected - please apply again</span></div><div class="col-md-2" style="font-size:12px"><a href="/en/applicant/remove-status/'+result["status"]["id"]+'" class="btn btn-xs btn-info"><i class="fa fa-trash-o bigger-120"></i></a></div></div>');
                        }
                        else if(result.user.current_status == 'Congratulation you are a Green Card winner')
                        {
                            $('#status_history').prepend('<div class="col-md-10" style="float:none;margin:0 auto;overflow:hidden"><div class="col-md-2">a</div><div class="col-md-8" style="font-size:12px"><span>Congratulation you are a Green Card winner please check your email for further instructions</span></div><div class="col-md-2" style="font-size:12px"><a href="/en/applicant/remove-status/'+result["status"]["id"]+'" class="btn btn-xs btn-info"><i class="fa fa-trash-o bigger-120"></i></a></div></div>');
                        }
                        else
                        {
                            $('#status_history').prepend('<div class="col-md-10" style="float:none;margin:0 auto;overflow:hidden"><div class="col-md-2">a</div><div class="col-md-8" style="font-size:12px"><span>'+result.user.current_status+'</span></div><div class="col-md-2" style="font-size:12px"><a href="/en/applicant/remove-status/'+result["status"]["id"]+'" class="btn btn-xs btn-info"><i class="fa fa-trash-o bigger-120"></i></a></div></div>');
                        }
                    }   
                }
            })
        });
     });
});