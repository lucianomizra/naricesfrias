<form class="form-vertical form-account-details ajaxForm" action="<?= base_url('user/account/change_password') ?>">
    
    <?php if (!$pets): ?>
        <div class="jumbotron">
            <h1><i class="fa fa-exclamation-triangle"></i> No has publicado mascotas aún.</h1>
            <p>Si has perdido, encontrado o tienes una mascota sin hogar, compartela con la comunidad, un simple formulario puede cambiar una vida!.</p>
        </div>
    <?php else: ?>
    	<div class="list">
			<div class="row masonry">
				<div class="col-md-6 col-xs-12 masonry-sizer"></div>
				<?php foreach ($pets as $key => $pet): ?>
					<article class="col-md-6 col-xs-12 masonry-item">
						<? $this->load->view('components/pet/pet_card', ['pet'=>$pet]) ?>
					</article>
				<?php endforeach ?>
				<div class="clearfix"></div>
			</div>
		</div>
    <?php endif ?>

    <div class="text-xs-right">
        <a href="<?= base_url('pet/publish') ?>" class="btn btn-primary"><span class="fa fa-plus"></span> Publicar mascota</a>
    </div>
</form>
