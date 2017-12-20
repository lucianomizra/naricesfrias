<script type="text/javascript">
var DataTableFn = function(){
  var colFilter = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
  
  <? $this->load->view("script/datatable/config.js") ?>
  
  configDT.fnServerParams = function ( aoData ) {
    aoData.push( { "name": "filter-id_user", "value": $('#id_userFormSelect<?= $wgetId ?>').val() } );
    aoData.push( { "name": "filter-id_location", "value": $('#id_locationFormSelect<?= $wgetId ?>').val() } );
    aoData.push( { "name": "filter-id_status", "value": $('#id_statusFormSelect<?= $wgetId ?>').val() } );
    aoData.push( { "name": "filter-id_race", "value": $('#id_raceFormSelect<?= $wgetId ?>').val() } );
    aoData.push( { "name": "filter-id_gallery", "value": $('#id_galleryFormSelect<?= $wgetId ?>').val() } );
    aoData.push( { "name": "filter-id_type", "value": $('#id_typeFormSelect<?= $wgetId ?>').val() } );
    if($('#activeFormChk<?= $wgetId ?>').prop('checked'))
      aoData.push( { "name": "filter-active", "value": 1 } );
    aoData.push( { "name": "filter-text", "value": $('#textFormInput<?= $wgetId ?>').val() } );
    <? $this->load->view("script/datatable/order.js") ?>
  };
  configDT.aoColumns = [
    { "sTitle": "<input class='checkbox-select-all' type='checkbox' />", "sWidth": "10px", "mData": "id", "bSortable": false, "bSearchable": false, "sType": "html", "mRender" : function( data, type, full ){ 
      return '<span class="checkbox"><input value="" name="" class="checkbox-select-row" type="checkbox"><i></i></span>';
    }},
    { "sTitle": "<?= $this->lang->line("ID") ?>", "sWidth": "40px", "mData": "id", "sType": "string"},
    { "sClass": "text-align-center", "sTitle": "<?= $this->lang->line("Creado") ?>", "mData": "created_at", "sType": "html", "mRender" : function( data, type, full ){ 
      if(!data || data == '0000-00-00 00:00') return '-';
      return Date.fromMysql(data).format("dd/MM/yyyy hh:mm:ss");
    }},
    { "sClass": "text-align-center", "sTitle": "<?= $this->lang->line("Editado") ?>", "mData": "updated_at", "sType": "html", "mRender" : function( data, type, full ){ 
      if(!data || data == '0000-00-00 00:00') return '-';
      return Date.fromMysql(data).format("dd/MM/yyyy hh:mm:ss");
    }},
    { "sTitle": "<?= $this->lang->line("Usuario") ?>", "mData": "user", "sType": "string"},
    { "sClass": "text-align-center", "sTitle": "<?= $this->lang->line("Nombre") ?>", "mData": "name", "sType": "string"},
    { "sClass": "text-align-center", "sTitle": "<?= $this->lang->line("Sexo") ?>", "mData": "gender", "sType": "string"},
    { "sTitle": "<?= $this->lang->line("Locacion") ?>", "mData": "location", "sType": "string"},
    { "sTitle": "<?= $this->lang->line("Estado") ?>", "mData": "status", "sType": "string"},
    { "sTitle": "<?= $this->lang->line("Raza") ?>", "mData": "race", "sType": "string"},
    { "bVisible": false, "sWidth": "30px", "sClass": "text-align-center td-gallery-items",  "sTitle": "<?= $this->lang->line("Galería") ?>", "mData": "fmg1", "sType": "html", "mRender" : function( data, type, full ){ 
      if(!full["id_gallery"] || !data || !parseInt(data)) return "<?= $this->lang->line("Vacía") ?>";
      if(data == 1)
        return "<?= $this->lang->line("1 elemento") ?>";
      return "<?= $this->lang->line("{1} elementos") ?>".replace('{1}', data);
    }},
    { "bVisible": false, "sTitle": "<?= $this->lang->line("Tipo") ?>", "mData": "type", "sType": "string"},
    { "sClass": "text-align-center", "sWidth": "40px", "sTitle": "<?= $this->lang->line("Active") ?>", "mData": "active", "sType": "html", "mRender" : function( data, type, full ){ 
      if(!data || !parseInt(data)) return '<?= $this->lang->line("No") ?>';
      return '<?= $this->lang->line("Si") ?>';
    }},
    { "sTitle": "<?= $this->lang->line("Acciones") ?>", "sWidth": "60px", "mData": "id", "bSortable": false, "bSearchable": false, "sType": "html", "mRender" : function( data, type, full ){ 
      return '<ul class="table-actions smart-form">' +         
      '<li><a title="<?= $this->lang->line($this->MApp->secure->edit ? "Editar" : "Ver") ?>" href="<?= base_url() . "{$appController}/{$appFunction}" ?>/element/' + data + '" class="btn btn-xs btn-default edit-button" type="button"><i class="fa fa-actions <?= $this->MApp->secure->edit ? "fa-pencil" : "fa-search" ?>"></i></a></li>' +
      <? if($this->model->mconfig['duplicate']): ?>'<li><a title="<?= $this->lang->line("Duplicar") ?>" href="<?= base_url() . "{$appController}/{$appFunction}" ?>/duplicate/' + data + '" class="btn btn-xs btn-default duplicate-button<?= ($this->model->mconfig['new-element'] && $this->MApp->secure->edit) ? "" : " disabled" ?>" type="button"><i class="fa fa-actions fa-copy"></i></a></li>' + <? endif ?>
      '<li><a title="<?= $this->lang->line("Eliminar") ?>" href="<?= base_url() . "{$appController}/{$appFunction}" ?>/delete/' + data + '" class="btn btn-xs btn-default delete-button<?= $this->MApp->secure->delete ? "" : " disabled" ?>" type="button"><i class="fa fa-actions fa-trash-o"></i></a></li>' + 
      '</ul>';
    }}
  ];
  
  <? $this->load->view("script/datatable/script.js") ?>  
  
};
$(document).ready(function() {
  setTimeout(DataTableFn, 10);
});
</script>