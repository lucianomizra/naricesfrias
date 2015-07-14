<div class="slide-pets widget-slider">
    <div u="slides" class="slider-container">
        <? foreach ($pets as $i => $pet) : 
        if(file_exists_2(UPLOADSDIR.$pet['img'])): ?>
    		<div class="slide-pet slide-<?= $pet['status'] ?>"><a href="<?= BASEURL ?>pet/<?= $pet['id'] ?>" in-modal="pets-profile-<?= $pet['id'] ?>" in-modal-url="<?= BASEURL ?>pet/<?= $pet['id'] ?>">
    			<figure><img src="<?= UPLOADSDIR.$pet['img'] ?>" alt="<?= $pet['name'] ?>"></figure>
    		</a></div>
    	<? endif; endforeach; ?>
    </div>
</div>