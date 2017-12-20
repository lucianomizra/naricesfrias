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