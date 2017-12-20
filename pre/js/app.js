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