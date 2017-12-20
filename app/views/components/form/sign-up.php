		<h2 class="text-center m-b-1">Registrate</h2>
		<form action="<?= base_url('user/auth/register') ?>" class="ajaxForm">
		  <div class="form-group">
		    <div class="form-group"><input name="name" type="firstname" class="form-control" placeholder="Nombre"></div>
		    <div class="form-group"><input name="lastname" type="lastname" class="form-control" placeholder="Apellido"></div>
		    <div class="form-group"><input name="mail" type="email" class="form-control"" placeholder="Mail"></div>
		    <div class="form-group"><input name="password" type="password" class="form-control" placeholder="Contraseña"></div>
			<div class="checkbox" style=" padding-top: 7px; ">
			  <label name="terms">
			    <input type="checkbox" name="terms" value="1"> Acepto los <a href="<?= base_url() ?>terminos">Términos y Condiciones</a>
			  </label>
			</div>
			<button class="btn btn-primary btn-block">Registrarme</button>
		  </div>
		</form>