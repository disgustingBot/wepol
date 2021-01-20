<?php get_header(); ?>

<?php $term = get_queried_object(); ?>


<div class="front_head">
  <h1 class="front_head_title"><?php echo $term->name; ?></h1>
  <div class="front_head_deco"></div>
  <p class="front_head_text">Descripción corta que sea coherente con el meta description de la web, consectetur adipiscing elit. Nulla luctus urna vel massa tristique commodo. Curabitur ut sagittis mi.</p>
</div>



<div class="two_one">
  <!-- para hacer un cyclo paginable filtrable y/o buscable -->
  <!-- el cyclo debe estar contenido en una etiqueta que SOLO contenga el cyclo -->
  <!-- colocar en esa etiqueta data-card y data-cycle -->
  <!-- en los argumentos del cyclo va 'cycle' => lo mismo que el cycle de la etiqueta -->
  <!-- agregar la variable a JS con localyze script con el mismo nombre -->
  <!-- colocar la tarjeta en multicards y llamarla con una funcion -->
  <div class="showcase2" data-card="simpla_card" data-cycle="blog">
    <?php

    $stickies = get_option( 'sticky_posts' );
    $args = array(
      'posts_per_page' => 1,
      'post__in'       => $stickies,
      'category__and'  => $term->term_id, //must use category id for this field
      'ignore_sticky_posts' => 1,
    );
    $blog=new WP_Query($args);
    while($blog->have_posts()){$blog->the_post();
      $arg = array(
        'classes' => 'featured',
      );
      simpla_card($arg);
    } wp_reset_query();

    $args = array(
      'posts_per_page' => 10,
      'cycle' => 'blog',
      'post__not_in'   => $stickies,
      'category__and' => $term->term_id, //must use category id for this field
      'ignore_sticky_posts' => 1,
    );
    $blog=new WP_Query($args);
    wp_localize_script( 'main', 'blog', array('query'=>json_encode($blog->query_vars),) );
    while($blog->have_posts()){$blog->the_post();
      simpla_card();
    } wp_reset_query();
    echo ajax_paginator_2($blog); ?>
  </div>




  <aside class="gliter"  data-cycle-container="blog">

        <div class="mateput">
          <input class="mateputInput Searcher" id="mateputNombre" type="text" name="nombre" autocomplete="off" required>
          <label for="mateputNombre" class="mateputLabel">
            <span class="mateputName">Buscar</span>
          </label>
        </div>

        <?php include 'gliter_car.php'; ?>



    <!-- <h3>y mas cosas</h3> -->
  </aside>

</div>






<?php get_footer(); ?>
