</div>
<footer>
	<div class="container">
		<nav>
			<ul>
				<li><a href="">Info</a></li>
				<li><a href="">Contactanos</a></li>
				<li><a href="">Quienes somos</a></li>
				<li><a href="">Legales</a></li>
				<li><a href="">naricesfrias.org 2015</a></li>
			</ul>
		</nav>
		
		<a href="<?= BASEURL ?>" class="app-logo"><figure><img src="<?= ASSETS ?>imgs/logo-big.png" alt="Naricesfrias.org"></figure></a>


	</div>
</footer>
<script src="//code.jquery.com/jquery-git2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="<?= ASSETS ?>js/dropzone.js"></script>
<script src="<?= ASSETS ?>js/app.js?v=<?= VERSION ?>"></script>
<script src="<?= ASSETS ?>js/map.js?v=<?= VERSION ?>"></script>
<script type="text/javascript">
	App.Init({url:'<?= URL ?>',assets:'<?= ASSETS ?>',user:'<?= USER ?>',page:'<?= NPAGE ?>'});

	<? if( !USER && get(0) == 'sign' ) : ?>
		$('#sign-modal').modal();
	<? endif; ?>
</script>

</body>