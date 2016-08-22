$(document).ready(function() {
    $(window).load(function () {
    	var countryshort = $('.addCountry').val();
        if(countryshort != 0)
        {
    	   $('#flag').attr('src','/uploads/photos/'+ countryshort +'.png');
        }
    	$('.title_description').hide();
        $('.title_description_'+countryshort).show();
	})

	$( ".addCountry" ).change(function() {
    	var country = $('.addCountry').val();
        if(country != 0)
        {
    	   $('#flag').attr('src','/uploads/photos/'+ country +'.png');
        }
    	$('.title_description').hide();
    	$('.title_description_'+country).show();
	});
})
