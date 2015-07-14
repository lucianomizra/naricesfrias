<? if(!USER) view('modals/sign') ?>
<header>
	<div class="container">
		<a href="<?= BASEURL ?>" class="app-logo"><figure><img src="<?= ASSETS ?>imgs/logo.png" alt="Naricesfrias.org"></figure></a>
		<nav class="pull-right">
			<ul class="list-inline text-center principal-nav">
				<li><a href="<?= BASEURL ?>">Inicio</a></li>
				<li><a href="<?= BASEURL ?>pet/all">Mascotas</a></li>
				<li><a href="<?= BASEURL ?>blog">Blog</a></li>
				<li><a href="<?= BASEURL ?>comunidad">Comunidad</a></li>
				<? if(!USER) : ?>
				<li><a data-toggle="modal" data-target="#sign-modal" href="#signin">Login</a></li>
				<li><a data-toggle="modal" data-target="#sign-modal" href="#signup">Registro</a></li>
				<? else: ?>
				<li class="active"><a href="<?= BASEURL ?>user/account"><?= $user_name ?> <i class="fa fa-gear"></i></a></li>
				<li class="active" style="margin-left: -10px;"><a href="<?= BASEURL ?>user/logout"><i class="fa fa-sign-out"></i></a></li>
				<? endif; ?>
			</ul>
		</nav>
	</div>
</header>

<div id="main-content">