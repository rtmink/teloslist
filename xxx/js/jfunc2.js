// Drop-down Menu
$(function() {
	$('.menu li a#nameMenuA').click(function(e) {
	
		e.preventDefault();
		$('.menu li#nameMenu ul').toggle();
		e.stopPropagation();
		$('.menu li#aboutMenu ul').hide();
		
	});
	$('.menu li a#aboutMenuA').click(function(e) {
	
		e.preventDefault();
		$('.menu li#aboutMenu ul').toggle();
		e.stopPropagation();
		$('.menu li#nameMenu ul').hide();
		
	});
	$('html').click(function() {
		
		$('.menu li#nameMenu ul').hide();
		$('.menu li#aboutMenu ul').hide();
		
	});
});

// No enter in Search Engine
$(function() {
	$('#search').keypress(function(e) {
		if($.trim($('#search').val()) == '' && e.keyCode == 13) {
			return false;
		}
	});
	$('#searchButton').click(function() {
		if($.trim($('#search').val()) == '') {
			return false;
		}	
	});
	// Select Year
	$('#selectYr').keypress(function(e) {
		if(e.keyCode == 13) {
			return false;
		}
	});
});

// Share Form
function showForm(button, form, closeMe, overlay) {
	$(function() {
	
		var popup = false;
		
		$(button).click(function(){
			if(popup == false){
				if (overlay != 'none') {
					$(overlay).fadeIn("fast");
				}
				$(form).fadeIn("fast");
				if (button == '#xd' || button == '#xg' || button == '#xa') {
					$('#x').fadeOut("fast");
				}
				$(closeMe).fadeIn("fast");
				center(form);
				popup = true;
				return false;
			}
		});
		
		$(closeMe).click(function(){
			hidePopup(form, closeMe, overlay);
		});
		
		function center(form){
			var windowWidth = document.documentElement.clientWidth;
			var windowHeight = document.documentElement.clientHeight;
			var popupHeight = $(form).height();
			var popupWidth = $(form).width();
			$(form).css({
				"margin-top": -(popupHeight/2),
				"margin-left": -(popupWidth/2)
			});
		}
		
		function hidePopup(form, closeMe, overlay){
			if(popup==true){
				if (overlay != 'none') {
					$(overlay).fadeOut("fast");
				}
				if (closeMe == '.shareClose') {
					$('#xClose').trigger('click');
				}
				$(form).fadeOut("fast");
				$(closeMe).fadeOut("fast");
				if (closeMe == '#smartClose') {
					$('#shareFormG').fadeIn("fast");
				}
				if (closeMe == '#dateClose' && overlay == 'none') {
					$('#shareFormA').fadeIn("fast");
				}
				popup = false;
			}
		}
	
	} ,jQuery);
}

// Choose DGA, Share Form, Smart Form
showForm('#shareNavBtn', '#x', '#xClose', '.overlayEffect');
showForm('#xd', '#shareFormD', '.shareClose', 'none');
showForm('#xg', '#shareFormG', '.shareClose', 'none');
showForm('#xa', '#shareFormA', '.shareClose', 'none');
showForm('#smartInfo_button', '#smartInfo', '#smartClose', 'none');
showForm('#date_button', '#chooseADate', '#dateClose', 'none');
showForm('#date_button2', '#chooseADate', '#dateClose', '.overlayEffect');
showForm('#signinButton', '#hpFormIn', '.shareClose', '.overlayEffect');
showForm('#signupButton', '#hpFormUp', '.shareClose', '.overlayEffect');

// Relationships
$(function() {
	
	$("#rel_button").hover(
		function() {
			if ($("#rel_button").val() == 'Supporting') {
				$("#rel_button").val('Unsupport');
			}
		},
		function() {
			if ($("#rel_button").val() == 'Unsupport') {
				$("#rel_button").val('Supporting');
			}	
		}		 	
	);
	
	$("#rel_button").click(function() {
		
		var user_id_rel = $("#user_id_rel").val();
		
		var dataString = 'user_id_rel=' + user_id_rel;
		
		if(user_id_rel == '') {
						
		} else {	$.ajax({
					type: "POST",
					url: "/ajax/rel_ajax.php",
					data: dataString,
					cache: false,
					success: function(){	
						
						if ($("#rel_button").val() == 'Support') {
							$("#rel_button").val('Supporting');
						} else {
							$("#rel_button").val('Support');
						}
					
					}
					});	
		} return false;
	});
	
	$(".rel_button").click(function() {
		
		var is = $(this);
		
		var thisis = is.text();
		
		var relId = $(this).attr('id');
		
		var relType = relId.replace('rel_','');
		
		var uIdRel = $(this).attr('class').split(" ")[1].replace('rb_','');
		
		var myIdRel = $("#myIdRel").val();
		
		var pgIdRel = $("#pgIdRel").val();
		
		var rel_type = $("#relType").val();
		
		var dataString = 'uIdRel=' + uIdRel + '&relType=' + relType;
		
		if(uIdRel != '' && relType != '') {
				
			$.ajax({
				type: "POST",
				url: "/ajax/rel_ajax.php",
				data: dataString,
				cache: false,
				success: function(){	
					
					$('li.userMenu ul').hide();
					
					if (thisis == 'Support') {
						
						is.text('Unsupport');
						
					} else if (thisis == 'Unsupport') {
						
						if (myIdRel == pgIdRel && rel_type == 'Supporting') {
							
							$('#rel_' + uIdRel).remove();
							
						} else {
							is.text('Support');	
						}
						
					} else if (thisis == 'Block') {
						
						is.text('Unblock');
						
						$('.rb_' + uIdRel).not('#rel_block').hide();
						
					} else if (thisis == 'Unblock') {
						
						is.text('Block');
						
						$('.rb_' + uIdRel).show();					
						$('#rel_sup_' + uIdRel).text('Support');
						
						$('#hrb_' + uIdRel).show();
						
					} 
						
				}
			});	
		} return false;
		
	});
	
});

// Relationship Drop Down Menu
$(function() {
	var num = 0;
	
	$('li.userMenu').click(function(e) {
		var userMenuId = $(this).attr('id');
		
		if (num != userMenuId) {
			$('li.userMenu ul').hide();	
		}
		
		num = userMenuId;
		
		$('li#' + userMenuId + ' ul').toggle();
		e.stopPropagation();
	});
	
	$('li.userMenu a').click(function(e) {
		e.preventDefault();		
	});
	
	$('html').click(function() {	
		$('li.userMenu ul').hide();
		num = 0;	
	});
});