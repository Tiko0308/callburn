$(document).ready(function() {
    $(window).load(function () {
    	var countryshort = $('.selectLanguage').val();
        var token = $('#token').val();
    	$('#flag').attr('src','/uploads/photos/'+ countryshort +'.png');
        $.ajax({
            url: "select-language/",
            type: "POST",
            data: {_token: token,shortcode: countryshort},
            success: function (data) {
                $.each(data.ids, function(i, item){
                    $('#'+item).text(data.language[i]);  
                }); 
            }
        });
	})

	$( ".selectLanguage" ).change(function() {
    	var country = $('.selectLanguage').val();
        var token = $('#token').val();
    	$('#flag').attr('src','/uploads/photos/'+ country +'.png');
        $.ajax({
            url: "select-language/",
            type: "POST",
            data: {_token: token,shortcode: country},
            success: function (data) {
                $.each(data.ids, function(i, item){
                    $('#'+item).text(data.language[i]);  
                });
            }
        });
	});
})

