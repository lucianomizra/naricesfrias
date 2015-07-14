<div id="widget-create-pets">
	<div class="container">
		<div class="row">
			
	
			<div class="col-sm-4">
				<a href="<?= BASEURL ?>pet/new/lost"<? if(USER) : ?>in-modal="new-lost"<? endif; ?> requiere-login>
					<div class="giant-makers giant-makers-danger">
						<i class="fa fa-map-marker"></i>
						<i class="fa fa-search"></i> 
					</div>
					<button class="btn btn-block btn-danger">¿Perdiste una mascota?</button>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="<?= BASEURL ?>pet/new/adopted"<? if(USER) : ?>in-modal="new-adopted"<? endif; ?> requiere-login>
					<div class="giant-makers giant-makers-warning">
						<i class="fa fa-map-marker"></i>
						<i class="fa fa-heart"></i> 
					</div>
					<button class="btn btn-block btn-warning">Pon en adopción</button>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="<?= BASEURL ?>pet/new/located"<? if(USER) : ?>in-modal="new-located"<? endif; ?> requiere-login>
					<div class="giant-makers giant-makers-success">
						
						<i class="fa fa-map-marker"></i>
						<i class="fa fa-flag"></i> 
					</div>
					<button class="btn btn-block btn-success">¿Encontraste una mascota?</button>
				</a>
			</div>
		
		</div>
	</div>
</div>