<?php get_header(); ?>





<!-- <div class="ticon">

  <div class="Culiau showcase3"></div>
</div> -->





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
    <h1 class="fead_title">Artículos, información y consejos útiles para crear tus propias encuestas.</h1>
    <div class="fead_deco"></div>
    <h2 class="fead_subtitle">Blog de encuesta.com, herramienta para crear encuestas online.</h2>

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
    <h1 class="fead_title">Artículos, información y consejos útiles para crear tus propias encuestas.</h1>
    <div class="fead_deco"></div>
    <h2 class="fead_subtitle">Blog de encuesta.com, herramienta para crear encuestas online.</h2>

    <a class="fead_btn btn little_cta_link" href="">
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

    <div class="showcase3 ticon_grid">
        <?php

        if(False){

          $cant_normal_posts = 3;
          $cat_banner = get_term_meta( $category->term_id, 'lt_meta_banner', true);
          $stickies = get_option( 'sticky_posts' );

          $args = array(
            'posts_per_page' => 1,
            'post__in'       => $stickies,
            'category__and'  => $category->term_id, //must use category id for this field
            'ignore_sticky_posts' => 1,
          );
          $blog=new WP_Query($args);
          $featured_id = 0;
          if($blog->have_posts()){
            while($blog->have_posts()){$blog->the_post();
              $arg = array( 'classes' => 'featured post-'.get_the_ID(), );
              $featured_id = get_the_ID();
              simpla_card($arg);
            } wp_reset_query();
          } else {
            // if there is no sticky post, load 2 more normal posts
            $cant_normal_posts += 2;
          }


          if(!$cat_banner){
            // if there is no banner load one more post
            $cant_normal_posts += 1;
          } else {
            $banner = get_page_by_path( $cat_banner, OBJECT, 'banner' );
            $args = array(
              'post_type'      => 'banner',
              'posts_per_page' => 1,
              'post__in'       => [$banner->ID],
            );
            $banner=new WP_Query($args);
            while($banner->have_posts()){$banner->the_post();
              banin_card();
            }
          }

          $args = array(
            'posts_per_page' => $cant_normal_posts,
            'post__not_in'   => array($featured_id),
            'category__and' => $category->term_id, //must use category id for this field
            'ignore_sticky_posts' => 1,
          );
          $blog=new WP_Query($args);
          while($blog->have_posts()){$blog->the_post();
            $arg = array(
              'classes' => "post-".get_the_ID(),
              );
              simpla_card($arg);
              $i+=1;
            } wp_reset_query();
        }


        ?>
      </div>
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


<?php get_footer(); ?>
