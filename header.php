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


      <template id="simpla">
        <article class="simpla">
          <div class="simpla_share rowcol1" onclick="altClassFromSelector('visible', '.post-<?php // echo get_the_ID(); ?> .social_sharing_container')">
            <?php // include get_template_directory_uri() . '/inc/social_sharing.php'; ?>
            <svg class="simpla_share_icon" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 50 50">
              <use xlink:href="#share_svg"></use>
            </svg>
          </div>
          <a href="" class="simpla_amg rowcol1">
            <img class="simpla_img" loading="lazy" src="" alt="">
          </a>
          <div class="simpla_caption">
            <div class="simpla_date_cat">
              <time class="simpla_date"></time>
              <p class="simpla_cat">
                <?php // foreach ($args['categories'] as $key => $value) { ?>
                  <a href=""></a>
                <?php // } ?>
              </p>

            </div>
            <h5>
              <a class="simpla_title" href=""></a>
            </h5>
            <div class="simpla_foot">
              <author class="simpla_author">Por <span class="simpla_author_name"></span></author>
              <div class="simpla_r_time">
                <?php include get_template_directory() . '/assets/clock.svg'; ?>
                <p><span class="simpla_reading_time"></span>’</p>
              </div>
            </div>
          </div>
        </article>
      </template>




</head>
<body <?php body_class(); ?>>

	<view id="load" class="load"></view>

  <div class="all_icons" style="display:none">
    <?php include 'assets/all_icons.php' ?>
  </div>
  <!-- <div class="redDot body_activator" data-clase="header_big"></div> -->
  <!-- <div class="redDot body_activator" data-clase="header_deployed"></div> -->
  <header class="header">
    <a class="logo" href="<?php echo site_url(); ?>">
      <?php include 'assets/logo_horizontal.svg' ?>
    </a>
    <menu class="nav_bar_menu">
      <?php
      $args = array(
        'theme_location' => 'nav_bar',
        'depth' => 0,
        'container'	=> false,
        'fallback_cb' => false,
        'menu_class' => 'nav_bar',
      );
      wp_nav_menu($args); ?>
      <nav class="nav_bar_cat onlyMobileG">
        <p class="ticon_title">Explorar categorías:</p>
      <?php
      $categories = get_categories( array(
          'orderby' => 'name',
          'order'   => 'ASC'
      ));
      foreach( $categories as $category ) { ?>
        <p class="nav_categories_item">
          <a href="<?php echo get_term_link($category->term_id); ?>">- 
            <?php echo $category->name; ?>
          </a>
        </p>
      <?php } ?>
      </nav>
    </menu>

    <button class="burger" onclick="altClassFromSelector('mobile_menu_active', '.header')">
      <div class="burgerBar"></div>
      <div class="burgerBar"></div>
      <div class="burgerBar"></div>
    </button>
  </header>

  <nav class="nav_categories only_over_992_G">
    <!-- <nav class="nav_categories Carousel onlyDesktopG"> -->
    <!-- <div class="nav_categories_container rowcol1 Element"> -->
    <?php
    $i = 0;
    foreach( $categories as $category ) {
      if ( $i != 0 and $i % 3 == 0) { ?>
        <!-- </div> -->
        <!-- <div class="nav_categories_container rowcol1 Element"> -->
      <?php } ?>
      <p class="nav_categories_item">
        <a href="<?php echo get_term_link($category->term_id); ?>">
          <?php echo $category->name; ?>
        </a>
      </p>
    <?php $i += 1; } ?>
    <!-- </div> -->
    <!-- <p class="menu-item prenex prenex_next nextButton more_btn"> -->
      <!-- <span>Más categorías →</span> -->
    <!-- </p> -->
  </nav>
