<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($description)): ?>
        <meta name="description" content="<?php echo $description ?>">
    <?php endif ?>
    <?php if (isset($keywords)): ?>
        <meta name="keywords" content="san rafael, <?php echo $keywords ?>">
    <?php endif ?>
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="<?php echo base_url() ?>js/bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>js/bootstrap/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/admin/tid_base.css" rel="stylesheet">
    <?php if (isset($css)): ?>
        <?php foreach ($css as $var): ?>
            <link type="text/css" href="<?php echo base_url() . $var ?>.css" rel="stylesheet" />
        <?php endforeach ?>
    <?php endif; ?>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body>


     

