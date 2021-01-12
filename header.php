<?php
$site = '6LcRuNAUAAAAADtamJW75fYf8YtNHceSngjKsf-B';
$scrt = '6LcRuNAUAAAAALBu7Ymh0yxmTXTJmP0rsnkjGyj0';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <?php wp_head(); ?>

  <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>

	<view id="load" class="load">
			<div class="circle"></div>
	</view>
  <div class="redDot header_activator"></div>
  <header class="header Obse" id="header" data-observe=".header_activator">
    <a href="<?php echo site_url(); ?>" class="logo">
      <?php include 'assets/logo_horizontal.svg' ?>
    </a>
    <?php
    $args = array(
      'theme_location' => 'nav_bar',
      'depth' => 0,
      'container'	=> false,
      'fallback_cb' => false,
      'menu_class' => 'nav_bar',
    );
    ?>
    <menu class="nav_bar_menu"><?php wp_nav_menu($args); ?></menu>
  </header>