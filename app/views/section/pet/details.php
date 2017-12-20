<div class="card pet-details">
	<div class="card-body">
		<div class="row">
			<?php if ($pet->gallery): ?>
				<div class="col-xs-12">
					<div class="<?php if (count($pet->gallery)>1): ?>swiper-container<?php endif ?>">
				    <!-- Additional required wrapper -->
				    <div class="swiper-wrapper">
				    	<?php foreach ($pet->gallery as $key => $s): ?>
				        <div class="swiper-slide"><img src="<?= thumb($s->file,1110,400,false) ?>" alt=""></div>
				    	<?php endforeach ?>
				    </div>
				    <div class="swiper-pagination"></div>
				  </div>
				</div>
			<?php endif ?>
			<div class="col-sm-12 p-b-2">
				<hr>
			</div>
			<div class="col-sm-6">
				<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a3a49f6919954a9"></script>
				 <div class="addthis_inline_share_toolbox"></div>
				<p>
				

					<div class="h3">Datos de la mascota</div>
					<strong>Responde a:</strong> <?= $pet->name ?> <br>
					<strong>Especie:</strong> <?= $pet->type ?> <br>
					<strong>Raza:</strong> <?= $pet->race ?> <br>
					<strong>Genero:</strong> <?= $pet->gender ?> <br>
					<strong>Publicado el:</strong> <?= human_date2($pet->created_at) ?> <br>
					<?php if ($pet->updated_at): ?>
						<strong>Actualizado el:</strong> <?= human_date2($pet->updated_at) ?> <br>
					<?php endif ?>

					<strong>Descripción:</strong>
					<p>
						<?= $pet->description ?>
					</p>
				</p>
				<p>
					<div class="h3">Datos del contacto</div>
					<?php if ( isset($user->first_name) && $user->first_name ): ?>
						<strong>Nombre:</strong> <?= $user->first_name ?> <br>
					<?php endif ?>
					<?php if ( isset($user->last_name) && $user->last_name ): ?>
						<strong>Apellido:</strong> <?= $user->last_name ?> <br>
					<?php endif ?>
					<?php if ( isset($user->mail) && $user->mail ): ?>
						<strong>Mail:</strong> <?= $user->mail ?> <br>
					<?php endif ?>
					<?php if ( isset($user->phone) && $user->phone ): ?>
						<strong>Teléfono:</strong> <?= $user->phone ?> <br>
					<?php endif ?>

					<?php if ( !isset($user->phone) && !isset($user->mail) ): ?>
						<p>
							El usuario no quiere compartir ningun dato de contacto, podes contactar directo con un administrador de NaricesFrias. <a href="<?= base_url('contacto') ?>">Click alquí</a>
						</p>
					<?php endif ?>

				</p>
			</div>
			<div class="col-sm-6">
				<div class="map-marker" data-lng="<?= $pet->lng ?>" data-lat="<?= $pet->lat ?>">
					<div id="fixed-map" style="height:450px"></div>
				</div>
			</div>
		</div>
	</div>
	<?php if ($this->user && $this->user->id_user == $pet->id_user): ?>
		<span class="card-footer block text-xs-right">
			<a href="<?= base_url('pet/edit/'.$pet->id_pet) ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Editar</a>
		</span>
	<?php endif ?>
</div>