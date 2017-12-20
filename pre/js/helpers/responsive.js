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
