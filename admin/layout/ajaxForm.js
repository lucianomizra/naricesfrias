$.fn.loading = function(btn) {

  $('#nanobar').remove();

  // b = new Nanobar({id:'nanobar'});
  // NanoVal = 0;
  // b.go(NanoVal);

  $(btn).addClass('disabled')
  $(this).addClass('loading');

    // NanoInterval = setInterval(function(){
    //     if( NanoVal - 80 ) {
    //   NanoVal = NanoVal + Math.floor(Math.random() * (10 - 2));
    //   b.go(NanoVal);
    //     }
    // }, 300);

    this.end = function() {
    // b.go(100);
        this.removeClass('loading');
        $(btn).removeClass('disabled');
        // clearInterval(NanoInterval);
    }


    return this;
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


$.fn.errorsForm = function(errors) {
  var _this = this;
  var focus_this = true;
  for(var error in errors) {   
    var message = errors[error];

        // message = '*';
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
        $(this).parent().removeClass('has-error');

        if (showError.length) {
          showError.html('');
        }
      });

      if(input.hasClass('errorToast')) {
        toastr["error"](message, "Error!")
        vtoastr.options = {
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
        };
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


$(document).ready(function() {
  $('.ajaxForm').ajaxForm();
});