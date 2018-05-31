'use strict';
jQuery(function($){
	$('#wpmsq-revert-link').click(function(ev){
		ev.preventDefault();
		var ajax_url = wpmsqNotification.ajaxurl;
		var data = {
			action: 'masq_user',
			wponce: wpmsqNotification.masqNonce,
			reset: true
		};
		$.post(ajax_url, data, function(response){
			if(response == '1'){
				location.reload();
			}
		});
	});
});