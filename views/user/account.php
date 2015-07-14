
<div class="jumbotron primary">
	<div class="container">
		<h1><i class="fa fa-gear"></i> Mi cuenta</h1>
		<p>Aquí podrás gestionar tus datos personales y tus mascotas publicadas en nuestra aplicación.</p>
	</div>
</div>
<div id="account" class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default pets-panel">
				<div class="panel-heading">
				<h1><i class="fa fa-paw"></i> Mis mascotas</h1>
				</div>
				<div class="list-group pets-list">
					<? 
					if( count($pets) ) :
					foreach ($pets as $key =>$pet) : ?>
					<a href="<?= BASEURL ?>pet/<?= $pet['id'] ?>" in-modal="pets-profile-<?= $pet['id'] ?>" class="list-group-item <?= $pet['status'] ?>">
					  <? if(isset($pet['img'])): ?><figure class="list-group-figure"><img src="<?= UPLOADSDIR.$pet['img'] ?>"></figure><? endif; ?>
					  <h4 class="list-group-item-heading"><?= $pet['name'] ?></h4>
					  <p class="list-group-item-text"><?= $pet['description'] ?></p>
					</a>
					<? endforeach;
					else: ?>
						<p class="h3 text-center">Sin mascotas</p>
					<? endif; ?>
				</div>

			</div>
		</div>
		<div class="col-sm-6">
			<!-- <h2>Opciones</h2> -->
		</div>
	</div>
</div>