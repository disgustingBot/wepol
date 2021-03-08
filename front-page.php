<?php get_header(); ?>

<?php
$i = 0;
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
?>

<main class="front_main">


<div class="fead">
  <div class="fead_caption">
    <h1 class="fead_title"><?php echo get_post_meta(get_the_ID(), 'ATF_tilte', true); ?></h1>
    <div class="fead_deco"></div>
    <h2 class="fead_subtitle"><?php echo get_post_meta(get_the_ID(), 'ATF_text', true); ?></h2>

    <a class="fead_btn btn little_cta_link" href="<?php echo get_post_meta(get_the_ID(), 'ATF_link', true); ?>">
      <span><?php echo get_post_meta(get_the_ID(), 'ATF_texto_boton', true); ?></span>
      <svg class="more_btn_svg" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 50 50">
        <use xlink:href="#arrow_right"></use>
      </svg>
    </a>
  </div>
  <?php include 'assets/logo_squared_bg_color.svg'; ?>
</div>

<div class="fead">
  <div class="fead_caption">
    <h1 class="fead_title"><?php echo get_post_meta(get_the_ID(), 'ATF_tilte', true) ?></h1>
    <div class="fead_deco"></div>
    <h2 class="fead_subtitle"><?php echo get_post_meta(get_the_ID(), 'ATF_text', true) ?></h2>

    <a class="fead_btn btn little_cta_link" href="<?php echo get_post_meta(get_the_ID(), 'ATF_link', true) ?>">
      <span>Crear encuesta</span>
      <svg class="more_btn_svg" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 50 50">
        <use xlink:href="#arrow_right"></use>
      </svg>
    </a>
  </div>
  <?php include 'assets/logo_squared_bg_white.svg'; ?>
</div>

<?php
$index = 0;
foreach( $categories as $category ) { ?>
  <section class="ticon <?php echo "ticon-" . $category->term_id; ?>">

    <h4 class="ticon_title rowcol1"><?php echo $category->name; ?></h4>

    <div class="ticon_deco"></div>

    <div class="showcase3 ticon_grid"></div>
    <a class="more_btn_2" href="<?php echo get_term_link($category->term_id); ?>">
      <span>Más artículos</span>
      <svg class="more_btn_svg" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 50 50">
        <use xlink:href="#arrow_right"></use>
      </svg>
    </a>
  </section>
  <?php $index+=1; ?>
<?php } ?>

</main>


<div class="pop" style="display:none">
  <h3 class="pop_title">Publicaciones populares</h3>
  <?php foreach( $categories as $category ) { ?>
    <div class="pop_song <?php echo "pop_song-" . $category->term_id; ?>">
      <h4 class="pop_song_title rowcol1">
        <a class="more_btn_2" href="<?php echo get_term_link($category->term_id); ?>">
          <?php echo $category->name; ?>
        </a>
      </h4>

      <?php
      $args = array(
        'posts_per_page' => 5,
        'category__and' => $category->term_id, //must use category id for this field
        'orderby'   => 'meta_value_num',
        'meta_key'  => 'tp_view_count',
      );
      $blog=new WP_Query($args);
      while($blog->have_posts()){$blog->the_post(); ?>
        <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
      <?php } wp_reset_query(); ?>
    </div>
  <?php } ?>
</div>



<?php get_footer(); ?>
