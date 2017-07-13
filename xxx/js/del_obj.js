$(function() {
	$(".delete_obj").click(function() {
		
		var obj_id =  $(this).attr('id').replace('delete_obj_','');
		
		if(obj_id=='') {
			
		} else {	$.ajax({
					type: "GET",
					url: "dlt/dlt_obj.php?id=" + obj_id,
					data: "",
					cache: false,
					success: function(){
						$("ul#obj_box li#obj_" + obj_id).fadeOut("slow",function(){
							$("ul#obj_box li#obj_" + obj_id).remove();
						});	
					}
					});	
		} return false;
	})
});