var App = {
  config: {
    url: '',
    assets: '',
    user: '',
  },
  history_url: '',
  unique_id: 0,
  screen : function() {
    if( window.innerWidth < 739 ) { return 'xs'; }
    else if( window.innerWidth >= 740 && window.innerWidth <= 939 ) { return 'sm'; }
    else if( window.innerWidth >= 940 && window.innerWidth <= 1000 ) { return 'md'; }
    else if( window.innerWidth > 1000  ) { return 'lg'; }
  },
  Init: function(config){
    App.config = $.extend(App.config, config || {});
    $(document).ready(function(e){
      App.Event.DomReady();
      App.Event.DomInserted($(this));
    });
    $(document).bind('DOMNodeInserted', function(e) {
      App.Event.DomInserted($(e.target));
    });
  },
  Event: {
    DomReady: function(){

      var min_height = window.innerHeight - $('footer').eq(0).height() - $('header').eq(0).height() ;
      $('#main-content, .full-height').css({'min-height': min_height});

      if(!App.config.user) {
        $('a[requiere-login]').click(function() {

          $('#sign-modal').modal();

          return false;
          event.preventDefault();
          event.stopPropagation();
        });
      }

      $('a[in-modal]').click(function() {
        
        var name = $(this).attr('in-modal');
        var file = $(this).attr('href');
        var name_url = $(this).attr('in-modal-url') ? $(this).attr('in-modal-url') : file;

        App.in_modal(name,file,name_url);

        return false;
        event.preventDefault();
      });
      
      
      switch (App.config.page) {
          case 'home_action_index':
          case 'home_action_search':

            Map.init();

          case 'home_action_error404':

            if(App.screen() == 'xs') { var SlideWidth = ($(window).width() / 4), SlideHeight = ($(window).width() / 4) + 5, DisplayPieces = 4 }
            if(App.screen() == 'sm') { var SlideWidth = ($(window).width() / 8), SlideHeight = ($(window).width() / 8) + 5, DisplayPieces = 8, Steps = DisplayPieces*2 }
            if(App.screen() == 'md') { var SlideWidth = ($(window).width() / 10), SlideHeight = ($(window).width() / 10) + 5, DisplayPieces = 10, Steps = DisplayPieces*2 }
            if(App.screen() == 'lg') { var SlideWidth = ($(window).width() / 12), SlideHeight = ($(window).width() / 12) + 5, DisplayPieces = 12, Steps = DisplayPieces*2 }

            var options = {$AutoPlay: false, $Loop: 1, $SlideWidth: SlideWidth, $SlideHeight: SlideHeight, $DisplayPieces: DisplayPieces };
            App.InitJssorSlider( $('.slide-pets'), options );

          break;
      }     

      $(window).bind('mousewheel DOMMouseScroll scroll', function(){

      }).scroll();


    },
    DomInserted: function(element) {

      element.find('.arroba').html('@');

      element.find('.dropzone').dropzone({ 
        url: element.find('.dropzone').attr('data-action'),
        addRemoveLinks: true,
        dictDefaultMessage: '<div class="labeldopzone"><i class="fa fa-cloud-upload fa-5x"></i> <span>Carga fotos de tu mascota</span></div>',
        dictRemoveFile: 'Eliminar',
        success: function(file) {
          var filename = file.xhr.response;
          var input = $('<input type="hidden" name="pictures[]" value="'+filename+'" />');

          $(file.previewElement).append( input );

        },
        removedfile: function(file) {
          // Aca deberiamos eliminar la miniatura de la carpeta
          return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
        }
      }).removeClass('.dropzone');


      element.find('form[by-ajax]').submit(function() {
        App.submit_form_ajax(this);
        return false;
        event.preventDefault();
      });

    }
  },
  InitJssorSlider: function(elements, options) {

    App.requiredScript(App.config.assets + 'js/jssor.slider.min.js', function(){
      elements.each(function(i, item){

        var id = 'jssor_slider_' + App.unique_id++;
        $(item).attr('id', id);
        var _w = options.$SlideWidth * options.$DisplayPieces;
        $(item).css({'width': _w +'px','height': options.$SlideHeight +'px'});

        new $JssorSlider$(id, options);
      });
    });
  },
  requiredScript: function(script, done){
    var scripts = [];
    done = done || function(){};
    $.each($('script'), function(index, script){
      if($(script).attr('src'))
        scripts.push($(script).attr('src'))
    });
    if($.inArray(script, scripts) > -1) return done();
    App.getScript(script, done);
  },
  getScript: function(url, done){
    done = done || function(){};
    options = {
      dataType: "script",
      cache: true,
      url: url
    };
    $.ajax(options).done(done);
  },
  ChangeURL: function (data, title, link) {
    if( !!window.history && history.pushState) {
      history.pushState(data, title, link);
    }
  },
  getHtml: function(url, element) {
    App.loading.init( element );
    $.ajax({
      dataType: "html",
      cache: true,
      url: url
    }).done(function(HTML) {
      App.loading.end( element );
      $(element).html(HTML);
    });

  },
  submit_form_ajax: function(form) {
    var data = $(form).serialize();
    var loading_in = $(form).attr('loading-in') ? $($(form).attr('loading-in')) : $(form);

    App.loading.init( loading_in );

    $.ajax({
      type: "POST",
      url: $(form).attr('action'),
      data: data,
      dataType: 'JSON',
    }).done(function(json) {
      App.loading.end( loading_in );
      if( ! json.success )
        App.validation_form( form, json.errors );
      else {
        App.ChangeURL(null,null,App.history_url);
        location.reload();
      }

    }).fail(function() {
      App.loading.end( loading_in );
    });
  },
  loading: {
    init: function(element) {
      $(element).addClass('loading');
    },
    end: function(element) {
      $(element).removeClass('loading');
    }
  },
  validation_form: function (form, errors) {
    for (i in errors) {
      var element = $(form).find('[name="'+errors[i]+'"]');
      element.parent().addClass('has-error').on('focus click', function() { $(this).removeClass('has-error'); });
      if(i == 0) element.focus();
    }
  },
  in_modal: function (name, file, url) {
    $('.modal').modal('hide');
    App.history_url = location.href;

    if(url) {
      App.ChangeURL(null,null,url);
      file = location.href;
    }

    var modal_id = 'modal_'+name;
    if( $('#'+modal_id).length ) {
      $('#'+modal_id).modal('show');
    } else {
      var new_modal = $('<div class="modal" id="'+modal_id+'" backdrop="static">\
                          <div class="modal-dialog modal-lg">\
                            <div class="modal-content">\
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>\
                                <div class="ajax_content"></div>\
                              </div>\
                            </div>\
                          </div>');
      
      $('body').prepend(new_modal);


      App.getHtml(file, new_modal.find('.ajax_content'));
      
      $('#'+modal_id).find('.close').on('click',function() {
        $('#'+modal_id).modal('hide');
      });
      $('#'+modal_id).modal('show');
    }
    if(url) {
      $('#'+modal_id).on('hide.bs.modal', function () {
        App.ChangeURL(null,null,App.history_url);
      });
    }
  }
};