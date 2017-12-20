<div class="list full-height">

	<div class="card card-info">
		<div class="card-body">
		<form action="<?= base_url('pets') ?>" method="get">
			<div class="row">
			  <div class="form-group col-md-4">
				<select name="id_status" class="selectpicker select_status w100" data-show-subtext="" data-live-search="true" title="Estado">
					<option data-hidden="true"></option>
					<?php foreach ($pet_statues as $key => $value): ?>
						<option
						<?php if ($this->input->get('id_status')==$value->id_status): ?>
							selected
						<?php endif ?>
						 value="<?= $value->id_status ?>"><?= $value->title ?></option>
					<?php endforeach ?>
				</select>
			  </div>
			  <div class="form-group col-md-4">
				<select name="id_type" class="selectpicker select_types w100" data-show-subtext="" data-live-search="true" title="Especie">
					<option>Ninguno</option>
					<?php foreach ($pet_types as $key => $value): ?>
						<option
						<?php if ($this->input->get('id_type')==$value->id_type): ?>
							selected
						<?php endif ?>
						 data-id-type="<?= $value->id_type ?>" value="<?= $value->id_type ?>"><?= $value->type ?></option>
					<?php endforeach ?>
				</select>
			  </div>
			  <div class="form-group none select_races_cont col-md-4">
				<select name="id_race" class="selectpicker select_races w100" data-live-search="true" title="Raza">
					<?php foreach ($pet_races as $key => $value): ?>
						<option
						<?php if ($this->input->get('id_race')==$value->id_race): ?>
							selected
						<?php endif ?>
						 data-id-type="<?= $value->id_type ?>" value="<?= $value->id_race ?>"><?= $value->race ?></option>
					<?php endforeach ?>
				</select>
			  </div>
			
			   <div class="clearfix"></div>
			  <div class="form-group col-md-8">
	    		<input type="text" name="name" placeholder="Responde al nombre de" class="form-control" value="<?= $this->input->get('name') ?>">
			  </div>
			  <div class="col-md-4">	
				  <button class="btn btn-primary" type="submit">Buscar</button>
		  			<a class="btn btn-secondary" href="<?= base_url('pets') ?>" type="reset">Borrar búsqueda</a>
			  </div>
				
			</div>
		</form>
		</div>
	</div>

	<?php if ($this->user): ?>
		<div class="text-xs-right">
		    <a href="<?= base_url('pet/publish') ?>" class="btn btn-primary"><span class="fa fa-plus"></span> Publicar mascota</a>
		</div>
	<?php endif ?>
	<div class="row masonry m-t-2">
		<div class="col-md-4 col-xs-12 masonry-sizer"></div>
		<?php foreach ($pets as $key => $pet): ?>
			<article class="col-md-4 col-xs-12 masonry-item">
				<? $this->load->view('components/pet/pet_card', ['pet'=>$pet]) ?>
			</article>
		<?php endforeach ?>
		<div class="clearfix"></div>
	</div>
</div>