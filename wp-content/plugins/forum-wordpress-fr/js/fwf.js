// Author: André RENAUT inspired by ZeroClipboard/Joseph Huckaby

var fwf = {

	clip : null,

	init : function() {

		var txt = fwf.html2txt();

		switch (true) {
			case ( typeof(fwf_L10n.embed) != "undefined" ) :

				fwf.clip = new fwf.flash();

				fwf.clip.setHandCursor(true);
				fwf.clip.addEventListener('mouseDown', function (client) {
					fwf.clip.setText(txt);
				});
				fwf.clip.addEventListener('error', function (client) {
					alert(fwf_L10n.ko + txt);
				});
				fwf.clip.addEventListener('complete', function (client, text) {
					alert(fwf_L10n.ok);
				});

				fwf.embed();
				window.onresize = fwf.embed;
			break;
			case ( typeof(window.clipboardData) == "object" ) :
				jQuery('input#fwf_copy').click( function() {
					if (!window.clipboardData.setData('Text', txt)) fwf_L10n.ok = fwf_L10n.ko + txt;
					alert(fwf_L10n.ok);
				} );
			break;
			default :
				jQuery('input#fwf_copy').click( function() {
					alert(fwf_L10n.ko + txt);
				} );
			break;
		}
	},

	flash: function() {

		this.movie = null;				// reference to movie object
		this.ready = false;				// whether movie is ready to receive events or not

		this.handlers = {};

		this.handCursorEnabled = true; 			// whether to show hand cursor, or default pointer cursor
		this.clipText = ''; 				// text to copy to clipboard

		this.movieId = 'fwf_zc_movie';

		this.setText = function(newText) {		// set text to be copied to clipboard
			this.clipText = newText;
			if (this.ready) this.movie.setText(newText);
		}

		this.setHandCursor = function(enabled) {	// hand cursor (true), default cursor (false)
			this.handCursorEnabled = enabled;
			if (this.ready) this.movie.setHandCursor(enabled);
		}

		this.addEventListener = function(eventName, func) {// add user event listener for event types (load, queueStart, fileStart, fileComplete, queueComplete, progress, error, cancel)
			eventName = this.cleanEventName(eventName);

			if (!this.handlers[eventName]) this.handlers[eventName] = [];
			this.handlers[eventName].push(func);
		}
	
		this.receiveEvent = function(eventName, args) {	// receive event from Flash
			eventName = this.cleanEventName(eventName);

			if (eventName == 'load') {		// special behavior for this event

								// movie claims it is ready, but in IE this isn't always the case...
								// bug fix: Cannot extend EMBED DOM elements in Firefox, must use traditional function
				this.movie = document.getElementById(this.movieId);
				if (!this.movie) {
					var self = this;
					setTimeout( function() { self.receiveEvent('load', null); }, 1 );
					return;
				}
				
								// firefox on pc needs a "kick" in order to set these in certain cases
				if (!this.ready && this.isFirefoxWindows()) {
					var self = this;
					setTimeout( function() { self.receiveEvent('load', null); }, 100 );
					this.ready = true;
					return;
				}
				
				this.ready = true;
				this.movie.setText( this.clipText );
				this.movie.setHandCursor( this.handCursorEnabled );
			}
		
			if ( typeof(this.handlers[eventName]) == "undefined" ) return;

			for (var i in this.handlers[eventName]) 
			{
				var func = this.handlers[eventName][i];
				if (typeof(func) == 'function') func(this, args);
			}
		}

		this.cleanEventName = function(eventName) {
			return eventName.toString().toLowerCase().replace(/^on/, '');
		}

		this.isFirefoxWindows = function() {
			return (navigator.userAgent.match(/Firefox/) && navigator.userAgent.match(/Windows/));
		}
	},

	html2txt : function() {
		var args = {
			s : new Array('<strong>', '</strong>', '<ul>', '</ul>', '<li>', '</li>'),
			r : new Array('[b]', '[/b]', '', '', '', ''),
			str : jQuery('div#fwf_content').html(),
			modifiers : 'gi'
		};

		return fwf.str_replace(args);
	},

	embed : function() {
		var args = {
			s : new Array('WW', 'HH'),
			r : new Array(jQuery('#fwf_copy').outerWidth(true), jQuery('#fwf_copy').outerHeight(true)),
			str : fwf_L10n.embed,
			modifiers : 'g'
		};

		jQuery('#fwf_zc').html( fwf.str_replace(args) );
	},

	str_replace : function(args) {
		for (var i in args.s) args.str = args.str.replace(new RegExp(args.s[i], args.modifiers), args.r[i]);
		return args.str;
	}
}

var ZeroClipboard = {
	dispatch : function(id, eventName, args) {	// receive event from flash movie, send to client		
		if (fwf.clip) fwf.clip.receiveEvent(eventName, args);
	}
}

jQuery(document).ready( function() { if (typeof( jQuery('div#fwf_content').html() ) != 'undefined') fwf.init(); } );