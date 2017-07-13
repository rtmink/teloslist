$(function() {
	$(".dlt_dga_img").click(function() {
		
		var dga_img_id =  $(this).attr('id').replace('dlt_dga_img_','');
		var dga_img_type = $(this).attr('class').split(" ")[3].replace('dlt_img_','');
		
		if(dga_img_id != '') {
			
			$.ajax({
			type: "GET",
			url: "/dlt/dlt_dga_img.php?id=" + dga_img_id,
			data: "",
			cache: false,
			success: function(){
				$('#' + dga_img_type + '_img_preview div li').html('').hide('');
				$('textarea#' + dga_img_type).css('border', '1px solid #cccccc').focus(function() {$(this).css('border-color', 'blue');}).blur(function() {$(this).css('border-color', '#cccccc');})
				$('#' + dga_img_type + '_img').val('');
				}
			});	
		} return false;
	});
});