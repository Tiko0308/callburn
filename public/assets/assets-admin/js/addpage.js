$(document).ready(function() {
    $(window).load(function () {
    	var countryshort = $('.addPage').val();
        if(countryshort != 0)
        {
    	   $('#flag').attr('src','/uploads/photos/'+ countryshort +'.png');
        }
    	$('.title_description').hide();
        $('.title_description_'+countryshort).show();
        CKEDITOR.replace('description_'+countryshort);
        $(".textarea").wysihtml5();
	})

	$( ".addPage" ).change(function() {
    	var country = $('.addPage').val();
        if(country != 0)
        {
    	   $('#flag').attr('src','/uploads/photos/'+ country +'.png');
        }
    	$('.title_description').hide();
    	$('.title_description_'+country).show();
        CKEDITOR.replace('description_'+country);
        $(".textarea").wysihtml5();
	});
})
