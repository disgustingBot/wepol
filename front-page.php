<?php get_header(); ?>

<?php
$i = 0;
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
?>

<hgroup class="front_head top_block">
  <?php // echo standard_svg('logo_squared', 'logo_bg'); ?>


  <svg class="logo_bg Obse" data-observe=".logo_bg_activator" data-unobserve="false" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 50 50">
    <use xlink:href="#logo_squared"></use>
  </svg>
  <div class="redDot logo_bg_activator"></div>

  <h1 class="front_head_title">Artículos, información y consejos útiles para crear tus propias encuestas.</h1>
  <div class="front_head_deco"></div>
  <h2 class="front_head_subtitle">Blog de encuesta.com, herramienta para crear encuestas online.</h2>
</hgroup>

<?php
$index = 0;
 ?>
<?php foreach( $categories as $category ) { ?>
  <section class="ticon top_block">
    <?php if ($index % 2 == 1){ ?>
      <!-- <div class="redDot test logo_bg_activator" data-detection-size="-150px 0px -150px 0px" data-clase="blue"></div> -->
    <?php } ?>
    <h4 class="ticon_title"><?php echo $category->name; ?></h4>

    <div class="ticon_deco"></div>

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
            'classes' => 'featured post-'.get_the_ID(),
            // 'categories' => array($category),
          );
          simpla_card($arg);
          // var_dump(wp_get_post_categories(get_the_ID()));
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
            'classes' => "post-".get_the_ID(),
            // 'categories' => array($category),
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
  <?php $index+=1; ?>
<?php } ?>



<?php get_footer(); ?>
