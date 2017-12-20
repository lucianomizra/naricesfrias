var Page = (function( base ) {

	if(!base) var base = '';

	this.set = function(path, set) {
		var params = parse(path);

		$('a:not(.pageRender)').each(function(i,a){
			var href = $(a).attr('href');
			if(!href) return;
			var target = $(a).attr('target');
			var instance = $(a).attr('data-instance');
			if(target == '_blank') return;
			if(href.startsWith('#')) return;

			if(base)
			var	part_of_href = String(href).slice( base.length );
			else
			var	part_of_href = '';
			var this_params = parse(part_of_href);

			var section = params[0];
			var this_section = (this_params[0]==undefined) ? '/' : this_params[0];

			if( this_section.startsWith( section ) ) {

				$(a).addClass('pageRender').click(function(event) {
					event.preventDefault();

					var href = $(this).attr('href');
					var part_of_href = String(href).slice( base.length );

					if( $('#main').hasClass('old-main') )
						return false;
					

					var data = {
						base: base,
						href: part_of_href,
						full_href: href,
						section: section,
						instance: instance,
						params: parse_url(part_of_href)
					}

					$(window).off('popstate');
					$(window).on('popstate', function() {


						var href = window.location.href;

						var	part_of_href = String(href).slice( base.length );
						var this_params = parse(part_of_href);

						var section = params[0];
						var this_section = (this_params[0]==undefined) ? '/' : this_params[0];

						var data = {
							base: base,
							href: part_of_href,
							full_href: href,
							section: section,
							instance: instance,
							params: parse_url(part_of_href)
						}

						set(data);



					});

					ChangeURI(href);
					set(data);
					// set(data, function() {

					// 	var last_param = this_params[this_params.length - 1];
					// 	var anchor = last_param.split('#');

					// 	if(anchor.length==2) { 
					// 		var target = $('#'+anchor[1]);

					// 		if( target.length ) {
								
					// 			$('html, body').animate({
					// 	            scrollTop: target.offset().top
					// 	        }, 500);
					// 		}

					// 	}
					// });


					
					return params;
				});


			}
		})

		
	}

	function parse_url (str) {
		return String(str).split('/');
	}

	var PATH_REGEXP = new RegExp([
	  // Match escaped characters that would otherwise appear in future matches.
	  // This allows the user to escape special characters that won't transform.
	  '(\\\\.)',
	  // Match Express-style parameters and un-named parameters with a prefix
	  // and optional suffixes. Matches appear as:
	  //
	  // "/:test(\\d+)?" => ["/", "test", "\d+", undefined, "?", undefined]
	  // "/route(\\d+)"  => [undefined, undefined, undefined, "\d+", undefined, undefined]
	  // "/*"            => ["/", undefined, undefined, undefined, undefined, "*"]
	  '([\\/.])?(?:(?:\\:(\\w+)(?:\\(((?:\\\\.|[^()])+)\\))?|\\(((?:\\\\.|[^()])+)\\))([+*?])?|(\\*))'
	].join('|'), 'g');
	function parse (str) {
	  var tokens = []
	  var key = 0
	  var index = 0
	  var path = ''
	  var res

	  while ((res = PATH_REGEXP.exec(str)) != null) {
	    var m = res[0]
	    var escaped = res[1]
	    var offset = res.index
	    path += str.slice(index, offset)
	    index = offset + m.length

	    // Ignore already escaped sequences.
	    if (escaped) {
	      path += escaped[1]
	      continue
	    }

	    // Push the current path onto the tokens.
	    if (path) {
	      tokens.push(path)
	      path = ''
	    }

	    var prefix = res[2]
	    var name = res[3]
	    var capture = res[4]
	    var group = res[5]
	    var suffix = res[6]
	    var asterisk = res[7]

	    var repeat = suffix === '+' || suffix === '*'
	    var optional = suffix === '?' || suffix === '*'
	    var delimiter = prefix || '/'
	    var pattern = capture || group || (asterisk ? '.*' : '[^' + delimiter + ']+?')

	    tokens.push({
	      name: name || key++,
	      prefix: prefix || '',
	      delimiter: delimiter,
	      optional: optional,
	      repeat: repeat,
	      pattern: escapeGroup(pattern)
	    })
	  }

	  // Match any characters still remaining.
	  if (str && index < str.length) {
	    path += str.substr(index)
	  }

	  // If the path exists, push it onto the end.
	  if (path) {
	    tokens.push(path)
	  }

	  return tokens
	}

	function escapeGroup (group) {
	  return group.replace(/([=!:$\/()])/g, '\\$1')
	}
	function escapeString (str) {
	  return str.replace(/([.+*?=^!:${}()[\]|\/])/g, '\\$1')
	}


	return this;
});

var ChangeURI = function(targetUrl) {
  if( window.history == undefined || window.history.pushState == undefined ) return;
  if(window.location.href == targetUrl) return;
  window.history.pushState({url: "" + targetUrl + ""}, "", targetUrl);

  return;
};

function redirect(targetUrl, callback) {
	ChangeURI(targetUrl);
	setUrl(targetUrl, callback);
}