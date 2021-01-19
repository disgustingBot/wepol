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
  <div class="all_icons" style="display:none">
    <?php include 'assets/all_icons.php' ?>
  </div>
  <div class="redDot header_activator"></div>
  <header class="header Obse" id="header" data-observe=".header_activator">
    <div class="header_elements_container">
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
      <menu class="nav_bar_menu">
        <?php wp_nav_menu($args); ?>
      </menu>

      <button class="burger" onclick="altClassFromSelector('mobile_menu_active', '#header')">
        <div class="burgerBar"></div>
        <div class="burgerBar"></div>
        <div class="burgerBar"></div>
      </button>
    </div>
  </header>



  <?php
  $i = 0;
  $categories = get_categories( array(
      'orderby' => 'name',
      'order'   => 'ASC'
  ) );
  ?>
  <nav class="nav_categories">
    <?php foreach( $categories as $category ) { ?>
      <p class="nav_categories_item">
        <a href="<?php echo get_term_link($category->term_id); ?>">
          <?php echo $category->name; ?>
        </a>
      </p>
    <?php } ?>
  </nav>
