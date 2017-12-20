		<h2 class="text-center m-b-1">Ingresá</h2>
		<form action="<?= base_url('user/auth/login') ?>" class="ajaxForm">
		  <div class="form-group">
		    <input type="email" name="mail" class="form-control" placeholder="Mail">
		  </div>
		  <div class="form-group">
		    <input type="password" name="password" class="form-control" placeholder="Contraseña">
		  </div>
		  <div class="form-group">
			<button class="btn btn-primary btn-block" type="submit">Iniciar Sesión</button>
		  </div>
		</form>
		<div class="form-group">
			<div class="text-xs-center relative">
				<div class="login-outher"><span>O ingresa con</span></div>
			</div>
			<div class="form-group">
				<button class="btn btn-facebook btn-block"><i class="fa fa-facebook"></i> Facebook</button>
			</div>
		</div>