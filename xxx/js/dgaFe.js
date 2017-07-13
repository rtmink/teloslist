// Comment Textarea
$(function() {
	$('#com').focus(function() {$('div#display_count_com').show();})
	$('#com').blur(function() {$('div#display_count_com').hide();})	
});

// Comment
$(function() { 
	$("#com_button").click(function() {
		
		var dga_id_com = $("#dga_id_com").val();
		var com = $("#com").val();
		var dataString = 'dga_id_com=' + dga_id_com + '&com=' + com;
		
		if($.trim(dga_id_com) == '' || $.trim(com) == '') {
			alert('Please Enter a Comment');
		} else {  	
			$.ajax({
				type: "POST",
				url: "ajax/com_ajax.php",
				data: dataString,
				cache: false,
				success: function(html){
					$("#com").val('');
					$("#display_count_com").html(140);
					$("ul#com_box").prepend(html);
					$("ul#com_box li").fadeIn("fast");
				}
			});
		} return false;
	}); 
});

// Like
$(function() {
	$("#like_button").click(function() {
		
		var dga_id_like = $("#dga_id_like").val();
		var dataString = 'dga_id_like=' + dga_id_like;
		
		if (dga_id_like == '') {
						
		} else {	
			$.ajax({
				type: "POST",
				url: "ajax/like_ajax.php",
				data: dataString,
				cache: false,
				success: function(){
					var opacity = $("#like_button").attr('class').split(" ")[1];
					
					if (opacity ==  'buttonOp') {
						$("#like_button").removeClass("buttonOp").removeClass("clicked");
					} else {
						$("#like_button").addClass("buttonOp").addClass("clicked");	
					}
				}
			});	
		} return false;
	})
});

// Acc Goal
$(function() {
	$("#goal_acc_button").click(function() {
		
		var goal_id_acc = $('#goal_id_acc').val();
		var dataString = 'goal_id_acc=' + goal_id_acc;
		
		if (goal_id_acc != '') {
		
			$('#date_button2').trigger('click');
			
			$('#dateClose').click(function() {
				dataString = '';
			});
			
			function shareAcc(x, date) {
				// True				
				if (x == 't') {
					$('#dateCheck').html('<input type="hidden" id="isDate" value="" />');	
				} else if (x == 'd') {
					$('#dateCheck').html('<input type="hidden" id="isDate" value="' + date + '" />');		
				}
				
				var isDate = $('#isDate').val();
				
				if (x == 't') {
					var extra = '&isDate=' + '';
				} else if (x == 'd') {
					var extra = '&isDate=' + isDate;
				}
				
				if (dataString != '') {
					acc_ajax(dataString + extra, goal_id_acc);
				}
			}
				
			$('#submitToday').click(function() {						
				shareAcc("t", 'none');						
			})
					
			$('#submitDate').click(function() {
						
				var day = $('#selectDay').val();
				var mo = $('#selectMo').val();
				var yr = $('#selectYr').val();
				var date = day + ' ' + mo + ' ' + yr;
				
				function fourDigits() {
					return $('#dateCheck').html('<p class="red textShadow">Year has to be four digits</p>');
				}
				
				function invalidYr() {
					return $('#dateCheck').html('<p class="red textShadow">Invalid Year</p>');
				}
						
				if (day != '' && mo != '' && yr !='') {
							
					if (yr.length < 4) {
						fourDigits();
					} else {
						if (!form_input_is_int(yr)) {
							invalidYr();
						} else {
							var fD = yr.substring(0,1);
							var sD = yr.substring(1,2);
							var tD = yr.substring(2,3);
							var foD = yr.substring(3,4);
									
							if (fD == 1) {
								if (sD == 9) {
									if (tD == 0) {
										if (foD == 0 || foD == 1) {
											invalidYr();
										} else {
											shareAcc("d", date);
										}
									} else {
										shareAcc("d", date);
									}
								} else {
									invalidYr();
								}
							} else if (fD == 2) {
								if (sD == 0) {
									if (tD == 0) {
										shareAcc("d", date);
									} else if (tD == 1) {
										if (foD != 0 && foD != 1 && foD != 2) {
											invalidYr();
										} else {
											shareAcc("d", date);
										}
									} else {
										invalidYr();
									}
								} else {
									invalidYr();
								}
							} else {
								invalidYr();
							}
						}
					}
				}
			});
		}
		
	})
	
	function form_input_is_int(input){
    	return !isNaN(input)&&parseInt(input)==input;
  	}
	
	function acc_ajax(dataString, goal_id_acc) {
		return $(function() {
			
			var answer = confirm("Are you sure you want to mark this goal as accomplished? This action cannot be undone.");
		
			if (answer){
				$('input:button').attr("disabled", true);
				$('.date_button').addClass("disabled");
				$('#dateClose').hide();
				
				$.ajax({
						type: "POST",
						url: "ajax/acc_goal_ajax.php",
						data: dataString,
						cache: false,
						success: function(){
							window.location.href = 'g?x=' + goal_id_acc;
						}
				});
				
			} else {
				
			} return false;
			
		});			
	}	

});

// Objective Textarea
$(function() {
	$('#obj').focus(function() {$('textarea#obj').addClass("textarea_long2");$('#display_count_obj').show();})
	$('#obj').blur(function() {var obj = $('#obj').val(); if (obj.length == '') {$('textarea#obj').removeClass("textarea_long2");$('#display_count_obj').hide();}})	
})
		
// Objective
$(function() { 
	$("#obj_button").click(function() {
		
		var goal_id_obj = $("#goal_id_obj").val();
		var obj = $("#obj").val();
		var dataString = 'goal_id_obj=' + goal_id_obj + '&obj=' + obj;
		
		if($.trim(goal_id_obj) == '' || $.trim(obj) == '') {
			alert('Please Write Something');
		} else {  	
			$.ajax({
				type: "POST",
				url: "ajax/obj_ajax.php",
				data: dataString,
				cache: false,
				success: function(html){
					$("#obj").val('');
					$("#display_count_obj").html(140);
					$("ul#obj_box").prepend(html);
					$("ul#obj_box li").fadeIn("fast");
				}
			});
		} return false;
	}); 
});

// Obj Checkbox
$(function() {
	$(document).on('click', 'div[role="checkbox"]', function() {
		var myClass = $(this).children().attr('class');
		
		// Ajax
		var cb_id = $(this).attr('id').replace("cb_", "");
		var cb_obj_id = cb_id.split("_")[0];
		var cb_dga_id = cb_id.split("_")[1];
		var cb = '#cb_' + cb_id + ' div';
		var dataString = 'cb_obj_id=' + cb_obj_id + '&cb_dga_id=' + cb_dga_id;
		
		if (cb_id != '') {	
			$.ajax({
				type: "POST",
				url: "ajax/obj_cm_ajax.php",
				data: dataString,
				cache: false,
				success: function(){
					if (myClass == 'checkmark') {
						$(cb).removeClass('checkmark');
					} else {
						$(cb).addClass('checkmark');
					}
				},
				error: function(){
					alert('Unexpected error occurred.');	
				}				
			});	
		} return false;		
	});	
});

// Smart
$(function() {
	$(".smart_button").click(function() {
		
		var smart_dga_id = $("#smart_dga_id").val();
		var smart_type = $(this).attr("id").split("_")[0];
		var smart_value = $(this).attr("id").split("_")[1];
		var smart_op = $(this).attr("class").split(" ")[2];
		
		function check_op(type, value) {
			return $("#" + type + "_" + value).attr("class").split(" ")[2];
		}
		
		if(smart_dga_id == '' || smart_type == '' || smart_value == '') {
						
		} else {	
			$.ajax({
				type: "GET",
				url: "ajax/smart_ajax.php?g=" + smart_dga_id + "&t=" + smart_type + "&v=" + smart_value,
				data: '',
				cache: false,
				success: function(){
				
					if (smart_op == 'buttonOp') {
						
						$("input#" + smart_type + "_" + smart_value).removeClass('buttonOp').removeClass('clicked');
						
					} else {
						
						$("input#" + smart_type + "_" + smart_value).addClass('buttonOp').addClass('clicked');
						if (smart_value == 'y') {
							new_smart_value = 'n';
						} else {
							new_smart_value = 'y';
						}
						if (check_op(smart_type, new_smart_value) == 'buttonOp') {
							$("input#" + smart_type + "_" + new_smart_value).removeClass('buttonOp').removeClass('clicked');
						}
					}				
				}
			});
		} return false;
	})
});