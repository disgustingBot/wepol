<?php
$site = '6LdjfoEaAAAAABvZvcpj1DkuySF5DVeXSQ0mUbjf';
$scrt = '6LdjfoEaAAAAAPtLYImMO__2eadmy5qj_SBy_amg';
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

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-W57M2ZK');</script>
  <!-- End Google Tag Manager -->
  <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $site; ?>"></script>

</head>
<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W57M2ZK"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

	<view id="load" class="load"></view>

  <div class="all_icons" style="display:none">
    <?php include 'assets/all_icons.php' ?>
  </div>
  <!-- <div class="redDot body_activator" data-clase="header_big"></div> -->
  <!-- <div class="redDot body_activator" data-clase="header_deployed"></div> -->
  <header class="header">
    <a class="logo" href="https://www.encuesta.com/">
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


  <nav class="nav_categories only_over_992_G"<?php if (is_front_page()) { ?> style="display:none"<?php } ?>>
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
