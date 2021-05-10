<?php

get_header();

$term = get_queried_object();

$filters = json_decode(wp_unslash($_GET['filters']));
$value = (isset($filters->search)) ? $filters->search : "";
?>

<main class="front_main">

<div class="regular_space" style="display: grid;grid-gap:1rem">
  <!-- <h1><?= get_the_ID(); ?></h1> -->
  <h1><?= get_post_meta(get_option( 'page_for_posts' ), 'A_title', true); ?></h1>

  <div class="mateput"  data-cycle-container="filters">
    <input class="mateputInput Searcher" id="mateputNombre" value="<?= $value ?>" type="text" name="nombre" autocomplete="off" required>
    <label for="mateputNombre" class="mateputLabel">
      <span class="mateputName">Buscar</span>
    </label>
  </div>
</div>


<div class="two_one">

  <!-- para hacer un cyclo paginable filtrable y/o buscable -->
  <!-- el cyclo debe estar contenido en una etiqueta que SOLO contenga el cyclo -->
  <!-- colocar en esa etiqueta data-card y data-cycle -->
  <!-- en los argumentos del cyclo va 'cycle' => lo mismo que el cycle de la etiqueta -->
  <!-- agregar la variable a JS con localyze script con el mismo nombre -->
  <!-- colocar la tarjeta en multicards y llamarla con una funcion -->
  <div class="showcase2" data-card="simpla_card" data-cycle="filters">
    <?php
    global $wp_query;
    // var_dump($wp_query->query_vars);
    wp_localize_script( 'main', 'filters', array('query'=>json_encode($wp_query->query_vars),) );
    while(have_posts()){the_post();
      $arg = array(
        'classes' => "post-".get_the_ID(),
      );
      simpla_card($arg);
    } wp_reset_query();
    echo ajax_paginator_2($blog); ?>
  </div>




  <aside class="gliter"  data-cycle-container="blog">

    <?php include 'gliter_car.php'; ?>

  </aside>

</div>



</main>



<?php get_footer(); ?>
