<form action="<?= base_url('pet/post') ?>" class="ajaxForm">
	<div class="card ">
		<div class="card-header card-primary">
			<?php if ($pet): ?>
			<i class="fa fa-pencil"></i> Editar Mascota
			<?php else: ?>
			<i class="fa fa-thumb-tack"></i> Publicar Mascota
			<?php endif ?>
		</div>
		<div class="card-body">
			
			<div class="boxMenssages"></div>

				<fieldset class="form-group">
					<legend>¿Cuál es el estado de la mascota? <span class="text-danger">*</span></legend> 
					
					<?php foreach ($pet_statues as $key => $value): if($key>=3&&!$pet) break; ?>
						<div class="form-group">
							<label class="custom-control custom-radio">
							  <input value="<?= $value->id_status ?>" <?php if ($pet && $pet->id_status == $value->id_status): ?> checked<?php endif ?> name="id_status" type="radio" class="custom-control-input ">
							  <span class="custom-control-indicator"></span>
							  <span class="custom-control-description"><?= $value->details ?></span>
							</label>
						</div>
					<?php endforeach ?>
					
					<span class="showError" data-field="id_status"></span>
				</fieldset>

				<div class="row">
					<fieldset class="col m-a-2 m-t-1">
						<legend>¿Qué especie es? <span class="text-danger">*</span></legend>
						
						<select name="id_type" class="selectpicker select_types" data-show-subtext="true" data-live-search="true" title="Seleccionar">
							<option data-hidden="true"></option>
							<?php foreach ($pet_types as $key => $value): ?>
								<option <?php if ($pet && $pet->id_type == $value->id_type): ?> selected <?php endif ?> data-id-type="<?= $value->id_type ?>" value="<?= $value->id_type ?>"><?= $value->type ?></option>
							<?php endforeach ?>
						</select>
						
						<span class="showError" data-field="id_type"></span>
					</fieldset>
					<fieldset class="col m-a-2 m-t-1 none select_races_cont">
						<legend>¿Qué raza es?</legend>
						
						<select name="id_race" class="selectpicker select_races" data-show-subtext="true" data-live-search="true" title="Seleccionar">
							<option data-hidden="true"></option>
							<?php foreach ($pet_races as $key => $value): ?>
								<option <?php if ($pet && $pet->id_race == $value->id_race): ?> selected <?php endif ?> data-id-type="<?= $value->id_type ?>" value="<?= $value->id_race ?>"><?= $value->race ?></option>
							<?php endforeach ?>
						</select>

						<span class="showError" data-field="id_race"></span>
					</fieldset>
				</div>

				<fieldset class="form-group">
					<legend>¿Qué genero es? <span class="text-danger">*</span></legend>
					
					<select name="gender" class="selectpicker select_gender" title="Seleccionar">
						<option data-hidden="true"></option>
						<option <?php if ($pet && $pet->gender == 'Macho'): ?> selected <?php endif ?> value="m">Macho</option>
						<option <?php if ($pet && $pet->gender == 'Hembra'): ?> selected <?php endif ?> value="f">Hembra</option>
					</select>

					<span class="showError" data-field="gender"></span>
				</fieldset>


				<fieldset class="form-group">
					<legend>Detalles</legend>
				
				  <div class="form-group">
				    <label for="inputPassword4">¿Responde a algún nombre?</label>
				    <input type="text" name="name" class="form-control" <?php if ($pet && $pet->name): ?> value="<?= $pet->name ?>" <?php endif ?>>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword4">Descripción, detalles o cualquier dato que pueda servir: <span class="text-danger">*</span></label>
				    <textarea name="description" class="form-control" rows="10"> <?php if ($pet && $pet->name): ?><?= $pet->description ?><?php endif ?></textarea>
				  </div>
					
				</fieldset>

				<fieldset class="form-group">
					<legend>Fotos</legend>

				  <div class="form-group">
					  <div class="dropzone" data-action="<?= base_url() ?>upload">
					  	<? if( isset($pet->gallery) && count($pet->gallery) ) :
					  		foreach ($pet->gallery as $i => $g) :
					  	?>
					  		<div class="dz-preview dz-processing dz-image-preview dz-complete">
					  			<div class="dz-image"><img data-dz-thumbnail="" src="<?= thumb($g->file,250,250) ?>"></div>
					  			<a class="dz-remove" onclick="$(this).parent().remove();" data-dz-remove="">Eliminar</a>
					  			<input type="hidden" name="pictures[]" value="<?= $g->id_file ?>">
					  			</div>
					  	<? endforeach; ?>
					  	<? endif; ?>
					  	<? if(isset($pet->id)) : ?><div class="dz-default dz-message"></div><? endif ?>
					  </div>
				  </div>
					
				</fieldset>

				<fieldset class="form-group">

					<legend class="none" data-status="1">¿Donde se adopta?</legend>
					<legend class="none" data-status="2">¿Donde la encontró?</legend>
					<legend class="none" data-status="3">¿Donde la perdió?</legend>

					<div class="select-location">
				    <input type="text" id="input_keyword" name="location_keyword" value="<?= $pet&&$pet->location_keyoword ? $pet->location_keyoword : '' ?>" class="form-control m-b-1" placeholder="Busca una dirección">
						<!-- <input id="pac-input" class="controls" type="text" placeholder="Search Box"> -->
						<div id="select-location-map" class="map" style="height:450px;"></div>
						<small>*Puedes arrastrar el punto para lograr una ubicación más exacta.</small>
						<div class="clearfix"></div>
					</div>
					<input type="hidden" id="input_select_location_lat" name="lat" <?php if ($pet && isset($pet->lat)): ?>value="<?= $pet->lat ?>"<? else: ?>value="<?= $this->user->lat ?>"<? endif; ?>>
					<input type="hidden" id="input_select_location_lng" name="lng" <?php if ($pet && isset($pet->lng)): ?>value="<?= $pet->lng ?>"<? else: ?>value="<?= $this->user->lng ?>"<? endif; ?>>
								
				</fieldset>

		</div>
		<div class="card-footer">
			<div class="text-xs-right">
				<?php if ($pet): ?>
					<input type="hidden" name="id_pet" value="<?= $pet->id_pet ?>">
				<button class="btn btn-primary" type="submit">Guardar cambios</button>
				<?php else: ?>
				<button class="btn btn-primary" type="submit">Finalizar publicación</button>
				<?php endif ?>
			</div>
		</div>
	</div>
</form>