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


<div class="front_head">
  <h1 class="front_head_title">Título Blog</h1>
  <div class="front_head_deco"></div>
  <p class="front_head_text">Descripción corta que sea coherente con el meta description de la web, consectetur adipiscing elit. Nulla luctus urna vel massa tristique commodo. Curabitur ut sagittis mi.</p>
</div>



<?php foreach( $categories as $category ) { ?>
  <section class="ticon">
    <h1><?php echo $category->name; ?></h1>

    <a href="<?php echo get_term_link($category->term_id); ?>">Ver más -></a>
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
  </section>
<?php } ?>



<?php get_footer(); ?>
