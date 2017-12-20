var pageFN = [];
var resizeTimer;
var vtoastr = {
    options : {
    "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
};
var App = {
	config:{
		url: '',
		layout: '',
		section: ''
	},
	Init: function(config){

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        Cookie.create('geo_lat', position.coords.latitude);
        Cookie.create('geo_lng', position.coords.latitude);
      });
    } 

		App.config = $.extend(App.config, config || {});
		if(window.name != "") App.config.canvas = true;
		$(document).ready(function(){

			 Main($('body'));
      });
    },

}

var Main = function(MAIN) {

    App.config.url = $('#data').attr('data-url');
    App.config.layout = $('#data').attr('data-layout');
    App.config.section = $('#data').attr('data-section');

    Pager();

    rmenu('md', MAIN);

    $('.selectpicker').selectpicker();

    $('.btn-facebook',MAIN).facebook_login();
    $('.ajaxForm',MAIN).ajaxForm();

    initMapX(MAIN);

    if ($('#map').lenght)
        Map.init();

    var min_height = window.innerHeight - $('footer').eq(0).height() - $('header').eq(0).height() ;
      $('.full-height', MAIN).css({'min-height': min_height});

    if (typeof pageFN[App.config.section] == "function") {
     pageFN[App.config.section](MAIN);
    }

    
    $('.select_types', MAIN).on('changed.bs.select', function (e) {
      changeTypes(this);
    });
    changeTypes($('.select_types', MAIN));

    $('[name="id_status"]',MAIN).change(function() {
      var id_status = $(this).val();

      $('[data-status]').addClass('none');
      $('[data-status="0"]').removeClass('none');
      $('[data-status="'+id_status+'"]').removeClass('none');
    });

    if($('.masonry',MAIN).length)
      $('.masonry',MAIN).Masonry();

}

function changeTypes (_this) {
  var current = $('option:selected',$(_this)).val();
  $('.select_races li').hide();
  $('.select_races_cont').addClass('none');
  $('.select_races option[data-id-type="'+current+'"]').each(function(i, el){
    $('.select_races_cont').removeClass('none');
      var index = $(el).index();
      $('.select_races li[data-original-index="'+index+'"]').show();
  });
}
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
var resize = [];
var bk_xs = 544;
var bk_sm = 768;
var bk_md = 1400;
var bk_lg = 1700;

var media = function(bk,fn) {
  if( breakpoint(bk) ) {
    fn();
  }
  resize.push(function() {
    if( breakpoint(bk) ) {
      fn();
    }
  });
}

var breakpoint = function(bk) {
  var ww = $( window ).width();

  var r = [];
  if( ww < bk_xs ) { r.push('xs'); r.push('<sm'); r.push('<md'); r.push('<lg'); r.push('<xl'); }
  if( ww >= bk_xs && ww < bk_sm ) { r.push('sm'); r.push('>xs'); r.push('<md'); r.push('<lg'); r.push('<xl');  }
  if( ww >= bk_sm && ww < bk_md ) { r.push('md'); r.push('>sm'); r.push('>xs'); r.push('<lg'); r.push('<xl'); }
  if( ww >= bk_md && ww < bk_lg ) { r.push('lg'); r.push('>md'); r.push('>sm'); r.push('>xs'); r.push('<xl'); }
  if( ww > bk_lg ) { r.push('xl'); r.push('>lg'); r.push('>md'); r.push('>sm'); r.push('>xs'); }

  return Boolean( $.inArray( bk, r ) >= 0 );
}

var resizetime;
var resizetimeout = false;
var resizedelta = 500;
function Winresize() {
  $(window).resize(function() {
      resizetime = new Date();
      if (resizetimeout === false) {
          resizetimeout = true;
          setTimeout(resizeend, resizedelta);
      }
  });
}
function resizeend() {
    if (new Date() - resizetime < resizedelta) {
      setTimeout(resizeend, resizedelta);
    } else {
      resizetimeout = false;
      resize.forEach(function(fn) {
        fn();
      });

      if(breakpoint('xs')) { console.dir('xs'); }
      if(breakpoint('sm')) { console.dir('sm'); }
      if(breakpoint('md')) { console.dir('md'); }
      if(breakpoint('lg')) { console.dir('lg'); }
      if(breakpoint('xl')) { console.dir('xl'); }

    }               
}

function ResponsiveModify(MAIN) {


  $('[data-rmodify]', MAIN).each(function(i,el) {

      var json = $(el).attr('data-rmodify');
          json = json.replace(/\'/g, '"');
 
         action = JSON.parse(json);

          for (var i = 0; i < action.length; i++) {
            
            if( !Array.isArray(action[i]) ) return; 

            var bk = action[i][0];
            var method = action[i][1];
            var selector = action[i][2];
            var no_repeat = (typeof action[i] != "undefined") ? action[i][3] : false;

            if( no_repeat ) {
              delete action[i]

              $(el).attr('data-rmodify', JSON.stringify(action) );
            }

            media(bk, function() {
              switch(method) {
                case 'after' : 
                  $(selector).eq(0).after( $(el) );
                break;
                case 'before' : 
                  $(selector).eq(0).before( $(el) );
                break;
                case 'prepend' : 
                  $(selector).eq(0).prepend( $(el) );
                break;
                case 'append' : 
                  $(selector).eq(0).append( $(el) );
                break;
                case 'removeClass' : 
                  $(el).removeClass(selector);
                break;
                case 'addClass' : 
                  $(el).addClass(selector);
                break;
              }
            });
          }

    
  });

}

// // DESC: Ajusta el alto como una imagen height:100%
// // USO: $(selector).div_responsive(); al selector ponerle data-original-size="x,x"
// $.fn.div_responsive = function() {

//   function load (_this) {
//     if( $(_this).attr('lh') == $(_this).height() ) return;
  
//     var original_size = $(_this).attr('data-original-size').split(',');
//     var original_w = original_size[0];
//     var original_h = original_size[1];

//     var w = $(_this).width();
//     var h = ( w * original_h ) / original_w;

//     h = Math.round(h);

//     $(_this).height(h);
    
//     $(_this).attr('lh', $(_this).height() );
//     return;
//   }


//   $(this).each(function(i,el) {
    
//     load(el);

//     var int = setInterval(function() {
//       load(el);
//     }, 1000);

//     resize.push(function() {
//       load(el);
//     });

//     $(el).bind('destroyed', function() {
//       clearInterval(int);
//     })
//   });

// }

(function($){
  $.event.special.destroyed = {
    remove: function(o) {
      if (o.handler) {
        o.handler()
      }
    }
  }
})(jQuery);

var Requiere  = function(script, done){
  $.getScript( App.config.layout+'js/'+script )
    .done(function( script, textStatus ) {
      done();
    })
    .fail(function( jqxhr, settings, exception ) {
      console.error( "Ajax error Requiere  Script: " + script );
  });
}


// Depende de pre/components/_loading.scss
$.fn.loading = function(btn) {

  $('#nanobar').remove();

  b = new Nanobar({id:'nanobar'});
  NanoVal = 0;
  b.go(NanoVal);

  $(btn).addClass('disabled')
  $(this).addClass('loading');

    NanoInterval = setInterval(function(){
        if( NanoVal - 80 ) {
      NanoVal = NanoVal + Math.floor(Math.random() * (10 - 2));
      b.go(NanoVal);
        }
    }, 300);

    this.end = function() {
    b.go(100);
        this.removeClass('loading');
        $(btn).removeClass('disabled');
        clearInterval(NanoInterval);
    }


    return this;
}


$.fn.errorsForm = function(errors) {
  var _this = this;
  var focus_this = true;
  for(var error in errors) {   
    var message = errors[error];

        // message = '*';
    var boxMessage = $('<div class="form-control-feedback errorsForm">*</div>');
    var input = $('[name="'+error+'"]', _this);
    var box = $('[data-show-error="'+error+'"]', _this);
    var parent = input.parents('.form-control:first');

    var showError = $('.showError[data-field="'+error+'"]', _this);

    if(input.length) {

      if(focus_this) {
        input.focus();
        focus_this=false;
      }

      input.addClass('form-control-error');
      parent.addClass('has-error');

      if (showError.length) {
        showError.html(message);
      }

      if($('.errorsForm',parent).length)
        $('.errorsForm',parent).remove();
        parent.append(boxMessage);
      input.one('focus change',function() {
        $('.errorsForm',$(this).parent()).remove();
        $(this).removeClass('error');
        $(this).parents('form:first').removeClass('has-error');

        if (showError.length) {
          showError.html('');
        }
      });

      if(input.hasClass('errorToast')) {
        toastr["error"](message, "Error!");
      }
    } 
    // if (box.length) {
    //   box.addClass('box-has-error');
    //   setTimeout(function() {
    //     box.one('mouseover',function() {
    //       $(this).removeClass('box-has-error');
    //     });
    //   }, 300);
    // }
  };
}
function col_per_row(w, cw) {
  var n = cw/w;
  return Math.round(n);
}

$.fn.scrollIn = function() {
  $('body').css({'overflow-y':'hidden'});
  $(this).css({'overflow-y':'auto'});
} 

$.fn.scrollOut = function() {
  $('body').css({'overflow-y':'initial'});
  $(this).css({'overflow-y':'initial'});
}

var ajaxFormCallback = [];
$.fn.ajaxForm = function() {
  return this.each(function(z,form) {

    var form = $(form);

    $('button',form).click(function() {
      $(this).addClass('this_is_the_btn');
    });

    $(form).submit(function(e) {
      var btn = $('.this_is_the_btn', form).removeClass('this_is_the_btn');

      var loading = form.loading(btn);

      e.preventDefault();
      $.ajax({
        type:'POST',
        url:form.attr('action'),
        data:form.serialize(),
        cache: false,
        processData: false,
        success:function(data){ 

          loading.end();
          if(data.error==0){
            var cb = data.callback;
            if( cb )
              ajaxFormCallback[cb](data);

          } else {
            form.errorsForm(data.inputErrors);
            loading.end();
          };
        },
        error:function(){
          loading.end();
          console.dir('Error JSON');
        },
        dataType:'json'
      });

      return false; 
    });

  });
}

function fnanimate(attr, el) {
  var params = $(el).attr( attr );
    params = params.split(',');

  var data = [];

  data['efect_class'] = params[0];
  data['time_class'] = (params[2]=='slow' || params[2]=='fast') ? params[2] : ''; 
  data['time_start'] = parseFloat(params[1]);

  if (params[2] == 'fast') {
    data['time_efect'] = 300;
  } else if (params[2] == 'slow') {
    data['time_efect'] = 1000;
  } else {
    data['time_efect'] = 600;
  } 
  
  data['time_total'] = data['time_start'] + data['time_efect'];

  setTimeout( function() {
    $(el).addClass('animated');
    $(el).addClass(data['efect_class']);
    $(el).addClass(data['time_class']);
  },data['time_start']);

  return data;
}

$.fn.height_match = function() {
  var hmax = 0;
  $.each($(this), function(i,e) {
    if($(e).height() > hmax) hmax = $(e).height();
  });

  $.each($(this), function(i,e) {
    $(this).height(hmax);
  });
}


// data-add-class
$.fn.dataAddClass = function() {
    return this.each(function(i,el) {
    var params = $(el).attr('data-add-class').split(',');
    var selector = params[0];
    var className = params[1];
    var event = params[2] ? params[2] : 'click';
    $(el).on(event, function() {
      $(selector).addClass( className );
    }); 
  });
};

// data-remove-class
$.fn.dataRemoveClass = function() {
    return this.each(function(i,el) {
    var params = $(el).attr('data-remove-class').split(',');
    var selector = params[0];
    var className = params[1];
    var event = params[2] ? params[2] : 'click';

    $(el).on(event, function() {
      $(selector).removeClass( className );
    }); 
  });
};

function HeightMatch (MAIN) {
  var height_match = {};
  $.each( $('[data-height-match]',MAIN), function(i,el) {
    var index = $(el).attr('data-height-match');
    if( height_match[index] == undefined ) height_match[index] = [];
    height_match[index].push($(el));
  });
  $.each(height_match, function(i,arr) {
    $(arr).height_match();
  });
}

$.fn.Masonry = function() {
  var MASONRY = this;
  if( MASONRY.length ) {
    Requiere('vendor/masonry.pkgd.min.js', function() {
      $(MASONRY).masonry({
        itemSelector: '.masonry-item',
        columnWidth: '.masonry-sizer',
        percentPosition: true
      });
    });  
  } else return false;
}


// $.fn.picture_in_modal = function(_file) {

//   if( $(this).hasClass('picture_in_modal_reander') ) return;

//     $(this).click(function() {
      
//       var src = $(this).attr('data-modal-in-picture') ? $(this).attr('data-modal-in-picture') : _file;

//         $('.bootstrap_modal').remove();

//         var c = $('<div class="bootstrap_modal"></div>').html('<div class="modal fade" id="bootstrap_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
//                   <div class="modal-dialog modal-lg" role="document">\
//                     <div class="modal-content text-center">\
//                       </div>\
//                     </div>\
//                   </div>\
//                 </div>');

        
//         $('body').prepend(c);

//         var IMG = $('<img src="'+src+'" style="max-width:100%" />');

//         $('.modal-content', c).append(IMG);

//         $('#bootstrap_modal', c).modal('show').on('hidden.bs.modal', function (e) {
//            c.remove();
//         });
//     }).addClass('picture_in_modal_reander');
// }
$.fn.facebook_login = function() {

	var _this = $(this);

	_this.each(function(i,btn) {
		$(btn).addClass('active').click(function() {
		    FB.login(function(response) {
		      if (response.authResponse) {
		        
		      	var loading = $(btn).loading(btn);

				$.ajax({
				  type:'POST',
				  url:App.config.url+'facebook_login',
				  data:response,
				  success:function(data){ 
				  	location.reload();				  
				  },
				  error:function(){
				    loading.end();
				    console.dir('Error JSON');
				  },
				  dataType:'json'
				});

		      } else {
		        console.error('User cancelled login or did not fully authorize.');
		      }
		    }, {
			    scope: 'public_profile,email', 
			    return_scopes: true
			});
		    return false;
	    });
		  
	});

}

window.fbAsyncInit = function() {
FB.init({
  appId      : '193079904604336',
  xfbml      : true,
  version    : 'v2.6'
});
};

(function(d, s, id){
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) {return;}
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/en_US/sdk.js";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
var ajaxFormCallback = [];
ajaxFormCallback['reload'] = function() {
	location.reload();
}
ajaxFormCallback['go'] = function(data) {
	document.location.href = data.url;
}
ajaxFormCallback['notify'] = function(data) {
  var type = data.error == 0 ? 'success' : 'danger';

  if( data.type )
	type = data.type;

	$.notify({
		icon: data.icon,
		title: data.title,
		message: data.message ? data.message : ''
	},{
		type: type,
		placement: {
			from: "bottom",
			align: "right"
		},
	});
}

ajaxFormCallback['pet-publish'] = function(data) {
  redirect(App.config.url+'pets', function() {
  	$.notify({
			icon: 'fa fa-thumb-tack',
			title: '¡Mascota publicada!',
			message: '¡Gracias por ayudar a mejorar una vida! Al hacerla pública, ya es compromiso de todos!'
		},{
			type: 'success',
		placement: {
			from: "bottom",
			align: "right"
		},
		});
  });
}

ajaxFormCallback['pet-edit'] = function(data) {
	$.notify({
		icon: 'fa fa-pencil',
		title: '¡Mascota actualizada!',
		message: '¡Gracias por ayudar a mejorar una vida! Al hacerla pública, ya es compromiso de todos!'
	},{
		type: 'success',
		placement: {
		from: "bottom",
		align: "right"
		},
	});
}
var resize = [];
var bk_xs = 544;
var bk_sm = 768;
var bk_md = 1400;
var bk_lg = 1700;

var media = function(bk,fn) {
  if( breakpoint(bk) ) {
    fn();
  }
  resize.push(function() {
    if( breakpoint(bk) ) {
      fn();
    }
  });
}

var breakpoint = function(bk) {
  var ww = $( window ).width();

  var r = [];
  if( ww < bk_xs ) { r.push('xs'); r.push('<sm'); r.push('<md'); r.push('<lg'); r.push('<xl'); }
  if( ww >= bk_xs && ww < bk_sm ) { r.push('sm'); r.push('>xs'); r.push('<md'); r.push('<lg'); r.push('<xl');  }
  if( ww >= bk_sm && ww < bk_md ) { r.push('md'); r.push('>sm'); r.push('>xs'); r.push('<lg'); r.push('<xl'); }
  if( ww >= bk_md && ww < bk_lg ) { r.push('lg'); r.push('>md'); r.push('>sm'); r.push('>xs'); r.push('<xl'); }
  if( ww > bk_lg ) { r.push('xl'); r.push('>lg'); r.push('>md'); r.push('>sm'); r.push('>xs'); }

  return Boolean( $.inArray( bk, r ) >= 0 );
}

var resizetime;
var resizetimeout = false;
var resizedelta = 500;
function Winresize() {
  $(window).resize(function() {
      resizetime = new Date();
      if (resizetimeout === false) {
          resizetimeout = true;
          setTimeout(resizeend, resizedelta);
      }
  });
}
function resizeend() {
    if (new Date() - resizetime < resizedelta) {
      setTimeout(resizeend, resizedelta);
    } else {
      resizetimeout = false;
      resize.forEach(function(fn) {
        fn();
      });

      if(breakpoint('xs')) { console.dir('xs'); }
      if(breakpoint('sm')) { console.dir('sm'); }
      if(breakpoint('md')) { console.dir('md'); }
      if(breakpoint('lg')) { console.dir('lg'); }
      if(breakpoint('xl')) { console.dir('xl'); }

    }               
}

function ResponsiveModify(MAIN) {


  $('[data-rmodify]', MAIN).each(function(i,el) {

      var json = $(el).attr('data-rmodify');
          json = json.replace(/\'/g, '"');
 
         action = JSON.parse(json);

          for (var i = 0; i < action.length; i++) {
            
            if( !Array.isArray(action[i]) ) return; 

            var bk = action[i][0];
            var method = action[i][1];
            var selector = action[i][2];
            var no_repeat = (typeof action[i] != "undefined") ? action[i][3] : false;

            if( no_repeat ) {
              delete action[i]

              $(el).attr('data-rmodify', JSON.stringify(action) );
            }

            media(bk, function() {
              switch(method) {
                case 'after' : 
                  $(selector).eq(0).after( $(el) );
                break;
                case 'before' : 
                  $(selector).eq(0).before( $(el) );
                break;
                case 'prepend' : 
                  $(selector).eq(0).prepend( $(el) );
                break;
                case 'append' : 
                  $(selector).eq(0).append( $(el) );
                break;
                case 'removeClass' : 
                  $(el).removeClass(selector);
                break;
                case 'addClass' : 
                  $(el).addClass(selector);
                break;
              }
            });
          }

    
  });

}

// // DESC: Ajusta el alto como una imagen height:100%
// // USO: $(selector).div_responsive(); al selector ponerle data-original-size="x,x"
// $.fn.div_responsive = function() {

//   function load (_this) {
//     if( $(_this).attr('lh') == $(_this).height() ) return;
  
//     var original_size = $(_this).attr('data-original-size').split(',');
//     var original_w = original_size[0];
//     var original_h = original_size[1];

//     var w = $(_this).width();
//     var h = ( w * original_h ) / original_w;

//     h = Math.round(h);

//     $(_this).height(h);
    
//     $(_this).attr('lh', $(_this).height() );
//     return;
//   }


//   $(this).each(function(i,el) {
    
//     load(el);

//     var int = setInterval(function() {
//       load(el);
//     }, 1000);

//     resize.push(function() {
//       load(el);
//     });

//     $(el).bind('destroyed', function() {
//       clearInterval(int);
//     })
//   });

// }

(function($){
  $.event.special.destroyed = {
    remove: function(o) {
      if (o.handler) {
        o.handler()
      }
    }
  }
})(jQuery);

var Requiere  = function(script, done){
  $.getScript( App.config.layout+'js/'+script )
    .done(function( script, textStatus ) {
      done();
    })
    .fail(function( jqxhr, settings, exception ) {
      console.error( "Ajax error Requiere  Script: " + script );
  });
}


// Depende de pre/components/_loading.scss
$.fn.loading = function(btn) {

  $('#nanobar').remove();

  b = new Nanobar({id:'nanobar'});
  NanoVal = 0;
  b.go(NanoVal);

  $(btn).addClass('disabled')
  $(this).addClass('loading');

    NanoInterval = setInterval(function(){
        if( NanoVal - 80 ) {
      NanoVal = NanoVal + Math.floor(Math.random() * (10 - 2));
      b.go(NanoVal);
        }
    }, 300);

    this.end = function() {
    b.go(100);
        this.removeClass('loading');
        $(btn).removeClass('disabled');
        clearInterval(NanoInterval);
    }


    return this;
}


$.fn.errorsForm = function(errors) {
  var _this = this;
  var focus_this = true;
  for(var error in errors) {   
    var message = errors[error];
    console.error(message);

    var boxMessage = $('<div class="form-control-feedback errorsForm">*</div>');
    var input = $('[name="'+error+'"]', _this);
    var box = $('[data-show-error="'+error+'"]', _this);
    var parent = input.parent();

    var showError = $('.showError[data-field="'+error+'"]', _this);

    if(input.length) {

      if(focus_this) {
        input.focus();
        focus_this=false;
      }

      input.addClass('form-control-danger');
      parent.addClass('has-danger');

      if (showError.length) {
        showError.html('<span class="text-danger">'+message+'</span>');
        input.one('focus, change', function() {
          var showError = $('[data-field="'+$(this).attr('name')+'"]');
          showError.html('');
        });
      }

      if($('.errorsForm',parent).length)
        $('.errorsForm',parent).remove();
      if( $('.form-control-error',parent).length )
        $('.form-control-error',parent).append(boxMessage);

      input.one('focus change',function() {
        $('.errorsForm',$(this).parent()).remove();
        $(this).removeClass('error');
        $(this).parent().removeClass('has-danger');


      });

      if(input.hasClass('errorToast')) {
        toastr["error"](message, "Error!");
      }
    } 
    // if (box.length) {
    //   box.addClass('box-has-error');
    //   setTimeout(function() {
    //     box.one('mouseover',function() {
    //       $(this).removeClass('box-has-error');
    //     });
    //   }, 300);
    // }
  };
}
function col_per_row(w, cw) {
  var n = cw/w;
  return Math.round(n);
}

$.fn.scrollIn = function() {
  $('body').css({'overflow-y':'hidden'});
  $(this).css({'overflow-y':'auto'});
} 

$.fn.scrollOut = function() {
  $('body').css({'overflow-y':'initial'});
  $(this).css({'overflow-y':'initial'});
}


$.fn.ajaxForm = function() {
  return this.each(function(z,form) {

    var form = $(form);

    $('button',form).click(function() {
      $(this).addClass('this_is_the_btn');
    });

    $(form).submit(function(e) {
      var btn = $('.this_is_the_btn', form).removeClass('this_is_the_btn');

      var loading = form.loading(btn);

      e.preventDefault();
      $.ajax({
        type:'POST',
        url:form.attr('action'),
        data:form.serialize(),
        cache: false,
        processData: false,
        success:function(data){ 

          loading.end();
          if(data.error==0){
            var cb = data.callback;
            if( cb )
              ajaxFormCallback[cb](data);

          } else {
            form.errorsForm(data.inputErrors);
            loading.end();
          };
        },
        error:function(){
          loading.end();
          console.dir('Error JSON');
        },
        dataType:'json'
      });

      return false; 
    });

  });
}

function fnanimate(attr, el) {
  var params = $(el).attr( attr );
    params = params.split(',');

  var data = [];

  data['efect_class'] = params[0];
  data['time_class'] = (params[2]=='slow' || params[2]=='fast') ? params[2] : ''; 
  data['time_start'] = parseFloat(params[1]);

  if (params[2] == 'fast') {
    data['time_efect'] = 300;
  } else if (params[2] == 'slow') {
    data['time_efect'] = 1000;
  } else {
    data['time_efect'] = 600;
  } 
  
  data['time_total'] = data['time_start'] + data['time_efect'];

  setTimeout( function() {
    $(el).addClass('animated');
    $(el).addClass(data['efect_class']);
    $(el).addClass(data['time_class']);
  },data['time_start']);

  return data;
}

var Cookie = {

  create: function(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
  },

  read: function(name){
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
  },

  remove: function(name) {
    App.Cookie.create(name, "", -1);
  }
  
};



// // data-add-class
// $.fn.dataAddClass = function() {
//     return this.each(function(i,el) {
//     var params = $(el).attr('data-add-class').split(',');
//     var selector = params[0];
//     var className = params[1];
//     var event = params[2] ? params[2] : 'click';
//     $(el).on(event, function() {
//       $(selector).addClass( className );
//     }); 
//   });
// };

// // data-remove-class
// $.fn.dataRemoveClass = function() {
//     return this.each(function(i,el) {
//     var params = $(el).attr('data-remove-class').split(',');
//     var selector = params[0];
//     var className = params[1];
//     var event = params[2] ? params[2] : 'click';

//     $(el).on(event, function() {
//       $(selector).removeClass( className );
//     }); 
//   });
// };

// $.fn.height_match = function() {
//   var hmax = 0;
//   $.each($(this), function(i,e) {
//     if($(e).height() > hmax) hmax = $(e).height();
//   });

//   $.each($(this), function(i,e) {
//     $(this).height(hmax);
//   });
// }
// function HeightMatch (MAIN) {
//   var height_match = {};
//   $.each( $('[data-height-match]',MAIN), function(i,el) {
//     var index = $(el).attr('data-height-match');
//     if( height_match[index] == undefined ) height_match[index] = [];
//     height_match[index].push($(el));
//   });
//   $.each(height_match, function(i,arr) {
//     $(arr).height_match();
//   });
// }

$.fn.Masonry = function() {
  var MASONRY = this;
  if( MASONRY.length ) {
    Requiere('vendor/masonry.pkgd.min.js', function() {
      var $container = MASONRY;
      $container.imagesLoaded(function(){
          $container.masonry({
          itemSelector: '.masonry-item',
          columnWidth: '.masonry-sizer',
          percentPosition: true
        });
      });
    });  
  } else return false;
};

$.fn.imagesLoaded = function( callback ){
  var elems = this.find( 'img' ),
      elems_src = [],
      self = this,
      len = elems.length;

  if ( !elems.length ) {
    callback.call( this );
    return this;
  }

  elems.one('load error', function() {
    if ( --len === 0 ) {
      // Rinse and repeat.
      len = elems.length;
      elems.one( 'load error', function() {
        if ( --len === 0 ) {
          callback.call( self );
        }
      }).each(function() {
        this.src = elems_src.shift();
      });
    }
  }).each(function() {
    elems_src.push( this.src );
    // webkit hack from http://groups.google.com/group/jquery-dev/browse_thread/thread/eee6ab7b2da50e1f
    // data uri bypasses webkit log warning (thx doug jones)
    this.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
  });

  return this;
};


// $.fn.picture_in_modal = function(_file) {

//   if( $(this).hasClass('picture_in_modal_reander') ) return;

//     $(this).click(function() {
      
//       var src = $(this).attr('data-modal-in-picture') ? $(this).attr('data-modal-in-picture') : _file;

//         $('.bootstrap_modal').remove();

//         var c = $('<div class="bootstrap_modal"></div>').html('<div class="modal fade" id="bootstrap_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
//                   <div class="modal-dialog modal-lg" role="document">\
//                     <div class="modal-content text-center">\
//                       </div>\
//                     </div>\
//                   </div>\
//                 </div>');

        
//         $('body').prepend(c);

//         var IMG = $('<img src="'+src+'" style="max-width:100%" />');

//         $('.modal-content', c).append(IMG);

//         $('#bootstrap_modal', c).modal('show').on('hidden.bs.modal', function (e) {
//            c.remove();
//         });
//     }).addClass('picture_in_modal_reander');
// }
var API_KEY = 'AIzaSyAV4nYx6x2JrF25cg11QBUhA6tRWMguPbI';
var MAP_THME = [{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#e9dfd3"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"color":"#e9dfd3"},{"visibility":"on"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#a68f34"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.fill","stylers":[{"color":"#ff0000"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#ff0000"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#e9dfd3"}]},{"featureType":"landscape","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#e9dfd3"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"color":"#e9dfd3"}]},{"featureType":"landscape.man_made","elementType":"labels.text.stroke","stylers":[{"lightness":"-100"},{"saturation":"-35"},{"color":"#454444"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"color":"#e9dfd3"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"color":"#e9dfd3"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.fill","stylers":[{"color":"#ff0000"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#01c3c1"},{"weight":"1"},{"lightness":"-3"},{"saturation":"-37"},{"gamma":"1.22"}]}];
$.getScript("https://maps.googleapis.com/maps/api/js?key="+API_KEY+"&libraries=places&callback=initMapX");


function initMapX(MAIN) {

	var init = setInterval(function() {
		if(typeof google == "object") {
			clearInterval(init);

			if($('#select-location-map').length) 
				SelectLocationMap ();
			
			if( $('.pets-map').length ) 
				PetsMap (MAIN);

			if( $('.map-marker').length ) 
				fixedMap (MAIN, $('.map-marker'));

		}
	},200);
	
}

function PetsMap (MAIN) {

  var data = JSON.parse($('#map-all-data').html());

  var map = new google.maps.Map(document.getElementById('map'), {
    styles: MAP_THME,
    center: {lat: -34.6104477, lng: -58.4104911},
    zoom: 12, 
  });

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      map.setCenter(pos);
    }, function() {
    });
  } 

  var markers = [];
  for (var i = 0; i < data.length; i++) {
    (function(marker) {
      if ( (marker.file && marker.lat && marker.lng) ) {
        var myLatLng = { lat: parseFloat(marker.lat), lng: parseFloat(marker.lng) };

        var icon = {
            url: marker.file,
            scaledSize: new google.maps.Size(40, 40),
            origin: new google.maps.Point(0,0),
            fillOpacity: .6,
            scale: .5,
            strokeColor: '#000000',
            strokeWeight: 1,
            anchor: new google.maps.Point(0,0)
        };

        var Marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: icon,
            offset: '0',
            title: marker.name
        });

        google.maps.event.addDomListener(Marker, 'click', function() {
          window.location.href = marker.full_link;
        });

        markers.push(Marker);
      }
      })(data[i]);
  };


    var markerCluster = new MarkerClusterer(map, markers,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      

}

function SelectLocationMap () {
  var lat = parseFloat($('#input_select_location_lat').val());
  var lng = parseFloat($('#input_select_location_lng').val());
  var input = document.getElementById('input_keyword');
  var myLatLng = { lat: lat, lng: lng };

  var SLMAP = new google.maps.Map(document.getElementById('select-location-map'), {
    center: myLatLng,
    styles: MAP_THME,
    zoom: 12
  });


  var marker = new google.maps.Marker({
    position: myLatLng,
    draggable: true,
    animation: google.maps.Animation.DROP,
    map: SLMAP,
  });


  var searchBox = new google.maps.places.SearchBox(input);
  searchBox.addListener('places_changed', function() {

    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    place = places[0];

    $('#input_select_location_lat').val(place.geometry.location.lat());
    $('#input_select_location_lng').val(place.geometry.location.lng());

    var latlng = { lat: place.geometry.location.lat(), lng: place.geometry.location.lng() };
    marker.setPosition(latlng);
    SLMAP.setCenter(latlng);
  });    

  google.maps.event.addListener(marker, 'drag', function() {
    var p = marker.getPosition();
    $('#input_select_location_lat').val( p.lat() );
    $('#input_select_location_lng').val( p.lng() );
  });
}



function fixedMap (MAIN, el) {
	var lat = parseFloat(el.attr('data-lat'));
	var lng = parseFloat(el.attr('data-lng'));

	console.dir({lat: lat, lng: lng});

	var FMAP = new google.maps.Map(document.getElementById('fixed-map'), {
	  center: {lat: lat, lng: lng},
      styles: MAP_THME,
	  zoom: 12
	});


	var myLatLng = { lat: lat, lng: lng };
	var marker = new google.maps.Marker({
		position: myLatLng,
		animation: google.maps.Animation.DROP,
		map: FMAP,
	});

}


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
pageFN["pet/details"] = function(MAIN) {
  var swiper = new Swiper('.swiper-container', {
      pagination: '.swiper-pagination',
      paginationClickable: true,
      autoHeight: true,
      effect: 'slide',
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
  });
}
pageFN['pet/form'] = function(MAIN) {
  if ($('.dropzone',MAIN).length) {
      Requiere('vendor/dropzone.js',function() {
          $('.dropzone',MAIN).each(function(i,el){
              Dropzone.autoDiscover = false;
            $(el).dropzone({ 
                url: $(el).attr('data-action'),
                addRemoveLinks: true,
                dictDefaultMessage: '<div class="labeldopzone"><i class="fa fa-cloud-upload fa-5x"></i> <span>Selecciona las fotos de la mascota...</span></div>',
                dictRemoveFile: 'Eliminar',
                success: function(file) {
                  var json = JSON.parse(file.xhr.response);
                  var id_file = json.id;
                  var input = $('<input type="hidden" name="id_file[]" value="'+id_file+'" />');
                  $(file.previewElement).append( input );
                },
                removedfile: function(file) {
                  return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
                }
            }).removeClass('.dropzone');
          });
      });
  }

}