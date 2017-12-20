<? if( !AJAX ) $this->load->view("common/header") ?>
<div class="widget-app-element" id="main">
<form class="widget-app-element-form" id="widget-form-<?= $wgetId ?>" method="post" action="<?= base_url() . ($idItem ? "{$appController}/{$appFunction}/element/{$idItem}" . ($quickOpen ? "/quick" : "") : "{$appController}/{$appFunction}/element/new") ?>" role="form">
  <input type="hidden" value="0" name="goback" class="form-post-goback" />
  <div class="row page-title-row">
        
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
      <h1 class="page-title txt-color-blueDark"><i class="page-title-ico <?= $appTitleIco ?>"></i> <?= prep_app_title($appTitle) ?></h1>
    </div>
      </div>
  <section class="widget-form-content">
    <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <div class="onoffswitch-container">
          <span class="onoffswitch-title"><?= $this->lang->line("Estado") ?></span> 
          <span class="onoffswitch">
            <input name="active" value="1" type="checkbox" <? if($dataItem['active'] == 1 || (!$idItem && !$this->input->post())): ?>checked="checked"<? endif ?> class="onoffswitch-checkbox" id="activeForm<?= $wgetId ?>">
            <label class="onoffswitch-label" for="activeForm<?= $wgetId ?>"> 
              <span class="onoffswitch-inner" data-swchon-text="ON" data-swchoff-text="OFF"></span> 
              <span class="onoffswitch-switch"></span>
            </label> 
          </span>
        </div>
      </div>
      <? $this->load->view("app/element/buttons-header") ?>   
          </div>
    <div class="clear-sm"></div>
    <div class="well-white smart-form">
      <fieldset>
      	        <div class="row">
         
<? $field = 'created_at'; $this->load->view('app/form', array('item' => array(
    'columns' => 2,
    'form' => $wgetId,
    'name' => $field,
    'label' => $this->lang->line('Creado'),
    'value' => $dataItem[$field],
    'error' => $this->validation->error($field),
    'class' => $this->validation->error_class($field),
    'placeholder' => '',
    'disabled'=>true,
  ))) ?>
<? $field = 'updated_at'; $this->load->view('app/form', array('item' => array(
    'columns' => 2,
    'form' => $wgetId,
    'name' => $field,
    'label' => $this->lang->line('Editado'),
    'value' => $dataItem[$field],
    'error' => $this->validation->error($field),
    'class' => $this->validation->error_class($field),
    'disabled'=>true,
    'placeholder' => ''
  ))) ?>
<? $field = 'id_user'; $this->load->view('app/form', array('item' => array(
    'type' => 'select',
    'columns' => 2,
    'form' => $wgetId,
    'name' => $field,
    'data' => $select['SelectUser'],
    'label' => $this->lang->line('Usuario'),
    'error' => $this->validation->error($field),
    'class' => $this->validation->error_class($field),
    'value' => $dataItem[$field],
    'placeholder' => ''
  ))) ?>
<? $field = 'name'; $this->load->view('app/form', array('item' => array(
    'columns' => 4,
    'form' => $wgetId,
    'name' => $field,
    'label' => $this->lang->line('Nombre'),
    'value' => $dataItem[$field],
    'error' => $this->validation->error($field),
    'class' => $this->validation->error_class($field),
    'placeholder' => ''
  ))) ?>
<? $field = 'gender'; $this->load->view('app/form', array('item' => array(
    'columns' => 2,
    'form' => $wgetId,
    'name' => $field,
    'label' => $this->lang->line('Sexo'),
    'value' => $dataItem[$field],
    'error' => $this->validation->error($field),
    'class' => $this->validation->error_class($field),
    'placeholder' => ''
  ))) ?>
<!-- <? $field = 'id_location'; $this->load->view('app/form', array('item' => array(
    'type' => 'select',
    'columns' => 2,
    'form' => $wgetId,
    'name' => $field,
    'data' => $select['SelectLocation'],
    'label' => $this->lang->line('Locacion'),
    'error' => $this->validation->error($field),
    'class' => $this->validation->error_class($field),
    'value' => $dataItem[$field],
    'placeholder' => ''
  ))) ?> -->
	<? $field = 'description'; $this->load->view('app/form', array('item' => array(
    'type' => 'textarea',
    'height' => 160,
    'columns' => 6,
    'form' => $wgetId,
    'name' => $field,
    'label' => $this->lang->line('Descripción'),
    'value' => $dataItem[$field],
    'error' => $this->validation->error($field),
    'class' => $this->validation->error_class($field),
    'placeholder' => ''
  ))) ?>
<? $field = 'id_status'; $this->load->view('app/form', array('item' => array(
    'type' => 'select',
    'columns' => 2,
    'form' => $wgetId,
    'name' => $field,
    'data' => $select['SelectPetStatus'],
    'label' => $this->lang->line('Estado'),
    'error' => $this->validation->error($field),
    'class' => $this->validation->error_class($field),
    'value' => $dataItem[$field],
    'placeholder' => ''
  ))) ?>
<? $field = 'id_race'; $this->load->view('app/form', array('item' => array(
    'type' => 'select',
    'columns' => 2,
    'form' => $wgetId,
    'name' => $field,
    'data' => $select['SelectPetRace'],
    'label' => $this->lang->line('Raza'),
    'error' => $this->validation->error($field),
    'class' => $this->validation->error_class($field),
    'value' => $dataItem[$field],
    'placeholder' => ''
  ))) ?>
<? $field = 'id_gallery'; $this->load->view('app/form', array('item' => array(
    'type' => 'gallery',
    'columns' => 12,
    'form' => $wgetId,
    'name' => $field,
    'error' => $this->validation->error($field),
    'class' => $this->validation->error_class($field),
    'allow-navigation' => isset($gallery['default'][$field]['allow-navigation']) ? $gallery['default'][$field]['allow-navigation'] : false,
    'default-location' => isset($gallery['default'][$field]['folder']) ? $gallery['default'][$field]['folder'] : ( isset($gallery['folder']) ? $gallery['folder'] : 0 ),
    'data' => $dataItem,
    'prefix' => 'fmg1',
    'label' => $this->lang->line('Galería'),
    'value' => $dataItem[$field],
    'placeholder' => ''
  ))) ?>
<? $field = 'id_type'; $this->load->view('app/form', array('item' => array(
    'type' => 'select',
    'columns' => 2,
    'form' => $wgetId,
    'name' => $field,
    'data' => $select['SelectPetType'],
    'label' => $this->lang->line('Tipo'),
    'error' => $this->validation->error($field),
    'class' => $this->validation->error_class($field),
    'value' => $dataItem[$field],
    'placeholder' => ''
  ))) ?>
      </div>
      </fieldset>
      <div class="clear-sm"></div>
    </div>
    <? $this->load->view("app/element/buttons-footer") ?>   
  </section>     
</form>
</div>
<? $this->load->view("script/filemanager/includes") ?>
<? $this->load->view("script/ckeditor/includes-new") ?>
<script>
$(document).ready(function() {
  var formGlobal = $('#widget-form-<?= $wgetId ?>');  
<?php /*
  var ckCfg = <? $this->load->view("web/ckeditor/config") ?>;
  ckCfg.contentsCss = ['<?= base_url() ?>web/ckeditorcss'];
  ckCfg.stylesSet = 'project:<?= base_url() ?>web/ckeditorstyles';
  ckCfg.height = 400;
  ckCfg.extraPlugins = 'font,colorbutton,dialog,colordialog,justify,oembed,image,image2,widget';
	CKEDITOR.replace('textForm<?= $wgetId ?>', ckCfg);
	*/ ?>
<? if(!$this->MApp->secure->edit):?>
  formGlobal.addClass('form-disabled');
  formGlobal.submit(function(e){
    e.preventDefault();
    e.stopPropagation();
    return false;
  });
<? else: ?>
  <? if($idItem && !$quickOpen): ?>
  App.changeURI('<?= base_url() . "{$appController}/{$appFunction}/element/{$idItem}" ?>');
  <? endif ?>
  formGlobal.validate({ 
    submitHandler: function(form) {
      <?php /*
      for (instance in CKEDITOR.instances)
      {
        if(CKEDITOR.instances[instance])
        {
          CKEDITOR.instances[instance].updateElement();
          //CKEDITOR.instances[instance].destroy();
        }
      }
        */ ?>
      App.postForm(form);
    },
		    rules : {
      /*'created_at': 'required',
      'updated_at': 'required',
      'id_user': 'required',
      'name': 'required',
      'gender': 'required',
      'id_location': 'required',
      'id_status': 'required',
      'id_race': 'required',
      'id_gallery': 'required',
      'id_type': 'required' */     
    },
    messages : {
    }
  });  
  
  $('.btn.save-action',formGlobal).click(function(){
    $('.form-post-goback', formGlobal).val('0');
    formGlobal.submit();
  });
  $('.btn.save-action-close', formGlobal).click(function(){
    $('.form-post-goback', formGlobal).val('1');
    formGlobal.submit();
  });
  <? endif ?>  
  <? if($quickOpen): ?>
  $('.action-close', formGlobal).click(function(e){
    e.preventDefault();
    window.close();
    return false;
  });
  <? endif ?>
      <? $field = 'id_gallery'; $this->load->view('script/filemanager/gallery.js', array('item' => array(
    'form' => $wgetId,
    'name' => $field
  ))) ?>
  
});
</script>
<? $this->load->view("common/footer") ?>