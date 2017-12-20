<div class="card">
	
	<a class=" pet-card block status-<?= $pet->status ?>" href="<?= $pet->full_link ?>">

	  <img class="w100 " src="<?= $this->PetM->Thumb($pet->file) ?>" alt="Card image cap">
		<span class="status"><?= $pet->status_title ?></span>
	  <span class="card-block block">
	    <h4 class="card-title"><?= $pet->name ?></h4>
	    <p class="card-text"><?= $pet->description ?></p>
	  </span>
	</a>
	<?php if ($this->user && $this->user->id_user == $pet->id_user): ?>
		<span class="card-footer block text-xs-right">
			<a href="<?= base_url('pet/edit/'.$pet->id_pet) ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Editar</a>
		</span>
	<?php endif ?>

</div>
