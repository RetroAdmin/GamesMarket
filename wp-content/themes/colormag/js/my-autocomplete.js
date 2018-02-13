(function( $ ) {
	$(function() {
		var url = MyAutocomplete.url + "?action=my_search";
		$( "#s" ).autocomplete({
			source: url,
			delay: 500,
			minLength: 3
		});	
	});

})( jQuery );