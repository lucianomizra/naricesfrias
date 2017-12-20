<?php if( !(isset($html) && !$html) ) $this->load->view('common/html') ?>
<main id="main" class="theme section-<?= str_replace('/', '__', $section) ?> ns-<?= $this->namespace ?>">
	<?php if( !(isset($header) && !$header) ) $this->load->view('components/common/header'); ?>

	<?php if($this->namespace == 'application'): ?>
		<div class="app-template app-main">
			<div class="app-main-content">
				<div class="container">
					<? $this->load->view( 'components/user/dashboard-breadcrumbs' ); ?>
					<div class="clearfix"></div>
					<div data-animate-in="fadeInDown,300,fast,100">
						<? $this->load->view( 'section/' . $this->data['section'] ); ?>
					</div>
				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="app-template app-main">
			<div class="app-main-content">
				<? $this->load->view( 'section/' . $this->data['section'] ); ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ($toast = $this->session->flashdata('flash_toast')): ?>
		<script>
			$(document).ready(function() {			  
				toastr['<?= $toast['type'] ?>']('<?= $toast['subtitle'] ?>', '<?= $toast['title'] ?>');
			});
		</script>
	<?php endif ?>

	<div id="data"
		 data-user="<?= $this->user ? $this->user->id_user : '' ?>"
		 data-url="<?= base_url(); ?>"
		 data-layout="<?= layout() ?>"
		 data-section="<?= $this->data['section']; ?>" ></div>
</main>
<?php if( !(isset($footer) && !$footer) ) $this->load->view('components/common/footer') ?>
<?php if( ! $this->user ) $this->load->view('components/modals/sign') ?>
<?php if( !(isset($html) && !$html) ) $this->load->view('common/close-body') ?>
