var rmenu = function(bk, MAIN) {

	var MENU = $('<div class="rmenu"></div>').height( $(window).height() );
	var UL = $('<ul class="rmenu__ul"></ul>');

	
	var BTN = $('.rmenu-btn', MAIN);
	var CLOSE = $('<i class="fa fa-times fa-2x rmenu-close"></i>');

	var items = [];

		items[0] = $('<li><span></span></li>').append(CLOSE);


	$('[data-rmenu-add]').each(function(i,e) {
		var z = $(e).attr('data-rmenu-add');
		if( $.isNumeric( z ) ) {

			z = parseInt(z);

			if( ! items[ z ] ) {
				items[ z ] = $('<li></li>').append( $(e).clone() );
			} else {
				items[ z ].append( $(e).clone() )
			}
		}
	});

	$(items).each(function(i,e) {
		UL.append( e );
	});

	$('body').prepend( MENU.append(UL) );

	BTN.click(function() {
		toggle();
	});

	CLOSE.click(function() {
		toggle();
	});

	function toggle() {

		if( $('body').hasClass('open-rmenu') ) {

			// Close

			$('body').removeClass('open-rmenu');

			if (window.history && window.history.pushState) {

				window.history = tempHistory;
			}
			
		} else {

			// Open

			$('body').addClass('open-rmenu');

			if (window.history && window.history.pushState) {

				history.replaceState(null, document.title, location);
				history.pushState(null, document.title, location);

				$(window).bind("popstate", function() {
					if ( $('body').hasClass('open-rmenu') ) {
						$('body').removeClass('open-rmenu')
						e.stopPropagation();
					}
				});

			}
		}
	}

}

if (window.history && window.history.pushState) 
	tempHistory = window.history;