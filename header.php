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

      <?php
      $categories = get_categories( array(
          'orderby' => 'name',
          'order'   => 'ASC'
      ));
      foreach( $categories as $category ) { ?>
        <p class="nav_categories_item">
          <a href="<?php echo get_term_link($category->term_id); ?>">
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

  <nav class="nav_categories Carousel onlyDesktopG">
    <div class="nav_categories_container rowcol1 Element">
    <?php
    $i = 0;
    foreach( $categories as $category ) {
      if ( $i != 0 and $i % 3 == 0) { ?>
        </div>
        <div class="nav_categories_container rowcol1 Element">
      <?php } ?>
      <p class="nav_categories_item">
        <a href="<?php echo get_term_link($category->term_id); ?>">
          <?php echo $category->name; ?>
        </a>
      </p>
    <?php $i += 1; } ?>
    </div>
    <p class="menu-item prenex prenex_next nextButton more_btn">
      <span>Más categorías</span>
      <?php echo standard_svg('arrow_right', 'more_btn_svg'); ?>
    </p>
  </nav>


  <div class="telector">
    <svg class="telector_icon  sun" onclick="theme.select('light')" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 143.7c-61.8 0-112 50.3-112 112.1s50.2 112.1 112 112.1 112-50.3 112-112.1-50.2-112.1-112-112.1zm0 192.2c-44.1 0-80-35.9-80-80.1s35.9-80.1 80-80.1 80 35.9 80 80.1-35.9 80.1-80 80.1zm256-80.1c0-5.3-2.7-10.3-7.1-13.3L422 187l19.4-97.9c1-5.2-.6-10.7-4.4-14.4-3.8-3.8-9.1-5.5-14.4-4.4l-97.8 19.4-55.5-83c-6-8.9-20.6-8.9-26.6 0l-55.5 83-97.8-19.5c-5.3-1.1-10.6.6-14.4 4.4-3.8 3.8-5.4 9.2-4.4 14.4L90 187 7.1 242.5c-4.4 3-7.1 8-7.1 13.3 0 5.3 2.7 10.3 7.1 13.3L90 324.6l-19.4 97.9c-1 5.2.6 10.7 4.4 14.4 3.8 3.8 9.1 5.5 14.4 4.4l97.8-19.4 55.5 83c3 4.5 8 7.1 13.3 7.1s10.3-2.7 13.3-7.1l55.5-83 97.8 19.4c5.4 1.2 10.7-.6 14.4-4.4 3.8-3.8 5.4-9.2 4.4-14.4L422 324.6l82.9-55.5c4.4-3 7.1-8 7.1-13.3zm-116.7 48.1c-5.4 3.6-8 10.1-6.8 16.4l16.8 84.9-84.8-16.8c-6.6-1.4-12.8 1.4-16.4 6.8l-48.1 72-48.1-71.9c-3-4.5-8-7.1-13.3-7.1-1 0-2.1.1-3.1.3l-84.8 16.8 16.8-84.9c1.2-6.3-1.4-12.8-6.8-16.4l-71.9-48.1 71.9-48.2c5.4-3.6 8-10.1 6.8-16.4l-16.8-84.9 84.8 16.8c6.5 1.3 12.8-1.4 16.4-6.8l48.1-72 48.1 72c3.6 5.4 9.9 8.1 16.4 6.8l84.8-16.8-16.8 84.9c-1.2 6.3 1.4 12.8 6.8 16.4l71.9 48.2-71.9 48z"></path></svg>
    <svg class="telector_icon moon" onclick="theme.select('dark')" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M320 300.8c0-45.4-36.6-82.4-81.8-83.2-16.1-34.1-50.8-57.6-90.2-57.6-41.7 0-77.6 25.2-92.5 62.5C23 233.9 0 264.6 0 300.8 0 346.7 37.3 384 83.2 384h153.6c45.9 0 83.2-37.3 83.2-83.2zM236.8 352H83.2C54.9 352 32 329.1 32 300.8c0-27.5 21.8-49.8 49-51 4.9-32.7 32.9-57.8 67-57.8 35.8 0 64.8 27.8 67.5 62.9 6.5-3.1 13.6-5.3 21.3-5.3 28.3 0 51.2 22.9 51.2 51.2S265.1 352 236.8 352zm336.8-.8c-4.1-8.6-12.4-13.9-21.8-13.9-1.5 0-3 .1-4.6.4-7.7 1.5-15.5 2.2-23.2 2.2-67 0-121.5-54.7-121.5-121.9 0-43.7 23.6-84.3 61.6-106 8.9-5.1 13.6-15 11.9-25.1-1.7-10.2-9.4-17.9-19.5-19.8-11.5-2.1-23.3-3.2-35-3.2-76.6 0-142.7 45.3-173.4 110.5 3.5 4.1 6.8 8.5 9.8 13 5.9 1.1 11.6 2.8 17.1 4.8C299.7 135.8 356 96 421.5 96c3 0 5.9.1 8.9.2-37.4 28.9-59.9 73.9-59.9 121.9C370.5 303 439.4 372 524 372c2.6 0 5.2-.1 7.8-.2C502.2 400.1 463 416 421.5 416c-38.4 0-73.2-14.2-100.8-36.9-7.6 8.1-16.3 14.9-25.9 20.6 33.8 29.9 78.1 48.2 126.7 48.2 58.1 0 112.4-25.9 149-71.1 6-7.2 7.2-17.1 3.1-25.6z"></path></svg>
  </div>
