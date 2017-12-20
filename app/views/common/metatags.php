<?php if( isset($headers) && $headers ):?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title id="head-title"><?= $headers->title ?></title>
	<meta name="keywords" content="<?= $headers->keywords ?>" >
	<meta name="description" content="<?= $headers->description ?>">
	<meta property="og:title" content="<?= $headers->facebook_title ?>" >
	<meta property="og:site_name" content="<?= $headers->title ?>">
	<meta property="og:description" content="<?= $headers->facebook_text ?>" >
	<meta property="og:image" content="<?= $headers->image ?>" >
	<meta property="fb:app_id" content="<? $fb_keys = $this->config->item('facebook', 'api_keys'); echo $fb_keys['app_id'] ?>" >
	<meta property="og:type" content="website" >
	<meta property="og:locale" content="es_AR" >
	<?php if (isset($headers->article) && $headers->article): ?>
	<meta property="article:published_time" content="<?= $headers->article['published_time'] ?>" >
	<meta property="article:modified_time" content="<?= $headers->article['modified_time'] ?>" >
	<meta property="article:author" content="<?= $headers->article['author'] ? $headers->article['author'] : $this->config->item('default-author', 'header'); ?>" >
	<meta property="article:section" content="<?= $headers->article['section'] ?>" >
	<meta property="article:tag" content="<?= $headers->article['tag'] ?>" >
	<?php endif ?>
	<meta property="twitter:card" content="summary" >
	<meta property="twitter:title" content="<?= $headers->title ?>" >
	<meta property="twitter:description" content="<?= $headers->twitter_text ?>" >
	<meta property="twitter:image" content="<?= $headers->image ?>" >
	<meta property="twitter:image:alt" content="<?= $headers->title ?>" >
	<?php if (isset($headers->canonical) && $headers->canonical): ?>
	<meta property="og:url" content="<?= $headers->canonical ?>" >
	<meta property="twitter:url" content="<?= $headers->canonical ?>" >
	<link rel="canonical" href="<?= $headers->canonical ?>" />
	<?php endif ?>
<?php endif; ?>
<?php if(isset($section) && $section == '404'):?>
	<meta name="robots" content="noindex,follow">
<?php else: ?>
	<meta name="robots" content="index,follow">
<?php endif ?>
