$(function() {
	$(".delete_com").click(function() {
		
		var com_id =  $(this).attr('id').replace('delete_com_','');
		
		if(com_id=='') {
			
		} else {	$.ajax({
					type: "GET",
					url: "dlt/dlt_com.php?id=" + com_id,
					data: "",
					cache: false,
					success: function(){
					$("ul#com_box li#com_" + com_id).fadeOut("slow",function(){
						$("ul#com_box li#com_" + com_id).remove();
					});	
					}
					});	
		} return false;
	})
});