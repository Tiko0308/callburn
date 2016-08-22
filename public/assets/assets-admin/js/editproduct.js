$(document).ready(function() {
    $(window).load(function () {
    	var countryshort = $('.editCountry').val();
    	$('#flag').attr('src','/uploads/photos/'+ countryshort +'.png');
    	$('.title_description').hide();
    	$('.title_description:first-child').show();
	})

	$( ".editCountry" ).change(function() {
    	var country = $('.editCountry').val();
    	$('#flag').attr('src','/uploads/photos/'+ country +'.png');
    	$('.title_description').hide();
    	$('.title_description_'+country).show();
	});
})
