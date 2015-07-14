<div class="row">
	<div class="col-sm-6 border-right">
		<h2 class="text-center">Ingresá</h2>
		<form action="<?= URL ?>user/sign_in" id="sign-in-form" by-ajax loading-in="#sign-modal">
		  <div class="form-group">
		    <input type="email" name="email" class="form-control" id="email-in" placeholder="Mail">
		  </div>
		  <div class="form-group">
		    <input type="password" name="password" class="form-control" id="password-in" placeholder="Contraseña">
		  </div>
		  <div class="form-group">
			<button class="btn btn-primary btn-block" type="submit">Iniciar Sesión</button>
		  </div>
		</form>
		<div class="form-group">
			<h3>También podés ingresar con:</h3>
			<div class="form-group">
				<button class="btn btn-facebook btn-block"><i class="fa fa-facebook"></i> Facebook</button>
			</div>
			<div class="form-group">
				<button class="btn btn-twitter btn-block"><i class="fa fa-twitter"></i> Twitter</button>
			</div>
		</div>

	</div>

	<div class="col-sm-6">
    	<div class="border-top visible-xs"></div>
		<h2 class="text-center">Registrate</h2>
		<form action="<?= URL ?>user/sign_up" id="sign-up-form" by-ajax loading-in="#sign-modal">
		  <div class="form-group">
		    <div class="form-group"><input name="first_name" type="firstname" class="form-control" id="name-up" placeholder="Nombre"></div>
		    <div class="form-group"><input name="last_name" type="lastname" class="form-control" id="lastname-up" placeholder="Apellido"></div>
		    <div class="form-group"><input name="email" type="email" class="form-control" id="email-up" placeholder="Mail"></div>
		    <div class="form-group"><input name="password" type="password" class="form-control" id="passd-up" placeholder="Contraseña"></div>
			<div class="checkbox" style=" padding-top: 7px; ">
			  <label name="terms">
			    <input type="checkbox" name="terms"> Acepto los <a href="<?= URL ?>terminos">Términos y Condiciones</a>
			  </label>
			</div>
			<button class="btn btn-primary btn-block">Registrarme</button>
		  </div>
		</form>
	</div>
</div>