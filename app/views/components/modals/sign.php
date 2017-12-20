<div class="modal fade modal-center" id="sign-modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
	  <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      	<div class="clearfix"></div>
      	<div class="row">
			<div class="col-sm-6 border-right">
				<? $this->load->view('components/form/sign-in') ?>
			</div>
			<div class="col-sm-6">
		    	<div class="border-top hidden-sm-up"></div>
				<? $this->load->view('components/form/sign-up') ?>
			</div>
			<div class="col-sm-12 text-xs-center">
				¿No recuerdas tu contraseña? 
				<a href="<?= base_url('forgot') ?>" data-dismiss="modal" aria-label="Close">Recuperala aquí.</a>
			</div>
		</div>
	  </div>
	</div>
  </div>
</div>