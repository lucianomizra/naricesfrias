<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= isset($description) ? $description : 'Busca, publica y adopta mascotas, podemos ayudarlas' ?>">
    <link rel="icon" href="<? echo ASSETS ?>imgs/favicon.png">
    <link rel="stylesheet" type="text/css" href="<? echo ASSETS ?>css/dropzone.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='https://api.tiles.mapbox.com/mapbox.js/v2.2.1/mapbox.css' rel='stylesheet' />
    <? /* if (isset($css)): ?>
      <? foreach ($css as $_css): ?>
      <link href="<? echo ASSETS ?>/css/<? echo $_css ?>?<?= VERSION ?>" rel="stylesheet">
      <? endforeach ?>
    <? endif*/ ?>
    
    <link rel="stylesheet" type="text/css" href="<? echo ASSETS ?>css/main.css?<?= VERSION ?>" rel="stylesheet">


    <script src='https://api.tiles.mapbox.com/mapbox.js/v2.2.1/mapbox.js'></script>


    <title><?= isset($title) ? $title.' ' : '' ?>Naricesfrias.org</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- arreglos -->
    <style>
    .widget-slider * {height: 100%; width: 100%; background: black; } button.close {z-index: 99999; }
    </style>
  </head>

<body id="<?= NPAGE ?>">