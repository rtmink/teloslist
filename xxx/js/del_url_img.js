$(function() {
	$(".dlt_url_img").click(function() {
		
		var url_img_type = $(this).attr('id').replace('dlt_url_img_','');
		
		$('#' + url_img_type + '_url_img_preview li').html('').hide('');
		$('textarea#' + url_img_type).css('border', '1px solid #cccccc').focus(function() {$(this).css('border-color', 'blue');}).blur(function() {$(this).css('border-color', '#cccccc');})
		$('#' + url_img_type + '_input').val('');
		
	})
});


	
	