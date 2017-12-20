var Pager = function(){
	var routes = jQuery.parseJSON( $('#routes').html() );

	var ELEMENTS_IN = $('[data-animate-in]');
	$.each(ELEMENTS_IN, function(i,el) {
		var data = fnanimate ('data-animate-in', el);
	});

	var page = new Page(App.config.url);

	for (var i = 0; i < routes.length; i++) {
		page.set(routes[i],set);
	};

	function set(data) {
		setUrl(data.full_href, false, data);
	}

	return this;
}

function setUrl(path, callback, data) {

	$('[data-toggle="tooltip"]').tooltip('hide');

	var MAIN = $('#main').addClass('old-main');
	var TITLE = $('#head-title');

	var nano = MAIN.loading();
		TITLE.html('Cargado...');

	var ELEMENTS_OUT = $('[data-animate-out]');
	var ELEMENTS_IN = $('[data-animate-in]');

	var time_page_out = 0;
	
	$.each(ELEMENTS_OUT, function(i,el) {
		var data = fnanimate ('data-animate-out', el);

		if(data['time_total'] > time_page_out) time_page_out = data['time_total'];

	});


	$.ajax({
		url: path,
		success: function( html ) {
		  	setTimeout(function() {
				nano.end();
		  		var NEW_HTML = $('<div></div>').html( html );

		  		TITLE.html( NEW_HTML.find('title#head-title').html() );
		  		var NEW_MAIN = NEW_HTML.find('#main');

		    	MAIN.after(NEW_MAIN);
		    	MAIN.remove();

		    	Main(NEW_MAIN);

		    	if (callback) {
		    		callback();
		    	}
		  		
		  		$('html, body').animate({scrollTop : MAIN.position().top},0);
		  		
		  	}, time_page_out + 300);
		},
	  	beforeSend: function(xhr){xhr.setRequestHeader('X-Pager-Header', '1');}
	});

	return false;
	
}