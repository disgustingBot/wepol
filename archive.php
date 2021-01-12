<?php get_header(); ?>


<h1>archive 1</h1>


<!-- para hacer un cyclo paginable filtrable y/o buscable -->
<!-- el cyclo debe estar contenido en una etiqueta que SOLO contenga el cyclo -->
<!-- colocar en esa etiqueta data-card y data-cycle -->
<!-- en los argumentos del cyclo va 'cycle' => lo mismo que el cycle de la etiqueta -->
<!-- agregar la variable a JS con localyze script con el mismo nombre -->
<!-- colocar la tarjeta en multicards y llamarla con una funcion -->
<div class="showcase3" data-card="simpla_card" data-cycle="blog">
  <!-- // cycle($args); -->

  <?php
  $args = array(
    'posts_per_page' => 5,
    'cycle' => 'blog',
  );
  $blog=new WP_Query($args);
  wp_localize_script( 'main', 'blog', array('query'=>json_encode($blog->query_vars),) );
  while($blog->have_posts()){$blog->the_post();
    $arg = array(
      'image' => 'https://picsum.photos/600/400',
      'color' => 'red',
    );
    simpla_card($arg);
  } wp_reset_query();
  echo ajax_paginator_2($blog); ?>
</div>

<?php get_footer(); ?>
