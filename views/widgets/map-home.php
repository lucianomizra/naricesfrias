<div id="map-content">
<div class="map-search">
	<h2><i class="fa fa-search"></i> Buscar mascotas</h2>

	<form action="<?= BASEURL ?>home/search" method="post">
	  <div class="form-group">
	    <select name="status_id" id="races_id" class="form-control">
	    	<option value="">Estado</option>
	    	<option value="3">Perdida</option>
	    	<option value="1">En adopción</option>
	    	<option value="2">Encontrada</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <select name="races_id" id="races_id" class="form-control">
	    	<option value="">Raza</option>
	    	<option value="1">Chihuahua</option>
	    	<option value="2">Doberman</option>
	    	<option value="3">Labrador</option>
	    	<option value="4">Otro</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <input type="text" name="name" placeholder="Responde a" class="form-control">
	  </div>
	  <div class="pull-right">	
		  <button class="btn btn-primary" type="submit">Buscar</button>
	  </div>
	</form>
</div>

<div id="map"></div>
</div>