<?php get_header(); ?>


<!-- colocar aqui el bloque del encabezado -->
<!-- <h1>single.php</h1> -->

<div class="sin_cabeza top_block">
  <h1 class="sin_cabeza_title"><?php the_title(); ?></h1>
  <p class="sin_cabeza_date"><?php echo get_the_date(); ?></p>
</div>

<div class="two_one">

  <?php while(have_posts()){the_post(); ?>
    <section class="main">
      <img class="main_img" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
      <?php the_content(); ?>
    </section>

    <aside class="gliter">
      <?php
      $categories = get_categories(array('include' => wp_get_post_categories(get_the_ID())));
      foreach ($categories as $category) { ?>
        <h6 class="single_category">
          <a href="<?php echo get_term_link($category); ?>">
            <?php echo $category->name; ?>
          </a>
        </h6>
      <?php } ?>


      <div class="simpla_r_time">
        <p><span class="simpla_r_time_txt">Tiempo de lectura:</span> <?php echo reading_time(); ?>’</p>
        <?php include get_template_directory() . '/assets/clock.svg' ?>
      </div>

      <div class="post_excerpt"><?php the_excerpt(); ?></div>
      <p class="post_author"><i>Por <?php the_author(); ?></i></p>

      <?php include 'gliter_car.php'; ?>

    </aside>

  <?php } ?>
</div>



<?php get_footer(); ?>
