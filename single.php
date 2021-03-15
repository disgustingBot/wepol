<?php get_header(); ?>




<?php
// buscar metadato "cant_visitas"
$view_count = get_post_meta(get_the_ID(), 'tp_view_count', true);
if($view_count){
  // si existe, sumarle 1 y guardarlo
  update_post_meta(get_the_ID(), 'tp_view_count', $view_count + 1);
} else {
  // si no existe, crearlo y darle valor = 1
  add_post_meta(get_the_ID(), 'tp_view_count', 1);
}
?>


<!-- <banner class="topan">
  <h5 class="topan_title">titulo banner</h5>
  <p class="topan_txt">texto banner un poco mas largo</p>
  <a class="topan_button" href="">botón</a>
  <button class="topan_close" onclick="altClassFromSelector('alt', '.topan')">x</button>
</banner> -->
<div class="single_container">

  <?php include 'inc/social_sharing.php'; ?>


  <div class="sin_cabeza two_one">
    <h1 class="sin_cabeza_title"><?php the_title(); ?></h1>
    <p class="sin_cabeza_date only_under_768_G"><?= get_the_date() ?></p>
  </div>

  <div class="sin_cuerpo two_one">

    <div class="mateput"  data-cycle-container="blog">
      <input class="mateputInput Redirecter" id="mateputNombre" type="text" name="nombre" autocomplete="off" required>
      <label for="mateputNombre" class="mateputLabel">
        <span class="mateputName">Buscar</span>
      </label>
    </div>

    <?php while(have_posts()){the_post(); ?>
      <section class="main Height_measurement">
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

        <p class=""><?= get_the_date() ?></p>

        <div class="simpla_r_time">
          <p><span class="simpla_r_time_txt">Tiempo de lectura:</span> <?php echo reading_time(); ?>’</p>
          <?php include get_template_directory() . '/assets/clock.svg' ?>
        </div>

        <div class="post_excerpt"><?php the_excerpt(); ?></div>
        <p class="post_author"><i>Por <?php the_author(); ?></i></p>

        <?php include 'gliter_car.php'; ?>


          <div class="gliter_car">
            <h3 class="gliter_car_title"><?= __('Artículos relacionados', '3pi') ?></h3>

            <?php
            $orig_post = $post;
            global $post;
            $tags = wp_get_post_tags($post->ID);
            if ($tags) {
              $tag_ids = array();
              foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
              $args=array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                // 'post_type'=>'post',
                'ignore_sticky_posts' => 1,
                'posts_per_page'      => 3,
              );
              $related=new WP_Query($args);
              $i=1;
              while($related->have_posts()){ $related->the_post();
                $arg = array(
                  'color' => "var(--brand_color_$i)",
                  // 'image' => "https://picsum.photos/600/40$i",
                );
                shiny_card($arg);
                $i +=1;
              }
              $post = $orig_post;
              wp_reset_query();
            }
            ?>
          </div>

      </aside>

    <?php } ?>
  </div>

</div>


<div class="single_share" onclick="my_share('<?php the_title(); ?>', '<?php _e('Mira este artículo!', 'lt') ?>', '<?php echo get_permalink(); ?>')">
  <svg class="simpla_share_icon" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 35 35">
    <use xlink:href="#share_svg"></use>
  </svg>
</div>



<?php get_footer(); ?>
