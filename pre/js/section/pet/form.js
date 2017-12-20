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