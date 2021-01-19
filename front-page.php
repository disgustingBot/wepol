<?php get_header(); ?>


<?php
$i = 0;
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
?>
<nav class="nav_categories Carousel">
  <div class="nav_categories_container rowcol1 Element">
  <?php
  $i = 0;
  foreach( $categories as $category ) {
    // algoritmo:
    // empezar abriendo un element
    // cada iteracion chequear el resto de $i / 4,
    if ( $i != 0 and $i % 4 == 0) {
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
<!-- <button class="prenex prenex_prev prevButton" id=""></button> -->
<p class="menu-item prenex prenex_next nextButton more_btn" id="">
  <span>Más categorías</span>
  <svg class="more_btn_svg" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 50 50">
    <use xlink:href="#arrow_right"></use>
  </svg>
</p>

</nav>


<div class="front_head top_block">
  <h1 class="front_head_title">Artículos, información y consejos útiles para crear tus propias encuestas.</h1>
  <div class="front_head_deco"></div>
  <p class="front_head_text">Descripción corta que sea coherente con el meta description de la web, consectetur adipiscing elit. Nulla luctus urna vel massa tristique commodo. Curabitur ut sagittis mi.</p>
</div>



<?php foreach( $categories as $category ) { ?>
  <section class="ticon top_block">
    <h5 class="ticon_title"><?php echo $category->name; ?></h5>

    <div class="ticon_deco"></div>
    <?php // var_dump($category); ?>

    <div class="showcase3">
        <?php
        $stickies = get_option( 'sticky_posts' );
        $args = array(
          'posts_per_page' => 1,
          'post__in'       => $stickies,
          'category__and'  => $category->term_id, //must use category id for this field
          'ignore_sticky_posts' => 1,
        );
        $blog=new WP_Query($args);
        while($blog->have_posts()){$blog->the_post();
          $arg = array(
            'image' => "https://picsum.photos/600/40$i",
            'excerpt' => False,
            'classes' => 'featured',
          );
          simpla_card($arg);
          $i+=1;
        } wp_reset_query();

        $args = array(
          'posts_per_page' => 4,
          'post__not_in'   => $stickies,
          'category__and' => $category->term_id, //must use category id for this field
          'ignore_sticky_posts' => 1,
        );
        $blog=new WP_Query($args);
        while($blog->have_posts()){$blog->the_post();
          $arg = array(
            'image' => "https://picsum.photos/600/40$i",
            'excerpt' => False,
          );
          simpla_card($arg);
          $i+=1;
        } wp_reset_query();
        ?>
      </div>
      <a class="more_btn_2" href="<?php echo get_term_link($category->term_id); ?>">
        <span>Más artículos</span>
        <svg class="more_btn_svg" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 50 50">
          <use xlink:href="#arrow_right"></use>
        </svg>
      </a>
  </section>
<?php } ?>



<?php get_footer(); ?>
