<?php get_header(); ?>



<?php
$i = 0;
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
?>
<nav class="nav_categories">
  <?php foreach( $categories as $category ) { ?>
    <p class="nav_categories_item">
      <a href="<?php echo get_term_link($category->term_id); ?>">
        <?php echo $category->name; ?>
      </a>
    </p>
  <?php } ?>
</nav>


<?php foreach( $categories as $category ) { ?>
  <section class="ticon">
    <h1><?php echo $category->name; ?></h1>

    <a href="<?php echo get_term_link($category->term_id); ?>">Ver más -></a>
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
            'color' => False,
            'excerpt' => False,
          );
          mirror_card($arg);
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
            'color' => 'red',
            'excerpt' => False,
          );
          simpla_card($arg);
          $i+=1;
        } wp_reset_query();
        ?>
      </div>
  </section>
<?php } ?>



<?php get_footer(); ?>
