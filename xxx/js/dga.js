$(document).ready(function(){
	$(".dga_button").click(function() {
		
		var type = $(this).attr('id').replace('_button','');
		var dga = $('#' + type).val();
		var dga_type = $('#' + type + '_type').val();
		var dga_file = $('#' + type + '_img_file').val();
		var dga_url = $('#' + type + '_img_url').val();
		
		if(dga_type != '') {
			
			if ($.trim(dga) != '') {
				
				if (typeof dga_file == 'undefined' && typeof dga_url == 'undefined') {
				
					var dataString = 'dga=' + dga + '&dga_type=' + dga_type + '&dga_file=' + '' + '&dga_url=' + '';
				
				} else if (dga_file != '' && typeof dga_url == 'undefined') {
					
					var dataString = 'dga=' + dga + '&dga_type=' + dga_type + '&dga_file=' + dga_file + '&dga_url=' + '';
					
				} else if (typeof dga_file == 'undefined' && dga_url != '') {
					
					var dataString = 'dga=' + dga + '&dga_type=' + dga_type + '&dga_file=' + '' + '&dga_url=' + dga_url;
				}
				
				if (type == 'goal' || type == 'acc') {
					// Fade Out X and Share Forms
					$("#x").fadeOut("fast");
					$(".shareForm").fadeOut("fast");	
				} 
				
			} else {
				
				var dataString = '';				
				alert('Write Something...');
			}
			
			if (dataString != '') {
				
				if (dga_type == 'a') {
					
					$('#date_button').trigger('click');
										
					$('#dateClose').click(function() {
						dataString = '';
					});
					
					function shareAcc(x, date) {
						// True
						$('input:button').attr("disabled", true);
						$('input:file').attr("disabled", true);
						$('.date_button').addClass("disabled");
						$('#dateClose').hide();
						
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
							dga_ajax(dataString + extra, type, dga_type);
						}
					}
				
					$('#submitToday').click(function() {						
						shareAcc("t", 'none');						
					});
									
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
						} else {
							//alert('ok');	
						}
						// End of Click Date						
					});
				
				} else if (dga_type == 'g'){
					$('#smartInfo_button').trigger('click');
					
					$('#smartClose').click(function() {						
						dataString = '';						
					});
					
					$('#shareSmartGoal').click(function() {
						
						// True
						$('input:button').attr("disabled", true);
						$('input:file').attr("disabled", true);
						$('#smartClose').addClass("disabled");
						$('#shareSmartGoal').addClass("disabled");
						
						$('#dateCheck').html('<input type="hidden" id="isDate" value="" />');
						var isDate = $('#isDate').val();
						var extra = '&isDate=' + '';
						
						if (dataString != '') {
							dga_ajax(dataString + extra, type, dga_type);
						}
					});
					
				} else if (dga_type == 'd') {
					
					// True
					$('input:button').attr("disabled", true);
					$('input:file').attr("disabled", true);
					$('.dga_button').addClass("disabled");
					$('.shareClose').hide();
				
					$('#dateCheck').html('<input type="hidden" id="isDate" value="" />');
					var isDate = $('#isDate').val();
					var extra = '&isDate=' + '';
					dga_ajax(dataString + extra, type, dga_type);					
				}
			
			}
				
		} 		
	});
	
	function form_input_is_int(input){
    	return !isNaN(input)&&parseInt(input)==input;
  	}
	
	function dga_ajax(dga_data, type, dga_type){
		return $.ajax({
				type: "POST",
				url: "/ajax/dga_ajax.php",
				data: dga_data,
				cache: false,
				success: function(html){
					
					$("#x").prepend(html);						
					var x = $('.dgax').val();
						
					if (typeof x == 'undefined') {
						alert('Sorry, something is wrong. :(');
						window.location.href = '/';		
					} else {
						window.location.href = '/' + dga_type + '?x=' + x;
					}
						
					$('#' + type).val('');					
				} 
		});
		
	}
	
});

// DGA Uploading
$(document).ready(function() {
	$('.dga_img_button').live('change', function() {
		
		$('.shareInfoUpload').hide();
		$('.arrow').hide();
		var type = $(this).attr('id').replace('_img', '');
		
		$('#' + type + '_img_preview div ul li').html('').show().html('<img class="dga_img_bc" src="/xxx/img/81.gif" alt="Uploading..."/>');
		$('#' + type + '_img_form').ajaxForm({
			target: '#' + type + '_img_preview div ul li'
		}).submit();
	});	
});

$(document).ready(function() {
	$('.buttonUpl').live('click', function() {
		
		$('.shareInfoUpload').hide();
		$('.arrow').hide();
		var type = $(this).attr('id').replace('_url_button', '');
		
		if ($('#' + type + '_input').val() != '') {
		
			$('#' + type + '_url_img_preview ul li').show().html('<img class="dga_img_bc" src="/xxx/img/81.gif" alt="Uploading..."/>');
			$('#' + type + '_url_preview').ajaxForm({
				target: '#' + type + '_url_img_preview ul li'
			}).submit();
		}
	});
});

// URL/Camera Buttons
$(function() {
	
	$('.dga_input').keypress(function(e) {
		if(e.keyCode == 13) {
			return false;
		}
	});
	
	var button1 = false;
	var button2 = false;
	var button3 = false;
	
	function pressedURL(type) {
		return $('.urlOrUp h6#' + type + '_url_button').parent().addClass('pressed');	
	}
	
	function unpressedURL(type) {
		return $('.urlOrUp h6#' + type + '_url_button').parent().removeClass('pressed');
	}
	
	function pressedCam(type) {
		return 	$('.urlOrUp span#' + type + '_camera_button').parent().addClass('pressed');
	}
	
	function unpressedCam(type) {
		return $('.urlOrUp span#' + type + '_camera_button').parent().removeClass('pressed');	
	}
	
	$('.url_button').click(function() {
		
		var type = $(this).attr('id').replace('_url_button', '');
		
		// Change Shade
		if (type == 'dream' && button1 == false) {	
			pressedURL(type);
			button1 = true;
			unpressedCam(type);
			buttona1 = false;		 
		} else if (type == 'dream' && button1 == true) {
			unpressedURL(type);
			button1 = false;	
		}
		if (type == 'goal' && button2 == false) {
			pressedURL(type);
			button2 = true;
			unpressedCam(type);
			buttona2 = false;		 
		} else if (type == 'goal' && button2 == true) {	
			unpressedURL(type);
			button2 = false;	
		}
		if (type == 'acc' && button3 == false) {
			pressedURL(type);
			button3 = true;
			unpressedCam(type);
			buttona3 = false;	 
		} else if (type == 'acc' && button3 == true) {
			unpressedURL(type);
			button3 = false;		
		}
		// End here -- Change Shade
		$('.dlt_dga_img').trigger('click');
		$('#' + type + '_img_preview div ul li').html('').hide()
		$('#' + type + '_img').val('');
		$('#' + type + '_img_form').hide();
		$('#' + type + '_url_preview').fadeToggle();	
	})
	
	var buttona1 = false;
	var buttona2 = false;
	var buttona3 = false;
	
	$('.camera_button').click(function() {
		
		var type = $(this).attr('id').replace('_camera_button', '');
		
		// Change Shade
		if (type == 'dream' && buttona1 == false) {
			pressedCam(type);
			buttona1 = true;
			unpressedURL(type);
			button1 = false;		 
		} else if (type == 'dream' && buttona1 == true) {	
			unpressedCam(type);
			buttona1 = false;		
		}
		if (type == 'goal' && buttona2 == false) {
			pressedCam(type);
			buttona2 = true;
			unpressedURL(type);
			button2 = false;	 
		} else if (type == 'goal' && buttona2 == true) {
			unpressedCam(type);
			buttona2 = false;	
		}
		if (type == 'acc' && buttona3 == false) {
			pressedCam(type);
			buttona3 = true;
			unpressedURL(type);
			button3 = false;	 
		} else if (type == 'acc' && buttona3 == true) {	
			unpressedCam(type);
			buttona3 = false;	
		}
		// End here -- Change Shade
		$('#' + type + '_url_img_preview li').html('').hide('');		
		$('#' + type + '_input').val('');
		$('#' + type + '_url_preview').hide();
		$('#' + type + '_img_form').fadeToggle();	
	})	
});