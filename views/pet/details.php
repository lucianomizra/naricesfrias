<div class="modal-body pet-details <?= $pet->pets_status['status'] ?>">
	<div class="row">
		<div class="col-sm-5" id="pictures-pet-<?= $pet->id ?>">
			<div class="widget-slider">
			    <div u="slides" class="slider-container">
			    	<? foreach ($pet->pets_pictures as $i => $picture) : 
			    	if(!file_exists(UPLOADSDIR.$picture['img'])): ?>

			    		<div>
			    			<figure><img src="<?= UPLOADSDIR.$picture['img'] ?>" alt="<?= $picture['title'] ?>"></figure>
			    		</div>
			    	<? endif; endforeach; ?>
			    </div>
			</div>
			<h2>Contacto</h2>
			<ul class="list-unstyled">
				<li><strong>Nombre:</strong>  <?= $pet->user['first_name'] ?></li>
				<li><strong>Email:</strong>  <?= print_mail($pet->user['email']) ?></li>
			</ul>
		</div>
		<div class="col-sm-7">
			<h2>Datos de la mascota</h2>
			<ul class="list-unstyled">
				<? if($pet->name) : ?><li><strong>Responde a:</strong> <?= $pet->name ?></li><? endif; ?>
				<li><strong>Estado:</strong>  <?= $pet->pets_status['title'] ?></li>
				<!-- <li><strong>Sexo:</strong>  <?= $pet->gender ?></li> -->
				<li><strong>Raza:</strong>  <?= $pet->pets_races['race'] ?></li>
			</ul>
			<? if($pet->description) : ?><p><?= $pet->description ?></p><? endif; ?>
		</div>
	</div>
	<? if($pet->user['id'] == USER): ?>
	<a in-modal="edit-pet-<?= $pet->id ?>" href="<? BASEURL ?>edit/<?= $pet->id ?>" class="edit_pet pull-right">
		<i class="fa fa-pencil"></i> Editar detalles
	</a>
	<? endif; ?>
</div>

<script>
	setTimeout(function() {
		var w = $('#pictures-pet-<?= $pet->id ?>').width();
		var h = w;
	    if(App.screen() == 'xs') { var SlideWidth = w, SlideHeight = h + 5, DisplayPieces = 1 }
        if(App.screen() == 'sm') { var SlideWidth = w, SlideHeight = h + 5, DisplayPieces = 1 }
        if(App.screen() == 'md') { var SlideWidth = w, SlideHeight = h + 5, DisplayPieces = 1 }
        if(App.screen() == 'lg') { var SlideWidth = w, SlideHeight = h + 5, DisplayPieces = 1 }

        var options = {$AutoPlay: false, $Loop: 1, $SlideWidth: SlideWidth, $SlideHeight: SlideHeight, $DisplayPieces: DisplayPieces };
        App.InitJssorSlider( $('#pictures-pet-<?= $pet->id ?>').find('.widget-slider'), options );

	},300);
</script>