<?php get_header(); ?>


<!-- colocar aqui el bloque del encabezado -->
<!-- <h1>single.php</h1> -->

<div class="sin_cabeza">
  <h1 class="sin_cabeza_title"><?php the_title(); ?></h1>
  <p class="sin_cabeza_date">30 de Diciembre de 2020</p>
</div>

<div class="sin_container">

  <?php while(have_posts()){the_post(); ?>
    <section class="main">
      <img class="main_img" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
      <?php the_content(); ?>
    </section>

    <aside class="gliter"  data-cycle-container="blog">


      <div class="simpla_r_time">
        <p><?php echo reading_time(); ?>’</p>
        <?php include get_template_directory() . '/assets/clock.svg' ?>
      </div>

      <?php the_excerpt(); ?>
      <p class="simpla_author">Por -<?php the_author(); ?>-</p>

      <div class="mateput">
        <input class="mateputInput Searcher" id="mateputNombre" type="text" name="nombre" autocomplete="off" required>
        <label for="mateputNombre" class="mateputLabel">
          <span class="mateputName">Buscar</span>
        </label>
      </div>

      <?php include 'gliter_car.php'; ?>

    </aside>

  <?php } ?>
</div>



<?php get_footer(); ?>
