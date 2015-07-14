<div class="modal-header header-<?= $pet_status ?>">
	<h1 class="text-center"><?= $title ?></h1>
</div>
<div class="modal-body">
	<form action="<?= isset($pet->id) ? BASEURL.'pet/update/'.$pet->id : BASEURL.'pet/create' ?>" id="new-pet-form" by-ajax loading-in=".modal.in">

	  <input type="hidden" name="status_id" value="<?= $status_id ?>">
	  <div class="form-group">
	    <input type="name" name="name" class="form-control" placeholder="Responde a" value="<?= isset($pet->name) ? $pet->name : '' ?>">
	  </div>
	  <div class="form-group">
	  	<label for="races_id">Seleccione una raza:</label>
	    <select name="races_id" id="races_id" class="form-control">
	    	<option value="1" <?= (isset($pet->pets_races) && $pet->pets_races['id'] == 1) ? 'selected="selected"' : '' ?>>Chihuahua</option>
	    	<option value="2" <?= (isset($pet->pets_races) && $pet->pets_races['id'] == 2) ? 'selected="selected"' : '' ?>>Doberman</option>
	    	<option value="3" <?= (isset($pet->pets_races) && $pet->pets_races['id'] == 3) ? 'selected="selected"' : '' ?>>Labrador</option>
	    	<option value="4" <?= (isset($pet->pets_races) && $pet->pets_races['id'] == 4) ? 'selected="selected"' : '' ?>>Otro</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <textarea class="form-control" name="description" placeholder="Mensaje al publico"><?= isset($pet->description) ? $pet->description : '' ?></textarea>
	  </div>

	  <div class="form-group">
		  <div class="dropzone" data-action="<?= BASEURL ?>pet/upload_pictures">
		  	<? if( isset($pet->pets_pictures) && count($pet->pets_pictures) ) :
		  		foreach ($pet->pets_pictures as $i => $pic) :
		  	?>
		  		<div class="dz-preview dz-processing dz-image-preview dz-complete">
		  			<div class="dz-image"><img data-dz-thumbnail="" src="<?= UPLOADSDIR.$pic['img'] ?>" alt="<?= $pic['title'] ?>"></div>
		  			<a class="dz-remove" onclick="$(this).parent().remove();" data-dz-remove="">Eliminar</a>
		  			<input type="hidden" name="pictures[]" value="<?= $pic['img'] ?>">
		  			</div>
		  	<? endforeach; ?>
		  	<? endif; ?>
		  	<? if(isset($pet->id)) : ?><div class="dz-default dz-message"></div><? endif ?>
		  </div>
	  </div>

	  <div class="form-group">
		<button class="btn btn-primary btn-block btn-lg btn-<?= $pet_status ?>" type="submit"><?= $btn ?></button>
	  </div>
	</form>
</div>
