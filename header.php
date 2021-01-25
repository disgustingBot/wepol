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
<body <?php body_class('Obse'); ?> data-observe=".body_activator" data-obse-area="0px 0px -50% 0px">

  <?php
  $categories = get_categories( array(
      'orderby' => 'name',
      'order'   => 'ASC'
  ) );
  ?>
	<view id="load" class="load">
			<div class="circle"></div>
	</view>
  <div class="all_icons" style="display:none">
    <?php include 'assets/all_icons.php' ?>
  </div>
  <!-- <div class="redDot body_activator" data-clase="header_big"></div> -->
  <!-- <div class="redDot body_activator" data-clase="header_deployed"></div> -->
  <header class="header Obse" id="header" data-observe=".header_activator">
      <a class="logo" href="<?php echo site_url(); ?>">
        <?php include 'assets/logo_horizontal.svg' ?>
      </a>
      <?php
      // esto es el por qué hay que poner ; al final de la linea
      // si queres convinar las siguientes etiquetas de php dará error
      ?>
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
        <nav class="nav_bar_cat onlyMobileG">

        <?php foreach( $categories as $category ) { ?>
          <p class="nav_categories_item">
            <a href="<?php echo get_term_link($category->term_id); ?>">
              <?php echo $category->name; ?>
            </a>
          </p>
        <?php } ?>
        </nav>
      </menu>

      <button class="burger" onclick="altClassFromSelector('mobile_menu_active', '#header')">
        <div class="burgerBar"></div>
        <div class="burgerBar"></div>
        <div class="burgerBar"></div>
      </button>
  </header>

  <nav class="nav_categories Carousel onlyDesktopG">
    <div class="nav_categories_container rowcol1 Element">
    <?php
    $i = 0;
    foreach( $categories as $category ) {
      // algoritmo:
      // empezar abriendo un element
      // cada iteracion chequear el resto de $i / 4,
      if ( $i != 0 and $i % 3 == 0) {
        // si el resto es cero, cerrar el element y abrir otro
        echo '</div> <div class="nav_categories_container rowcol1 Element">';
      }
      ?>
        <p class="nav_categories_item">
          <a href="<?php echo get_term_link($category->term_id); ?>">
            <?php echo $category->name; ?>
          </a>
        </p>
      <?php
      $i += 1;
       ?>
    <?php } ?>
  </div>
  <p class="menu-item prenex prenex_next nextButton more_btn">
    <span>Más categorías</span>
    <?php echo standard_svg('arrow_right', 'more_btn_svg'); ?>
  </p>

  </nav>
