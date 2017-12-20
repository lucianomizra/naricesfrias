<div id="map-content">
<div class="map-search">
	<h2 class="m-b-2"><i class="fa fa-search"></i> Buscar mascotas</h2>

	<form action="<?= base_url('') ?>" method="get">
	  <div class="form-group">
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
	  <div class="form-group">
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
	  <div class="form-group none select_races_cont">
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

	  <div class="form-group">
	    <input type="text" name="name" placeholder="Responde al nombre de" class="form-control" value="<?= $this->input->get('name') ?>">
	  </div>
	  <div class="pull-left">	
		  <a class="btn btn-info" href="<?= base_url() ?>" type="reset">Borrar búsqueda</a>
	  </div>
	  <div class="pull-right">	
		  <button class="btn btn-primary" type="submit">Buscar</button>
	  </div>
	</form>
</div>
<div class="pets-map">
	<div id="map" class="map"></div>
	<div id="map-all-data" class="none"><?= json_encode($pets) ?></div>
</div>

</div>