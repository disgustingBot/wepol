<?php get_header(); ?>


<div class="front_head top_block">
  <h1 class="front_head_title">Artículos, información y consejos útiles para crear tus propias encuestas. Investigación de mercados por Internet. Aprende a realizar una encuesta online.</h1>
  <div class="front_head_deco"></div>
  <p class="front_head_text">Descripción corta que sea coherente con el meta description de la web, consectetur adipiscing elit. Nulla luctus urna vel massa tristique commodo. Curabitur ut sagittis mi.</p>
</div>



<?php
$i = 0;
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
foreach( $categories as $category ) { ?>
  <section class="ticon top_block">
    <h3 class="ticon_title"><?php echo $category->name; ?></h3>

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
            'classes' => 'featured',
            'categories' => array($category),
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
            'categories' => array($category),
          );
          simpla_card($arg);
          $i+=1;
        } wp_reset_query();
        ?>
      </div>
      <a href="<?php echo get_term_link($category->term_id); ?>">Ver más -></a>
  </section>
<?php } ?>



<?php get_footer(); ?>
