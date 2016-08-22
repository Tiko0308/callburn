$(document).ready(function() {
    $(window).load(function () {
    	var countryshort = $('.editPage').val();
        if(countryshort != 0)
        {
    	   $('#flag').attr('src','/uploads/photos/'+ countryshort +'.png');
        }
    	$('.title_description').hide();
    	$('.title_description_'+countryshort).show();
        CKEDITOR.replace('description_'+countryshort);
        $(".textarea").wysihtml5();
	});
    
	$( ".editPage" ).change(function() {
        var country = $('.editPage').val();
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

