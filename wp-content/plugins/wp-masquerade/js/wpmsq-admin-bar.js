'use strict';
jQuery(function($){
	var $wpmasqSelectParent = $('#wp-admin-bar-wpmsq-ab-link');
	var $wpmasqSelect = $wpmasqSelectParent.find('select');
	$wpmasqSelectParent.one('mouseover', function(){
		$.getJSON(wpmsqAdminBar.ajaxurl + '?action=wpmasq_get_users&n=' + wpmsqAdminBar.getUsersNonce)
			.done(function(response){
				$wpmasqSelect.empty();
				$.each(response, function(key, value){
					$('<option />')
						.val(value['ID'])
						.text(value['user_nicename'])
						.appendTo($wpmasqSelect);
				});
				$wpmasqSelectParent.find('.three-bounce').hide();
				$wpmasqSelect.chosen();
			})
			.fail(function(){
				$wpmasqSelect.find('option').text('Failed to get users :(')
			});
	});
	$wpmasqSelect.change(function(){
		var data = {
			action: 'masq_user',
			wponce: wpmsqAdminBar.masqNonce,
			uid: $wpmasqSelect.val()
		};
		$.post(wpmsqAdminBar.ajaxurl, data, function(response){
			if(response == '1'){
				location.reload();
			}
		});
	});
});