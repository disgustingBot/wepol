<?php get_header(); ?>

<?php $term = get_queried_object(); ?>

<main class="front_main">


<div class="fead">
  <div class="fead_caption">
    <h1 class="fead_title"><?php echo $term->name; ?></h1>
    <div class="fead_deco"></div>
    <p class="fead_subtitle">Descripción corta que sea coherente con el meta description de la web, consectetur adipiscing elit. Nulla luctus urna vel massa tristique commodo. Curabitur ut sagittis mi.</p>

    <a class="fead_btn btn little_cta_link" href="">
      <span>Crear encuesta</span>
      <svg class="more_btn_svg" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 50 50">
        <use xlink:href="#arrow_right"></use>
      </svg>
    </a>
  </div>
  <?php include 'assets/logo_squared_bg_color.svg'; ?>
</div>

<div class="fead">
  <div class="fead_caption">
    <h1 class="fead_title"><?php echo $term->name; ?></h1>
    <div class="fead_deco"></div>
    <p class="fead_subtitle">Descripción corta que sea coherente con el meta description de la web, consectetur adipiscing elit. Nulla luctus urna vel massa tristique commodo. Curabitur ut sagittis mi.</p>

    <a class="fead_btn btn little_cta_link" href="">
      <span>Crear encuesta</span>
      <svg class="more_btn_svg" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 50 50">
        <use xlink:href="#arrow_right"></use>
      </svg>
    </a>
  </div>
  <?php include 'assets/logo_squared_bg_white.svg'; ?>
</div>
















<div class="two_one">

  <div class="mateput"  data-cycle-container="blog">
    <input class="mateputInput Searcher" id="mateputNombre" type="text" name="nombre" autocomplete="off" required>
    <label for="mateputNombre" class="mateputLabel">
      <span class="mateputName">Buscar</span>
    </label>
  </div>
  <!-- para hacer un cyclo paginable filtrable y/o buscable -->
  <!-- el cyclo debe estar contenido en una etiqueta que SOLO contenga el cyclo -->
  <!-- colocar en esa etiqueta data-card y data-cycle -->
  <!-- en los argumentos del cyclo va 'cycle' => lo mismo que el cycle de la etiqueta -->
  <!-- agregar la variable a JS con localyze script con el mismo nombre -->
  <!-- colocar la tarjeta en multicards y llamarla con una funcion -->
  <div class="showcase2" data-card="simpla_card" data-cycle="blog">
    <?php

    $stickies = get_option( 'sticky_posts' );
    $featured_id = 0;
    // var_dump($stickies);
    $args = array(
      'posts_per_page' => 1,
      'post__in'       => $stickies,
      'category__and'  => $term->term_id, //must use category id for this field
      'ignore_sticky_posts' => 1,
    );
    $blog=new WP_Query($args);
    if($blog->have_posts()){

      while($blog->have_posts()){$blog->the_post();
      $featured_id = get_the_ID();
        $arg = array(
          'classes' => 'featured post-'.get_the_ID(),
        );
        simpla_card($arg);
      } wp_reset_query();
    }

    $args = array(
      'posts_per_page' => 10,
      'cycle' => 'blog',
      'post__not_in'   => array($featured_id),
      'category__and' => $term->term_id, //must use category id for this field
      'ignore_sticky_posts' => 1,
    );
    $blog=new WP_Query($args);
    wp_localize_script( 'main', 'blog', array('query'=>json_encode($blog->query_vars),) );
    while($blog->have_posts()){$blog->the_post();
      $arg = array(
        // 'image' => "https://picsum.photos/600/40$i",
        'classes' => "post-".get_the_ID(),
      );
      simpla_card($arg);
      // $i+=1;
    } wp_reset_query();
    echo ajax_paginator_2($blog); ?>
  </div>




  <aside class="gliter"  data-cycle-container="blog">

    <?php include 'gliter_car.php'; ?>

    <!-- <h3>y mas cosas</h3> -->
  </aside>

</div>



</main>



<?php get_footer(); ?>
